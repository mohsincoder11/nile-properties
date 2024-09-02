<?php

namespace App\Http\Controllers\panel;

use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\Occupation;
use App\Models\TokenStatus;
use App\Models\BranchMaster;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\CommisionSlab;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use App\Models\PlotTransaction;
use Illuminate\Support\Facades\DB;
use App\Models\ClientDetailInitial;
use App\Http\Controllers\Controller;
use App\Models\EmiPaymentCollection;
use App\Models\NomineeDetailInitial;
use App\Models\OtherChargesForClient;
use App\Models\FirmRegistrationMaster;
use App\Models\ProjectEntryAppendData;
use App\Models\AgentRegistrationMaster;
use App\Models\CustomerRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;
use App\Models\PlotRegistrationDocumentByClient;

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
        $profiles = [
            app('agentProfile')(1),
            app('agentProfile')(2),
            app('agentProfile')(3),
        ];

        $agent = AgentRegistrationMaster::whereIn('profile', $profiles)->get();

        // echo json_encode($agent);
        // exit();
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

        $plot = ProjectEntryAppendData::all();

        return view(
            'panel.initiate_sale_edit',
            compact(
                'clients',
                'inquiry',
                'occupation',
                'branch',
                'firm',
                'plot',

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
        //  $plots = ProjectEntryAppendData::where('project_entry_id', $projectId)->get();
        $usedPlotIds = InitialEnquiry::where('project_id', $projectId)
        // ->where('plot_transfer_status','1')
        ->pluck('plot_no');

        // Step 2: Fetch plots from ProjectEntryAppendData that are not in the used plot IDs
        $plots = ProjectEntryAppendData::where('project_entry_id', $projectId)
            ->whereNotIn('id', $usedPlotIds)
            ->get();
// echo json_encode($plots);
// exit();
        return response()->json($plots);
    }

    public function fetchPlotspaymentsection(Request $request)
    {
        $projectId = $request->input('projectId');
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

        // dd($request->all());
        $existingEnquiry = InitialEnquiry::where('project_id', $request->project_id)
            ->where('firm_id', $request->firm_id)
            ->where('plot_no', $request->plot_no)
            ->where('plot_transfer_status', '1')     
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
            'branch_id',
            'aadhar_no',
            'pan_no',
        ];

        // Required fields for existing clients
        $requiredFields1 = [
            'title_existing',
            'name_existing',
            'occupation_id_existing',
            'email_existing',
            'contact_existing',
            'city_existing',
            'pin_code_existing',
            'address_existing',
            'age_existing',
            'dob_existing',
            'branch_id_existing',
            'aadhar_no_existing',
            'pan_no_existing',
        ];



        // If neither new nor existing fields are filled, return an error
        if (!$requiredFields && !$requiredFields1) {
            return redirect()->back()->with('error', 'Please fill all required fields.');
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

        $plotRegistrationDocument = new PlotRegistrationDocumentByClient([
            'document_name' => null,
            'plot_id' => null,
            'firm_id' => null,
            'project_id' => null,
            'client_id' => null,
            'status' => null,
            'initial_enquiry_id' => $initialEnquiry->id,
        ]);

        $plotRegistrationDocument->save();

        // Storing data in OtherChargesForClient model
        $otherCharges = new OtherChargesForClient([
            'amount' => null,
            'charges_id' => null,
            'client_id' => null,
            'plot_id' => null,
            'firm_id' => null,
            'project_id' => null,
            'status' => 'pending',
            'initial_enquiry_id' => $initialEnquiry->id,
        ]);

        $otherCharges->save();

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

        if ($request->title) {

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


                // Check if `existing_client_id` is not set or is empty, then store new client details

            }
        }

        // if (isset($request->existing_client_id[$index]) && !empty($request->existing_client_id[$index])) {
        //     $client = new ClientDetailInitial();
        //     $client->initial_enquiry_id = $initialEnquiry->id;
        //     $client->name = $request->name_existing[$index];
        //     $client->phone = $request->contact_existing[$index];
        //     $client->address = $request->address_existing[$index];
        //     $client->client_id = $request->existing_client_id[$index];
        //     $client->save();
        // }
        if ($request->has('existing_client_id')) {
            foreach ($request->existing_client_id as $index => $existingClientId) {
                if (!empty($existingClientId)) {
                    $existingClient = new ClientDetailInitial();
                    $existingClient->initial_enquiry_id = $initialEnquiry->id;
                    $existingClient->name = $request->name_existing[$index];
                    $existingClient->phone = $request->contact_existing[$index];
                    $existingClient->address = $request->address_existing[$index];
                    $existingClient->client_id = $existingClientId;
                    $existingClient->save();
                }
            }
        }

        // if(isset($request->agent_id))
        // {
        // $agent = AgentRegistrationMaster::find($request->agent_id);
        // $parentAgent = $agent->parent_id;

        // // Update the agent's total_sales
        // $agent->total_sales += $request->total_cost;
        // // echo json_encode($agent);
        // // exit();
        // $agent->save();

        // // If the agent has a parent, update the parent's total_sales
        // if ($parentAgent) {
        //     $parentAgent->total_sales += $request->total_cost;
        //     $parentAgent->save();
        // }

        $agent = AgentRegistrationMaster::find($request->agent_id);

if ($agent) {
    // Update the agent's total_sales
    $agent->total_sales += $request->total_cost;
    $agent->save();

    // Fetch the parent agent object using parent_id
    $parentAgent = AgentRegistrationMaster::find($agent->parent_id);
    // dump($parentAgent);

    // If the parent agent exists, update its total_sales
    if ($parentAgent) {
        $parentAgent->total_sales += $request->total_cost;
        $parentAgent->save();
    }
}

        //update agent profile after transaction
        $this->updateAgentProfile($agent);
        if ($parentAgent) {
            $this->updateAgentProfile($parentAgent);
        }

        $commissionSlab = $agent->commissionSlab; // Assuming the Agent model has this relationship
        $agentCommission = $request->total_cost * ($commissionSlab->commission_rate / 100);

        // Calculate the parent agent's commission, if applicable
        $parentCommission = 0;
        if ($parentAgent) {
            $parentCommissionRate = $parentAgent->commissionSlab->commission_rate;
            $parentCommission = $request->total_cost * (($parentCommissionRate - $commissionSlab->commission_rate) / 100);
        }

        PlotTransaction::create([
            'initial_enquiry_id' => $initialEnquiry->id,
            'agent_id' => $request->agent_id,
            'sale_price' => $request->total_cost,
            'commission_amount' => $agentCommission,
            'parent_commission_amount' => $parentCommission,
            'sale_date' => now(),
        ]);

    // }
        //dd(1);
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
        // Step 1: Validation (Add necessary validation rules)
        $request->validate([
            'plot_no' => 'required',
            'firm_id' => 'required',
            'project_id' => 'required',
            // Add other necessary validations
        ]);

        // Step 2: Update initial enquiry details
        $initialEnquiry = InitialEnquiry::find($id);
        if (!$initialEnquiry) {
            return redirect()->back()->with('error', 'Enquiry not found.');
        }

        // Update plot registration documents
        $plotRegistrationDocuments = PlotRegistrationDocumentByClient::where('initial_enquiry_id', $id)->get();
        foreach ($plotRegistrationDocuments as $plotRegistrationDocument) {
            $plotRegistrationDocument->update([
                'plot_id' => $request->plot_no,
                'firm_id' => $request->firm_id,
                'project_id' => $request->project_id
            ]);
        }

        // Update other charges
        $otherChargesList = OtherChargesForClient::where('initial_enquiry_id', $id)->get();
        foreach ($otherChargesList as $otherCharges) {
            $otherCharges->update([
                'plot_id' => $request->plot_no,
                'firm_id' => $request->firm_id,
                'project_id' => $request->project_id
            ]);
        }

        // Update the initial enquiry
        $initialEnquiry->update([
            'project_id' => $request->project_id,
            'firm_id' => $request->firm_id,
            'measurement' => $request->Measurement,
            'square_meter' => $request->square_meter,
            'square_ft' => $request->square_ft,
            'rate' => $request->rate,
            'plot_no' => $request->plot_no,
            'total_cost' => $request->total_cost,
            'discount_amount' => $request->discount_amount,
            'discount_type' => $request->discount_type,
            'final_amount' => $request->final_amount,
            'down_payment' => $request->down_payment,
            'balance_amount' => $request->balance_amount,
            'tenure' => $request->tenure,
            'emi_amount' => $request->emi_ammount,
            'booking_date' =>  $request->booking_date,
            'agreement_date' =>  $request->aggriment_date,
            'status_token' => $request->status_token,
            'emi_start_date' =>  $request->emi_start_date,
            'plot_sale_status' => $request->plot_sale_status,
            'a_rate' => $request->a_rate,
            'source_type' => $request->source_type,
            'employee_id' => $request->has('employee') ? $request->employee : null,
            'agent_id' => $request->has('agent_id') ? $request->agent_id : null,
            'direct_source' => $request->has('employee') || $request->has('agent_id') ? null : 'yes',
            'remark' => $request->remark,
            'mauja' => $request->mauja,
            'kh_no' => $request->kh_no,
            'phn' => $request->phn,
            'taluka' => $request->taluka,
            'district' => $request->district,
            'east' => $request->east,
            'west' => $request->west,
            'north' => $request->north,
            'south' => $request->south,
        ]);

        // Step 3: Update EMI payments if no payment made for the first installment
        $existingEmiPayments = EmiPaymentCollection::where('initial_enquiry_id', $id)
            ->where('inst_no', 1)
            ->whereNotNull('paid_amt')
            ->exists();

        if (!$existingEmiPayments) {
            EmiPaymentCollection::where('initial_enquiry_id', $id)->delete();
            $emiStartDate = Carbon::createFromFormat('d/m/Y', $request->emi_start_date);
            for ($i = 0; $i < $request->tenure; $i++) {
                EmiPaymentCollection::create([
                    'initial_enquiry_id' => $initialEnquiry->id,
                    'inst_no' => $i + 1,
                    'inst_amt' => $request->emi_amount,
                    'status' => 'pending',
                    'edop' => $emiStartDate->copy()->addMonths($i)->toDateString(),
                ]);
            }
        }

        // Step 4: Update nominee details
        if (!empty($request->nominee_name)) {
            foreach ($request->nominee_name as $i => $name) {
                if (!empty($name) && !empty($request->nominee_age[$i]) && !empty($request->nominee_relation[$i]) && !empty($request->nominee_dob[$i]) && !empty($request->nominee_aadhar[$i]) && !empty($request->nominee_pan[$i])) {
                    NomineeDetailInitial::create([
                        'initial_enquiry_id' => $initialEnquiry->id,
                        'name' => $name,
                        'age' => $request->nominee_age[$i],
                        'relation' => $request->nominee_relation[$i],
                        'dob' => Carbon::createFromFormat('d/m/Y', $request->nominee_dob[$i])->toDateString(),
                        'aadhar' => $request->nominee_aadhar[$i],
                        'pan' => $request->nominee_pan[$i],
                    ]);
                }
            }
        }

        // Step 5: Update or create new client details
        if (!empty($request->title)) {
            foreach ($request->title as $index => $title) {
                if (!isset($title) || !isset($request->name[$index]) || !isset($request->occupation_id[$index]) || !isset($request->email[$index]) || !isset($request->contact[$index]) || !isset($request->city[$index]) || !isset($request->pin_code[$index]) || !isset($request->address[$index]) || !isset($request->age[$index]) || !isset($request->dob[$index]) || !isset($request->branch_id[$index]) || !isset($request->aadhar_no[$index]) || !isset($request->pan_no[$index])) {
                    continue;
                }

                $aadharImages = $this->handleFileUploads($request->aadhar, 'customer_reg');
                $panImages = $this->handleFileUploads($request->pan, 'customer_reg');

                // Create a new customer registration record
                $reg = CustomerRegistrationMaster::create([
                    'title' => $title,
                    'name' => $request->name[$index],
                    'occupation_id' => $request->occupation_id[$index],
                    'email' => $request->email[$index],
                    'contact' => $request->contact[$index],
                    'city' => $request->city[$index],
                    'pin_code' => $request->pin_code[$index],
                    'address' => $request->address[$index],
                    'age' => $request->age[$index],
                    'dob' => $request->dob[$index] ?  $request->dob[$index] : null,
                    'marital_status' => $request->marital_status[$index],
                    'marriage_date' => $request->marriage_date[$index] ?  $request->marriage_date[$index] : null,
                    'branch_id' => $request->branch_id[$index],
                    'aadhar' => $aadharImages,
                    'aadhar_no' => $request->aadhar_no[$index],
                    'pan' => $panImages,
                    'pan_no' => $request->pan_no[$index],
                ]);

                ClientDetailInitial::create([
                    'initial_enquiry_id' => $initialEnquiry->id,
                    'name' => $request->name[$index],
                    'phone' => $request->contact[$index],
                    'address' => $request->address[$index],
                    'client_id' => $reg->id,
                ]);
            }
        }

        // Step 6: Handle existing clients
        if (!empty($request->existing_client_id)) {
            foreach ($request->existing_client_id as $index => $existingClientId) {
                if (!empty($existingClientId)) {
                    ClientDetailInitial::create([
                        'initial_enquiry_id' => $initialEnquiry->id,
                        'name' => $request->name_existing[$index],
                        'phone' => $request->contact_existing[$index],
                        'address' => $request->address_existing[$index],
                        'client_id' => $existingClientId,
                    ]);
                }
            }
        }

        // Step 7: Redirect with success message
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
            OtherChargesForClient::where('initial_enquiry_id', $id)->delete();
            PlotRegistrationDocumentByClient::where('initial_enquiry_id', $id)->delete();

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
        // echo json_encode($inquery);
        // exit();
        return view('panel.new_sale', compact('nominee', 'client', 'inquery'));
    }

    public function showDetails(Request $request)
    {
        // echo json_encode($request->input('id'));
        $inquiryId = $request->input('id');
        $inquiry = InitialEnquiry::with('clientsigle.agent', 'plotname', 'clients', 'nominees', 'statustoken','plottrasferhistory')->where('id', $inquiryId)->first();
// echo json_encode($inquiry);
// exit();
        if (!$inquiry) {
            return response()->json(['error' => 'Inquiry not found'], 404);
        }

        $inquiryHtml = view('panel.new_sale_model_client_info', compact('inquiry'))->render();
        return response()->json(['html' => $inquiryHtml]);
    }

    public function registrationcompleteapprove(Request $request)
    {
        // dd($request->all());
        // Validate the incoming request
        $request->validate([
            'enquiry_id' => 'required|'
        ]);

        // Find the InitialEnquiry record that matches the enquiry_id
        $initialEnquiry = InitialEnquiry::find($request->enquiry_id);

        if ($initialEnquiry) {
            // Update the fields
            $initialEnquiry->plot_stage_status = 'REQUEST_FOR_REGISTRATION';
            $initialEnquiry->is_request_registration_completed = 1;

            // Save the changes
            $initialEnquiry->save();

            // Return a success response
            return redirect()->back()->with('success', 'Registration completed and approved.');
        }

        // Return a failure response if the record is not found
        return redirect()->back()->with('error', 'Data not found.');
    }

    public function registrationcompleteapprove_legalclrarance_with_date(Request $request)
    {
        // Validate the request
        $request->validate([
            'enquiry_id' => 'required|integer',
            'date' => 'required|date_format:m/d/Y'
        ]);

        // Find the InitialEnquiry record that matches the enquiry_id
        $initialEnquiry = InitialEnquiry::find($request->enquiry_id);

        if ($initialEnquiry) {
            // Convert the date format from MM/DD/YYYY to YYYY-MM-DD
            $date = \DateTime::createFromFormat('m/d/Y', $request->date);
            $formattedDate = $date ? $date->format('Y-m-d') : null;

            // Update the fields
            $initialEnquiry->plot_stage_status = 'LEGAL_CLEARANCE';
            $initialEnquiry->is_legal_clearance = 1;
            $initialEnquiry->legal_clearance_date = $formattedDate;

            // Save the changes
            $initialEnquiry->save();

            // Return a success response
            return redirect()->back()->with('success', 'Legal clearance completed and approved.');
        }

        // Return a failure response if the record is not found
        return redirect()->back()->with('error', 'Data not found.');
    }

    public function registrationcomplete_with_date_file(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $request->validate([
            'enquiry_id' => 'required|',
            'date' => 'required|',
            'registration_receipt' => 'required|', // Optional: Specify file types and size limit
        ]);

        // Find the InitialEnquiry record that matches the enquiry_id
        $initialEnquiry = InitialEnquiry::find($request->enquiry_id);

        if ($initialEnquiry) {
            // Convert the date format from MM/DD/YYYY to YYYY-MM-DD
            $date = \DateTime::createFromFormat('m/d/Y', $request->date);
            $formattedDate = $date ? $date->format('Y-m-d') : null;

            // Handle file upload if present
            if ($request->hasFile('registration_receipt')) {
                $file = $request->file('registration_receipt');
                $fileName = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('registration_receipts/'), $fileName);

                // Store the file name or path in the database
                $initialEnquiry->registration_receipt = $fileName;
            }

            // Update the fields
            $initialEnquiry->plot_stage_status = 'REGISTRATION_COMPLETED';
            $initialEnquiry->is_registration_completed = 1;
            $initialEnquiry->registration_complete_date = $formattedDate;

            // Save the changes
            $initialEnquiry->save();

            // Return a success response
            return redirect()->back()->with('success', 'Registration completed .');
        }

        // Return a failure response if the record is not found
        return redirect()->back()->with('error', 'Data not found.');
    }

    public function saleded_with_date_file(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $request->validate([
            'enquiry_id' => 'required|',
            'date' => 'required|',
            'registration_receipt' => 'required|', // Optional: Specify file types and size limit
        ]);

        // Find the InitialEnquiry record that matches the enquiry_id
        $initialEnquiry = InitialEnquiry::find($request->enquiry_id);

        if ($initialEnquiry) {
            // Convert the date format from MM/DD/YYYY to YYYY-MM-DD
            $date = \DateTime::createFromFormat('m/d/Y', $request->date);
            $formattedDate = $date ? $date->format('Y-m-d') : null;

            // Handle file upload if present
            if ($request->hasFile('registration_receipt')) {
                $file = $request->file('registration_receipt');
                $fileName = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('saleded_receipt/'), $fileName);

                // Store the file name or path in the database
                $initialEnquiry->saleded_receipt = $fileName;
            }

            // Update the fields
            $initialEnquiry->plot_stage_status = 'SALEDEED_SCAN';
            $initialEnquiry->is_saleded_completed = 1;
            $initialEnquiry->saleded_completed_date = $formattedDate;

            // Save the changes
            $initialEnquiry->save();

            // Return a success response
            return redirect()->back()->with('success', 'Saleded Scan completed .');
        }

        // Return a failure response if the record is not found
        return redirect()->back()->with('error', 'Data not found.');
    }
    public function handover_with_date_file(Request $request)
    {
        // dd($request->all());
        // Validate the request
        $request->validate([
            'enquiry_id' => 'required|',
            'date' => 'required|',
            'registration_receipt' => 'required|', // Optional: Specify file types and size limit
        ]);

        // Find the InitialEnquiry record that matches the enquiry_id
        $initialEnquiry = InitialEnquiry::find($request->enquiry_id);

        if ($initialEnquiry) {
            // Convert the date format from MM/DD/YYYY to YYYY-MM-DD
            $date = \DateTime::createFromFormat('m/d/Y', $request->date);
            $formattedDate = $date ? $date->format('Y-m-d') : null;

            // Handle file upload if present
            if ($request->hasFile('registration_receipt')) {
                $file = $request->file('registration_receipt');
                $fileName = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('handover_receipt/'), $fileName);

                // Store the file name or path in the database
                $initialEnquiry->handover_receipt = $fileName;
            }

            // Update the fields
            $initialEnquiry->plot_stage_status = 'HANDOVER_COMPLETE';
            $initialEnquiry->is_handover_completed = 1;
            $initialEnquiry->handover_completed_date = $formattedDate;

            // Save the changes
            $initialEnquiry->save();

            // Return a success response
            return redirect()->back()->with('success', 'Handover completed .');
        }

        // Return a failure response if the record is not found
        return redirect()->back()->with('error', 'Data not found.');
    }
}
