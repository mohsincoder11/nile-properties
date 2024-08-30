<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InitialEnquiry extends Model
{
    use HasFactory;
    protected $table = "initial_enquiries_clients";
    protected $primarykey = 'id';
    protected $fillable = [
        'firm_id',

        'project_id',
        'measurement',
        'square_meter',
        'square_ft',
        'rate',
        'total_cost',
        'discount_amount',
        'discount_type',
        'final_amount',
        'down_payment',
        'balance_amount',
        'tenure',
        'emi_amount',
        'booking_date',
        'agreement_date',
        'status_token',
        'emi_start_date',
        'plot_sale_status',
        'a_rate',
        'source_type',
        'remark',
        'mauja',
        'kh_no',
        'phn',
        'taluka',
        'district',
        'east',
        'west',
        'north',
        'south',
        'plot_no',
        'employee_id',
        'direct_sourse',
        'agent_id',
        'plot_stage_status',
        'is_transfer_plot',
        'is_request_registration_completed',
        'is_legal_clearance',
        'legal_clearance_date',
        'is_registration_completed',
        'registration_complete_date',
        'registration_receipt',
        'is_saleded_completed',
        'saleded_receipt',
        'saleded_completed_date',
        'is_handover_completed',
        'handover_receipt',
        'handover_completed_date',
        'is_plot_booked_by_user_model',
        'is_transfer_plot'

    ];

    public function clientsigle()
    {
        return $this->hasOne(ClientDetailInitial::class, 'initial_enquiry_id', 'id');
    }
    public function clients()
    {
        return $this->hasMany(ClientDetailInitial::class, 'initial_enquiry_id', 'id');
    }

    public function nominees()
    {
        return $this->hasMany(NomineeDetailInitial::class, 'initial_enquiry_id', 'id');
    }
    public function project()
    {
        return $this->hasOne(ProjectEntry::class, 'id', 'project_id');
    }
    public function firm()
    {
        return $this->hasOne(FirmRegistrationMaster::class, 'id', 'firm_id');
    }
    public function emi()
    {
        return $this->hasMany(EmiPaymentCollection::class, 'initial_enquiry_id', 'id');
    }

    public function employee()
    {
        return $this->hasOne(EmployeeRegistrationMaster::class, 'id', 'employee_id');
    }
    public function agent()
    {
        return $this->hasOne(AgentRegistrationMaster::class, 'id', 'agent_id');
    }
    public function statustoken()
    {
        return $this->hasOne(TokenStatus::class, 'id', 'status_token');
    }
    public function plotnumber()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'id', 'plot_no');
    }

    public function plotname()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'id', 'plot_no');
    }

    public function plottrasferhistory()
    {
        return $this->hasOne(PlotTransferHistory::class, 'previous_enquiry_id', 'id');
    }
}
