<?php

namespace App\Models;

use App\Http\Controllers\ProjectEntryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OtherChargesForClient extends Model
{
    use HasFactory;
    protected $table = 'other_charges_for_clients';

    protected $fillable = [
        'amount',
        'charges_id',
        'client_id',
        'plot_id',
        'firm_id',
        'project_id',
        'client_id',



    ];

    public function chargesname()
    {
        return $this->belongsTo(OtherCharges::class, 'charges_id');
    }

    public function projectname()
    {
        return $this->belongsTo(ProjectEntry::class, 'project_id');
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