<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stories;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StoriesImport;

class StoriesController extends Controller
{
    public function index()
    {
        $Stories1 = Stories::first();
$Stories = Stories::orderBy('created_at', 'desc')->get();
        return view('frontend.stories', compact('Stories', 'Stories1'));
    }


    public function store(Request $request)
    {
        $request->validate([

        ]);
        $file = $request->file('image');
        $filename = null;

        if ($file) {
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
        }



        $data = [
            'image' => $filename,
            'title' => $request->input('title'),
            'author' => $request->input('author'),
            'artist' => $request->input('artist'),
            'text' => $request->input('text'),
        ];

        $newStories = Stories::create($data);

        return redirect(route('user.stories'))->with('success', 'Story added successfully');
        ;
    }


    public function destroyStories($id)
    {
        Stories::find($id)->delete();

        return redirect(route('user.stories'))->with('success1', 'Story deleted successfully');

    }


    // In your controller, create the method to fetch story details
    public function getStoryDetails(Request $request)
    {



        $Stories = Stories::where('id', $request->entry_id)
            ->get();

        // $proreport=$proreport->get();
        //   $render_view= view('promotor_sale_summary',compact('proreport'))->render();
        // echo json_encode($proreport);
        // exit();resources\views\frontend\story_details.blade.php
        $render_view = view('frontend.story_details', compact('Stories'))->render();
        // return response()->json(['proreport'=>$proreport]);
        return response()->json($render_view);
    }


    public function edit($id)
    {
        $Stories1 = Stories::findOrFail($id);
        $story = Stories::findOrFail($id);

        return view('frontend.stories_edit', compact('story', 'Stories1'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            // 'image' => 'required',
            // 'title' => 'required',
            // 'author' => 'required|regex:/^[\pL\s\-]+$/u|max:255|unique:users,name,' . $id,
            // 'artist' => 'required|regex:/^[\pL\s\-]+$/u|max:255|unique:users,name,' . $id,
            // 'text' => 'required',
        ]);

        $story = Stories::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $story->image = $filename;
        }

        $story->title = $request->input('title');
        $story->author = $request->input('author');
        $story->artist = $request->input('artist');
        $story->text = $request->input('text');

        $story->save();

        return redirect(route('user.stories'))->with('success', 'Story updated successfully');
    }


    public function fileImport(Request $request)
    {
        Excel::import(new StoriesImport, $request->file('file')->store('temp'));

        return back()->with('success', 'Stories created successfully');
    }



}
