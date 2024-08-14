<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Models\LandPurchaseModel;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\LandOwnerPaymentOfLand;
use App\Models\LandRegistrationMaster;
use App\Models\LandBankDetailsRegistrationMaster;

class LandownerController extends Controller
{
    // public function index()
    // {
    //     return view('panel.land_owner');
    // }


    public function account()
    {
        $agent = LandRegistrationMaster::with('bankDetails')->get();

        $landPurchases = LandPurchaseModel::all(); // Fetch all land purchases from database
        return view('panel.land_owner_account', compact('landPurchases', 'agent'));
    }
    public function index()
    {

        $agent = LandRegistrationMaster::with('bankDetails')->get();
        // $bankDetail = LandBankDetailsRegistrationMaster::all();
        // return view('panel.agent_reg', ['agent'=>$agent, 'bankDetail'=>$bankDetail]);
        return view('panel.land_owner', ['agent' => $agent]);

    }

    // public function index2(){
    // return view('panel.agent_reg2');
    // }
    public function getAgentById(Request $request)
    {
        $agentId = $request->input('agent_id');
        $agent = LandRegistrationMaster::where('id', $agentId)->first();
        return response()->json($agent);
    }
    public function getPaymentData(Request $request)
    {
        $id = $request->input('id');

        // Fetch all payment records for the given land owner ID
        $payments = LandOwnerPaymentOfLand::where('land_owner_id', $id)->get();

        if ($payments->isEmpty()) {
            return response()->json([
                'message' => 'No payment records found'
            ], 404);
        }

        // Find the latest payment record
        $latestPayment = $payments->sortByDesc('created_at')->first();

        // Prepare response data
        $data = [
            'payments' => $payments,
            'latest_payment' => $latestPayment
        ];

        return response()->json($data);
    }
    public function getPaymentDetails(Request $request)
    {
        $id = $request->input('id');
        $payment = LandOwnerPaymentOfLand::where('id', $id)->first();

        if (!$payment) {
            return response()->json([
                'message' => 'Payment record not found'
            ], 404);
        }

        return response()->json($payment);
    }

    public function updatePayment(Request $request)
    {
        $id = $request->input('payment_id');
        $payment = LandOwnerPaymentOfLand::where('id', $id)->first();

        if (!$payment) {
            return response()->json([
                'message' => 'Payment record not found'
            ], 404);
        }

        // Update payment record with new data
        $payment->date_of_payment = $request->input('date_of_payment');
        $payment->particulars = $request->input('particulars');
        $payment->amount = $request->input('amount');
        $payment->payment_mode = $request->input('payment_mode');
        $payment->remarks = $request->input('remarks');
        $payment->save();

        // Return updated payment record
        return response()->json([
            'message' => 'Payment record updated successfully',
            'payment' => $payment
        ]);
    }

    public function deletePayment(Request $request)
    {
        $id = $request->input('id'); // Get the payment ID from the request

        // Find the payment record
        $payment = LandOwnerPaymentOfLand::find($id);

        if (!$payment) {
            return response()->json([
                'message' => 'Payment record not found'
            ], 404);
        }

        // Delete the payment record
        $payment->delete();

        return response()->json([
            'message' => 'Payment record deleted successfully'
        ]);
    }
    public function storepayment(Request $request)
    {
        // Create a new instance of LandOwnerPaymentOfLand model
        $payment = new LandOwnerPaymentOfLand();

        // Set properties based on request data
        $payment->date_of_payment = $request->date_of_payment;
        $payment->land_owner_id = $request->land_owner_id;
        $payment->particulars = $request->particulars;
        $payment->amount = $request->amount;
        $payment->payment_mode = $request->payment_mode;
        $payment->remarks = $request->remarks;

        $paymentSum = LandOwnerPaymentOfLand::where('land_owner_id', $request->land_owner_id)->sum('amount');

        // Fetch land purchase details for the given land owner ID
        $landPurchase = LandPurchaseModel::where('id', $request->land_owner_id)->first();

        // Calculate derived data
        $totalLandCost = $landPurchase->total_land_cost;
        $paidAmount = $paymentSum + $request->amount;
        $balanceAmount = max(0, $totalLandCost - $paidAmount);
        // Fetch the count of existing payments for the given land owner ID
        $paymentCount = LandOwnerPaymentOfLand::where('land_owner_id', $request->land_owner_id)->count();

        // Calculate payment period remaining
        if ($paymentCount > 0) {
            $paymentPeriodRemaining = $landPurchase->payment_period - $paymentCount - 1;
        } else {
            // If no payments exist, adjust as needed (e.g., subtract 1)
            $paymentPeriodRemaining = $landPurchase->payment_period - 1;
        }

        // Handle specific condition when it equals -1
        // Handle specific condition when it is negative
        if ($paymentPeriodRemaining < 0) {
            $paymentPeriodRemaining = 0;
        }


        $payment->total_land_cost = $totalLandCost;
        $payment->paid_amount = $paidAmount;
        $payment->balance_amount = $balanceAmount;
        $payment->payment_period_remaining = $paymentPeriodRemaining;

        // Save the payment record
        $payment->save();

        // Fetch all payments for the given land owner ID


        // Optionally, update the land purchase model with calculated data
        // $landPurchase->update([
        //     'paid_amount' => $paidAmount,
        //     'balance_amount' => $balanceAmount,
        //     'payment_period_remaining' => $paymentPeriodRemaining
        // ]);

        // Return a JSON response with success message and additional data
        return response()->json([
            'success' => 'Payment record created successfully.',
            'payment' => $payment,
            'total_land_cost' => $totalLandCost,
            'paid_amount' => $paidAmount,
            'balance_amount' => $balanceAmount,
            'payment_period_remaining' => $paymentPeriodRemaining
        ]);
    }
    public function land_owner_reg_store(Request $request)
    {
        // Initial request validation
        $request->validate([
            // 'name' => 'required|',
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
        $agentNumber = 'LAND' . $number;
        $aadhar = null;
        $pan = null;

        try {
            // Handle aadhar file upload
            if ($request->hasFile('aadhar')) {
                $file = $request->file('aadhar');
                $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('land/'), $aadhar);
            }

            // Handle pan file upload
            if ($request->hasFile('pan')) {
                $file = $request->file('pan');
                $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('land/'), $pan);
            }

            // Save agent registration details
            $agentRegistration = new LandRegistrationMaster([
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
                    LandBankDetailsRegistrationMaster::create([
                        'land_id' => $agentRegistration->id,
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

            return redirect(route('land_owner_reg'))->with('success', 'Land successfully added.');
        } catch (\Exception $e) {
            // Handle exceptions and redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }



    public function land_owner_destroy($id)
    {

        $agent_reg = LandRegistrationMaster::find($id);

        if ($agent_reg) {
            $agent_reg->delete();
            return redirect(route('land_owner_reg'))->with('success', 'Land Registration Deleted Successfully');
        } else {
            return redirect(route('land_owner_reg'))->with('error', 'Land Registration not found');
        }
    }


    public function land_owner_list_destroy($id)
    {

        $agent_list_reg = LandBankDetailsRegistrationMaster::find($id);

        if ($agent_list_reg) {
            $agent_list_reg->delete();
            return redirect(route('land_owner_reg_edit', ['id' => $agent_list_reg->land_id]))->with('success', 'Land bank detail deleted successfully');
        } else {
            return redirect(route('land_owner_reg_edit', ['id' => $agent_list_reg->land_id]))->with('error', 'Land Registration not found');
        }
    }


    public function land_owner_edit($id)
    {
        $agentEdit = LandRegistrationMaster::find($id);
        $agentAll = LandRegistrationMaster::all();
        $agentListEdit = LandBankDetailsRegistrationMaster::where('land_id', $agentEdit->id)->get();
        $agentListAll = LandBankDetailsRegistrationMaster::all();
        // $city = City::all();
        return view('panel.land_owner_reg_edit', [
            'agentEdit' => $agentEdit,
            'agentAll' => $agentAll,
            'agentListEdit' => $agentListEdit,
            'agentListAll' => $agentListAll
        ]);
    }





    public function land_owner_reg_update(Request $request)
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

        $agentRegistration = LandRegistrationMaster::find($request->id);
        $agentRegistration->name = $request->name;
        $agentRegistration->email = $request->email;
        $agentRegistration->contact_number = $request->contact_number;
        $agentRegistration->city = $request->city;
        $agentRegistration->address = $request->address;
        $agentRegistration->pincode = $request->pincode;

        // Update images only if new files are provided
        if ($request->hasFile('pan')) {
            // Delete old pan file if exists
            if ($agentRegistration->pan && file_exists(public_path('land/') . $agentRegistration->pan)) {
                unlink(public_path('land/') . $agentRegistration->pan);
            }

            $file = $request->file('pan');
            $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('land/'), $pan);

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
                $agentBankDetail = LandBankDetailsRegistrationMaster::find($request->existing_id[$i]);
            } else {
                $agentBankDetail = new LandBankDetailsRegistrationMaster;
                $agentBankDetail->land_id = $agentRegistration->id;
            }

            $agentBankDetail->account_holder_name = $request->account_holder_name[$i];
            $agentBankDetail->bank_name = $request->bank_name[$i];
            $agentBankDetail->account_number = $request->account_number[$i];
            $agentBankDetail->ifsc = $request->ifsc[$i];

            $agentBankDetail->save();
        }

        return redirect()->route('land_owner_reg')->with('success', 'Land updated successfully.');
    }


    // Add this method to your agentRegMasterController
// public function showBankDetails($agentId)
// {
//     dd(1);
//     $agent = LandRegistrationMaster::find($agentId);

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
//     $bankDetails = LandBankDetailsRegistrationMaster::where('land_id', $agentId)->get();
//     return view('panel.bank_details_table', ['bankDetails'=>$bankDetail]);
// }


    // public function viewservicearea(Request $request)
//     {
//         // dd(1);
//         $servicearea = LandBankDetailsRegistrationMaster::all();
//         // $proreport=$proreport->get();
//         //   $render_view= view('promotor_sale_summary',compact('proreport'))->render();
//         // echo json_encode($proreport);
//         // exit();resources\views\frontend\story_details.blade.php
//         $render_view = view('panel.bank_details_table', compact('servicearea'))->render();
//         // return response()->json(['proreport'=>$proreport]);
//         return response()->json(['html' => $render_view]);
//     }

    public function landviewserviceareas(Request $request)
    {
        // dd($request->entry_id);

        try {
            $entry_id = $request->entry_id;
            // Fetch the specific LandBankDetailsRegistrationMaster record
            $servicearea = LandBankDetailsRegistrationMaster::where('land_id', $entry_id)->get();

            // Check if the record exists
            if (!$servicearea) {
                return response()->json(['error' => 'Service area not found'], 404);
            }

            // Render the view with the retrieved data
            $render_view = view('panel.landowner_bank_details_table', compact('servicearea'))->render();

            // Return the HTML in the response
            return response()->json(['html' => $render_view]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()]);
        }
    }


    //landloard account

    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'land_owner_id' => 'required|',
            'city' => 'required|',
            'contact_number' => 'required|',
            'email' => 'required|',
            'mauza' => 'required|',
            'khasara_no' => 'required|',
            'ph_no' => 'required|',
            'area' => 'required|',
            'per_acre_cost' => 'required|',
            'total_land_cost' => 'required|',
            'payment_period' => 'required|',
        ]);

        LandPurchaseModel::create($request->all());

        return redirect()->route('landowner_account')->with('success', 'Land Purchase created successfully.');
    }
}
