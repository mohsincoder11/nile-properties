<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model
{
    use HasFactory;
    protected $table = "time_slot";

    protected $fillable = [
        'project_entry_id',
        'days_id',
        'open_at',
        'close_at',
        'is_close',
    ];

    public function days_name(){
        return $this->hasOne(Days::class, 'id', 'days_id');
    }
}
