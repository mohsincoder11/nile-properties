<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heroes;
use Illuminate\Support\Facades\Validator;

class HeroesLeadersController extends Controller
{
    public function index()
    {
        $Heroes = Heroes::orderBy('created_at', 'desc')->get();
        return view('frontend.heroes-leaders', ['Heroes' => $Heroes]);
    }



    public function heroesStore(Request $request)
    {
        $request->validate([
            // 'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
            'title' => 'required',
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

        $newHeroes = Heroes::create($data);

        return redirect(route('user.heroesLeaders'));
    }



    public function destroyHeroes($id)
    {
        Heroes::find($id)->delete();

        return redirect(route('user.heroesLeaders'))->with('success', 'Hero & Leaders deleted successfully');

    }



    public function getHeroesDetails(Request $request)
    {



        $Heroes = Heroes::where('id', $request->entry_id)
            ->get();


        $render_view = view('frontend.heroes_details', compact('Heroes'))->render();

        return response()->json($render_view);
    }



    public function edit($id)
    {
        $hero = Heroes::findOrFail($id);

        return view('frontend.heroes_edit', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            //'image' => 'required',
            'title' => 'required',
            'text' => 'required',

        ]);

        $hero = Heroes::findOrFail($id);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images/'), $filename);
            $hero->image = $filename;
        }

        $hero->title = $request->input('title');
        $hero->text = $request->input('text');


        $hero->save();

        return redirect(route('user.heroesLeaders'))->with('success', 'Hero & Leaders updated successfully');
    }


}