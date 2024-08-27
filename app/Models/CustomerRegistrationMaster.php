<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerRegistrationMaster extends Model
{
    use HasFactory;

    protected $table = 'customer_registration_master';

    protected $fillable = [
        'title',
        'name',
        'occupation_id',
        'email',
        'contact',
        'city',
        'pin_code',
        'address',
        'age',
        'dob',
        'marriage_date',
        'branch',
        'aadhar',
        'aadhar_no',
        'pan',
        'pan_no',
        'marital_status',
        'user_id',
    ];

    public function occupation_name()
    {
        return $this->hasOne(Occupation::class, 'id', 'occupation_id');
    }

    public function branch_name()
    {
        return $this->hasOne(BranchMaster::class, 'id', 'branch_id');
    }
}