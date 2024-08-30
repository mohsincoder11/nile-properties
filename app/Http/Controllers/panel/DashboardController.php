<?php

namespace App\Http\Controllers\panel;

use App\Models\User;
use App\Models\EnquiryForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\FirmRegistrationMaster;
use App\Models\LandRegistrationMaster;
use App\Models\AgentRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;


class DashboardController extends Controller
{

    // public function userCheck(Request $request)
    // {
    //     // dd($request->all());
    //     $email = $request->input('email');
    //     $password = $request->input('password');

    //     // Check in each model
    //     $models = [
    //         AgentRegistrationMaster::class,
    //         EmployeeRegistrationMaster::class,
    //         FirmRegistrationMaster::class,
    //         LandRegistrationMaster::class,
    //         User::class
    //     ];

    //     foreach ($models as $model) {
    //         $user = $model::where('email', $email)->first();
    //         if ($user && Hash::check($password, $user->password)) {
    //             // Authentication successful, redirect to dashboard
    //             Auth::login($user);
    //             return redirect()->route('dashboard');
    //         }
    //     }

    //     // Authentication failed, redirect back with an error message
    //     return redirect()->back()->with('error', 'Invalid credentials');
    // }

    public function userCheck(Request $request)
{
    $email = $request->input('email');
    $password = $request->input('password');

    // Only check in the User model
    $user = User::where('email', $email)->first();

    if ($user && Hash::check($password, $user->password)) {
        // Authentication successful, redirect to dashboard
        Auth::login($user);
        return redirect()->route('dashboard');
    }

    // Authentication failed, redirect back with an error message
    return redirect()->back()->with('error', 'Invalid credentials');
}


    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
    public function dashboard()
    {
        $enquiry = EnquiryForm::all();
        return view('panel.dashboard', ['enquiry' => $enquiry]);
    }

    public function home()
    {
        $enquiry = EnquiryForm::all();
        return view('panel.dashboard', ['enquiry' => $enquiry]);
    }


    public function destroyDash($id)
    {
        $enquiry = EnquiryForm::find($id);
        if ($enquiry) {
            $enquiry->delete();
            return redirect(route('dashboard'))->with('success', 'Enquiry Deleted Successfully');
        }

    }
}
