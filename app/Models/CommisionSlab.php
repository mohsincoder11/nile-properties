<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommisionSlab extends Model
{
    use HasFactory;
    protected $fillable = [
        'profile',
        'commission_rate',
        'min_sales',
        'max_sales',
    ];
}
