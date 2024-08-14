<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnquiryFollowUpModel extends Model
{
    use HasFactory;
    protected $table = 'enquiry_follow_up'; // Specify the table name

    protected $fillable = [
        'enquiry_id',
        'status_id',
        'client_stage',

        'follow_up_next_date',
        'remark'
    ];

    public function status_name()
    {
        return $this->hasOne(PlotSaleStatus::class, 'id', 'status_id');
    }
}