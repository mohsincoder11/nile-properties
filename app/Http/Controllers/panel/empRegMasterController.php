<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\{EmployeeBankDetailsMaster, User, UserRoles};
use Illuminate\Support\Facades\Validator;
use App\Models\EmployeeRegistrationMaster;

// use Illuminate\Support\Facades\DB;


class empRegMasterController extends Controller
{
    public function index()
    {

        $emp = EmployeeRegistrationMaster::all();
        $bnk = EmployeeBankDetailsMaster::all();
        $user_role = UserRoles::all();

        return view('panel.employee_reg', compact('emp', 'bnk', 'user_role'));
    }

    //     public function emp_reg_store(Request $request){

    //         // dd($request->all());

    //         $request->validate([
//             'role' => 'required|string|max:255',
//             'name' => 'required|string|max:255',
//             'email' => 'required|email|max:255',
//             'contact_number' => 'required|string|max:20',
//             'city' => 'required|string|max:255',
//             'address' => 'required|string|max:255',
//             'pincode' => 'required|string|max:20',
//             'aadhar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'aadhar_number' => 'required|string|max:255',
//             'pan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//             'pan_number' => 'required|string|max:255',
//             'username' => 'required|string|max:255',
//             'password' => 'required|string|max:255',
//             // Add more fields and their validation rules as needed
//         ]);

    //         $aadhar = null;
//         if ($request->hasFile('aadhar')) {
//             $file = $request->file('aadhar');
//             $aadhar = time() . '.' . $file->getClientOriginalExtension();
//             $file->move(public_path('emp/'), $aadhar);
//         }

    //         $pan = null;
//         if ($request->hasFile('pan')) {
//             $file = $request->file('pan');
//             $pan = time() . '.' . $file->getClientOriginalExtension();
//             $file->move(public_path('emp/'), $pan);
//         }

    //         $empRegistration = new EmployeeRegistrationMaster([
//             'role' =>$request->input('role'),
//             'name' => $request->input('name'),
//             'email' => $request->input('email'),
//             'contact_number' => $request->input('contact_number'),
//             'city' => $request->input('city'),
//             'address' => $request->input('address'),
//             'pincode' => $request->input('pincode'),
//             'aadhar' => $aadhar,
//             'aadhar_number' => $request->input('aadhar_number'),
//             'pan' => $pan,
//             'pan_number' => $request->input('pan_number'),
//             'username' => $request->input('username'),
//             'password' => $request->input('password'),

    //         ]);

    //         $empRegistration->save();


    //          // Save agent bank details

    //          $account_holder_name_array = $request->input('account_holder_name', []);
//          if (!empty($account_holder_name_array)) {
//             foreach ($account_holder_name_array as $key=>$account_holder_name) {

    //                 $request->validate([
//                     "account_holder_name.{$key}" => 'required|string|max:255',
//                     "bank_name.{$key}" => 'required|string|max:255',
//                     "account_number.{$key}" => 'required|string|max:255',
//                     "ifsc.{$key}" => 'required|string|max:255',
//                 ]);
//                 // $agentBankDetail = new AgentBankDetailsRegistrationMaster([
//                     EmployeeBankDetailsMaster::create([
//                     'employee_id' => $empRegistration->id,
//                     'account_holder_name' =>$request->account_holder_name[$key],
//                     'bank_name' =>$request->bank_name[$key],
//                     'account_number' =>$request->account_number[$key],
//                     'ifsc' =>$request->ifsc[$key],
//                 ]);



    //     }

    //     // Redirect or return a response as needed
//     return redirect()->route('emp_reg');

    //     }

    // }



    // public function emp_reg_store(Request $request){

    //     // Validate the incoming request data
//     $request->validate([
//         'role' => 'required|string|max:255',
//         'name' => 'required|string|max:255',
//         'email' => 'required|email|max:255',
//         'contact_number' => 'required|string|max:20',
//         'city' => 'required|string|max:255',
//         'address' => 'required|string|max:255',
//         'pincode' => 'required|string|max:20',
//         'aadhar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'aadhar_number' => 'required|string|max:255',
//         'pan' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
//         'pan_number' => 'required|string|max:255',
//         'username' => 'required|string|max:255',
//         'password' => 'required|string|max:255',
//     ]);

    //     // Initialize a variable to track the success of the entire process
//     $success = false;

    //     // Use a database transaction to ensure data consistency
//     DB::beginTransaction();

    //     try {
//         // Process the employee registration data
//         $aadhar = null;
//         if ($request->hasFile('aadhar')) {
//             $file = $request->file('aadhar');
//             $aadhar = time() . '.' . $file->getClientOriginalExtension();
//             $file->move(public_path('emp/'), $aadhar);
//         }

    //         $pan = null;
//         if ($request->hasFile('pan')) {
//             $file = $request->file('pan');
//             $pan = time() . '.' . $file->getClientOriginalExtension();
//             $file->move(public_path('emp/'), $pan);
//         }

    //         $empRegistration = new EmployeeRegistrationMaster([
//             'role' => $request->input('role'),
//             'name' => $request->input('name'),
//             'email' => $request->input('email'),
//             'contact_number' => $request->input('contact_number'),
//             'city' => $request->input('city'),
//             'address' => $request->input('address'),
//             'pincode' => $request->input('pincode'),
//             'aadhar' => $aadhar,
//             'aadhar_number' => $request->input('aadhar_number'),
//             'pan' => $pan,
//             'pan_number' => $request->input('pan_number'),
//             'username' => $request->input('username'),
//             'password' => $request->input('password'),
//         ]);

    //         $empRegistration->save();

    //         // Process the employee bank details
//         $account_holder_name_array = $request->input('account_holder_name', []);
//         if (!empty($account_holder_name_array)) {
//             foreach ($account_holder_name_array as $key => $account_holder_name) {
//                 $request->validate([
//                     "account_holder_name.{$key}" => 'required|string|max:255',
//                     "bank_name.{$key}" => 'required|string|max:255',
//                     "account_number.{$key}" => 'required|string|max:255',
//                     "ifsc.{$key}" => 'required|string|max:255',
//                 ]);

    //                 EmployeeBankDetailsMaster::create([
//                     'employee_id' => $empRegistration->id,
//                     'account_holder_name' =>$request->account_holder_name[$key],
//                     'bank_name' =>$request->bank_name[$key],
//                     'account_number' =>$request->account_number[$key],
//                     'ifsc' =>$request->ifsc[$key],
//                 ]);
//             }
//         }

    //         // If all steps are successful, commit the transaction
//         DB::commit();
//         $success = true;

    //     } catch (\Exception $e) {
//         // If an exception occurs, rollback the transaction
//         DB::rollback();
//         $success = false;
//     }

    //     // Check the success flag and redirect accordingly
//     if ($success) {
//         return redirect()->route('emp_reg')->with('success', 'Employee registration successful!');
//     } else {
//         return redirect()->route('emp_reg')->with('error', 'Error in the registration process.');
//     }
// }


    public function emp_reg_store(Request $request)
    {
        // dd($request->all());
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
        // Retrieve permissions from UserRoles table based on the role
        $rolePermissions = UserRoles::find($request->role);

        if (!$rolePermissions) {
            return back()->with('error', 'Invalid role selected. Please choose a valid role.');
        }
            $user = new User([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                'role' => $request->input('role'),
                'permission' => $rolePermissions->permission,

            ]);

            $user->save();


            // Handle aadhar file upload
            if ($request->hasFile('aadhar')) {
                $file = $request->file('aadhar');
                $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('emp/'), $aadhar);
            }

            // Handle pan file upload
            if ($request->hasFile('pan')) {
                $file = $request->file('pan');
                $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('emp/'), $pan);
            }

            // Save agent registration details
            $agentRegistration = new EmployeeRegistrationMaster([
                'user_id' => $user->id, // Store the user_id in the employee table
                'name' => $request->input('name'),
                'role' => $request->input('role'),
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
                        // "account_holder_name.{$key}" => 'required|string|max:255',
                        // "bank_name.{$key}" => 'required|string|max:255',
                        // "account_number.{$key}" => 'required|string|max:255',
                        // "ifsc.{$key}" => 'required|string|max:255',
                    ]);
                    EmployeeBankDetailsMaster::create([
                        'employee_id' => $agentRegistration->id,
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

            return redirect(route('emp_reg'))->with('success', 'Employee successfully added.');
        } catch (\Exception $e) {
            // Handle exceptions and redirect back with error message
            return redirect(route('emp_reg'))->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }
    public function emp_destroy($id)
    {

        $emp_reg = EmployeeRegistrationMaster::find($id);

        if ($emp_reg) {
            $emp_reg->delete();
            return redirect(route('emp_reg'))->with('success', 'Employee Registration Deleted Successfully.');
        } else {
            return redirect(route('emp_reg'))->with('error', 'Employee Registration not found.');
        }
    }


    // In your controller, create the method to fetch story details
    public function getBankDetails(Request $request)
    {
        $emp = EmployeeBankDetailsMaster::where('employee_id', $request->entry_id)
            ->get();

        // $proreport=$proreport->get();
        //   $render_view= view('promotor_sale_summary',compact('proreport'))->render();
        // echo json_encode($emp);
        //  exit();
        //resources\views\frontend\story_details.blade.php
        $render_view = view('panel.emp_bank_details', compact('emp'))->render();
        // return response()->json(['proreport'=>$proreport]);
        return response()->json($render_view);
    }


    public function emp_list_destroy($id)
    {
        $emp_list_reg = EmployeeBankDetailsMaster::find($id);

        if ($emp_list_reg) {
            $emp_list_reg->delete();
            return redirect(route('emp_reg_edit', ['id' => $emp_list_reg->employee_id]))
                ->with('success', 'Record successfully deleted.');
        } else {
            return redirect(route('emp_reg_edit', ['id' => $emp_list_reg->employee_id]))
                ->with('error', 'Record not found.');
        }
    }



    public function emp_reg_edit($id)
    {
        $employeeEdit = EmployeeRegistrationMaster::find($id);
        $employeeAll = EmployeeRegistrationMaster::all();
        $empListEdit = EmployeeBankDetailsMaster::where('employee_id', $employeeEdit->id)->get();
        $empListAll = EmployeeBankDetailsMaster::all();

        return view('panel.employee_reg_edit', [
            'employeeEdit' => $employeeEdit,
            'employeeAll' => $employeeAll,
            'empListEdit' => $empListEdit,
            'empListAll' => $empListAll,
        ]);
    }

    // public function emp_reg_update(Request $request)
    // {
    //     // dd($request->all());


    //     // Validation rules
    //     $rules = [
    //         'role' => 'required',
    //         'name' => 'required',
    //         'email' => 'required',
    //         'contact_number' => 'required',
    //         'city' => 'required',
    //         'address' => 'required',
    //         'pincode' => 'required',
    //         'aadhar' => 'nullable',
    //         'aadhar_number' => 'required',
    //         'pan' => 'nullable',
    //         'pan_number' => 'required',
    //         'username' => 'required',
    //         'password' => 'required',
    //     ];


    //     // Validate the request
    //     $validator = Validator::make($request->all(), $rules);

    //     // Check for validation errors
    //     if ($validator->fails()) {
    //         return redirect()->route('emp_reg') // Replace 'your.form.route' with the actual route name
    //             ->withErrors($validator)
    //             ->withInput();
    //     }


    //     $aadhar = null;
    //     if ($request->hasFile('aadhar')) {
    //         $file = $request->file('aadhar');
    //         $aadhar = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('emp/'), $aadhar);
    //     }

    //     $pan = null;
    //     if ($request->hasFile('pan')) {
    //         $file = $request->file('pan');
    //         $pan = time() . '.' . $file->getClientOriginalExtension();
    //         $file->move(public_path('emp/'), $pan);
    //     }

    //     EmployeeRegistrationMaster::where('id',$request->id)->update([
    //         'role'=>$request->role,
    //         'name'=>$request->name,
    //         'email'=>$request->email,
    //         'contact_number'=>$request->contact_number,
    //         'city'=>$request->city,
    //         'address'=>$request->address,
    //         'pincode'=>$request->pincode,
    //         'aadhar_number'=>$request->aadhar_number,
    //         'pan_number'=>$request->pan_number,
    //         'username'=>$request->username,
    //         'password'=>$request->password,
    //         'aadhar'=>$aadhar,
    //         'pan'=>$pan,

    //         ]
    //     );


    //     return redirect(route('emp_reg'))->with('success','Successfully Updated !');
    //     // return redirect(route('couponIndex'))->with('success', 'Field Added Successfully');
    // }


    public function emp_reg_update(Request $request)
    {

        //dd($request->all());
        $request->validate([
            // 'role' => 'required|string',
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|max:255',
            // 'contact_number' => 'required|string|max:10',
            // 'city' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'pincode' => 'required|string|max:20',
            // 'aadhar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'aadhar_number' => 'required|string|max:255',
            // 'pan' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            // 'pan_number' => 'required|string|max:255',
            // 'username' => 'required|string|max:255',
            // 'password' => 'nullable|string|max:255', // Nullable for update
        ]);

        try {
            $empRegistration = EmployeeRegistrationMaster::findOrFail($request->id);
            $empRegistration->role = $request->role;
            $empRegistration->name = $request->name;
            $empRegistration->email = $request->email;
            $empRegistration->contact_number = $request->contact_number;
            $empRegistration->city = $request->city;
            $empRegistration->address = $request->address;
            $empRegistration->pincode = $request->pincode;

            // Update images only if new files are provided
            if ($request->hasFile('aadhar')) {
                // Delete old file if it exists
                if ($empRegistration->aadhar && file_exists(public_path('agent/' . $empRegistration->aadhar))) {
                    unlink(public_path('emp/' . $empRegistration->aadhar));
                }

                $file = $request->file('aadhar');
                $aadhar = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('emp/'), $aadhar);
                $empRegistration->aadhar = $aadhar;
            }

            if ($request->hasFile('pan')) {
                // Delete old file if it exists
                if ($empRegistration->pan && file_exists(public_path('emp/' . $empRegistration->pan))) {
                    unlink(public_path('emp/' . $empRegistration->pan));
                }

                $file = $request->file('pan');
                $pan = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('emp/'), $pan);
                $empRegistration->pan = $pan;
            }

            $empRegistration->aadhar_number = $request->aadhar_number;
            $empRegistration->pan_number = $request->pan_number;
            $empRegistration->username = $request->username;

            if ($request->filled('password')) {
                $empRegistration->password = Hash::make($request->password);
            }

            $empRegistration->save();

            // Update employee bank details
            // if (!empty($request->account_holder_name) && is_array($request->account_holder_name)) {
            //     for ($i = 0; $i < count($request->account_holder_name); $i++) {
            //         if (isset($request->existing_id[$i])) {
            //             $empBankDetail = EmployeeBankDetailsMaster::find($request->existing_id[$i]);
            //         } else {
            //             $empBankDetail = new EmployeeBankDetailsMaster;
            //             $empBankDetail->employee_id = $request->id;
            //         }

            //         $empBankDetail->account_holder_name = $request->account_holder_name[$i];
            //         $empBankDetail->bank_name = $request->bank_name[$i];
            //         $empBankDetail->account_number = $request->account_number[$i];
            //         $empBankDetail->ifsc = $request->ifsc[$i];

            //         $empBankDetail->save();
            //     }
            // }
            $accountHolderNames = $request->account_holder_name ?? [];
            for ($i = 0; $i < count($accountHolderNames); $i++) {
                if (isset($request->existing_id[$i])) {
                    $agentBankDetail = EmployeeBankDetailsMaster::find($request->existing_id[$i]);
                } else {
                    $agentBankDetail = new EmployeeBankDetailsMaster;
                    $agentBankDetail->employee_id = $empRegistration->id;
                }

                $agentBankDetail->account_holder_name = $request->account_holder_name[$i];
                $agentBankDetail->bank_name = $request->bank_name[$i];
                $agentBankDetail->account_number = $request->account_number[$i];
                $agentBankDetail->ifsc = $request->ifsc[$i];

                $agentBankDetail->save();
            }

            return redirect()->route('emp_reg')->with('success', 'Record  updated successfully.');
        } catch (\Exception $e) {
            // Handle exceptions and redirect back with error message
            return redirect()->back()->withErrors(['error' => 'An error occurred: ' . $e->getMessage()])->withInput();
        }
    }


}
