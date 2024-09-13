<?php

namespace App\Http\Controllers\panel;

use Illuminate\Http\Request;
use App\Models\InitialEnquiry;
use App\Models\ClientDetailInitial;
use App\Http\Controllers\Controller;
use App\Models\NomineeDetailInitial;
use App\Models\OtherChargesForClient;
use App\Models\PlotRegistrationDocumentByClient;


class CustomeStagesController extends Controller
{
    public function registrationChecklist()
    {
        return view('panel.registration_checklist');
    }

    public function initiatesale()
    {
        return view('panel.initiate_sale');
    }

    public function newsale()
    {
        return view('panel.new_sale');
    }


    public function registration()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.registration', compact('nominee', 'client', 'inquery'));
    }
    public function checkStatus($id)
    {
        // Check in OtherChargesForClient model
        $chargesPaid = OtherChargesForClient::where('initial_enquiry_id', $id)
            ->where('status', 'paid')
            ->exists();

        // Check in PlotRegistrationDocumentByClient model
        $documentApproved = PlotRegistrationDocumentByClient::where('initial_enquiry_id', $id)
            ->where('status', 'approved')
            ->exists();

        if ($chargesPaid && $documentApproved) {
            return response()->json(['status' => 'success']);
        } else {
            return response()->json(['status' => 'fail', 'message' => 'Please go to the account section and ensure the document is approved and other charges were paid.']);
        }
    }


    public function showDetails(Request $request)
    {
        $inquiryId = $request->input('id');
        $inquiry = InitialEnquiry::with('clientsigle.agent', 'clients', 'nominees', 'statustoken')
            ->where('id', $inquiryId)
            ->first();

        if (!$inquiry) {
            return response()->json(['error' => 'Inquiry not found'], 404);
        }

        // Check if the inquiry has associated plot_id, firm_id, and project_id
        $plotId = $inquiry->plot_no;
        $firmId = $inquiry->firm_id;
        $projectId = $inquiry->project_id;

        // Get data from OtherChargesForClient model
        $otherCharges = OtherChargesForClient::where('plot_id', $plotId)
            ->where('firm_id', $firmId)
            ->where('project_id', $projectId)
            ->whereNotNull('amount')
            ->whereNotNull('client_id')

            ->whereNotNull('initial_enquiry_id')
            ->get();

        // Get data from PlotRegistrationDocumentByClient model
        $plotDocuments = PlotRegistrationDocumentByClient::where('plot_id', $plotId)
            ->where('firm_id', $firmId)
            ->where('project_id', $projectId)
            ->whereNotNull('document_name')
            ->whereNotNull('initial_enquiry_id')

            ->get();



        // Render the Blade view with all the data
        $inquiryHtml = view('panel.docs_info_uplod_by_client', compact('inquiry', 'otherCharges', 'plotDocuments'))->render();

        return response()->json(['html' => $inquiryHtml]);
    }

    public function account()
    {
        return view('panel.account');
    }


    public function legalclearance()
    {

        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.legal_clearance', compact('nominee', 'client', 'inquery'));
    }
    public function registrationcompleted()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.registration_completed', compact('nominee', 'client', 'inquery'));
    }

    public function saledeedscan()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.saledeed_scan', compact('nominee', 'client', 'inquery'));
    }
    public function handover()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.handover', compact('nominee', 'client', 'inquery'));
    }
}