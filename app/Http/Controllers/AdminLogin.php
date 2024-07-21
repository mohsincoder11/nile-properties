<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminLogin extends Controller
{


    public function AdminLogin()
    {
        return view('frontend.login');
    }
    public function AdminLoginCheck(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');


        $admin = DB::table('users')->where('email', $email)->first();

        if ($admin && Hash::check($password, $admin->password)) {

            return redirect()->route('user.dashboard');
        }

        return redirect()->back()->with('error', 'Invalid email or password');
    }

  public function AdminLogout()
{
    // Add a flash message before logout
    session()->flash('success', 'Logout successful.');

    // Perform the logout
    Auth::logout();

    // Redirect to the login page
    return redirect()->route('userAdminLogin');
}


}