<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserActionLog extends Model
{
    use HasFactory;
    protected $table = 'user_action_log';
    protected $primarykey = 'id';
    protected $fillable = [
        'user_id',
        'action',
        'entity_id',
        'entity_type',
        'details',
    ];
}