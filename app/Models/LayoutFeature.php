<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LayoutFeature extends Model
{
    use HasFactory;
    protected $table = "layout_feature";
    protected $fillable = [
        'layout_feature',
    ];
}
