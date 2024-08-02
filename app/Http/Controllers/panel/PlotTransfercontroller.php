<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AgentRegistrationMaster;
use App\Models\FirmRegistrationMaster;
use Carbon\Carbon;
use App\Models\Enquiry;
use App\Models\Occupation;
use App\Models\TokenStatus;
use App\Models\BranchMaster;
use App\Models\ProjectEntry;
use App\Models\InitialEnquiry;
use App\Models\PlotSaleStatus;
use Illuminate\Support\Facades\DB;
use App\Models\ClientDetailInitial;
use App\Models\EmiPaymentCollection;
use App\Models\NomineeDetailInitial;
use App\Models\ProjectEntryAppendData;
use App\Models\CustomerRegistrationMaster;
use App\Models\EmployeeRegistrationMaster;

class PlotTransferController extends Controller
{
    public function plottransfer()
    {
        $tokenStatuses = TokenStatus::all();

        $enquiries = Enquiry::with('client_name')
            ->where('client_status', 'initiate_sale')
            ->get(['client_id', 'broker_id']);
        $projects = ProjectEntry::all();
        $statuses = PlotSaleStatus::all();
        $employees = EmployeeRegistrationMaster::all();
        $agent = AgentRegistrationMaster::all();

        $occupation = Occupation::all();
        $branch = BranchMaster::all();
        $firm = FirmRegistrationMaster::all();

        return view(
            'panel.plot-transfer.index',
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
            )
        );
    }
}
