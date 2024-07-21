<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEntryLayoutImages extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'layout_image',
        'project_entry_id', // Include other fields if needed
        'created_at',
        'updated_at',
    ];


}
