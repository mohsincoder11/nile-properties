<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRegistrationMaster extends Model
{
    use HasFactory;
    protected $table = "agent_registration_master";

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'city',
        'address',
        'pincode',
        'aadhar',
        'aadhar_number',
        'pan',
        'pan_number',
        'username',
        'password',
        'agent_number',
        'role',

    ];

    public function bankDetails()
    {
        return $this->hasMany(AgentBankDetailsRegistrationMaster::class, 'agent_id', 'id');
    }

}