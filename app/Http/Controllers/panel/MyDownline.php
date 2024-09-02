<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\Models\AgentRegistrationMaster;
use Illuminate\Http\Request;
use App\Models\CommisionSlab;

class MyDownline extends Controller
{
    public function downlineindex()
    {
        $first_level = AgentRegistrationMaster::get();
        return view('panel.my_downline',compact('first_level'));
    }
    public function positionindex()
    {
        $my_position = AgentRegistrationMaster::get();
        return view('panel.my_position',compact('my_position'));
    }
    public function downlinebuisnessindex()
    {
        $level = CommisionSlab::get();
        return view('panel.downline_buisness',compact('level'));
    }

    function get_downline_list(Request $request){
        // echo json_encode($request->id);
        $downline_list=AgentRegistrationMaster::
        where('parent_id',$request->id)->get();
        // echo json_encode($downline_list);
        $view=view('panel.view_downline_list',compact('downline_list'))->render();
        return response()->json($view);
    }

    function get_agent_by_profile(Request $request){

        $data=AgentRegistrationMaster::where('profile',$request->profile)->orderby('name','asc')->get();
        return response()->json($data);
        
    }
}