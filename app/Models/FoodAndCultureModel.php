<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodAndCultureModel extends Model
{
    use HasFactory;
    protected $table = "food_and_culture";

    protected $fillable = [
        'image',
        'title',
        'text'
    ];
}