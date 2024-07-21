<?php

namespace App\Http\Controllers;

use App\Models\CompetitionModel;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function Competition()
    {
        $Competition = CompetitionModel::orderBy('created_at', 'desc')->get();
        return view('frontend.competition_adminpanel', compact('Competition'));
    }


    public function CompetitionStore(Request $request)
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
        $FoodAndCulturestore = CompetitionModel::create($data);



        $FoodAndCulturestore->save();

        return redirect(route('user.Competition'))->with('success', 'Record created successfully');

    }

    public function CompetitionDetails(Request $request)
    {

        $CompetitionDetails = CompetitionModel::find($request->entry_id);


        $view = view('frontend.CompetitionDetails', compact('CompetitionDetails'))->render();

        return response()->json($view);
    }
    public function destroyCompetition($id)
    {
        $Competition = CompetitionModel::find($id);

        if (!$Competition) {
            return redirect(route('user.Competition'))->with('error', 'Record not found');
        }

        $Competition->delete();

        return redirect(route('user.Competition'))->with('success', 'Record deleted successfully');
    }


    public function edit($id)
    {
        $Competition = CompetitionModel::find($id);


        if (!$Competition) {
            return redirect(route('user.Competition'))->with('error', 'Record not found');
        }

        return view('frontend.edit_Competition', compact('Competition'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

        ]);

        $Competition = CompetitionModel::find($id);


        if (!$Competition) {
            return redirect(route('user.Competition'))->with('error', 'Record not found');
        }

        // Update image if a new one is provided
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $Competition->image = $filename;
        }

        $Competition->title = $request->input('title');
        $Competition->text = $request->input('text');
        $Competition->save();

        return redirect(route('user.Competition'))->with('success', 'Record updated successfully');
    }
}
