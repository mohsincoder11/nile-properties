<?php

namespace App\Http\Controllers\panel;

use App\Models\Master;
use App\Models\Enquiry;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\PlotSaleStatus;
use App\Http\Controllers\Controller;
use App\Models\EnquiryFollowUpModel;
use App\Models\ProjectEntryAppendData;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class FollowupLeads extends Controller
{
    public function newclientindex()
    {
        $project = ProjectEntry::all();
        $plot = ProjectEntryAppendData::all();
        $statuses = PlotSaleStatus::all();
        //   dd($statuses);
        $enquery = Enquiry::where('client_status', 'Added_client')->with('status_name', 'project_name', 'plot_name', 'client_name', 'emoloyee_name', 'agent_name')->get();
        // dd($enquery);
        return view('panel.new_client', compact('enquery', 'statuses', 'project', 'plot'));
    }

    public function getEnquiryData(Request $request)
    {
        $enquiry = Enquiry::find($request->id);
        $projects = ProjectEntry::all();
        $plots = ProjectEntryAppendData::all();

        if ($enquiry) {
            $render_view = view('panel.change_plot_common_file', compact('enquiry', 'projects', 'plots'))->render();
            return response()->json(['html' => $render_view]);
        } else {
            return response()->json(['error' => 'Enquiry not found'], 404);
        }
    }
    public function getEnquiryFollowUp(Request $request)
    {
        $enquiryId = $request->query('enquiryId');

        // Fetch the follow-up data for the given enquiry ID
        $followUps = EnquiryFollowUpModel::with('status_name')->where('enquiry_id', $enquiryId)->get();

        // Render the HTML view with the fetched data
        $html = view('panel.enquiry_follow_up_table', compact('followUps'))->render();

        return response()->json(['html' => $html]);
    }
    public function changeplot(Request $request)
    {
        $request->validate([
            'enquiry_id' => 'required|',
            'project_id' => 'required|',
            'plot_no' => 'required|',
        ]);

        $enquiry = Enquiry::find($request->enquiry_id);
        $enquiry->project_id = $request->project_id;
        $enquiry->plot_no = $request->plot_no;
        $enquiry->save();

        return redirect()->back()->with('success', 'Change project and plot  updated successfully.');
    }
    public function folloupstore(Request $request)
    {
        // Validate the request data
        $request->validate([
            'client_stage' => 'required', // Add validation rules as per your requirements
            'status_id' => 'required',
            'remark' => 'nullable|string',
            'follow_up_next_date' => 'required|',
            'enquiry_id' => 'required|',

        ]);

        // Create a new EnquiryFollowUp instance
        $enquiryFollowUp = new EnquiryFollowUpModel();
        $enquiryFollowUp->enquiry_id = $request->enquiry_id; // Adjust with actual enquiry_id from form
        $enquiryFollowUp->status_id = $request->status_id;
        $enquiryFollowUp->remark = $request->remark;
        $enquiryFollowUp->follow_up_next_date = $request->follow_up_next_date;
        $enquiryFollowUp->client_stage = $request->client_stage;


        // Save the EnquiryFollowUp instance
        $enquiryFollowUp->save();

        // Optionally, you can redirect back or do something else after saving
        return redirect()->back()->with('success', 'Follow-up added successfully!');
    }

    public function updateClientStatus(Request $request)
    {
        // Validate the request
        $request->validate([
            'enquiry_id' => 'required',
            'client_status' => 'required',
        ]);

        // Find the enquiry by ID
        $enquiry = Enquiry::find($request->enquiry_id);
        if (!$enquiry) {
            return redirect()->back()->with('error', 'Enquiry not found.');
        }

        // Update the client status
        $enquiry->client_status = $request->client_status;
        $enquiry->save();

        // Redirect back to the route where you display the table
        return redirect()->back()->with('success', 'Client status updated successfully.');
    }


    public function allenquiry()
    {
        $statuses = PlotSaleStatus::all();

        $enquery = Enquiry::with('status_name', 'project_name', 'plot_name', 'client_name')->get();

        return view('panel.all_enquiry', compact('enquery', 'statuses'));
    }

    public function proposalindex()
    {
        $statuses = PlotSaleStatus::all();

        $enquery = Enquiry::where('client_status', 'Proposal')->with('status_name', 'project_name', 'plot_name', 'client_name')->get();

        return view('panel.proposal', compact('enquery', 'statuses'));
    }
    public function tokenindex()
    {
        $enquery = Enquiry::where('client_status', 'Token_BooK')->with('status_name', 'project_name', 'plot_name', 'client_name')->get();
        return view('panel.token', compact('enquery'));
    }
    public function visitindex()
    {
        $statuses = PlotSaleStatus::all();

        $enquery = Enquiry::where('client_status', 'Visit')->with('status_name', 'project_name', 'plot_name', 'client_name')->get();
        return view('panel.visit', compact('enquery', 'statuses'));
    }
    public function followupindex()
    {
        $enquery = Enquiry::where('client_status', 'Followup')->with('status_name', 'project_name', 'plot_name', 'client_name')->get();

        return view('panel.followUp', compact('enquery'));
    }
    public function negotiationindex()
    {
        $enquery = Enquiry::where('client_status', 'Negotiation')->with('status_name', 'project_name', 'plot_name', 'client_name')->get();

        return view('panel.negotiation', compact('enquery'));
    }
}