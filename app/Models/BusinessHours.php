<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessHours extends Model
{
    use HasFactory;
    protected $table = "business_hours";

    protected $fillable = [
        'product_entry_id',
        'days_id',
        'open_at',
        'close_at',
        'is_close',

    ];
}
