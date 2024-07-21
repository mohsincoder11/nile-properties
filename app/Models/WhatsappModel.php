<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappModel extends Model
{
    use HasFactory;
    protected $primarykey = "id";
    protected $table = 'whatsapp';

    protected $fillable = [
        'number',

    ];

}
