<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotRegistrationDocumentByClient extends Model
{
    use HasFactory;
    protected $table = 'plot_registration_document_by_client';
    protected $primarykey = 'id';
    protected $fillable = [
        'document_name',
        'plot_id',

        'firm_id',

        'project_id',
        'client_id',
        'status',
        'initial_enquiry_id'

    ];

    public function projectname()
    {
        return $this->belongsTo(ProjectEntry::class, 'project_id');
    }


    public function plotname()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'id', 'plot_id');
    }
    public function firmname()
    {
        return $this->belongsTo(FirmRegistrationMaster::class, 'firm_id');
    }

    public function clientname()
    {
        return $this->belongsTo(CustomerRegistrationMaster::class, 'client_id');
    }
}