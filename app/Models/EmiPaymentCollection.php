<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmiPaymentCollection extends Model
{
    use HasFactory;

    protected $table = 'emi_payments_collections';

    protected $fillable = [
        'plot_id',
        'project_id',
        'initial_enquiry_id',
        'inst_no',
        'inst_amt',
        'status',
        'paid_amt',
        'rem_amt',
        'edop',
        'pay_date',
        'payment_type',
        'bank_name',
        'account_no',
        'cheque_no',
        'ifsc',
        'remark',
    ];

    protected $casts = [
        'edop' => 'datetime:Y-m-d',
        'pay_date' => 'datetime:Y-m-d',
        'inst_amt' => 'decimal:2',
        'paid_amt' => 'decimal:2',
        'rem_amt' => 'decimal:2',
    ];

    public function Intial()
    {
        return $this->hasOne(InitialEnquiry::class, 'id', 'initial_enquiry_id');
    }
}
