<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrintColor;
use Illuminate\Support\Facades\Validator;


class PrintColorPlayController extends Controller
{
    public function index()
    {
        $PrintColor = PrintColor::orderBy('created_at', 'desc')->get();

        return view('frontend.Printcolor-play', ['PrintColor' => $PrintColor]);

    }




    public function submitprint(Request $request)
    {
        // dd($request->all());

        // Validate the incoming request data
        // $request->validate([
        //     'image' => 'required|image|mimes:jpeg,png,jpg,gif',
        //     'fileimage' => 'required|image|mimes:jpeg,png,jpg,gif',
        // ]);
        // dd("end");
        // Create a new instance of the PrintColor model
        $data = new PrintColor();



        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $image = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $image);
            $data->image = $image;
        }

        if ($request->hasFile('fileimage')) {
            $file = $request->file('fileimage');
            $image = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $image);
            $data->fileimage = $image;
        }

        $data->save();
        // sdd("end");


        return redirect()->route('user.printcolorplay')->with(['success' => 'Image added successfully']);
    }


    public function destroyPrint($id)
    {
        PrintColor::find($id)->delete();

        return redirect(route('user.printcolorplay'))->with('success1', 'Image deleted successfully');

    }


}
