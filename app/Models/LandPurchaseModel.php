<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandPurchaseModel extends Model
{
    use HasFactory;
    protected $table = 'land_purchases';

    protected $fillable = [
        'land_owner_id',
        'city',
        'contact_number',
        'email',
        'mauza',
        'khasara_no',
        'ph_no',
        'area',
        'per_acre_cost',
        'total_land_cost',
        'payment_period',
    ];


    public function landownername()
    {
        return $this->hasOne(LandRegistrationMaster::class, 'id', 'land_owner_id');
    }
}