<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;

    protected $table = "master";

    protected $fillable=[
        'city',
        'occupation',
        'layout_feature',
        'plot_sale_status',
        'transaction_type',
    ];


}
