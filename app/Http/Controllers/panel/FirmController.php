<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\FirmRegistrationMaster;
use App\Models\FirmBankDetailsRegistrationMaster;

class FirmController extends Controller
{
    public function index()
    {

        $agent = FirmRegistrationMaster::with('bankDetails')->get();
        // $bankDetail = FirmBankDetailsRegistrationMaster::all();
        // return view('panel.agent_reg', ['agent'=>$agent, 'bankDetail'=>$bankDetail]);
        return view('panel.firm_reg', ['agent' => $agent]);

    }

    // public function index2(){
    // return view('panel.agent_reg2');
    // }

    public function firm_reg_store(Request $request)
    {
        // Initial request validation
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'contact_number' => 'required|string|max:10',
            // 'city' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'pincode' => 'required|string|max:20',
            // 'aadhar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'aadhar_number' => ['required', 'string', 'regex:/^\d{12}$/'],
            // 'pan' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'pan_number' => ['required', 'string', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'],
            // 'username' => 'required|string|max:255',
            // 'password' => 'required|string|max:20',
        ]);

        $number = mt_rand(1000, 9999);
        $agentNumber = 'FIRM' . $number;
        $aadhar = null;
        $pan = null;

        try {
            // Handle aadhar file upload
            if ($request->hasFile('aadhar')) {
                $file = $request->file('aadhar');
                $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('firm/'), $aadhar);
            }

            // Handle pan file upload
            if ($request->hasFile('pan')) {
                $file = $request->file('pan');
                $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('firm/'), $pan);
            }

            // Save agent registration details
            $agentRegistration = new FirmRegistrationMaster([
                'agent_number' => $agentNumber,
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'contact_number' => $request->input('contact_number'),
                'city' => $request->input('city'),
                'address' => $request->input('address'),
                'pincode' => $request->input('pincode'),
                'aadhar' => $aadhar,
                'aadhar_number' => $request->input('aadhar_number'),
                'pan' => $pan,
                'pan_number' => $request->input('pan_number'),
                'username' => $request->input('username'),
                'password' => Hash::make($request->input('password')),
            ]);

            $agentRegistration->save();

            // Validate and save agent bank details if provided
            $account_holder_name_array = $request->input('account_holder_name', []);
            if (!empty($account_holder_name_array)) {
                foreach ($account_holder_name_array as $key => $account_holder_name) {
                    $request->validate([
                        "account_holder_name.{$key}" => 'required|string|max:255',
                        "bank_name.{$key}" => 'required|string|max:255',
                        "account_number.{$key}" => 'required|string|max:255',
                        "ifsc.{$key}" => 'required|string|max:255',
                    ]);
                    FirmBankDetailsRegistrationMaster::create([
                        'firm_id' => $agentRegistration->id,
                        'account_holder_name' => $request->account_holder_name[$key],
                        'bank_name' => $request->bank_name[$key],
                        'account_number' => $request->account_number[$key],
                        'ifsc' => $request->ifsc[$key],
                    ]);
                }
            }

            // Send welcome email
            $password = $request->input('password');
            Mail::send('panel.welcome_email_agent_marketing', ['user' => $agentRegistration, 'password' => $password], function ($message) use ($request) {
                $message->to($request->input('email'), $request->input('name'))->subject('Welcome to Nile Properties');
                $message->from('yashdhokane890@gmail.com', 'Nile Properties');
            });

            return redirect(route('firm_reg'))->with('success', 'Firm successfully added.');
        } catch (\Exception $e) {
            // Handle exceptions and redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }



    public function firm_destroy($id)
    {

        $agent_reg = FirmRegistrationMaster::find($id);

        if ($agent_reg) {
            $agent_reg->delete();
            return redirect(route('firm_reg'))->with('success', 'Firm Registration Deleted Successfully');
        } else {
            return redirect(route('firm_reg'))->with('error', 'Firm Registration not found');
        }
    }


    public function firm_list_destroy($id)
    {

        $agent_list_reg = FirmBankDetailsRegistrationMaster::find($id);

        if ($agent_list_reg) {
            $agent_list_reg->delete();
            return redirect(route('firm_reg_edit', ['id' => $agent_list_reg->firm_id]))->with('success', 'Firm bank detail deleted successfully');
        } else {
            return redirect(route('firm_reg_edit', ['id' => $agent_list_reg->firm_id]))->with('error', 'Firm Registration not found');
        }
    }


    public function firm_edit($id)
    {
        $agentEdit = FirmRegistrationMaster::find($id);
        $agentAll = FirmRegistrationMaster::all();
        $agentListEdit = FirmBankDetailsRegistrationMaster::where('firm_id', $agentEdit->id)->get();
        $agentListAll = FirmBankDetailsRegistrationMaster::all();
        // $city = City::all();
        return view('panel.firm_reg_edit', [
            'agentEdit' => $agentEdit,
            'agentAll' => $agentAll,
            'agentListEdit' => $agentListEdit,
            'agentListAll' => $agentListAll
        ]);
    }





    public function firm_update(Request $request)
    {
        // dd($request->all());
        // Uncomment and add validation rules as needed
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'contact_number' => 'required|string|max:10',
            // 'city' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'pincode' => 'required|string|max:20',
            // 'aadhar_number' => ['required', 'string', 'regex:/^\d{12}$/'],
            // 'pan_number' => ['required', 'string', 'regex:/^[A-Z]{5}[0-9]{4}[A-Z]{1}$/'],
            // 'username' => 'required|string|max:255',
            // 'password' => 'required|string|max:255',
        ]);

        $agentRegistration = FirmRegistrationMaster::find($request->id);
        $agentRegistration->name = $request->name;
        $agentRegistration->email = $request->email;
        $agentRegistration->contact_number = $request->contact_number;
        $agentRegistration->city = $request->city;
        $agentRegistration->address = $request->address;
        $agentRegistration->pincode = $request->pincode;

        // Update images only if new files are provided
        if ($request->hasFile('pan')) {
            // Delete old pan file if exists
            if ($agentRegistration->pan && file_exists(public_path('firm/') . $agentRegistration->pan)) {
                unlink(public_path('firm/') . $agentRegistration->pan);
            }

            $file = $request->file('pan');
            $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('firm/'), $pan);

            $agentRegistration->pan = $pan;
        }

        // Update remaining fields
        $agentRegistration->aadhar_number = $request->aadhar_number;
        $agentRegistration->pan_number = $request->pan_number;
        $agentRegistration->username = $request->username;

        if ($request->filled('password')) {
            $agentRegistration->password = Hash::make($request->password);
        }




        $agentRegistration->save();

        // Update agent bank details
        $accountHolderNames = $request->account_holder_name ?? [];
        for ($i = 0; $i < count($accountHolderNames); $i++) {
            if (isset($request->existing_id[$i])) {
                $agentBankDetail = FirmBankDetailsRegistrationMaster::find($request->existing_id[$i]);
            } else {
                $agentBankDetail = new FirmBankDetailsRegistrationMaster;
                $agentBankDetail->firm_id = $agentRegistration->id;
            }

            $agentBankDetail->account_holder_name = $request->account_holder_name[$i];
            $agentBankDetail->bank_name = $request->bank_name[$i];
            $agentBankDetail->account_number = $request->account_number[$i];
            $agentBankDetail->ifsc = $request->ifsc[$i];

            $agentBankDetail->save();
        }

        return redirect()->route('firm_reg')->with('success', 'Firm updated successfully.');
    }


    // Add this method to your agentRegMasterController
// public function showBankDetails($agentId)
// {
//     dd(1);
//     $agent = FirmRegistrationMaster::find($agentId);

    //     if (!$agent) {
//         return response()->json(['error' => 'Agent not found'], 404);
//     }

    //     $bankDetails = $agent->bankDetails;

    //     // Pass the bankDetails to a blade view to render the HTML
//     $view = view('panel.bank_details_table', compact('bankDetails'))->render();

    //     return response()->json(['html' => $view]);
// }

    // public function showBankDetails($agentId)
// {
//     $bankDetails = FirmBankDetailsRegistrationMaster::where('firm_id', $agentId)->get();
//     return view('panel.bank_details_table', ['bankDetails'=>$bankDetail]);
// }


    // public function viewservicearea(Request $request)
//     {
//         // dd(1);
//         $servicearea = FirmBankDetailsRegistrationMaster::all();
//         // $proreport=$proreport->get();
//         //   $render_view= view('promotor_sale_summary',compact('proreport'))->render();
//         // echo json_encode($proreport);
//         // exit();resources\views\frontend\story_details.blade.php
//         $render_view = view('panel.bank_details_table', compact('servicearea'))->render();
//         // return response()->json(['proreport'=>$proreport]);
//         return response()->json(['html' => $render_view]);
//     }

    public function firmviewserviceareas(Request $request)
    {
        // dd($request->entry_id);

        try {
            $entry_id = $request->entry_id;
            // Fetch the specific FirmBankDetailsRegistrationMaster record
            $servicearea = FirmBankDetailsRegistrationMaster::where('firm_id', $entry_id)->get();

            // Check if the record exists
            if (!$servicearea) {
                return response()->json(['error' => 'Service area not found'], 404);
            }

            // Render the view with the retrieved data
            $render_view = view('panel.firm_bank_details_table', compact('servicearea'))->render();

            // Return the HTML in the response
            return response()->json(['html' => $render_view]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}