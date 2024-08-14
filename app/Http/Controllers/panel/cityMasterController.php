<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Master;

class cityMasterController extends Controller
{
    public function index()
    {

        return view('panel.city_master');
    }

    public function city_master(Request $request)
    {

        $master = new Master([
            'city' => $request->input('city'),
            'occupation' => $request->input('occupation'),
            'layout_feature' => $request->input('occupation'),
            'plot_sale_status' => $request->input('plot_sale_status'),
            'transaction_type' => $request->input('transaction_type'),

        ]);

        $master->save();

        return redirect()->route("cityMaster")->with('success', 'City added successfully.');

    }







}
