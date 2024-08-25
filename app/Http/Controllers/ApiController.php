<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Client;
use App\Models\Enquiry;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\PlotSaleStatus;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\ProjectEntryAppendData;
use App\Models\AgentRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;
use App\Models\Occupation;


class ApiController extends Controller
{

    public function user_login(Request $request)
    {
        $user = AgentRegistrationMaster::where('email', '=', $request->email)->first();

        if (!$user) {
            $user = EmployeeRegistrationMaster::where('email', '=', $request->email)->first();
        }

        if ($user && Hash::check($request->password, $user->password)) {
            return response()->json(['status' => true, 'data' => $user, 'message' => 'Login Successful!'], 200);
        } elseif ($user) {
            return response()->json(['status' => false, 'message' => 'Password is incorrect'], 401);
        } else {
            return response()->json(['status' => false, 'message' => 'User not found'], 401);
        }
    }

    public function get_broker(Request $request)
    {
        $user = AgentRegistrationMaster::where('id', '=', $request->broker_id)->first();

        if (!$user) {
            $user = EmployeeRegistrationMaster::where('id', '=', $request->broker_id)->first();
        }

        if ($user) {
            return response()->json(['status' => true, 'data' => $user, 'message' => ' Broker retrieve successful!'], 200);
        } elseif ($user) {
            return response()->json(['status' => false, 'message' => 'Broker is not  retrieve successful!'], 401);
        } else {
            return response()->json(['status' => false, 'message' => 'Broker not found'], 401);
        }
    }



    public function reset_password(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        // Attempt to find the user in AgentRegistrationMaster
        $user = AgentRegistrationMaster::where('email', $request->email)->first();

        // If the user is not found in AgentRegistrationMaster, attempt to find in EmployeeRegistrationMaster
        if (!$user) {
            $user = EmployeeRegistrationMaster::where('email', $request->email)->first();
        }

        if (!$user) {
            return response()->json(['error' => 'User not found.'], 404);
        }

        // Generate a random 6-digit OTP
        $otp = str_pad(rand(0, 9999), 4, '0', STR_PAD_LEFT);

        // Optional: Save the OTP to the user's record

        // Send the OTP to the user's email
        Mail::send('panel.forget_password_email', ['otp' => $otp], function ($message) use ($request) {
            $message->to($request->email)->subject('Password Reset OTP');
            $message->from('yashdhokane890@gmail.com', 'Nile Properties');
        });

        return response()->json([
            'status' => true,
            'message' => 'OTP sent to your email.',
            'otp' => $otp,
            'email' => $request->email,
        ], 200);
    }



    public function set_password(Request $request)
    {
        // Validate request fields
        $request->validate([
            'password' => 'required|min:6', // Minimum password length of 6 characters
            'confirm_password' => 'required|same:password', // Ensure confirm_password matches password
            'email' => 'required|email', // Ensure email is provided
        ]);

        // Attempt to find the user in AgentRegistrationMaster
        $user = AgentRegistrationMaster::where('email', $request->email)->first();

        // If the user is not found in AgentRegistrationMaster, attempt to find in EmployeeRegistrationMaster
        if (!$user) {
            $user = EmployeeRegistrationMaster::where('email', $request->email)->first();
        }

        if ($user) {
            // Hash the password
            $newPassword = Hash::make($request->password);

            // Update user's password
            $user->password = $newPassword;
            $user->save();

            return response()->json(['status' => true, 'message' => 'Password updated successfully!'], 200);
        } else {
            return response()->json(['status' => false, 'error' => 'User not found.'], 404);
        }
    }


    public function get_occupation()
    {
        // Retrieve all projects from the ProjectEntry model
        $occupation = Occupation::all();

        // Return the projects in a JSON response
        return response()->json([
            'status' => true,
            'data' => $occupation,
            'message' => 'Occupation retrieved successfully!',
        ], 200);
    }

    public function get_projects()
    {
        // Retrieve all projects from the ProjectEntry model
        $projects = ProjectEntry::all();

        // Return the projects in a JSON response
        return response()->json([
            'status' => true,
            'data' => $projects,
            'message' => 'Projects retrieved successfully!',
        ], 200);
    }

    public function get_plots(Request $request)
    {
        $request->validate([
            'project_id' => 'required|',
        ]);

        $plots = ProjectEntryAppendData::where('project_entry_id', $request->project_id)->get();

        return response()->json([
            'status' => true,
            'data' => $plots,
            'message' => 'Plots retrieved successfully!',
        ], 200);
    }

    public function get_plot_status()
    {
        // Retrieve all data from the PlotSaleStatus model
        $plotStatuses = PlotSaleStatus::all();

        // Return the data in a JSON response
        return response()->json([
            'status' => true,
            'data' => $plotStatuses,
            'message' => 'Plot statuses retrieved successfully!',
        ], 200);
    }


    public function get_client()
    {
        $client = CustomerRegistrationMaster::all();
        return response()->json([
            'status' => true,
            'data' => $client,
            'message' => 'Clients retrieved successfully!',
        ], 200);
    }

    public function client_store(Request $request)
    {
        // Validate the request data
        $request->validate([
            // 'name' => 'required|string|max:255',
            // 'email' => 'required|email|unique:clients,email',
            // 'contact' => 'required|string|max:15',
            // 'occupation_id' => 'required|integer',
            // 'city' => 'required|string|max:255',
            // 'address' => 'required|string|max:255',
            // 'pincode' => 'required|string|max:10',
            // 'dob' => 'required|date',
            // 'age' => 'required|integer',
            // 'marriage_date' => 'nullable|date',
            // 'branch' => 'required|string|max:255',
        ]);
        // $dobi = Carbon::createFromFormat('d-m-Y', $request->dob)->format('Y-m-d');
        //  $marriage_datei = Carbon::createFromFormat('d-m-Y', $request->marriage_date)->format('Y-m-d');

        // Create a new Client instance and save the data
        $client = new CustomerRegistrationMaster;
        $client->name = $request->name;
        $client->email = $request->email;
        $client->contact = $request->contact;
        $client->occupation_id = $request->occupation_id;
        $client->city = $request->city;
        $client->address = $request->address;
        $client->pincode = $request->pincode;
        $client->dob = $request->dob;
        $client->age = $request->age;
        $client->marriage_date = $request->marriage_date;
        $client->branch = $request->branch;
        $client->save();

        // Return a JSON response indicating success
        return response()->json([
            'status' => true,
            'data' => $client,
            'message' => 'Client created successfully!',
        ], 201);
    }
    public function store_enquiry(Request $request)
    {
        // Validate the request data
        $request->validate([
            // 'status_id' => 'required|integer',
            // 'project_id' => 'required|integer',
            // 'plot_no' => 'required|string|max:255',
            // 'client_id' => 'required|integer',
            // 'client_status' => 'required|string|max:255',
            // 'remark' => 'nullable|string|max:255',
            // 'lead_type' => 'required|string|max:255',
            // 'follow_up_date' => 'required|date_format:d-m-Y',
            // 'date' => 'required|date_format:d-m-Y',
        ]);

        // Convert dates to the proper format
        // $followUpDate = Carbon::createFromFormat('d-m-Y', $request->follow_up_date)->format('Y-m-d');
        //$date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        // Create a new Enquiry instance and save the data
        $enquiry = new Enquiry;
        $enquiry->status_id = $request->status_id;
        $enquiry->project_id = $request->project_id;
        $enquiry->plot_no = $request->plot_no;
        $enquiry->client_id = $request->client_id;
        $enquiry->client_status = $request->client_status;
        $enquiry->remark = $request->remark;
        $enquiry->lead_type = $request->lead_type;
        $enquiry->follow_up_date = $request->follow_up_date;
        $enquiry->date = $request->date;
        $enquiry->broker_id = $request->broker_id;

        $enquiry->save();

        // Return a JSON response indicating success
        return response()->json([
            'status' => true,
            'data' => $enquiry,
            'message' => 'Enquiry created successfully!',
        ], 201);
    }


    public function get_enquiry_by_broker_id(Request $request)
    {
        $request->validate([
            'broker_id' => 'required|',
        ]);

        $broker_id = $request->input('broker_id');

        $enquiries = Enquiry::where('broker_id', $broker_id)->get();

        return response()->json([
            'status' => true,
            'data' => $enquiries,
            'message' => 'Enquiries retrieved successfully!',
        ], 200);
    }


    public function get_enquiry_by_broker_and_date(Request $request)
    {
        $request->validate([
            'broker_id' => 'required|',
            'from_date' => 'required|',
            'to_date' => 'required|',
        ]);

        $broker_id = $request->input('broker_id');
        $from_date = Carbon::createFromFormat('Y-m-d', $request->input('from_date'))->startOfDay();
        $to_date = Carbon::createFromFormat('Y-m-d', $request->input('to_date'))->endOfDay();

        $enquiries = Enquiry::with('status_name', 'project_name', 'client_name')->where('broker_id', $broker_id)
            ->whereBetween('created_at', [$from_date, $to_date])
            ->get();

        return response()->json([
            'status' => true,
            'data' => $enquiries,
            'message' => 'Enquiries retrieved successfully!',
        ], 200);
    }

    public function update_enquiry(Request $request)
    {
        $request->validate([
            // 'enquiry_id' => 'required|integer',
            // 'broker_id' => 'required|integer',
            // 'status_id' => 'required|integer',
            // 'project_id' => 'required|integer',
            // 'plot_no' => 'required|string|max:255',
            // 'client_id' => 'required|integer',
            // 'client_status' => 'required|string|max:255',
            // 'remark' => 'nullable|string|max:255',
            // 'lead_type' => 'required|string|max:255',
            // 'follow_up_date' => 'required|date_format:d-m-Y',
            // 'date' => 'required|date_format:d-m-Y',
        ]);

        $enquiry_id = $request->input('enquiry_id');

        $enquiry = Enquiry::find($enquiry_id);

        if (!$enquiry) {
            return response()->json(['status' => false, 'message' => 'Enquiry not found.'], 404);
        }

        $followUpDate = Carbon::createFromFormat('d-m-Y', $request->follow_up_date)->format('Y-m-d');
        $date = Carbon::createFromFormat('d-m-Y', $request->date)->format('Y-m-d');

        $enquiry->status_id = $request->status_id;
        $enquiry->project_id = $request->project_id;
        $enquiry->plot_no = $request->plot_no;
        $enquiry->client_id = $request->client_id;
        $enquiry->client_status = $request->client_status;
        $enquiry->remark = $request->remark;
        $enquiry->lead_type = $request->lead_type;
        $enquiry->follow_up_date = $followUpDate;
        $enquiry->date = $date;
        $enquiry->save();

        return response()->json([
            'status' => true,
            'data' => $enquiry,
            'message' => 'Enquiry updated successfully!',
        ], 200);
    }
    public function delete_enquiry(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required|',
        ]);

        $enquiry_id = $request->input('enquiry_id');

        $enquiry = Enquiry::find($enquiry_id);

        if (!$enquiry) {
            return response()->json(['status' => false, 'message' => 'Enquiry not found.'], 404);
        }

        $enquiry->delete();

        return response()->json([
            'status' => true,
            'message' => 'Enquiry deleted successfully!',
        ], 200);
    }
    public function edit_enquiry(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required|',
        ]);

        $enquiry = Enquiry::where('id', $request->enquiry_id)->first();

        return response()->json([
            'status' => true,
            'data' => $enquiry,
            'message' => 'Enquiry retrieved successfully!',
        ], 200);
    }





}
