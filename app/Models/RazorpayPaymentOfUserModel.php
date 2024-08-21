<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazorpayPaymentOfUserModel extends Model
{
    use HasFactory;
    protected $table = 'razorpay_payments_of_user_model';

    // Specify the primary key if it's not the default 'id'
    protected $primaryKey = 'id';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'order_id',
        'amount',
        'payment_id',
        'payment_status',
        'initial_enquiry_id',
        'installment',
        'is_approved_by_admin',
    ];
}