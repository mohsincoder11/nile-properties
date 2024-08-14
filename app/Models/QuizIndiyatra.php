<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizIndiyatra extends Model
{
    use HasFactory;
    protected $table = "quizindiyatra";

    protected $fillable = [
        'logo',
        'title',
        // 'text',
        // 'facebook',
        'website',

    ];
}