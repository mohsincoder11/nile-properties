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

    ];
}
