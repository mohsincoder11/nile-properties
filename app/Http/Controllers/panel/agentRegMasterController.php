<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\AgentRegistrationMaster;
use App\Models\AgentBankDetailsRegistrationMaster;

class agentRegMasterController extends Controller
{
    public function index()
    {

        $agent = AgentRegistrationMaster::with('bankDetails')->get();
        // $bankDetail = AgentBankDetailsRegistrationMaster::all();
        // return view('panel.agent_reg', ['agent'=>$agent, 'bankDetail'=>$bankDetail]);
        return view('panel.agent_reg', ['agent' => $agent]);

    }

    // public function index2(){
    // return view('panel.agent_reg2');
    // }

    public function agent_reg_store(Request $request)
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
        $agentNumber = 'AG' . $number;
        $aadhar = null;
        $pan = null;

        try {
            // Handle aadhar file upload
            if ($request->hasFile('aadhar')) {
                $file = $request->file('aadhar');
                $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('agent/'), $aadhar);
            }

            // Handle pan file upload
            if ($request->hasFile('pan')) {
                $file = $request->file('pan');
                $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('agent/'), $pan);
            }

            // Save agent registration details
            $agentRegistration = new AgentRegistrationMaster([
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
                    AgentBankDetailsRegistrationMaster::create([
                        'agent_id' => $agentRegistration->id,
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

            return redirect(route('agent_reg'))->with('success', 'Agent successfully added.');
        } catch (\Exception $e) {
            // Handle exceptions and redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }



    public function agent_destroy($id)
    {

        $agent_reg = AgentRegistrationMaster::find($id);

        if ($agent_reg) {
            $agent_reg->delete();
            return redirect(route('agent_reg'))->with('success', 'Agent Registration Deleted Successfully');
        } else {
            return redirect(route('agent_reg'))->with('error', 'Agent Registration not found');
        }
    }


    public function agent_list_destroy($id)
    {

        $agent_list_reg = AgentBankDetailsRegistrationMaster::find($id);

        if ($agent_list_reg) {
            $agent_list_reg->delete();
            return redirect(route('agent_reg_edit', ['id' => $agent_list_reg->agent_id]))->with('success', 'Agent bank detail deleted successfully');
        } else {
            return redirect(route('agent_reg_edit', ['id' => $agent_list_reg->agent_id]))->with('error', 'Agent Registration not found');
        }
    }


    public function agent_edit($id)
    {
        $agentEdit = agentRegistrationMaster::find($id);
        $agentAll = agentRegistrationMaster::all();
        $agentListEdit = AgentBankDetailsRegistrationMaster::where('agent_id', $agentEdit->id)->get();
        $agentListAll = AgentBankDetailsRegistrationMaster::all();
        // $city = City::all();
        return view('panel.agent_reg_edit', [
            'agentEdit' => $agentEdit,
            'agentAll' => $agentAll,
            'agentListEdit' => $agentListEdit,
            'agentListAll' => $agentListAll
        ]);
    }





    public function agent_update(Request $request)
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

        $agentRegistration = AgentRegistrationMaster::find($request->id);
        $agentRegistration->name = $request->name;
        $agentRegistration->email = $request->email;
        $agentRegistration->contact_number = $request->contact_number;
        $agentRegistration->city = $request->city;
        $agentRegistration->address = $request->address;
        $agentRegistration->pincode = $request->pincode;

        // Update images only if new files are provided
        if ($request->hasFile('pan')) {
            // Delete old pan file if exists
            if ($agentRegistration->pan && file_exists(public_path('agent/') . $agentRegistration->pan)) {
                unlink(public_path('agent/') . $agentRegistration->pan);
            }

            $file = $request->file('pan');
            $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('agent/'), $pan);

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
                $agentBankDetail = AgentBankDetailsRegistrationMaster::find($request->existing_id[$i]);
            } else {
                $agentBankDetail = new AgentBankDetailsRegistrationMaster;
                $agentBankDetail->agent_id = $agentRegistration->id;
            }

            $agentBankDetail->account_holder_name = $request->account_holder_name[$i];
            $agentBankDetail->bank_name = $request->bank_name[$i];
            $agentBankDetail->account_number = $request->account_number[$i];
            $agentBankDetail->ifsc = $request->ifsc[$i];

            $agentBankDetail->save();
        }

        return redirect()->route('agent_reg')->with('success', 'Agent updated successfully.');
    }


    // Add this method to your agentRegMasterController
// public function showBankDetails($agentId)
// {
//     dd(1);
//     $agent = AgentRegistrationMaster::find($agentId);

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
//     $bankDetails = AgentBankDetailsRegistrationMaster::where('agent_id', $agentId)->get();
//     return view('panel.bank_details_table', ['bankDetails'=>$bankDetail]);
// }


    // public function viewservicearea(Request $request)
//     {
//         // dd(1);
//         $servicearea = AgentBankDetailsRegistrationMaster::all();
//         // $proreport=$proreport->get();
//         //   $render_view= view('promotor_sale_summary',compact('proreport'))->render();
//         // echo json_encode($proreport);
//         // exit();resources\views\frontend\story_details.blade.php
//         $render_view = view('panel.bank_details_table', compact('servicearea'))->render();
//         // return response()->json(['proreport'=>$proreport]);
//         return response()->json(['html' => $render_view]);
//     }

    public function viewserviceareas(Request $request)
    {
        // dd($request->entry_id);

        try {
            $entry_id = $request->entry_id;
            // Fetch the specific AgentBankDetailsRegistrationMaster record
            $servicearea = AgentBankDetailsRegistrationMaster::where('agent_id', $entry_id)->get();

            // Check if the record exists
            if (!$servicearea) {
                return response()->json(['error' => 'Service area not found'], 404);
            }

            // Render the view with the retrieved data
            $render_view = view('panel.bank_details_table', compact('servicearea'))->render();

            // Return the HTML in the response
            return response()->json(['html' => $render_view]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }

}
