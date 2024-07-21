<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;


    protected $tabel = "feedback";
    protected $fillable = [
        'happysad_hidden_value',
        'message',
        'user_id',


    ];


    public function UsernameByuser_id()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

}