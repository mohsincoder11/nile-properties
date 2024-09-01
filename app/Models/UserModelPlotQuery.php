<?php

namespace App\Models;

use App\Http\Controllers\panel\customerRegMasterController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModelPlotQuery extends Model
{
    use HasFactory;

    protected $table = 'user_model_plots_related_queries';  // Specify the table name
    protected $primaryKey = 'id';  // Specify the primary key

    protected $fillable = [
        'firm_id',
        'project_id',
        'plot_no',
        'client_id',
        'query',
        'admin_response',
        'initial_enquiry_id'
    ];

    // Define relationships with other models if applicable
    public function firm()
    {
        return $this->hasOne(FirmRegistrationMaster::class, 'id', 'firm_id');
    }

    public function project()
    {
        return $this->hasOne(ProjectEntry::class, 'id', 'project_id');
    }

    public function client()
    {
        return $this->hasOne(CustomerRegistrationMaster::class, 'id', 'client_id');
    }
    public function plot()
    {
        return $this->hasOne(ProjectEntryAppendData::class, 'id', 'plot_no');
    }
}
