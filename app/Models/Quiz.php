<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $table = "quiz";

    protected $fillable = [
        'image',
        'title',
        'facilitatedby',
        'text',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }
    public function userAnswers()
    {
        return $this->hasMany(UserAnswers::class);
    }
    public function getUserCountAttribute()
    {
        $count = UserAnswers::select('user_id')->where('quiz_id', $this->id)->get()->groupby('user_id');
        return count($count);
        //by mutetor accessor define attribute which functionality is  by this model quiz (id) & userAnswer model (quiz_id) get user_id count ..

    }












}