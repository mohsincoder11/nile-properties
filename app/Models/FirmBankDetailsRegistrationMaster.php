<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmBankDetailsRegistrationMaster extends Model
{
    use HasFactory;
    protected $table = "firm_bank_details_master";

    protected $fillable = [
        'firm_id',
        'bank_name',
        'account_number',
        'ifsc',
        'account_holder_name',
    ];

    // Specify the attributes that should be cast to arrays
    //  protected $casts = [
    //     'agent_id' => 'array',
    //     'bank_name' => 'array',
    //     'account_number' => 'array',
    //     'ifsc' => 'array',
    //     'account_holder_name' => 'array',
    // ];
    public function agentRegistration()
    {
        return $this->belongsTo(FirmRegistrationMaster::class);
    }
}