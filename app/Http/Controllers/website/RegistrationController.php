<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Mail;


class RegistrationController extends Controller
{
    public function storeRegistration(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email',
                'contact' => 'required',
                'password' => 'required',
            ]);

            $hashedPassword = Hash::make($validatedData['password']);

            $registration = new User;
            $registration->name = $validatedData['name'];
            $registration->email = $validatedData['email'];
            $registration->contact = $validatedData['contact'];
            $registration->password = $hashedPassword;
            $registration->save();

            Mail::send('website.welcome_email_registration', ['validateData' => $validatedData], function ($message) use ($validatedData) {
                $message->to($validatedData['email'], 'user')->subject('Welcome to Nile Properties');
                $message->from('yashdhokane890@gmail.com', 'Nile Properties');
            });

            Auth::login($registration);

            return response()->json(['success' => 'Registration Successful.'], 200);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Registration failed. Please try again.'], 500);
        }
    }



    // public function login(Request $request)
// {
//     // dd($request->all());
//     $name = $request->input('name');
//     $password = $request->input('password');
//     $user = User::where('name', $name)->first();

    //     if ($user && password_verify($password, $user->password)) {
//         // Credentials are correct, you can redirect to a different view or perform some actions here.
//         // $Home = Home::all();
//         return redirect()->back()->with('success', 'Registration Successfull.');

    //         // return view('website.index');
//     } else {
//         // Incorrect username or password, show an error message.
//         // return view('website.index')->with('error', 'Incorrect username or password');
//         return redirect()->back()->with('error', 'Incorrect username or password');

    //     }
// }

    // public function login(Request $request)
// {
//     $name = $request->input('name');
//     $password = $request->input('password');
//     $user = User::where('name', $name)->first();

    //     if ($user && password_verify($password, $user->password)) {
//         return response()->json(['success' => true, 'username' => $user->name]);
//     } else {
//         return response()->json(['Error' => false, 'message' => 'Incorrect username or password']);
//     }
// }

    // public function login(Request $request)
// {
//     $email = $request->input('email');
//     $password = $request->input('password');
//     $user = User::where('email', $email)->first();

    //     if ($user && password_verify($password, $user->password)) {
//         return redirect()->back()->with('username', $user->email);
//     } else {
//         return redirect()->back()->with('error', 'Incorrect username or password');
//     }
// }

    // public function login(Request $request)
// {
//     $credentials = $request->only('email', 'password');

    //     // dd($request->all());

    //     if (Auth::attempt($credentials)) {
//         // Authentication passed...

    //         $user = Auth::user();

    //      return redirect()->back()->with('username', $user->email);

    //     } else {
//         // Incorrect username or password, show an error message.
//         return redirect()->back()->with(['error' => 'Incorrect username or password']);
//     }
// }

    public function login(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'email' => 'required|email',
                'password' => 'required',
            ]);

            $credentials = $request->only('email', 'password');

            if (Auth::attempt($credentials)) {
                return response()->json(['success' => 'Login successful.'], 200);
            } else {
                return response()->json(['error' => 'Incorrect email or password.'], 401);
            }
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(['errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            return response()->json(['error' => 'An error occurred. Please try again.'], 500);
        }
    }




    public function send_mobile_verify_otp(Request $request)
    {
        $contact = $request->input('contact');

        // Check if the mobile number exists in the database
        $user = User::where('contact', $contact)->first();


        if ($user) {
            // Mobile number exists, proceed to send OTP
            $otp = rand(1000, 9999);
            $name = 'Sir/Mam';
            $msg = 'Dear ' . $name . ', Your OTP is ' . $otp . '. Send
       by WEBMEDIA';
            $msg = urlencode($msg);
            // $to = $request->contact;

            $data1 = "uname=habitm1&pwd=habitm1&senderid=WMEDIA&to=" .
                $contact . "&msg=" . $msg .
                "&route=T&peid=1701159196421355379&tempid=1707161527969328476";
            $ch = curl_init('http://bulksms.webmediaindia.com/sendsms?');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            // return response()->json($otp);

            // Store the OTP in the session for later verification
//  session(['otp' => $otp]);

            //  return response()->json(['otp' => $otp]);
            session(['otp' => $otp, 'userId' => $user->id]);

            // Return the response with OTP and userId
            return response()->json(['otp' => $otp, 'userId' => $user->id]);
        } else {
            // Mobile number does not exist
            return response()->json(['error' => 'Mobile number not found']);
        }

    }

    // to check mobile number is exist in database or not
    public function checkMobileExistence(Request $request)
    {
        $contact = $request->input('contact');

        // Check if the mobile number exists in the database
        $user = User::where('contact', $contact)->first();

        if ($user) {
            // Mobile number exists, return user ID
            return response()->json(['exists' => true, 'userId' => $user->id]);
        } else {
            // Mobile number does not exist
            return response()->json(['exists' => false, 'error' => 'Mobile number not found']);
        }
    }


    public function verify_otp(Request $request)
    {
        $enteredOtp = $request->input('enteredOtp');
        $otp = session('otp'); // Retrieve the stored OTP from the session

        $isValid = ($enteredOtp == $otp);

        return response()->json(['valid' => $isValid]);
    }

    public function update_password(Request $request)
    {
        // Retrieve the user ID from the session
        $userId = session('userId');

        // Find the user by ID or any identifier
        $user = User::find($userId);

        if ($user) {
            // Update the user's password

            if ($request->input('newPassword') === $request->input('confirmPassword')) {
                $user->password = bcrypt($request->input('newPassword'));
                $user->save();

                // return response()->json(['success' => true]);
                return redirect()->back()->with('success', 'Password Updated Successfully...');

            } else {
                return redirect()->back()->with('error', 'Passwords do not match');
            }
        } else {
            return response()->json(['error' => 'User not found']);
        }
    }




    public function logout()
    {
        Auth::logout();

        // return redirect('/');

        return redirect()->back();
    }

}
