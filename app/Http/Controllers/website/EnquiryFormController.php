<?php

namespace App\Http\Controllers\website;


use Mail;
use App\Models\User;
use App\Models\EnquiryForm;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
// use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerRegistrationMaster;


class EnquiryFormController extends Controller
{
    // to store enquiry form
    public function enquiry_form(Request $request, $id)
    {


        // If the user is not authenticated, validate the fields
        if (!Auth::check()) {
            $validateData = $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'contact' => 'required',
            ]);

            // Check if a user with the provided email already exists
            $existingUser = User::where('email', $request->email)->first();

            if (!$existingUser) {
                // Create a new user if not exists
                $newUser = new User;
                $newUser->name = $request->name;
                $newUser->email = $request->email;
                $newUser->contact = $request->contact;

                // Generate a random password
                $password = Str::random(8); // You can adjust the length of the password as needed

                // Set the user's password
                $newUser->password = Hash::make($password);

                // Save the user
                $newUser->save();

                $customer = new CustomerRegistrationMaster;
                $customer->user_id = $newUser->id;
                $customer->save();

                // Now, you can send the password to the user's email
                // You may use Laravel's Mail functionality or any email service of your choice
                // For simplicity, let's assume you are using Laravel's built-in mail function
                // You need to set up your mail configuration in config/mail.php


                Mail::send('website.welcome_email', ['validateData' => $validateData, 'password' => $password,], function ($message) use ($validateData) {
                    $message->to($validateData['email'], 'user')->subject('Welcome to Nile Properties');
                    $message->from('yashdhokane890@gmail.com', 'Nile Properties');
                });
            }
        }

        $enquiry = new EnquiryForm;
        $enquiry->project_id = $id;

        // If the user is authenticated, populate the fields from the authenticated user
        if (Auth::check()) {

            $authenticatedUser = Auth::user();

            // Send the thanks email to the authenticated user
            Mail::send('website.thanks_email', ['authenticatedUser' => $authenticatedUser, 'enquiry' => $enquiry], function ($message) use ($authenticatedUser) {
                $message->to($authenticatedUser->email, 'user')->subject('Thank You for Your Plot Inquiry');
                $message->from('yashdhokane890@gmail.com', 'Nile Properties');
            });


            $enquiry->name = Auth::user()->name;
            $enquiry->email = Auth::user()->email;
            $enquiry->contact = Auth::user()->contact;
        } else {
            // If the user is not authenticated, use the data from the request
            $enquiry->name = $request->name;
            $enquiry->email = $request->email;
            $enquiry->contact = $request->contact;
        }

        $enquiry->plot_id = $request->plot_id;
        $enquiry->message = $request->message;
        $enquiry->client_status = 'New_client';
        $enquiry->save();


        // Send an email notification to the admin
        Mail::send('website.admin_email', ['enquiry' => $enquiry], function ($message) {
            $message->to('yashdhokane890@gmail.com', 'Admin')->subject('New Enquiry Form Submission');
            $message->from('yashdhokane890@gmail.com', 'Nile Properties');
        });



        return redirect()->route('listing-details', ['id' => $id])->with('success', 'Form Submitted Successfully');
    }

}
