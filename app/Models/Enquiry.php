<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enquiry extends Model
{
    use HasFactory;

    protected $table = "enquiry";
    protected $fillable = [
        'status_id',
        'project_id',
        'plot_no',
        'client_id',
        'client_status',
        'remark',
        'lead_type',
        'follow_up_date',
        'date',
        'broker_id',
        'employee_id',
        'dealer_id',

    ];

    public function status_name()
    {
        return $this->hasOne(PlotSaleStatus::class, 'id', 'status_id');
    }

    public function emoloyee_name()
    {
        return $this->hasOne(EmployeeRegistrationMaster::class, 'id', 'employee_id');
    }

    public function agent_name()
    {
        return $this->hasOne(AgentRegistrationMaster::class, 'id', 'broker_id');
    }


    public function project_name()
    {
        return $this->hasOne(ProjectEntry::class, 'id', 'project_id');
    }

    public function plot_name()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'id', 'plot_no');
    }

    public function plot_get()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'project_id', 'project_id');
    }


    public function client_name()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

    public function clients_name()
    {
        return $this->hasOne(User::class, 'id', 'client_id');
    }


    // public function projectEntryAppendData()
    // {
    //     return $this->hasMany(ProjectEntryAppendData::class, 'status_id');
    // }

}
