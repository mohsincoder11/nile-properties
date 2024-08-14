<?php

namespace App\Http\Controllers\panel;

use App\Models\Enquiry;
use App\Models\TokenStatus;
use App\Models\ProjectEntry;
use Illuminate\Http\Request;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use App\Models\ClientDetailInitial;
use App\Http\Controllers\Controller;
use App\Models\NomineeDetailInitial;
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
        $projects = InitialEnquiry::with('project')->get('project_id');

        // Fetch EMI payments for the first initial enquiry record

        return view('panel.user_model.user_payment_collection', compact('client', 'projects'));
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

        return view(
            'panel.user_model.user_initiate_sale',
            compact(
                'tokenStatuses',
                'enquiries',
                'projects',
                'statuses',
                'employees',
            )
        );
    }

    public function usernewsale()
    {

        $nominee = NomineeDetailInitial::all();
        $client = ClientDetailInitial::all();
        $inquery = InitialEnquiry::with('clientsigle.agent', 'Clients', 'nominees')->get();
        return view('panel.user_model.user_new_sale', compact('nominee', 'client', 'inquery'));
    }


    public function userregistration()
    {
        return view('panel.user_model.user_registration');
    }
    public function useraccount()
    {
        return view('panel.user_model.user_account');
    }


    public function userlegalclearance()
    {
        return view('panel.user_model.user_legal_clearance');
    }
    public function userregistrationcompleted()
    {
        return view('panel.user_model.user_registration_completed');
    }

    public function usersaledeedscan()
    {
        return view('panel.user_model.user_saledeed_scan');
    }
    public function userhandover()
    {
        return view('panel.user_model.user_handover');
    }


}
