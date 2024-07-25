<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherCharges extends Model
{
    use HasFactory;
    protected $table = 'other_charges';
    protected $primarykey = 'id';
    protected $fillable = [
        'other_charges',
    ];
}