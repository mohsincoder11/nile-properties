<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomineeDetailInitial extends Model
{
    use HasFactory;
    protected $table = "nominee_details_intial";
    protected $fillable = ['initial_enquiry_id', 'name', 'age', 'relation', 'dob', 'aadhar', 'pan'];

    public function initialEnquiry()
    {
        return $this->belongsTo(InitialEnquiry::class);
    }
}