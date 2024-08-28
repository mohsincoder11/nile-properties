<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FirmRegistrationMaster extends Model
{
    use HasFactory;
    protected $table = "firm_registration_master";
    protected $primaryKey = 'id';
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
        return $this->hasMany(FirmBankDetailsRegistrationMaster::class, 'firm_id', 'id');
    }
}
