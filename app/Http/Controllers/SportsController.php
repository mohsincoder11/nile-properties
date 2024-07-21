<?php

namespace App\Http\Controllers;

use App\Models\ArtModel;
use App\Models\SportsModel;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    public function Sports()
    {
        $Sports = SportsModel::orderBy('created_at', 'desc')->get();
        return view('frontend.sports_adminpanel', compact('Sports'));
    }


    public function Sportstore(Request $request)
    {

        // dd($request->all());
        $request->validate([
         
            'text' => 'required',

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
        $Sportsstore = SportsModel::create($data);



        $Sportsstore->save();

        return redirect(route('user.Sport'))->with('success', 'Record created successfully');

    }

    public function SportDetails(Request $request)
    {

        $SportDetails = SportsModel::find($request->entry_id);


        $view = view('frontend.sports_details', compact('SportDetails'))->render();

        return response()->json($view);
    }
    public function destroySport($id)
    {
        $sportDetail = SportsModel::find($id);

        if (!$sportDetail) {
            return redirect(route('user.Sports'))->with('error', 'Record not found');
        }

        $sportDetail->delete();

        return redirect(route('user.Sport'))->with('success', 'Record deleted successfully');
    }


    public function edit($id)
    {
        $sport = SportsModel::findOrFail($id);
        return view('frontend.sport_edit', compact('sport'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
           
        ]);

        $sport = SportsModel::findOrFail($id);

        // Update text and title
        $sport->title = $request->input('title');
        $sport->text = $request->input('text');

        // Update image if a new one is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $sport->image = $filename;
        }

        $sport->save();

        return redirect()->route('user.Sport')->with('success', 'Record updated successfully');
    }





}