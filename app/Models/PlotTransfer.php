<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotTransfer extends Model
{
    use HasFactory;
    protected $fillable = [
        'application_number',
        'full_name',
        'email',
        'mobile_number',
        'alternate_number',
        'upload_photo',
        'dob',
        'city',
        'address',
        'nationality',
        'state',
        'company_name',
        'pincode',
        'ownership_change',
        'designation',
    ];
}
