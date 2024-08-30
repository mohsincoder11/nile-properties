<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotTransaction extends Model
{
    use HasFactory;
    // Specify the table name if it's not the plural form of the model name

    // The attributes that are mass assignable
    protected $fillable = [
        'agent_id',
        'sale_price',
        'commission_amount',
        'parent_commission_amount',
        'sale_date',
        'initial_enquiry_id'
    ];

    // Define relationships
    public function plot()
    {
        return $this->belongsTo(ProjectEntryAppendData::class);
    }

    public function customer()
    {
        return $this->belongsTo(CustomerRegistrationMaster::class);
    }

    public function agent()
    {
        return $this->belongsTo(AgentRegistrationMaster::class);
    }
}