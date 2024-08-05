<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotTransferHistory extends Model
{
    use HasFactory;
    protected $fillable = [
        'initial_enquiry_id',
        'previous_owner_id',
        'new_owner_id',
        'transfer_date',
        'transfer_type',
    ];
}
