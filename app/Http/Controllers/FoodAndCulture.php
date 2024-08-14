<?php

namespace App\Http\Controllers;

use App\Models\Heroes;
use Illuminate\Http\Request;
use App\Models\FoodAndCultureModel;

class FoodAndCulture extends Controller
{
    public function FoodAndCulture()
    {
        $FoodAndCulture = FoodAndCultureModel::orderBy('created_at', 'desc')->get();
        return view('frontend.food_culture_adminpanel', compact('FoodAndCulture'));
    }


    public function FoodAndCultureStore(Request $request)
    {

        // dd($request->all());
        $request->validate([
           

        ]);

         $filename = null;

        // Check if an image file is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
        }



        $data = [
            'image' => $filename,
            'title' => $request->input('title'),
            'text' => $request->input('text'),

        ];
        $FoodAndCulturestore = FoodAndCultureModel::create($data);



        $FoodAndCulturestore->save();

        return redirect(route('user.FoodAndCulture'))->with('success', 'Record created successfully');

    }

    public function FoodAndCultureDetails(Request $request)
    {

        $FoodAndCultureDetail = FoodAndCultureModel::find($request->entry_id);


        $view = view('frontend.food_culture_details', compact('FoodAndCultureDetail'))->render();

        return response()->json($view);
    }
    public function destroyFoodAndCulture($id)
    {
        $foodAndCulture = FoodAndCultureModel::find($id);

        if (!$foodAndCulture) {
            return redirect(route('user.FoodAndCulture'))->with('error', 'Record not found');
        }

        $foodAndCulture->delete();

        return redirect(route('user.FoodAndCulture'))->with('success', 'Record deleted successfully');
    }


    public function edit($id)
    {
        $food = FoodAndCultureModel::find($id);


        if (!$food) {
            return redirect(route('user.FoodAndCulture'))->with('error', 'Record not found');
        }

        return view('frontend.edit_foodand_and_culture', compact('food'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            
        ]);

        $foodAndCulture = FoodAndCultureModel::find($id);


        if (!$foodAndCulture) {
            return redirect(route('user.FoodAndCulture'))->with('error', 'Record not found');
        }

        // Update image if a new one is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $foodAndCulture->image = $filename;
        }

        $foodAndCulture->title = $request->input('title');
        $foodAndCulture->text = $request->input('text');
        $foodAndCulture->save();

        return redirect(route('user.FoodAndCulture'))->with('success', 'Record updated successfully');
    }
}
