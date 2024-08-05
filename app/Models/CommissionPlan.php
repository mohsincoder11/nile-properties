<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommissionPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile_name',
        'monthly_target_from',
        'monthly_target_to',
        'regular_benefit',
        'referral',
    ];
}
