<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LeadassignToEmployee extends Model
{
    use HasFactory;


    // Define the table name if it doesn't follow Laravel's naming convention
    protected $table = 'leadassign_to_employee';
    protected $primarykey = 'id';
    // Define the fillable attributes
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'whatsapp_no',
        'city',
        'address',
        'employee_id'
    ];
}
