<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandOwnerPaymentOfLand extends Model
{
    use HasFactory;
    protected $table = 'land_owner_payment_of_lands';
    protected $fillable = [
        'land_owner_id',

        'date_of_payment',
        'particulars',
        'amount',
        'payment_mode',
        'remarks',
        'total_land_cost',
        'paid_amount',
        'balance_amount',
        'payment_period_remaining',
    ];
}