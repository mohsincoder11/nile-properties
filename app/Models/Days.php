<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Days extends Model
{
    use HasFactory;
    protected $table = "days";

    protected $fillable = [
        'days',
    ];


    public function ProjectEntry()
    {
        return $this->belongsToMany(ProjectEntry::class, 'time_slots', 'days_id', 'project_entry_id')
            ->using(TimeSlot::class)
            ->withPivot(['open_at', 'close_at', 'is_close']);
    }

}
