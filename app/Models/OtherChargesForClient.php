<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherChargesForClient extends Model
{
    use HasFactory;
    protected $table = 'other_charges_for_clients';

    protected $fillable = [
        'amount',
        'charges_id',
        'client_id',
        'initial_inquiry_id',
    ];
}