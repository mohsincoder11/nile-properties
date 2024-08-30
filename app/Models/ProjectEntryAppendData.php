<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEntryAppendData extends Model
{
    use HasFactory;
    protected $fillable = [
        'project_entry_id',
        'sale_status_id',
        'plot_no',
        'plot_width',
        'plot_length',
        'area_sqrft',
        'area_sqrmt',
        'east',
        'west',
        'south',
        'north',
        'rate',
        'amount',
        'tenure',
        'minimum_down_payment',

    ];

    public function projectEntry()
    {
        return $this->belongsTo(ProjectEntry::class, 'project_entry_id', 'id');
    }



    // public function status()
    // {
    //     return $this->belongsTo(plotSaleStatus::class, 'sale_status_id', 'id');
    // }

    // Relationship for Enquiry model
    public function enquiry()
    {
        return $this->belongsTo(Enquiry::class, 'id', 'plot_no');
    }
}