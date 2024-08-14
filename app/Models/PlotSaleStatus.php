<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotSaleStatus extends Model
{
    use HasFactory;
    protected $table = "plot_sale_status";
    protected $primarykey = 'id';
    protected $fillable = [
        'plot_sale_status',
        'color_code',
    ];
}