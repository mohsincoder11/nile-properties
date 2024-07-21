<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntryLevelLeadManageModel extends Model
{
    use HasFactory;

    protected $table = 'entry_level_lead_manage';

    protected $fillable = [
        'employee_id',
        'name',
        'email',
        'mobile',
        'whatsapp_no',
        'city_id',
        'address',
        'source_lead',
    ];

    public function city_name()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }

    public function employee_name()
    {
        return $this->hasOne(EmployeeRegistrationMaster::class, 'id', 'employee_id');
    }
}