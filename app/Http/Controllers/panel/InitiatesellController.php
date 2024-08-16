<?php

namespace App\Http\Controllers\panel;

use App\Models\AgentRegistrationMaster;
use App\Models\FirmRegistrationMaster;
use App\Models\PlotTransaction;
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
use App\Models\CommisionSlab;
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

        $agent = AgentRegistrationMaster::whereIn('profile', [get_agent_profile(1), get_agent_profile(2), get_agent_profile(3)])
            ->get();
        $clients = CustomerRegistrationMaster::all();
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
                'clients',
            )
        );
    }


    public function edit($inquiryId)
    {
        $inquiry = InitialEnquiry::with('clientsigle', 'clientsigle.agent', 'clients.clientn', 'nominees')->find($inquiryId);
        //dd($inquiry);
        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id', 'plot_no']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $tokenStatuses = TokenStatus::all();
        $agent = AgentRegistrationMaster::all();

        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();
        $clients = CustomerRegistrationMaster::all();



        return view(
            'panel.initiate_sale_edit',
            compact(
                'clients',
                'inquiry',
                'occupation',
                'branch',
                'firm',

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
    public function deleteNominee($id)
    {
        $nominee = NomineeDetailInitial::find($id);

        if ($nominee) {
            $nominee->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Nominee not found']);
    }
    public function deleteClient($id)
    {
        $client = ClientDetailInitial::where('client_id', $id)->first();

        if ($client) {
            $client->delete();
            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false, 'message' => 'Client not found']);
    }
    public function store(Request $request)
    {

        $existingEnquiry = InitialEnquiry::where('project_id', $request->project_id)
            ->where('firm_id', $request->firm_id)
            ->where('plot_no', $request->plot_no)
            ->first();

        if ($existingEnquiry) {
            return redirect()->back()->with('error', 'This plot is already taken.');
        }

        // Ensure all required fields are present
        $requiredFields = [
            'title',
            'name',
            'occupation_id',
            'email',
            'contact',
            'city',
            'pin_code',
            'address',
            'age',
            'dob',
            'marital_status',
            'branch_id',
            'aadhar_no',
            'pan_no',
        ];

        foreach ($requiredFields as $field) {
            if (!isset($request->$field) || !is_array($request->$field) || count($request->$field) === 0) {
                return redirect()->back()->with('error', 'Please fill all required fields.');
            }
        }



        // Step 1: Store initial enquiry details
        $initialEnquiry = new InitialEnquiry();
        $initialEnquiry->project_id = $request->project_id;
        $initialEnquiry->firm_id = $request->firm_id;

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

        // Step 2: Store nominee details if not empty
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

        // Generate EMI Payments
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

            // Handle file uploads for aadhar and pan images
            $image_name_array = [];
            foreach ($request->aadhar as $key => $image) {
                $extension = explode('/', mime_content_type($image))[1];
                $data = base64_decode(substr($image, strpos($image, ',') + 1));
                $imgname1 = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
                file_put_contents(public_path('customer_reg/') . '/' . $imgname1, $data);
                $image_name_array[] = $imgname1;
            }
            $aadharImages = implode(',', $image_name_array);

            $answerKey = [];
            foreach ($request->pan as $key => $image) {
                $extension = explode('/', mime_content_type($image))[1];
                $data = base64_decode(substr($image, strpos($image, ',') + 1));
                $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
                file_put_contents(public_path('customer_reg/') . '/' . $imgname, $data);
                $answerKey[] = $imgname;
            }
            $panImages = implode(',', $answerKey);

            // Create a new customer registration record
            $reg = new CustomerRegistrationMaster();
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
            $reg->aadhar = $aadharImages;
            $reg->aadhar_no = $request->aadhar_no[$index];
            $reg->pan = $panImages;
            $reg->pan_no = $request->pan_no[$index];
            $reg->save();
            $client = new ClientDetailInitial();
            $client->initial_enquiry_id = $initialEnquiry->id;
            $client->name = $request->name[$index];
            $client->phone = $request->contact[$index];
            $client->address = $request->address[$index];
            $client->client_id = $reg->id;
            $client->save();
            // Handle client details
            if (isset($request->existing_client_id[$index]) && !empty($request->existing_client_id[$index])) {
                $client = new ClientDetailInitial();
                $client->initial_enquiry_id = $initialEnquiry->id;
                $client->name = $request->name_existing[$index];
                $client->phone = $request->contact_existing[$index];
                $client->address = $request->address_existing[$index];
                $client->client_id = $request->existing_client_id[$index];
                $client->save();
            }

            // Check if `existing_client_id` is not set or is empty, then store new client details

        }
        //save agent business and transaction details
        $agent = AgentRegistrationMaster::find($request->agent_id);
        $parentAgent = $agent->parent;

        // Update the agent's total_sales
        $agent->total_sales += $request->total_cost;
        $agent->save();

        // If the agent has a parent, update the parent's total_sales
        if ($parentAgent) {
            $parentAgent->total_sales += $request->total_cost;
            $parentAgent->save();
        }
        //update agent profile after transaction
        $this->updateAgentProfile($agent);
        if ($parentAgent) {
            $this->updateAgentProfile($parentAgent);
        }

        // Calculate the agent's commission
        $commissionSlab = $agent->commissionSlab; // Assuming the Agent model has this relationship
        $agentCommission = $request->total_cost * ($commissionSlab->commission_rate / 100);

        // Calculate the parent agent's commission, if applicable
        $parentCommission = 0;
        if ($parentAgent) {
            $parentCommissionRate = $parentAgent->commissionSlab->commission_rate;
            $parentCommission = $request->total_cost * (($parentCommissionRate - $commissionSlab->commission_rate) / 100);
        }

        // Create a transaction record
        PlotTransaction::create([
            'initial_enquiry_id' => $initialEnquiry->id,
            'agent_id' => $request->agent_id,
            'sale_price' => $request->total_cost,
            'commission_amount' => $agentCommission,
            'parent_commission_amount' => $parentCommission,
            'sale_date' => now(),
        ]);

        return redirect()->route('newsale')->with('success', 'Data saved successfully.');
    }
    protected function updateAgentProfile(AgentRegistrationMaster $agent)
    {
        // Find the appropriate commission slab for the agent's total sales
        $newSlab = CommisionSlab::where('min_sales', '<=', $agent->total_sales)
            ->where('max_sales', '>=', $agent->total_sales)
            ->first();

        // Update the agent's profile if a new slab is found and it's different from the current profile
        if ($newSlab && $agent->profile != $newSlab->profile) {
            $agent->profile = $newSlab->profile;
            $agent->save();
        }
    }


    public function update(Request $request, $id)
    {
        //  dd($request->all());

        // Step 1: Update initial enquiry details
        $initialEnquiry = InitialEnquiry::find($id);
        if (!$initialEnquiry) {
            return redirect()->back()->with('error', 'Enquiry not found.');
        }

        // Update initial enquiry details
        $initialEnquiry->project_id = $request->project_id;
        $initialEnquiry->firm_id = $request->firm_id;

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
        $initialEnquiry->balance_amount = $request->balance_amount;
        $initialEnquiry->tenure = $request->tenure;
        $initialEnquiry->emi_amount = $request->emi_ammount;
        $initialEnquiry->booking_date = Carbon::createFromFormat('d/m/Y', $request->booking_date)->toDateString();
        $initialEnquiry->agreement_date = Carbon::createFromFormat('d/m/Y', $request->aggriment_date)->toDateString();
        $initialEnquiry->status_token = $request->staus_token;
        $initialEnquiry->emi_start_date = Carbon::createFromFormat('d/m/Y', $request->emi_start_date)->toDateString();
        $initialEnquiry->plot_sale_status = $request->plot_sale_status;
        $initialEnquiry->a_rate = $request->a_rate;
        $initialEnquiry->source_type = $request->source_type;
        $initialEnquiry->employee_id = $request->has('employee') ? $request->employee : null;
        $initialEnquiry->agent_id = $request->has('agent_id') ? $request->agent_id : null;
        $initialEnquiry->direct_sourse = $request->has('employee') || $request->has('agent_id') ? null : 'yes';
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

        // Step 2: Update EMI payments if no payment made for the first installment
        $existingEmiPayments = EmiPaymentCollection::where('initial_enquiry_id', $id)
            ->where('inst_no', 1)
            ->whereNotNull('paid_amt')
            ->exists();

        if (!$existingEmiPayments) {
            EmiPaymentCollection::where('initial_enquiry_id', $id)->delete();
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
        }

        // Step 3: Update nominee details if provided
        if (!empty($request->nominee_name)) {
            $nomineesCount = count($request->nominee_name);
            for ($i = 0; $i < $nomineesCount; $i++) {
                if (
                    !empty($request->nominee_name[$i]) &&
                    !empty($request->nominee_age[$i]) &&
                    !empty($request->nominee_relation[$i]) &&
                    !empty($request->nominee_dob[$i]) &&
                    !empty($request->nominee_aadhar[$i]) &&
                    !empty($request->nominee_pan[$i])
                ) {
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

        // Step 4: Update or create new client details
        if (!empty($request->title)) { // Check if the title field is not empty
            foreach ($request->title as $index => $title) {
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

                $aadharImages = $this->handleFileUploads($request->aadhar, 'customer_reg');
                $panImages = $this->handleFileUploads($request->pan, 'customer_reg');

                // Create a new customer registration record
                $reg = new CustomerRegistrationMaster();
                $reg->title = $title;
                $reg->name = $request->name[$index];
                $reg->occupation_id = $request->occupation_id[$index];
                $reg->email = $request->email[$index];
                $reg->contact = $request->contact[$index];
                $reg->city = $request->city[$index];
                $reg->pin_code = $request->pin_code[$index];
                $reg->address = $request->address[$index];
                $reg->age = $request->age[$index];
                $reg->dob = Carbon::createFromFormat('d/m/Y', $request->dob[$index])->toDateString();
                $reg->marital_status = $request->marital_status[$index];
                $reg->marriage_date = $request->marriage_date[$index] ? Carbon::createFromFormat('d/m/Y', $request->marriage_date[$index])->toDateString() : null;
                $reg->branch_id = $request->branch_id[$index];
                $reg->aadhar = $aadharImages;
                $reg->aadhar_no = $request->aadhar_no[$index];
                $reg->pan = $panImages;
                $reg->pan_no = $request->pan_no[$index];
                $reg->save();

                // Save client details
                $client = new ClientDetailInitial();
                $client->initial_enquiry_id = $initialEnquiry->id;
                $client->name = $request->name[$index];
                $client->phone = $request->contact[$index];
                $client->address = $request->address[$index];
                $client->client_id = $reg->id;
                $client->save();
            }
        }

        // Step 5: Handle existing clients if provided
        if (!empty($request->existing_client_id)) { // Check if the existing_client_id field is not empty
            foreach ($request->existing_client_id as $index => $existingClientId) {
                if (!empty($existingClientId)) {
                    $client = new ClientDetailInitial();
                    $client->initial_enquiry_id = $initialEnquiry->id;
                    $client->name = $request->name_existing[$index];
                    $client->phone = $request->contact_existing[$index];
                    $client->address = $request->address_existing[$index];
                    $client->client_id = $existingClientId;
                    $client->save();
                }
            }
        }
        // dd(1);
        // Step 6: Redirect or return response
        return redirect()->route('newsale')->with('success', 'Enquiry updated successfully.');
    }
    // Helper function

    // Helper function to handle file uploads
    private function handleFileUploads($files, $directory)
    {
        $image_name_array = [];
        foreach ($files as $key => $image) {
            $extension = explode('/', mime_content_type($image))[1];
            $data = base64_decode(substr($image, strpos($image, ',') + 1));
            $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
            file_put_contents(public_path($directory) . '/' . $imgname, $data);
            $image_name_array[] = $imgname;
        }
        return implode(',', $image_name_array);
    }



    // public function update(Request $request, $id)
    // {
    //     // dd($request->all());
    //     // Step 1: Update initial enquiry details
    //     $initialEnquiry = InitialEnquiry::find($id);
    //     $initialEnquiry->project_id = $request->project_id;
    //     $initialEnquiry->measurement = $request->Measurement;
    //     $initialEnquiry->square_meter = $request->square_meter;
    //     $initialEnquiry->square_ft = $request->square_ft;
    //     $initialEnquiry->rate = $request->rate;
    //     $initialEnquiry->plot_no = $request->plot_no;
    //     $initialEnquiry->total_cost = $request->total_cost;
    //     $initialEnquiry->discount_amount = $request->discount_amount;
    //     $initialEnquiry->discount_type = $request->discount_type;
    //     $initialEnquiry->final_amount = $request->final_amount;
    //     $initialEnquiry->down_payment = $request->down_payment;
    //     $initialEnquiry->balance_amount = $request->balence_amount;
    //     $initialEnquiry->tenure = $request->tenure;
    //     $initialEnquiry->emi_amount = $request->emi_ammount;
    //     $initialEnquiry->booking_date = Carbon::createFromFormat('d/m/Y', $request->booking_date)->toDateString();
    //     $initialEnquiry->agreement_date = Carbon::createFromFormat('d/m/Y', $request->aggriment_date)->toDateString();
    //     $initialEnquiry->status_token = $request->staus_token;
    //     $initialEnquiry->emi_start_date = Carbon::createFromFormat('d/m/Y', $request->emi_start_date)->toDateString();
    //     $initialEnquiry->plot_sale_status = $request->plot_sale_status;
    //     $initialEnquiry->a_rate = $request->a_rate;
    //     $initialEnquiry->source_type = $request->source_type;
    //     if ($request->has('employee')) {
    //         $initialEnquiry->employee_id = $request->employee;
    //     } elseif ($request->has('agent_id')) {
    //         $initialEnquiry->agent_id = $request->agent_id;
    //     } else {
    //         $initialEnquiry->direct_sourse = 'yes';
    //     }
    //     $initialEnquiry->remark = $request->remark;
    //     $initialEnquiry->mauja = $request->mauja;
    //     $initialEnquiry->kh_no = $request->kh_no;
    //     $initialEnquiry->phn = $request->phn;
    //     $initialEnquiry->taluka = $request->taluka;
    //     $initialEnquiry->district = $request->district;
    //     $initialEnquiry->east = $request->east;
    //     $initialEnquiry->west = $request->west;
    //     $initialEnquiry->north = $request->north;
    //     $initialEnquiry->south = $request->south;
    //     $initialEnquiry->save();

    //     // Step 2: Update client details if not empty
    //     if (!empty($request->name)) {
    //         // ClientDetailInitial::where('initial_enquiry_id', $id)->delete(); // Clear existing records
    //         $clientsCount = count($request->name);
    //         for ($i = 0; $i < $clientsCount; $i++) {
    //             if (!empty($request->name[$i]) && !empty($request->contact[$i]) && !empty($request->address[$i])) {
    //                 // Client details processing if necessary
    //             }
    //         }
    //     }

    //     // Step 3: Update nominee details if not empty
    //     if (!empty($request->nominee_name)) {
    //         // NomineeDetailInitial::where('initial_enquiry_id', $id)->delete(); // Clear existing records
    //         $nomineesCount = count($request->nominee_name);
    //         for ($i = 0; $i < $nomineesCount; $i++) {
    //             if (!empty($request->nominee_name[$i]) && !empty($request->nominee_age[$i]) && !empty($request->nominee_relation[$i]) && !empty($request->nominee_dob[$i]) && !empty($request->nominee_aadhar[$i]) && !empty($request->nominee_pan[$i])) {
    //                 $nominee = new NomineeDetailInitial();
    //                 $nominee->initial_enquiry_id = $initialEnquiry->id;
    //                 $nominee->name = $request->nominee_name[$i];
    //                 $nominee->age = $request->nominee_age[$i];
    //                 $nominee->relation = $request->nominee_relation[$i];
    //                 $nominee->dob = Carbon::createFromFormat('d/m/Y', $request->nominee_dob[$i])->toDateString();
    //                 $nominee->aadhar = $request->nominee_aadhar[$i];
    //                 $nominee->pan = $request->nominee_pan[$i];
    //                 $nominee->save();
    //             }
    //         }
    //     }

    //     // EmiPaymentCollection::where('initial_enquiry_id', $id)->delete(); // Clear existing records
    //     $emiStartDate = Carbon::createFromFormat('d/m/Y', $request->emi_start_date);
    //     for ($i = 0; $i < $request->tenure; $i++) {
    //         $emiPayment = new EmiPaymentCollection();
    //         $emiPayment->initial_enquiry_id = $initialEnquiry->id;
    //         $emiPayment->inst_no = $i + 1;
    //         $emiPayment->inst_amt = $request->emi_ammount;
    //         $emiPayment->status = 'pending';
    //         $emiPayment->edop = $emiStartDate->copy()->addMonths($i)->toDateString();
    //         $emiPayment->save();
    //     }

    //     // CustomerRegistrationMaster::whereIn('id', $initialEnquiry->clients->pluck('client_id'))->delete(); // Clear existing records
    //     foreach ($request->title as $index => $title) {
    //         // Check if any required fields are empty
    //         if (
    //             !isset($title) ||
    //             !isset($request->name[$index]) ||
    //             !isset($request->occupation_id[$index]) ||
    //             !isset($request->email[$index]) ||
    //             !isset($request->contact[$index]) ||
    //             !isset($request->city[$index]) ||
    //             !isset($request->pin_code[$index]) ||
    //             !isset($request->address[$index]) ||
    //             !isset($request->age[$index]) ||
    //             !isset($request->dob[$index]) ||
    //             !isset($request->branch_id[$index]) ||
    //             !isset($request->aadhar_no[$index]) ||
    //             !isset($request->pan_no[$index])
    //         ) {
    //             continue; // Skip this iteration if any required fields are missing
    //         }

    //         $image_name_array = [];
    //         foreach ($request->aadhar as $key => $image) {
    //             $extension = explode('/', mime_content_type($image))[1];
    //             $data = base64_decode(substr($image, strpos($image, ',') + 1));
    //             $imgname1 = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
    //             file_put_contents(public_path('customer_reg/') . '/' . $imgname1, $data);
    //             $image_name_array[] = $imgname1;
    //         }
    //         $aadharImages = implode(',', $image_name_array);

    //         $answerKey = [];
    //         foreach ($request->pan as $key => $image) {
    //             $extension = explode('/', mime_content_type($image))[1];
    //             $data = base64_decode(substr($image, strpos($image, ',') + 1));
    //             $imgname = 'e' . rand(000, 999) . $key . time() . '.' . $extension;
    //             file_put_contents(public_path('customer_reg/') . '/' . $imgname, $data);
    //             $answerKey[] = $imgname;
    //         }
    //         $panImages = implode(',', $answerKey);

    //         // Create a new customer registration record
    //         $reg = new CustomerRegistrationMaster();
    //         $reg->title = $title;
    //         $reg->name = $request->name[$index];
    //         $reg->occupation_id = $request->occupation_id[$index];
    //         $reg->email = $request->email[$index];
    //         $reg->contact = $request->contact[$index];
    //         $reg->city = $request->city[$index];
    //         $reg->pin_code = $request->pin_code[$index];
    //         $reg->address = $request->address[$index];
    //         $reg->age = $request->age[$index];
    //         $reg->dob = $request->dob[$index];
    //         $reg->marital_status = $request->marital_status[$index];
    //         $reg->marriage_date = $request->marriage_date[$index];
    //         $reg->branch_id = $request->branch_id[$index];
    //         $reg->aadhar = $aadharImages;
    //         $reg->aadhar_no = $request->aadhar_no[$index];
    //         $reg->pan = $panImages;
    //         $reg->pan_no = $request->pan_no[$index];

    //         $reg->save();

    //         $client = new ClientDetailInitial();
    //         $client->initial_enquiry_id = $initialEnquiry->id;
    //         $client->name = $request->name[$index];
    //         $client->phone = $request->contact[$index];
    //         $client->address = $request->address[$index];
    //         $client->client_id = $reg->id;

    //         $client->save();
    //     }

    //     //  dd(1);
    //     return redirect()->route('initiatesale')->with('success', 'Data updated successfully.');
    // }


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
