<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRegistrationMaster extends Model
{
    use HasFactory;

    protected $table = "employee_registration_master";

    protected $fillable = [
        'role',
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

    ];

    public function bankDetails()
    {
        return $this->hasMany(EmployeeBankDetailsMaster::class);
    }
    public function employee_data()
    {
        return $this->hasOne(LeadassignToEmployee::class, 'id', 'employee_id');
    }


}