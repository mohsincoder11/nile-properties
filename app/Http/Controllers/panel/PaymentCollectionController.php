<?php

namespace App\Http\Controllers\panel;

use App\Models\CustomerRegistrationMaster;
use App\Models\OtherCharges;
use Illuminate\Http\Request;
use App\Models\InitialEnquiry;
use Illuminate\Support\Facades\DB;
use App\Models\ClientDetailInitial;
use App\Http\Controllers\Controller;
use App\Models\EmiPaymentCollection;
use App\Models\OtherChargesForClient;
use App\Models\FirmRegistrationMaster;
use App\Models\PlotRegistrationDocumentByClient;
use App\Models\ProjectEntryAppendData;
use Razorpay\Api\Api;

class PaymentCollectionController extends Controller
{
    public function paymentcollection()
    {
        $client = ClientDetailInitial::all();
        $projects = InitialEnquiry::with('project')->distinct()->get(['project_id']);
        $firm = FirmRegistrationMaster::all();
        // Fetch EMI payments for the first initial enquiry record
        $charges = OtherCharges::all();

        return view('panel.payment_collection', compact('client', 'projects', 'firm', 'charges'));
    }


    public function getClientProjectPlotData(Request $request)
    {
        // dd($request->all());
        $client_id = $request->input('client_id');
        $project_id = $request->input('project_id');
        $plot_no = $request->input('plot_no');
        $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $project_id)->where('plot_no', $plot_no)

            ->first();

        $client = CustomerRegistrationMaster::where('id', $client_id)->first();

        $initialEnquiry = InitialEnquiry::with('emi')->where('project_id', $project_id)->where('plot_no', $plotNoFetch->id)->first();
        // dd($initialEnquiry);

        if ($client && $initialEnquiry) {
            $data = [
                'client_name' => $client->name,
                'client_phone' => $client->phone,
                'client_address' => $client->address,
                'layout_name' => $initialEnquiry->project->project_name,
                'plot_no' => $plot_no,
                'total_amount' => $initialEnquiry->total_cost,
                'down_payment' => $initialEnquiry->down_payment,
                'remaining_payment' => $initialEnquiry->balance_amount,
                'total_installments' => $initialEnquiry->tenure,
                'measurement' => $initialEnquiry->measurement,
                'square_ft' => $initialEnquiry->square_ft,
                'installment_type' => 'Monthly', // Assuming it's always monthly
            ];

            // Fetch related EMI payments
            $emiPayments = $initialEnquiry->emi;

            $html = view('panel.client_project_plot_data_render_intialsale', compact('data', 'emiPayments'))->render();

            return response()->json(['html' => $html]);
        }

        return response()->json(['html' => 'No Data Found!']);
    }
    public function othercharge_store(Request $request)
    {
        // Validate the request data
        $validatedData = $request->validate([
            'amount' => 'required|',
            'project_id' => 'required|',
            'plot_id' => 'required|',
            'client_id' => 'required|',
            'firm_id' => 'required|',
            'charges_id' => 'required|',
        ]);

        // Fetch the plot entry based on project_id and plot_id
        $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $validatedData['project_id'])
            ->where('plot_no', $validatedData['plot_id'])
            ->first();

        if (!$plotNoFetch) {
            return response()->json(['success' => false, 'message' => 'Plot not found'], 404);
        }

        // Find the corresponding InitialEnquiry based on the input parameters
        $initialEnquiry = InitialEnquiry::where('firm_id', $validatedData['firm_id'])
            ->where('project_id', $validatedData['project_id'])
            ->where('plot_no', $plotNoFetch->id) // Use plot_no for matching
            ->first();

        $initialEnquiryId = $initialEnquiry ? $initialEnquiry->id : null;

        // Create a new record in the other_charges_for_clients table
        $otherCharge = OtherChargesForClient::create([
            'amount' => $validatedData['amount'],
            'project_id' => $validatedData['project_id'],
            'plot_id' => $plotNoFetch->id,
            'client_id' => $validatedData['client_id'],
            'firm_id' => $validatedData['firm_id'],
            'charges_id' => $validatedData['charges_id'],
            'initial_enquiry_id' => $initialEnquiryId, // Set the initial_enquiry_id
        ]);

        // Fetch additional data for the response
        $chargeData = OtherChargesForClient::with('chargesname', 'projectname', 'firmname', 'clientname')
            ->find($otherCharge->id);

        if (!$chargeData) {
            return response()->json(['success' => false, 'message' => 'Failed to fetch charge data'], 500);
        }

        return response()->json([
            'success' => true,
            'message' => 'Other charges for client saved successfully!',
            'data' => [
                'amount' => $chargeData->amount,
                'plot_id' => $chargeData->plot_id,
                'project_name' => $chargeData->projectname->project_name ?? 'N/A',
                'firm_name' => $chargeData->firmname->name ?? 'N/A',
                'charges_id' => $chargeData->chargesname->other_charges ?? 'N/A'
            ]
        ]);
    }


    public function getOtherCharges(Request $request)
    {
        try {
            $projectId = $request->input('project_id');
            $plotId = $request->input('plot_id');
            $clientId = $request->input('client_id'); // Get client_id from request

            // Fetch the plot entry
            $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $projectId)
                ->where('plot_no', $plotId)
                ->first();

            // Check if plotNoFetch is found
            if (!$plotNoFetch) {
                return response()->json(['error' => 'Plot not found.'], 404);
            }

            // Fetch the charges
            $charges = OtherChargesForClient::with('chargesname', 'plotname', 'projectname', 'firmname', 'clientname')
                ->where('project_id', $projectId)
                ->where('plot_id', $plotNoFetch->id)
                ->where('client_id', $clientId) // Filter by client_id
                ->whereNotNull('amount')
                ->whereNotNull('charges_id')
                ->whereNotNull('client_id')
                ->whereNotNull('plot_id')
                ->whereNotNull('firm_id')
                ->whereNotNull('project_id')
                ->whereNotNull('status')
                ->get();

            $result = $charges->map(function ($charge) {
                return [
                    'payment_type' => $charge->chargesname->other_charges ?? 'N/A',
                    'date' => $charge->created_at ? $charge->created_at->format('Y-m-d') : 'N/A',
                    'amount' => $charge->amount ?? 'N/A',
                    'plot_no' => $charge->plotname->plot_no ?? 'N/A',
                    'project_name' => $charge->projectname->project_name ?? 'N/A',
                    'firm_name' => $charge->firmname->name ?? 'N/A',
                    'status' => $charge->status ?? 'N/A',
                ];
            });

            return response()->json($result);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }

    // DocumentController.php
    public function fetchDocuments(Request $request)
    {
        try {
            // First, fetch the plot_id and project_id from ProjectEntryAppendData
            $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $request->input('project_id'))
                ->where('plot_no', $request->input('plot_id'))
                ->first();

            // If no record is found, return an empty response or handle it as needed
            if (!$plotNoFetch) {
                return response()->json([], 404); // Not found
            }

            // Extract the plot_id and project_id
            $plotId = $plotNoFetch->id; // Adjust based on your actual schema
            $projectId = $plotNoFetch->project_entry_id;

            // Initialize the query for PlotRegistrationDocumentByClient
            $query = PlotRegistrationDocumentByClient::query();

            // Apply filters based on the request inputs
            $query->where('project_id', $projectId)
                ->where('plot_id', $plotId);

            if ($request->has('client_id')) {
                $query->where('client_id', $request->input('client_id'));
            }

            // Ensure that only records where the specified fields are not null are retrieved
            $query->whereNotNull('document_name')
                ->whereNotNull('plot_id')
                ->whereNotNull('firm_id')
                ->whereNotNull('project_id')
                ->whereNotNull('client_id')
                ->whereNotNull('status');

            // Eager load the relationships
            $documents = $query->with('projectname', 'plotname', 'firmname', 'clientname')->get();

            return response()->json($documents);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred: ' . $e->getMessage()], 500);
        }
    }




    public function documentstore(Request $request)
    {
        $documents = [];

        // Fetch the plot entry based on project_id and plot_id
        $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $request->project_id)
            ->where('plot_no', $request->plot_id)
            ->first();

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                // Generate a unique name for the file
                $filename = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();

                // Move the file to the 'documents' directory in the 'public' disk
                $file->move(public_path('documents'), $filename);

                // Find the corresponding InitialEnquiry based on the input parameters
                $initialEnquiry = InitialEnquiry::where('firm_id', $request->input('firm_id'))
                    ->where('project_id', $request->input('project_id'))
                    ->where('plot_no', $plotNoFetch->id) // Ensure the correct field is used for matching
                    ->first();

                $initialEnquiryId = $initialEnquiry ? $initialEnquiry->id : null;

                // Store file information in the database
                $document = PlotRegistrationDocumentByClient::create([
                    'document_name' => $filename,
                    'plot_id' => $plotNoFetch->id,
                    'project_id' => $request->input('project_id'),
                    'client_id' => $request->input('client_id'),
                    'firm_id' => $request->input('firm_id'),
                    'initial_enquiry_id' => $initialEnquiryId,
                ]);

                $documents[] = [
                    'document_name' => $filename,
                    'updated_by' => $document->clientname->name ?? 'N/A',
                    'updated_date' => $document->created_at->format('Y-m-d'),
                    'plot_no' => $document->plot_id,
                    'project_name' => $document->projectname->project_name ?? 'N/A',
                    'firm_name' => $document->firmname->name ?? 'N/A',
                ];
            }
        }

        return response()->json($documents);
    }



    // public function documentindex()
    // {
    //     $documents = PlotRegistrationDocumentByClient::all();
    //     return response()->json($documents);
    // }

    public function getClientProjectPlotDatatwo(Request $request)
    {
        $project_id = $request->input('project_id');
        $plot_no = $request->input('plot_no');
        $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $project_id)->where('plot_no', $plot_no)

            ->first();


        $initialEnquiry = InitialEnquiry::where('project_id', $project_id)->where('plot_no', $plotNoFetch->id)->select('id')->first();

        if ($initialEnquiry) {
            $emiPayments = EmiPaymentCollection::where('initial_enquiry_id', $initialEnquiry->id)->get();
        } else {
            $emiPayments = collect(); // Empty collection
        }

        $html = view('panel.payment_collection_emi', compact('emiPayments'))->render();

        return response()->json(['html' => $html]);
    }


    public function search_payment_collection_agains_client(Request $request)
    {
        $clientName = $request->input('client_name');
        $projectId = $request->input('project_id');
        $plotNo = $request->input('plot_no');

        $query = DB::table('emi_payments_collections')
            ->join('initial_enquiries', 'emi_payments_collections.initial_enquiry_id', '=', 'initial_enquiries.id')
            ->join('client_detail_initials', 'initial_enquiries.id', '=', 'client_detail_initials.initial_enquiry_id')
            ->select(
                'emi_payments_collections.*',
            );

        if (!empty($clientName)) {
            $query->where('client_detail_initials.name', 'LIKE', '%' . $clientName . '%');
        }

        if (!empty($projectId)) {
            $query->where('initial_enquiries.project_id', $projectId);
        }

        if (!empty($plotNo)) {
            $query->where('initial_enquiries.plot_no', 'LIKE', '%' . $plotNo . '%');
        }

        $results = $query->get();

        return view('panel.client_project_plot_data_render_intialsale', compact('results'));
    }



    public function store_payment_installment(Request $request)
    {



        // Validate the request data
        $validated = $request->validate([
            // 'initial_enquiry_id' => 'required|integer',
            // 'installment' => 'required|integer',
            // 'date' => 'required|date',
            // 'payment_type' => 'required|string',
            // 'paid_amount' => 'required|numeric',
            // 'bank_name' => 'nullable|string',
            // 'account_no' => 'nullable|string',
            // 'cheque_no' => 'nullable|string',
            // 'ifsc' => 'nullable|string',
            // 'remark' => 'nullable|string',
        ]);

        // Find the existing installment
        $installment = EmiPaymentCollection::where('initial_enquiry_id', $request->initial_enquiry_id)
            ->where('inst_no', $request->installment)
            ->first();

        if ($installment) {
            // Calculate the remaining amount
            $rem = $installment->inst_amt - $request->paid_amount;
            if ($rem < 0) {
                $rem = 0;
            }

            // Update the existing installment
            $installment->update([
                'pay_date' => $request->date,
                'payment_type' => $request->payment_type,
                'paid_amt' => $request->paid_amount,
                'bank_name' => $request->bank_name,
                'account_no' => $request->account_no,
                'cheque_no' => $request->cheque_no,
                'ifsc' => $request->ifsc,
                'remark' => $request->remark,
                'status' => 'paid',
                'rem_amt' => $rem,
            ]);

            // Find the next installment number
            $nextInstallment = EmiPaymentCollection::where('initial_enquiry_id', $request->initial_enquiry_id)
                ->where('inst_no', '>', $installment->inst_no)
                // ->orderBy('inst_no', 'asc')
                ->first();

            // If there is a next installment, add the remaining amount to it
            if ($nextInstallment) {
                $nextInstallment->update([
                    'inst_amt' => $nextInstallment->inst_amt + $rem,
                ]);
            }



            // Return JSON response for AJAX
            return response()->json(['success' => 'Installment payment saved successfully.']);
        } else {
            // Return JSON error response for AJAX
            return response()->json(['error' => 'Installment payment not found.'], 404);
        }
    }

    public function update_installment(Request $request)
    {
        // Validate the request data
        $validated = $request->validate([
            // 'initial_enquiry_id' => 'required|integer',
            // 'installment' => 'required|integer',
            // 'date' => 'required|date',
            // 'payment_type' => 'required|string',
            // 'paid_amount' => 'required|numeric',
            // 'bank_name' => 'nullable|string',
            // 'account_no' => 'nullable|string',
            // 'cheque_no' => 'nullable|string',
            // 'ifsc' => 'nullable|string',
            // 'remark' => 'nullable|string',
        ]);

        // Find the existing installment
        $installment = EmiPaymentCollection::where('initial_enquiry_id', $request->initial_enquiry_id)
            ->where('inst_no', $request->installment)
            ->first();

        if ($installment) {
            // Calculate the remaining amount
            $rem = $installment->inst_amt - $request->paid_amount;
            if ($rem < 0) {
                $rem = 0;
            }

            // Update the existing installment
            $installment->update([
                'pay_date' => $request->date,
                'payment_type' => $request->payment_type,
                'paid_amt' => $request->paid_amount,
                'bank_name' => $request->bank_name,
                'account_no' => $request->account_no,
                'cheque_no' => $request->cheque_no,
                'ifsc' => $request->ifsc,
                'remark' => $request->remark,
                'status' => 'paid',
                'rem_amt' => $rem,
            ]);

            // Find the next installment number
            $nextInstallment = EmiPaymentCollection::where('initial_enquiry_id', $request->initial_enquiry_id)
                ->where('inst_no', '>', $installment->inst_no)
                // ->orderBy('inst_no', 'asc')
                ->first();

            // If there is a next installment, add the remaining amount to it
            if ($nextInstallment) {
                $nextInstallment->update([
                    'inst_amt' => $nextInstallment->inst_amt + $rem,
                ]);
            }

            // Return JSON response for AJAX
            return response()->json(['success' => 'Installment payment saved successfully.']);
        } else {
            // Return JSON error response for AJAX
            return response()->json(['error' => 'Installment payment not found.'], 404);
        }
    }

    public function getClientIdByPlot(Request $request)
    {

        $project_id = $request->input('project_id');
        $plotNo = $request->input('plot_no'); // Get plot number from request

        // Find the plot entry
        $plotNoFetch = ProjectEntryAppendData::where('project_entry_id', $project_id)->where('plot_no', $plotNo)

            ->first();

        if ($plotNoFetch) {
            // Find the record in the InitialEnquiry model by plot_no
            $initialEnquiry = InitialEnquiry::where('plot_no', $plotNoFetch->id)
                ->where('project_id', $project_id)
                ->first();

            if ($initialEnquiry) {
                // Find the related client details from ClientDetailInitial model
                $clientDetails = ClientDetailInitial::where('initial_enquiry_id', $initialEnquiry->id)
                    ->get();

                if ($clientDetails->isNotEmpty()) {
                    // Return all client IDs and names
                    $clients = $clientDetails->map(function ($clientDetail) {
                        return [
                            'client_id' => $clientDetail->client_id,
                            'client_name' => $clientDetail->name,
                        ];
                    });
                    return response()->json(['clients' => $clients]);
                } else {
                    return response()->json(['error' => 'Client details not found'], 404);
                }
            } else {
                return response()->json(['error' => 'Initial Enquiry not found'], 404);
            }
        } else {
            return response()->json(['error' => 'Plot not found'], 404);
        }
    }
}
