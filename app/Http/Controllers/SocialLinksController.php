<?php

namespace App\Http\Controllers;


use App\Models\About;
use App\Models\SocialLinks;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SocialLinksController extends Controller
{
    public function index()
    {
        $social_data = SocialLinks::first();

        // To show data base data into controller (is stored in about_data variable or not)
        // echo json_encode($about_data);
        // exit();

        return view('frontend.social-links', compact('social_data'));
    }

    public function update1(Request $request)
    {

        //dd($request);



        $filename = '';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
        }


        About::where('id', $request->id)->update(
            [
                'image' => $filename,
                'text' => $request->text,
            ]
        );

        return redirect()->route('user.socialLinks')->with(['success' => 'Social link updated successfully ']);
    }


    // ------------------------------------------------------------------------------------------------------


    public function update(Request $request)
    {
        // Validation rules
        $rules = [
            'facebook' => 'required|url|unique:social_links,facebook',
            'instagram' => 'required|url|unique:social_links,instagram',
            'linkedin' => 'required|url|unique:social_links,linkedin',
        ];

        // Custom error messages
        // $messages = [
        //     'contactNo.digits' => 'The contact number must be exactly 10 digits.',
        //     'contactNo.max' => 'The contact number must not exceed 10 digits.',
        // ];

        // Validate the request
        $validator = Validator::make($request->all(), $rules);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->route('user.socialLinks') // Replace 'your.form.route' with the actual route name
                ->withErrors($validator)
                ->withInput();
        }

        SocialLinks::where('id', $request->id)->update(
            [
                'facebook' => $request->facebook,
                'instagram' => $request->instagram,
                'linkedin' => $request->linkedin,
            ]
        );


        return redirect()->route('user.socialLinks')->with(['success' => 'Social Link updated successfully']);
    }


}