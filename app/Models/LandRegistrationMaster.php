<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandRegistrationMaster extends Model
{
    use HasFactory;
    protected $table = "land_owner_registration_master";

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
        return $this->hasMany(LandBankDetailsRegistrationMaster::class, 'land_id', 'id');
    }
}