<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meet;


class MeetsController extends Controller
{
    public function index()
    {

       $Meet = Meet::orderBy('created_at', 'desc')->get();

        return view('frontend.meets', ['Meet' => $Meet]);
    }


    public function meetStore(Request $request)
    {

        //    dd($request->all());
        $data = $request->validate([
            'title' => 'required',
            'url' => 'active_url',

        ]);

        $newMeet = Meet::create($data);
        // $newAmount = donation::create([
        //     'add_amount'=>$request->amount
        // ]);

        return redirect(route('user.meets'))->with('success', 'Video link added successfully!');
        ;
    }


    public function meetDestroy($id)
    {
        Meet::find($id)->delete();

        return redirect(route('user.meets'))->with('success1', 'Video link deleted successfully!');

    }
}
