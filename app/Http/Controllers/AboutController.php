<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\About;

class AboutController extends Controller
{
    public function index()
    {
        $about_data = About::first();

        // To show data base data into controller (is stored in about_data variable or not)
        // echo json_encode($about_data);
        // exit();
        return view('frontend.about', compact('about_data'));
    }

    public function update(Request $request)
    {

        //dd($request);
        $edit = About::find($request->id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = rand(0000, 8888) . time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $edit->image = $filename;
        }
        $edit->text = $request->text;
        $edit->save();




        return redirect()->route('user.about')->with(['success' => 'About section updated successfully']);

    }


}