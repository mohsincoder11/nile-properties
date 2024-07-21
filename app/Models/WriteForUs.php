<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WriteForUs extends Model
{
    use HasFactory;
    protected $table = 'write_for_us';
    protected $fillable = ['username', 'email', 'number', 'message', 'image']; // Add 'file_path' to fillable

}
