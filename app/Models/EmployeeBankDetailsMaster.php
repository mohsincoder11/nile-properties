<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeBankDetailsMaster extends Model
{
    use HasFactory;
    protected $table = "employee_bank_details_master";

    protected $fillable = [
        'employee_id',
        'bank_name',
        'account_number',
        'ifsc',
        'account_holder_name',
    ];

    public function employeeRegistration()
{
    return $this->belongsTo(EmployeeRegistrationMaster::class);
}
}
