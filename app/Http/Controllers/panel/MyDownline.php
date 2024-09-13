<?php

namespace App\Http\Controllers\panel;
use Carbon\Carbon;

use App\Http\Controllers\Controller;
use App\Models\AgentRegistrationMaster;
use Illuminate\Http\Request;
use App\Models\CommisionSlab;
use App\Models\PlotTransaction;

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
   public function downlinebuisnessindex(Request $request)
{
    $level = CommisionSlab::get();

    $profile = $request->input('profile');

    // Replace underscores with spaces
    $profile = str_replace('_', ' ', $profile);
    $agent = AgentRegistrationMaster::where('profile',$profile)->select('id','name')->get();

    $fromDate = $request->input('from_date');
    $toDate = $request->input('to_date');
    $agent_id = $request->input('agent_id');

    // Convert dates from 'd-m-Y' format to 'Y-m-d'
    if ($fromDate) {
        $fromDate = Carbon::createFromFormat('d-m-Y', $fromDate)->format('Y-m-d');
    }

    if ($toDate) {
        $toDate = Carbon::createFromFormat('d-m-Y', $toDate)->format('Y-m-d');
    }

    // Query to fetch plot transactions based on provided filters
    $query = PlotTransaction::select('plot_transactions.*');

    if ($fromDate && $toDate) {
        $query->whereDate('created_at', '>=', $fromDate)
              ->whereDate('created_at', '<=', $toDate);
    }

    if ($agent_id) {
        $query->where('agent_id', $agent_id);
    }

    $business = $query->groupBy('agent_id')->get();

    return view('panel.downline_buisness', compact('level', 'business','agent'));
}

    function get_downline_list(Request $request){
        // echo json_encode($request->id);
        $downline_list=AgentRegistrationMaster::
        where('parent_id',$request->id)->get();
        // echo json_encode($downline_list);
        $view=view('panel.view_downline_list',compact('downline_list'))->render();
        return response()->json($view);
    }

    public function get_agent_by_profile(Request $request)
{
    // Get the profile value from the request
    $profile = $request->input('profile');

    // Replace underscores with spaces
    $profile = str_replace('_', ' ', $profile);

    // Fetch data based on the modified profile name
    $result = AgentRegistrationMaster::where('profile', $profile)
                                   ->orderby('name', 'asc')
                                   ->get();

    // Return the data as JSON
    return response()->json($result);
}

function get_business(Request $request){
    // echo json_encode($request->id);
    $get_business=PlotTransaction::join('initial_enquiries_clients','initial_enquiries_clients.id','=','plot_transactions.initial_enquiry_id')
    ->join('projectentry','projectentry.id','=','initial_enquiries_clients.project_id')
    ->join('project_entry_append_data','project_entry_append_data.id','=','initial_enquiries_clients.plot_no')
    ->where('plot_transactions.agent_id',$request->id)
    ->select('plot_transactions.*','projectentry.project_name','project_entry_append_data.plot_no')
    ->get();  
    // echo json_encode($get_business);
    $view=view('panel.view_business',compact('get_business'))->render();
    return response()->json($view);
}



}