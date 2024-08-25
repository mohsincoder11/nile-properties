<?php

namespace App\Http\Controllers\panel;

use App\Models\CustomerRegistrationMaster;
use App\Models\Master;
use App\Models\Enquiry;
use App\Models\Occupation;
use App\Models\EnquiryForm;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\PlotSaleStatus;

use App\Http\Controllers\Controller;
use App\Models\ProjectEntryAppendData;
use App\Models\AgentRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;
use Illuminate\Http\JsonResponse; // Update the use statement
// use Illuminate\Http\JsonResponse as BaseJsonResponse;

class EnquiryController extends Controller
{
    public function index()
    {

        $employee = EmployeeRegistrationMaster::all();
        $agent = AgentRegistrationMaster::all();

        $status = PlotSaleStatus::all();
        $project = ProjectEntry::all();
        $plot = ProjectEntryAppendData::all();
        $client = CustomerRegistrationMaster::all();
        $enquiry = Enquiry::get();
        $allPlots = ProjectEntryAppendData::all(['id', 'plot_no']);
        $occupations = Occupation::all();

        return view('panel.enquiry', [
            'status' => $status,
            'project' => $project,
            'allPlots' => $allPlots,
            'plot' => $plot,
            'client' => $client,
            'enquiry' => $enquiry,
            'occupations' => $occupations,
            'employee' => $employee,
            'agent' => $agent,


        ]);
    }

    public function client_store(Request $request)
    {
        // dd($request->all());

        $enquiry = new CustomerRegistrationMaster;
        $enquiry->name = $request->name;
        $enquiry->email = $request->email;
        $enquiry->contact = $request->contact;
        $enquiry->occupation_id = $request->occupation_id;
        $enquiry->city = $request->city;
        $enquiry->address = $request->address;
        $enquiry->pin_code = $request->pincode;
        $enquiry->dob = $request->dob;
        $enquiry->age = $request->age;
        $enquiry->marriage_date = $request->marriage_date;
        $enquiry->branch_id = $request->branch;
        $enquiry->save();
        return redirect()->route('enquiry')->with('success', 'Client Added successfully.');

    }


    public function enquiry_store(Request $request)
    {
        // dd($request->all());

        $store = new Enquiry;
        if ($request->has('dealer_id')) {
            $store->dealer_id = $request->dealer_id;
        }

        if ($request->has('employee_id')) {
            $store->employee_id = $request->employee_id;
        }

        if ($request->has('agent_id')) {
            $store->broker_id = $request->agent_id;
        }




        $store->status_id = $request->status_id;
        $store->project_id = $request->project_id;
        $store->plot_no = $request->plot_no;
        $store->client_id = $request->client_id;
        $store->client_status = 'Added_client';
        $store->save();
        return redirect()->route('enquiry')->with('success', 'Enquiry Added successfully.');

    }


    public function getProjects($statusId): JsonResponse
    {
        $projects = ProjectEntry::where('sale_status_id', $statusId)->get(['id', 'project_name']);
        // dd($projects);
        // return response()->json($projects);
        return new JsonResponse($projects);
    }

    public function getplots($projectId, $statusId = null): JsonResponse
    {
        $query = ProjectEntryAppendData::where('project_entry_id', $projectId);

        if ($statusId) {
            $query->whereHas('projectEntry', function ($q) use ($statusId) {
                $q->where('sale_status_id', $statusId);
            });
        }

        $plots = $query->get(['id', 'plot_no', 'project_entry_id']);

        return new JsonResponse($plots);
    }


    // public function getProjectDetails($statusId): JsonResponse
// {
//     $projects = ProjectEntry::where('sale_status_id', $statusId)->get(['id', 'project_name']);
//     $plots = ProjectEntryAppendData::whereIn('project_entry_id', $projects->pluck('id'))->get(['id', 'plot_no']);

    //     return new JsonResponse(['projects' => $projects, 'plots' => $plots]);
// }


    // common function to show project and plot corresponding to status
    public function getProjectDetails($statusId, $projectId = null): JsonResponse
    {
        $projects = ProjectEntry::where('sale_status_id', $statusId)->get(['id', 'project_name']);

        $plotsQuery = ProjectEntryAppendData::query();
        if ($projectId) {
            $plotsQuery->where('project_entry_id', $projectId);
        } else {
            $plotsQuery->whereHas('projectEntry', function ($q) use ($statusId) {
                $q->where('sale_status_id', $statusId);
            });
        }

        $plots = $plotsQuery->get(['id', 'plot_no']);

        return new JsonResponse(['projects' => $projects, 'plots' => $plots]);
    }

    // public function getProjectDetails($statusId, $projectId = null): JsonResponse
// {
//     if ($statusId === 'All') {
//         // Fetch all projects and plots
//         $projects = ProjectEntry::all(['id', 'project_name']);
//         $plots = ProjectEntryAppendData::all(['id', 'plot_no']);
//     } else {
//         // Fetch projects based on the provided statusId
//         $projects = ProjectEntry::where('sale_status_id', $statusId)->get(['id', 'project_name']);

    //         // Fetch plots based on the provided statusId and projectId
//         $plotsQuery = ProjectEntryAppendData::query();
//         if ($projectId) {
//             $plotsQuery->where('project_entry_id', $projectId);
//         } else {
//             $plotsQuery->whereHas('projectEntry', function ($q) use ($statusId) {
//                 $q->where('sale_status_id', $statusId);
//             });
//         }

    //         $plots = $plotsQuery->get(['id', 'plot_no']);
//     }

    //     return new JsonResponse(['projects' => $projects, 'plots' => $plots]);
// }



    // to show client info after selecting client
    public function getClientDetails($clientId)
    {
    $client = CustomerRegistrationMaster::find($clientId);

        return response()->json($client);
    }

    // function get_Plot_list(Request $request){
//     $plot_list=ProjectEntryAppendData::
//     where('project_entry_id',$request->project_code)->get();
//     // dd($plot_list);
//     $plot = ProjectEntryAppendData::all();
//     $view=view('panel.plot_button',compact('plot_list', 'plot'))->render();
//     return response()->json($view);
// }


    // to show plot buttons by using another view page.
// public function get_Plot_list(Request $request) {
//     $plot_list = ProjectEntryAppendData::where('project_entry_id', $request->project_code)->get();
//     // dd($plot_list);
//     // $plot = ProjectEntryAppendData::all();
//     $view = view('panel.plot_button', compact('plot_list'))->render();
//     return response()->json(['html' => $view]);
// }



    //to show plot buttons of selected project from project drop down

    public function get_Plot_list(Request $request)
    {
        $plot_list = ProjectEntryAppendData::where('project_entry_id', $request->project_code)->get();
        $enquiry = Enquiry::select('status_id')->get();


        // dd($plot_list);
        // $plot = ProjectEntryAppendData::all();
        $view = view('panel.plot_button', compact('plot_list', 'enquiry'))->render();
        return response()->json(['html' => $view]);
    }

    public function getEnquiryData(Request $request)
    {
        $plotNo = $request->plot_no;
        $projectEntryId = $request->project_entry_id;
        // $projectEntryId12 = ProjectEntryAppendData::where('project_entry_id', $projectEntryId)->where('plot_no', $plotNo)->first();
        // dd($plotNo, $projectEntryId, $projectEntryId12);
        // Retrieve data from Enquiry model
        $enquiries = Enquiry::where('plot_no', $plotNo)
            ->where('project_id', $projectEntryId)
            ->with('client_name') // Assuming you have a relationship set up with the Client model
            ->get()
            ->map(function ($enquiry) {
                return [
                    'client_name' => $enquiry->client_name->name,
                    'plot_no' => $enquiry->plot_no,
                    'contact' => $enquiry->client_name->contact,
                    'date' => $enquiry->created_at->format('d-m-Y'),
                ];
            });

        // Retrieve data from EnquiryForm model
        $enquiryForms = EnquiryForm::where('plot_id', $plotNo)
            ->where('project_id', $projectEntryId)
            //  ->with('client') // Assuming you have a relationship set up with the Client model
            ->get()
            ->map(function ($enquiryForm) {
                return [
                    'client_name' => $enquiryForm->name,
                    'plot_no' => $enquiryForm->plot_id,
                    'contact' => $enquiryForm->contact,
                    'date' => $enquiryForm->created_at->format('d-m-Y'),
                ];
            });

        // Combine the data from both models into one variable
        $combinedData = $enquiries->merge($enquiryForms);

        // Check if any data is found, if not, return an empty response
        if ($combinedData->isEmpty()) {
            return response()->json(['enquiries' => []]);
        }

        return response()->json(['enquiries' => $combinedData]);
    }
    // public function getEnquiryData(Request $request)
    // {
    //     $plotNo = $request->plot_no;
    //     $projectEntryId = $request->project_entry_id;

    //     // Retrieve data from Enquiry model
    //     $enquiries = Enquiry::where('plot_no', $plotNo)
    //         ->where('project_id', $projectEntryId)
    //         ->with('client_name')
    //         ->get()
    //         ->map(function ($enquiry) {
    //             return [
    //                 'client_name' => $enquiry->client_name->name,
    //                 'plot_no' => $enquiry->plot_no,
    //                 'contact' => $enquiry->client_name->contact,
    //                 'date' => $enquiry->created_at->format('d-m-Y'),
    //             ];
    //         });

    //     // Retrieve data from EnquiryForm model
    //     $enquiryForms = EnquiryForm::where('plot_id', $plotNo)
    //         ->where('project_id', $projectEntryId)
    //         ->get()
    //         ->map(function ($enquiryForm) {
    //             return [
    //                 'client_name' => $enquiryForm->name,
    //                 'plot_no' => $enquiryForm->plot_id,
    //                 'contact' => $enquiryForm->contact,
    //                 'date' => $enquiryForm->created_at->format('d-m-Y'),
    //             ];
    //         });

    //     // Check if any data is found in either model, if not, return an empty response
    //     if ($enquiries->isEmpty() && $enquiryForms->isEmpty()) {
    //         return response()->json(['enquiries' => []]);
    //     }

    //     // Combine the data from both models into one variable
    //     $combinedData = $enquiries->merge($enquiryForms);

    //     return response()->json(['enquiries' => $combinedData]);
    // }



}
