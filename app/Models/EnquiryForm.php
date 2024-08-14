<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryForm extends Model
{
    use HasFactory;

    protected $table = "enquiry_form";
    protected $fillable = [
        'project_id',
        'name',
        'email',
        'contact',
        'message',
        'plot_id',

    ];


    // In EnquiryForm model
    public function project_name()
    {
        return $this->hasOne(ProjectEntry::class, 'id', 'project_id');
    }

    //to retrieve collection of related entries
    public function plot_name()
    {
        return $this->hasMany(ProjectEntryAppendData::class, 'project_entry_id', 'project_id');
    }

    public function plot_no()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'project_entry_id', 'project_id');
    }


    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id'); // Assuming you have a 'client_id' foreign key in the 'enquiry_form' table
    }
}