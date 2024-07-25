<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetailInitial extends Model
{
    use HasFactory;
    protected $table = "client_details_intial";
    protected $fillable = ['initial_enquiry_id', 'name', 'phone', 'address', 'sponsor', 'client_id'];

    public function initialEnquiry()
    {
        return $this->belongsTo(InitialEnquiry::class);
    }

    public function agent()
    {
        return $this->hasOne(AgentRegistrationMaster::class, 'id', 'sponsor');
    }
    public function clientn()
    {
        return $this->hasMany(CustomerRegistrationMaster::class, 'id', 'client_id');
    }
    public function cliento()
    {
        return $this->hasOne(CustomerRegistrationMaster::class, 'id', 'client_id');
    }
}