<?php

namespace App\Http\Controllers\panel;

use App\Models\Enquiry;
use App\Models\Occupation;
use App\Models\TokenStatus;
use App\Models\BranchMaster;
use App\Models\OtherCharges;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use App\Models\ClientDetailInitial;
use App\Http\Controllers\Controller;
use App\Models\NomineeDetailInitial;
use App\Models\FirmRegistrationMaster;
use App\Models\ProjectEntryAppendData;
use App\Models\AgentRegistrationMaster;
use App\Models\CustomerRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;

class UserModelController extends Controller
{

    public function userdashboard()
    {
        return view('panel.user_model.user_dashboard');
    }
    public function paymentcollection()
    {
        $client = ClientDetailInitial::all();
        $projects = InitialEnquiry::with('project')->distinct()->get(['project_id']);
        $firm = FirmRegistrationMaster::all();
        // Fetch EMI payments for the first initial enquiry record
        $charges = OtherCharges::all();

        return view('panel.user_model.user_payment_collection', compact('client', 'projects', 'firm', 'charges'));

        // Fetch EMI payments for the first initial enquiry record

    }

    public function userinitiatesale()
    {

        $tokenStatuses = TokenStatus::all();

        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $agent = AgentRegistrationMaster::all();
        $clients = CustomerRegistrationMaster::all();
        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();

        return view(
            'panel.user_model.user_initiate_sale',
            compact(
                'tokenStatuses',
                'enquiries',
                'projects',
                'firm',
                'statuses',
                'employees',
                'occupation',
                'branch',
                'agent',
                'clients',
            )
        );


    }
    public function userinitiatesaleedit($inquiryId)
    {
        $inquiry = InitialEnquiry::with('clientsigle', 'clientsigle.agent', 'clients.clientn', 'nominees')->find($inquiryId);
        //dd($inquiry);
        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id', 'plot_no']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $tokenStatuses = TokenStatus::all();
        $agent = AgentRegistrationMaster::all();

        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();
        $clients = CustomerRegistrationMaster::all();

        $plot = ProjectEntryAppendData::all();

        return view(
            'panel.user_model.user_initiate_sale_edit',
            compact(
                'clients',
                'inquiry',
                'occupation',
                'branch',
                'firm',
                'plot',

                'enquiries',
                'projects',
                'statuses',
                'employees',
                'tokenStatuses',
                'agent',
            )
        );
    }
    public function usernewsale()
    {

        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.user_model.user_new_sale', compact('nominee', 'client', 'inquery'));
    }


    public function userregistration()
    {

        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.user_model.user_registration', compact('nominee', 'client', 'inquery'));
    }
    public function useraccount()
    {
        return view('panel.user_model.user_account');
    }


    public function userlegalclearance()
    {

        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.user_model.user_legal_clearance', compact('nominee', 'client', 'inquery'));

    }
    public function userregistrationcompleted()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.user_model.user_registration_completed', compact('nominee', 'client', 'inquery'));

    }

    public function usersaledeedscan()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.user_model.user_saledeed_scan', compact('nominee', 'client', 'inquery'));

    }
    public function userhandover()
    {
        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees', 'agent')->get();
        return view('panel.user_model.user_handover', compact('nominee', 'client', 'inquery'));

    }


}