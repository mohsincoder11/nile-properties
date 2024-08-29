<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentRegistrationMaster;
use App\Models\FirmRegistrationMaster;
use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\Occupation;
use App\Models\TokenStatus;
use App\Models\BranchMaster;
use App\Models\ProjectEntry;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use Illuminate\Support\Facades\DB;
use App\Models\ClientDetailInitial;
use App\Models\EmiPaymentCollection;
use App\Models\NomineeDetailInitial;
use App\Models\ProjectEntryAppendData;
use App\Models\CustomerRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;
use App\Models\PlotTransferHistory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class PlotTransferController extends Controller
{
    public function plottransfer($id,$type)
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
        $inquiry = InitialEnquiry::with('clientsigle', 'clientsigle.agent', 'clients.clientn', 'nominees')
        ->find($id);
        $view='panel.plot-transfer.transfer-user-1';
        if($type == '2') {
        $view='panel.plot-transfer.transfer-plot-2';
        }
        return view($view,
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
                'inquiry'
            )
        );
    }


    public function plot_transfer_store(Request $request, $inquiry_id)
    {
        // dd($request->all());
        DB::beginTransaction();
    
        try {
            // Step 1: Store initial enquiry details
            $initialEnquiry = InitialEnquiry::create([
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
                'balance_amount' => $request->balence_amount,
                'tenure' => $request->tenure,
                'emi_amount' => $request->emi_ammount,
                'booking_date' => Carbon::createFromFormat('d/m/Y', $request->booking_date)->toDateString(),
                'agreement_date' => Carbon::createFromFormat('d/m/Y', $request->aggriment_date)->toDateString(),
                'status_token' => $request->staus_token,
                'emi_start_date' => Carbon::createFromFormat('d/m/Y', $request->emi_start_date)->toDateString(),
                'plot_sale_status' => $request->plot_sale_status,
                'a_rate' => $request->a_rate,
                'source_type' => $request->source_type,
                'employee_id' => $request->employee ?? null,
                'agent_id' => $request->agent_id ?? null,
                'direct_source' => $request->direct_sourse ?? 'no',
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
    
            $update_plot_transfer_status = InitialEnquiry::where('id',$inquiry_id)->first();

            if ($update_plot_transfer_status) {
                $update_plot_transfer_status->plot_transfer_status = '1'; // Use = for assignment
                // echo json_encode($update_plot_transfer_status);
                // exit();
                $update_plot_transfer_status->save(); // Save the changes to the database
            }

            // Step 3: Store client details for the new plot
            $newOwnerIds = [];
            foreach ($request->title as $index => $title) {
                // Validate required fields
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

    if(!isset($request->existing_customer_id[$index])){
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
    
                // Create customer registration
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
                    'dob' => $request->dob[$index],
                    'marital_status' => $request->marital_status[$index] ?? null,
                    'marriage_date' => $request->marriage_date[$index] ?? null,
                    'branch_id' => $request->branch_id[$index],
                    'aadhar' => $aadharImages,
                    'aadhar_no' => $request->aadhar_no[$index],
                    'pan' => $panImages,
                    'pan_no' => $request->pan_no[$index],
                ]);
                $client_id = $reg->id;

            } else {
                // Use existing customer ID
                $client_id = $request->existing_customer_id[$index];
            }
    
                // Associate customer with new initial enquiry
                ClientDetailInitial::create([
                    'initial_enquiry_id' => $initialEnquiry->id,
                    'name' => $request->name[$index],
                    'phone' => $request->contact[$index],
                    'address' => $request->address[$index],
                    'client_id' => $client_id,
                ]);
    
                $newOwnerIds[] = $client_id;
           


            }
    
             // Update previous owners
          $previousOwners = ClientDetailInitial::where([
            ['initial_enquiry_id', '=', $inquiry_id],
            ['is_transfer', '=', '0']
        ])->pluck('client_id')->toArray();

        if (!empty($previousOwners)) {
            ClientDetailInitial::where([
                ['initial_enquiry_id', '=', $inquiry_id],
                ['is_transfer', '=', '0']
            ])->whereIn('client_id', $previousOwners)->update(['is_transfer' => '1']);
        }

        foreach ($previousOwners as $previousOwner) {
            foreach ($newOwnerIds as $newOwnerId) {
                PlotTransferHistory::create([
                    'initial_enquiry_id' => $initialEnquiry->id,
                    'previous_enquiry_id' => $inquiry_id,
                    'previous_owner_id' => $previousOwner,
                    'new_owner_id' => $newOwnerId,
                    'transfer_date' => now(),
                    'transfer_type' => 'user', // or 'user_transfer'
                ]);
            }
        }
    
            DB::commit();
    
            return redirect()->route('newsale')->with('success', 'Plot transferred successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Plot transfer failed: ' . $e->getMessage());
            return redirect()->route('newsale')->with('error', 'Plot transfer failed: ' . $e->getMessage());
        }
    }
    

    public function user_transfer_plot_store(Request $request, $inquiry_id)
    {
        // dd($request->all());
        DB::beginTransaction();
        try {
            // Step 1: Mark the old record as transferred
            InitialEnquiry::where('id', $inquiry_id)->where('is_transfer_plot', '0')->update(['is_transfer_plot' => 1]);
    
            // Step 2: Create a new InitialEnquiry record with new plot details
            $newInitialEnquiry = InitialEnquiry::create([
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
                'balance_amount' => $request->balence_amount,
                'tenure' => $request->tenure,
                'emi_amount' => $request->emi_ammount,
                'booking_date' => Carbon::createFromFormat('d/m/Y', $request->booking_date)->toDateString(),
                'agreement_date' => Carbon::createFromFormat('d/m/Y', $request->aggriment_date)->toDateString(),
                'status_token' => $request->staus_token,
                'emi_start_date' => Carbon::createFromFormat('d/m/Y', $request->emi_start_date)->toDateString(),
                'plot_sale_status' => $request->plot_sale_status,
                'a_rate' => $request->a_rate,
                'source_type' => $request->source_type,
                'employee_id' => $request->employee ?? null,
                'agent_id' => $request->agent_id ?? null,
                'direct_source' => $request->direct_sourse ?? 'no',
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
    
            $update_plot_transfer_status = InitialEnquiry::where('id',$inquiry_id)->first();

            if ($update_plot_transfer_status) {
                $update_plot_transfer_status->plot_transfer_status = '1'; // Use = for assignment
                // echo json_encode($update_plot_transfer_status);
                // exit();
                $update_plot_transfer_status->save(); // Save the changes to the database
            }

            // Step 3: Store client details for the new plot
            $newOwnerIds = [];
            foreach ($request->title as $index => $title) {
                // Validate required fields
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

    if(!isset($request->existing_customer_id[$index])){
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
    
                // Create customer registration
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
                    'dob' => $request->dob[$index],
                    'marital_status' => $request->marital_status[$index] ?? null,
                    'marriage_date' => $request->marriage_date[$index] ?? null,
                    'branch_id' => $request->branch_id[$index],
                    'aadhar' => $aadharImages,
                    'aadhar_no' => $request->aadhar_no[$index],
                    'pan' => $panImages,
                    'pan_no' => $request->pan_no[$index],
                ]);
                $client_id = $reg->id;

            } else {
                // Use existing customer ID
                $client_id = $request->existing_customer_id[$index];
            }
    
                // Associate customer with new initial enquiry
                ClientDetailInitial::create([
                    'initial_enquiry_id' => $newInitialEnquiry->id,
                    'name' => $request->name[$index],
                    'phone' => $request->contact[$index],
                    'address' => $request->address[$index],
                    'client_id' => $client_id,
                ]);
    
                $newOwnerIds[] = $client_id;
           


            }
    
             // Update previous owners
          $previousOwners = ClientDetailInitial::where([
            ['initial_enquiry_id', '=', $inquiry_id],
            ['is_transfer', '=', '0']
        ])->pluck('client_id')->toArray();

        if (!empty($previousOwners)) {
            ClientDetailInitial::where([
                ['initial_enquiry_id', '=', $inquiry_id],
                ['is_transfer', '=', '0']
            ])->whereIn('client_id', $previousOwners)->update(['is_transfer' => '1']);
        }

        foreach ($previousOwners as $previousOwner) {
            foreach ($newOwnerIds as $newOwnerId) {
                PlotTransferHistory::create([
                    'initial_enquiry_id' => $newInitialEnquiry->id,
                    'previous_enquiry_id' => $inquiry_id,
                    'previous_owner_id' => $previousOwner,
                    'new_owner_id' => $newOwnerId,
                    'transfer_date' => now(),
                    'transfer_type' => 'plot', // or 'user_transfer'
                ]);
            }
        }
    
            DB::commit();
    
            return redirect()->route('newsale')->with('success', 'Plot transferred successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Plot transfer failed: ' . $e->getMessage());
            return redirect()->route('newsale')->with('error', 'Plot transfer failed: ' . $e->getMessage());
        }
    }
    

   
}
