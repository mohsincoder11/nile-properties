<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchMaster extends Model
{
    use HasFactory;

    protected $table = "branch_master";

    protected $fillable = [
        'city_id',
        'branch',
        'address',
        'contact_person',
        'contact_number',
        'latitude',
        'longitude',

    ];

    public function city_name()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }


}
