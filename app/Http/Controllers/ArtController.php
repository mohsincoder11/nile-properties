<?php

namespace App\Http\Controllers;

use App\Models\ArtModel;
use Illuminate\Http\Request;

class ArtController extends Controller
{
    public function Art()
    {
        $Art = ArtModel::orderBy('created_at', 'desc')->get();

        return view('frontend.art_adminpanel', compact('Art'));
    }


    public function Artstore(Request $request)
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
        $Artstore = ArtModel::create($data);



        $Artstore->save();

        return redirect(route('user.Art'))->with('success', 'Record created successfully');

    }

    public function ArtDetails(Request $request)
    {

        $ArtDetail = ArtModel::find($request->entry_id);


        $view = view('frontend.art_details_adminpanel', compact('ArtDetail'))->render();

        return response()->json($view);
    }
    public function destroyArt($id)
    {
        $ArtDetail = ArtModel::find($id);

        if (!$ArtDetail) {
            return redirect(route('user.Art'))->with('error', 'Record not found');
        }

        $ArtDetail->delete();

        return redirect(route('user.Art'))->with('success', 'Record deleted successfully');
    }

    public function edit($id)
    {
        $art = ArtModel::findOrFail($id);
        return view('frontend.art_edit', compact('art'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'text' => 'required',
        ]);

        $art = ArtModel::findOrFail($id);

        // Update text and title
        $art->title = $request->input('title');
        $art->text = $request->input('text');

        // Update image if a new one is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $art->image = $filename;
        }

        $art->save();

        return redirect()->route('user.Art')->with('success', 'Record updated successfully');
    }

}
