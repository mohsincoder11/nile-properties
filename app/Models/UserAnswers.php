<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswers extends Model
{
    use HasFactory;
    protected $table = 'user_answers';
    protected $fillable = ['question_id', 'user_id', 'option_id', 'quiz_id'];
    public function user1()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }


    public function calculateScore()
    {
        // Retrieve the correct option for the associated question
        $correctOption = Option::where('que_id', $this->question_id)->where('is_right', 1)->first();

        // If the selected option is correct, return 1, otherwise return 0
        return $this->option_id == $correctOption->id ? 1 : 0;
    }



    public function getUserScoreAttribute()
    {
        // Get the user's selected options for the quiz
        $userSelectedOptions = UserAnswers::where([
            'user_id' => $this->user_id,
            'quiz_id' => $this->quiz_id
        ])->get();

        // Initialize counters for correct and incorrect answers and total questions
        $correctAnswers = 0;
        $incorrectAnswers = 0;
        $totalQuestions = 0;

        // Loop through user-selected options and calculate scores
        foreach ($userSelectedOptions as $userAnswer) {
            // Retrieve the correct option for the associated question
            $correctOption = Option::where('que_id', $userAnswer->question_id)->where('is_right', 1)->first();

            // If the selected option is correct, increment the correctAnswers counter
            if ($userAnswer->option_id == $correctOption->id) {
                $correctAnswers++;
            } else {
                // If the selected option is incorrect, increment the incorrectAnswers counter
                $incorrectAnswers++;
            }

            // Increment the totalQuestions counter for each user answer
            $totalQuestions++;
        }

        // Return an array containing correct, incorrect, and total questions
        return [
            'correct' => $correctAnswers,
            'incorrect' => $incorrectAnswers,
            'total_questions' => $totalQuestions,
        ];
    }





}