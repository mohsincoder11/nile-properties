<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseIncome extends Model
{
    use HasFactory;
    protected $table = 'expense_income'; // If your table name is not the plural form of the model name

    protected $fillable = [
        'bill_no',
        'firm_id',
        'project_id',
        'income_category',
        'client_id',
        'plot_no',        
        'bank_name',
        'amount',
        'remarks',
        'emi_no',
        'mode_of_payment',
        'attach_proof',
        'narration',
    ];
}
