<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrintColor extends Model
{
    use HasFactory;
    protected $table = "print";

    protected $fillable = [
        'image',
        'fileimage'
    ];
}