<?php

namespace App\Http\Controllers\panel;

use App\Models\Occupation;
use App\Models\BranchMaster;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Models\CustomerRegistrationMaster;

class customerRegMasterController extends Controller
{
    public function index()
    {

        $registration = CustomerRegistrationMaster::all();
        $occupation = Occupation::all();
        $branch = BranchMaster::all();

        return view('panel.customer_reg', ['registration' => $registration, 'occupation' => $occupation, 'branch' => $branch]);
    }

    public function cust_Store(Request $request)
    {


        $request->validate([
            // 'title' => 'required',
            // 'name' => 'required',
            // 'occupation_id' => 'required',
            // 'email' => 'required',
            // 'contact' => 'required|digits:10',
            // 'city' => 'required',
            // 'pin_code' => 'required',
            // 'address' => 'required',
            // 'age' => 'required',
            // 'dob' => 'required',
            // 'marriage_date' => 'required',
            // 'branch_id' => 'required',
            // 'aadhar_no' => 'required',
            // 'pan_no' => 'required',
            // 'aadhar' => 'required',
            // 'pan' => 'required',

        ]);

        // dd($request->all());
        $aadhar = null;
        if ($request->hasFile('aadhar')) {
            $file = $request->file('aadhar');
            $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('customer_reg/'), $aadhar);
        }

        $pan = null;
        if ($request->hasFile('pan')) {
            $file = $request->file('pan');
            $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('customer_reg/'), $pan);
        }


        $reg = new customerRegistrationMaster;
        $reg->title = $request->title;
        $reg->name = $request->name;
        $reg->occupation_id = $request->occupation_id;
        $reg->email = $request->email;
        $reg->contact = $request->contact;
        $reg->city = $request->city;
        $reg->pin_code = $request->pin_code;
        $reg->address = $request->address;
        $reg->age = $request->age;
        $reg->dob = $request->dob;
        $reg->marriage_date = $request->marriage_date;
        $reg->branch_id = $request->branch_id;
        $reg->aadhar = $aadhar;
        $reg->aadhar_no = $request->aadhar_no;
        $reg->pan = $pan;
        $reg->marital_status = $request->marital_status;

        $reg->pan_no = $request->pan_no;

        $reg->save();

        //  $password = $request->input('password');
        Mail::send('panel.welcome_email_customer', ['user' => $reg], function ($message) use ($request) {
            $message->to($request->input('email'), $request->input('name'))->subject('Welcome to Nile Properties');
            $message->from('yashdhokane890@gmail.com', 'Nile Properties');
        });

        return redirect()->route('customerReg')->with('success', 'Customer Registraion Added Successfully');
    }

    public function destroy($id)
    {
        $customer = CustomerRegistrationMaster::find($id);

        if ($customer) {
            $customer->delete();
            return redirect(route('customerReg'))->with('success', 'Registration Deleted Successfully');
        } else {
            return redirect(route('customerReg'))->with('error', 'Registration not found');
        }
    }


    public function edit($id)
    {
        $customerEdit = CustomerRegistrationMaster::find($id);
        $customerAll = CustomerRegistrationMaster::all();
        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        return view('panel.customer_reg_edit', ['customerEdit' => $customerEdit, 'customerAll' => $customerAll, 'occupation' => $occupation, 'branch' => $branch]);
    }

    public function update(Request $request)
    {
        // Validate the request data
        $request->validate([
            // Add your validation rules here
        ]);

        // Check if Aadhar file is present
        $aadhar = null;
        if ($request->hasFile('aadhar')) {
            $file = $request->file('aadhar');
            $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('customer_reg/'), $aadhar);
        }

        // Check if PAN file is present
        $pan = null;
        if ($request->hasFile('pan')) {
            $file = $request->file('pan');
            $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('customer_reg/'), $pan);
        }

        // Update the customer registration data based on ID
        $customerRegistration = CustomerRegistrationMaster::find($request->id);
        $customerRegistration->fill([
            'title' => $request->title,
            'name' => $request->name,
            'occupation_id' => $request->occupation_id,
            'email' => $request->email,
            'contact' => $request->contact,
            'city' => $request->city,
            'pin_code' => $request->pin_code,
            'address' => $request->address,
            'age' => $request->age,
            'dob' => $request->dob,
            'marriage_date' => $request->marriage_date,
            'branch_id' => $request->branch_id,
            'aadhar_no' => $request->aadhar_no,
            'pan_no' => $request->pan_no,
            'marital_status' => $request->marital_status,



        ]);

        // Update Aadhar if present
        if ($aadhar) {
            $customerRegistration->aadhar = $aadhar;
        }

        // Update PAN if present
        if ($pan) {
            $customerRegistration->pan = $pan;
        }

        // Save the changes
        $customerRegistration->save();

        // Redirect with success message
        return redirect(route('customerReg'))->with('success', 'Customer Registration Updated Successfully');
    }
}