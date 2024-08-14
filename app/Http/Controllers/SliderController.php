<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    public function index()
    {
        $Slider = Slider::all();
        return view('frontend.Slider', ['Slider' => $Slider]);
    }




    // ...

    public function submit_slider(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif',

        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Handle file attachment if provided
        $file = null;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);

            // Create a new slider using the Slider model
            Slider::create([
                'image' => $filename,
            ]);

            session()->flash('success', 'Slider added successfully!');
        }

        return redirect()->route('user.slider');
    }

    public function destroySlider($id)
    {
        Slider::find($id)->delete();

        return redirect(route('user.slider'))->with('success1', 'Slider deleted successfully!');

    }

}