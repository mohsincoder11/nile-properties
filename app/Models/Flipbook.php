<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flipbook extends Model
{
    use HasFactory;
    protected $table = 'filpbook';
    protected $primaryKey = 'id';
    public $timestamps = true; // Assuming you don't need timestamps

    protected $fillable = [
        'logo',
        'title',
        'website',
        
    ];

}
