<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentRegistrationMaster extends Model
{
    use HasFactory;
    protected $table = "agent_registration_master";

    protected $fillable = [
        'name',
        'email',
        'contact_number',
        'city',
        'address',
        'pincode',
        'aadhar',
        'aadhar_number',
        'pan',
        'pan_number',
        'username',
        'password',
        'agent_number',
        'role',
        'profile',
        'total_sales',
        'parent_id'

    ];

    public function bankDetails()
    {
        return $this->hasMany(AgentBankDetailsRegistrationMaster::class, 'agent_id', 'id');
    }
    public function parent()
    {
        return $this->belongsTo(AgentRegistrationMaster::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(AgentRegistrationMaster::class, 'parent_id');
    }

    public function transactions()
    {
        return $this->hasMany(PlotTransaction::class);
    }

    public function commissionSlab()
    {
        return $this->hasOne(CommisionSlab::class, 'profile', 'profile');
    }

    public function updateProfileBasedOnSales()
    {
        $slab = CommisionSlab::where('min_sales', '<=', $this->total_sales)
            ->where('max_sales', '>=', $this->total_sales)
            ->first();

        if ($slab) {
            $this->profile = $slab->profile;
            $this->save();
        }
    }


}