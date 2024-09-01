<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\AgentRegistrationMaster;
use Illuminate\Http\Request;

class MyDownline extends Controller
{
    public function downlineindex()
    {
        $first_level = AgentRegistrationMaster::where('parent_id',NULL)->get();
        return view('panel.my_downline',compact('first_level'));
    }
    public function positionindex()
    {
        return view('panel.my_position');
    }
    public function downlinebuisnessindex()
    {
        return view('panel.downline_buisness');
    }

    function get_downline_list(Request $request){
        // echo json_encode($request->id);
        $downline_list=AgentRegistrationMaster::
        where('parent_id',$request->id)->get();
        // echo json_encode($downline_list);
        $view=view('panel.view_downline_list',compact('downline_list'))->render();
        return response()->json($view);
    }
}