<?php

namespace App\Http\Controllers\panel;

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
        $client_id = $request->input('client_id');
        $project_id = $request->input('project_id');
        $plot_no = $request->input('plot_no');

        $client = ClientDetailInitial::where('id', $client_id)->first();
        $initialEnquiry = InitialEnquiry::with('emi')->where('project_id', $project_id)->where('plot_no', $plot_no)->first();
        // dd($initialEnquiry);
        if ($client && $initialEnquiry) {
            $data = [
                'client_name' => $client->name,
                'client_phone' => $client->phone,
                'client_address' => $client->address,
                'layout_name' => $initialEnquiry->project->project_name,
                'plot_no' => $initialEnquiry->plot_no,
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
        $validatedData = $request->validate([
            'amount' => 'required|numeric',
            'project_id' => 'required|integer',
            'plot_id' => 'required|integer',
           // 'client_id' => 'required|integer',
            'firm_id' => 'required|integer',
            'charges_id' => 'required|integer',
        ]);

        // Create a new record in the other_charges_for_clients table
        $otherCharge = OtherChargesForClient::create([
            'amount' => $validatedData['amount'],
            'project_id' => $validatedData['project_id'],
            'plot_id' => $validatedData['plot_id'],
            'client_id' => $validatedData['client_id'] ?? null,
            'firm_id' => $validatedData['firm_id'],
            'charges_id' => $validatedData['charges_id'],
        ]);

        // Fetch additional data for the response
        $chargeData = OtherChargesForClient::with('chargesname', 'projectname', 'firmname', 'clientname')
            ->find($otherCharge->id);

        return response()->json([
            'success' => true,
            'message' => 'Other charges for client saved successfully!',
            'data' => [
                'amount' => $chargeData->amount,
                'plot_id' => $chargeData->plot_id,
                'project_name' => $chargeData->projectname->project_name,
                'firm_name' => $chargeData->firmname->name,
                'charges_id' => $chargeData->chargesname->other_charges
            ]
        ]);
    }

    public function getOtherCharges(Request $request)
    {
        $projectId = $request->input('project_id');
        $plotId = $request->input('plot_id');
        $clientId = $request->input('client_id'); // Get client_id from request

        $charges = OtherChargesForClient::with('chargesname', 'projectname', 'firmname', 'clientname')
            ->where('project_id', $projectId)
            ->where('plot_id', $plotId)
            ->where('client_id', $clientId) // Filter by client_id
            ->get();

        $result = $charges->map(function ($charge) {
            return [
                'payment_type' => $charge->chargesname->other_charges,
                'date' => $charge->created_at->format('Y-m-d'),
                'amount' => $charge->amount,
                'plot_no' => $charge->plot_id,
                'project_name' => $charge->projectname->project_name,
                'firm_name' => $charge->firmname->name,
            ];
        });

        return response()->json($result);
    }
    // DocumentController.php
    public function fetchDocuments(Request $request)
    {
        $query = PlotRegistrationDocumentByClient::query();

        if ($request->has('project_id')) {
            $query->where('project_id', $request->input('project_id'));
        }

        if ($request->has('plot_id')) {
            $query->where('plot_id', $request->input('plot_id'));
        }

        // if ($request->has('client_id')) {
        //     $query->where('client_id', $request->input('client_id'));
        // }

        // Eager load the relationships
        $documents = $query->with('projectname', 'firmname', 'clientname')->get();

        return response()->json($documents);
    }



    public function documentstore(Request $request)
    {
        $documents = [];

        if ($request->hasFile('documents')) {
            foreach ($request->file('documents') as $file) {
                // Generate a unique name for the file
                $filename = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();

                // Move the file to the 'documents' directory in the 'public' disk
                $file->move(public_path('documents'), $filename);

                // Store file information in the database
                $document = PlotRegistrationDocumentByClient::create([
                    'document_name' => $filename,
                    'plot_id' => $request->input('plot_id'),
                    'project_id' => $request->input('project_id'),
                    'client_id' => $request->input('client_id'),
                    'firm_id' => $request->input('firm_id'),
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

        $initialEnquiry = InitialEnquiry::where('project_id', $project_id)->where('plot_no', $plot_no)->select('id')->first();

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




}