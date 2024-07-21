<?php

namespace App\Http\Controllers\panel;

use App\Models\AgentRegistrationMaster;
use App\Models\FirmRegistrationMaster;
use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\Occupation;
use App\Models\TokenStatus;
use App\Models\BranchMaster;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use Illuminate\Support\Facades\DB;
use App\Models\ClientDetailInitial;
use App\Http\Controllers\Controller;
use App\Models\EmiPaymentCollection;
use App\Models\NomineeDetailInitial;
use App\Models\ProjectEntryAppendData;
use App\Models\CustomerRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;

class InitiatesellController extends Controller
{
    public function initiatesale()
    {
        $tokenStatuses = TokenStatus::all();

        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $agent = AgentRegistrationMaster::all();

        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();

        return view(
            'panel.initiate_sale',
            compact(
                'tokenStatuses',
                'enquiries',
                'projects',
                'firm',
                'statuses',
                'employees',
                'occupation',
                'branch',
                'agent',
            )
        );
    }


    public function edit($inquiryId)
    {
        $inquiry = InitialEnquiry::with('clientsigle', 'clientsigle.agent', 'clients', 'nominees')->find($inquiryId);
        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id', 'plot_no']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $tokenStatuses = TokenStatus::all();
        $agent = AgentRegistrationMaster::all();

        return view(
            'panel.initiate_sale_edit',
            compact(
                'inquiry',
                'enquiries',
                'projects',
                'statuses',
                'employees',
                'tokenStatuses',
                'agent',
            )
        );
    }


    public function fetchPlots(Request $request)
    {
        $projectId = $request->input('projectId');
        // dd($projectId); // Uncomment for debugging
        $plots = ProjectEntryAppendData::where('project_entry_id', $projectId)->get();
        return response()->json($plots);
    }




    public function store(Request $request)
    {


        // dd($request->all());
        // Step 1: Store initial enquiry details
        $initialEnquiry = new InitialEnquiry();
        $initialEnquiry->project_id = $request->project_id;
        $initialEnquiry->measurement = $request->Measurement;
        $initialEnquiry->square_meter = $request->square_meter;
        $initialEnquiry->square_ft = $request->square_ft;
        $initialEnquiry->rate = $request->rate;
        $initialEnquiry->plot_no = $request->plot_no;
        $initialEnquiry->total_cost = $request->total_cost;
        $initialEnquiry->discount_amount = $request->discount_amount;
        $initialEnquiry->discount_type = $request->discount_type;
        $initialEnquiry->final_amount = $request->final_amount;
        $initialEnquiry->down_payment = $request->down_payment;
        $initialEnquiry->balance_amount = $request->balence_amount;
        $initialEnquiry->tenure = $request->tenure;
        $initialEnquiry->emi_amount = $request->emi_ammount;
        $initialEnquiry->booking_date = Carbon::createFromFormat('d/m/Y', $request->booking_date)->toDateString();
        $initialEnquiry->agreement_date = Carbon::createFromFormat('d/m/Y', $request->aggriment_date)->toDateString();
        $initialEnquiry->status_token = $request->staus_token;
        $initialEnquiry->emi_start_date = Carbon::createFromFormat('d/m/Y', $request->emi_start_date)->toDateString();
        $initialEnquiry->plot_sale_status = $request->plot_sale_status;
        $initialEnquiry->a_rate = $request->a_rate;
        $initialEnquiry->source_type = $request->source_type;
        if ($request->has('employee')) {
            $initialEnquiry->employee_id = $request->employee;
        } elseif ($request->has('agent_id')) {
            $initialEnquiry->agent_id = $request->agent_id;
        } else {
            $initialEnquiry->direct_sourse = 'yes';
        }

        $initialEnquiry->remark = $request->remark;
        $initialEnquiry->mauja = $request->mauja;
        $initialEnquiry->kh_no = $request->kh_no;
        $initialEnquiry->phn = $request->phn;
        $initialEnquiry->taluka = $request->taluka;
        $initialEnquiry->district = $request->district;
        $initialEnquiry->east = $request->east;
        $initialEnquiry->west = $request->west;
        $initialEnquiry->north = $request->north;
        $initialEnquiry->south = $request->south;
        $initialEnquiry->save();

        // Step 2: Store client details if not empty
        if (!empty($request->name)) {
            $clientsCount = count($request->name);
            for ($i = 0; $i < $clientsCount; $i++) {
                if (!empty($request->name[$i]) && !empty($request->contact[$i]) && !empty($request->address[$i])) {

                }
            }
        }

        // Step 3: Store nominee details if not empty
        if (!empty($request->nominee_name)) {
            $nomineesCount = count($request->nominee_name);
            for ($i = 0; $i < $nomineesCount; $i++) {
                if (!empty($request->nominee_name[$i]) && !empty($request->nominee_age[$i]) && !empty($request->nominee_relation[$i]) && !empty($request->nominee_dob[$i]) && !empty($request->nominee_aadhar[$i]) && !empty($request->nominee_pan[$i])) {
                    $nominee = new NomineeDetailInitial();
                    $nominee->initial_enquiry_id = $initialEnquiry->id;
                    $nominee->name = $request->nominee_name[$i];
                    $nominee->age = $request->nominee_age[$i];
                    $nominee->relation = $request->nominee_relation[$i];
                    $nominee->dob = Carbon::createFromFormat('d/m/Y', $request->nominee_dob[$i])->toDateString();
                    $nominee->aadhar = $request->nominee_aadhar[$i];
                    $nominee->pan = $request->nominee_pan[$i];
                    $nominee->save();
                }
            }
        }


        $emiStartDate = Carbon::createFromFormat('d/m/Y', $request->emi_start_date);
        for ($i = 0; $i < $request->tenure; $i++) {
            $emiPayment = new EmiPaymentCollection();
            $emiPayment->initial_enquiry_id = $initialEnquiry->id;
            $emiPayment->inst_no = $i + 1;
            $emiPayment->inst_amt = $request->emi_ammount;
            $emiPayment->status = 'pending';
            $emiPayment->edop = $emiStartDate->copy()->addMonths($i)->toDateString();
            $emiPayment->save();
        }


        foreach ($request->title as $index => $title) {
            // Check if any required fields are empty
            if (
                !isset($title) ||
                !isset($request->name[$index]) ||
                !isset($request->occupation_id[$index]) ||
                !isset($request->email[$index]) ||
                !isset($request->contact[$index]) ||
                !isset($request->city[$index]) ||
                !isset($request->pin_code[$index]) ||
                !isset($request->address[$index]) ||
                !isset($request->age[$index]) ||
                !isset($request->dob[$index]) ||
                !isset($request->branch_id[$index]) ||
                !isset($request->aadhar_no[$index]) ||
                !isset($request->pan_no[$index])
            ) {
                continue; // Skip this iteration if any required fields are missing
            }

            $aadhar = null;
            if ($request->hasFile("aadhar.$index")) {
                $file = $request->file("aadhar.$index");
                $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('customer_reg/'), $aadhar);
            }

            $pan = null;
            if ($request->hasFile("pan.$index")) {
                $file = $request->file("pan.$index");
                $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('customer_reg/'), $pan);
            }

            // Create a new customer registration record
            $reg = new CustomerRegistrationMaster;
            $reg->title = $title;
            $reg->name = $request->name[$index];
            $reg->occupation_id = $request->occupation_id[$index];
            $reg->email = $request->email[$index];
            $reg->contact = $request->contact[$index];
            $reg->city = $request->city[$index];
            $reg->pin_code = $request->pin_code[$index];
            $reg->address = $request->address[$index];
            $reg->age = $request->age[$index];
            $reg->dob = $request->dob[$index];
            $reg->marital_status = $request->marital_status[$index];
            $reg->marriage_date = $request->marriage_date[$index];
            $reg->branch_id = $request->branch_id[$index];
            $reg->aadhar = $aadhar;
            $reg->aadhar_no = $request->aadhar_no[$index];
            $reg->pan = $pan;
            $reg->pan_no = $request->pan_no[$index];

            $reg->save();
            $client = new ClientDetailInitial();
            $client->initial_enquiry_id = $initialEnquiry->id;
            $client->name = $request->name[$index];
            $client->phone = $request->contact[$index];
            $client->address = $request->address[$index];

            $client->save();
        }

        return redirect()->back()->with('success', 'Data saved successfully.');
    }



    public function delete($id)
    {
        // Find the initial enquiry by its ID
        $initialEnquiry = InitialEnquiry::find($id);

        if ($initialEnquiry) {
            // Delete associated client details
            ClientDetailInitial::where('initial_enquiry_id', $id)->delete();

            // Delete associated nominee details
            NomineeDetailInitial::where('initial_enquiry_id', $id)->delete();
            EmiPaymentCollection::where('initial_enquiry_id', $id)->delete();
            // Delete the initial enquiry itself
            $initialEnquiry->delete();

            return redirect()->back()->with('success', 'Data deleted successfully.');
        } else {
            return redirect()->back()->with('error', 'Data not found.');
        }
    }

    public function newsale()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.new_sale', compact('nominee', 'client', 'inquery'));
    }

    public function showDetails(Request $request)
    {
        $inquiryId = $request->input('id');
        $inquiry = InitialEnquiry::with('clientsigle.agent', 'clients', 'nominees', 'statustoken')->where('id', $inquiryId)->first();

        if (!$inquiry) {
            return response()->json(['error' => 'Inquiry not found'], 404);
        }

        $inquiryHtml = view('panel.new_sale_model_client_info', compact('inquiry'))->render();
        return response()->json(['html' => $inquiryHtml]);
    }




}