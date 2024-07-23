<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalDetail extends Model
{
    use HasFactory;
      protected $fillable = [
        'spouse_name',
        'spouse_mobile',
        'anniversary',
        'father_name',
        'mother_name',
        'nominee',
        'nominee_mobile',
    ];
}
