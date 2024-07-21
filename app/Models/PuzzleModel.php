<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PuzzleModel extends Model
{
    use HasFactory;

    protected $table = "puzzle";

    protected $fillable = [
        'image',
        'title',
        'text',


    ];
}
