<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyDownline extends Controller
{
    public function downlineindex()
    {
        return view('panel.my_downline');
    }
    public function positionindex()
    {
        return view('panel.my_position');
    }
    public function downlinebuisnessindex()
    {
        return view('panel.downline_buisness');
    }

    

}