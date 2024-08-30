<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectEntry extends Model
{
    use HasFactory;
    use HasFactory;

    protected $table = 'projectentry';

    protected $fillable = [

        'firm_id',
        'city_id',
        'project_code',
        'project_name',
        'mobile_number',
        'whatsapp_number',
        'email',
        'mauja',
        'kh_no',
        'phn',
        'taluka',
        'district',
        'no_of_plots',
        'areasqrft_manual',
        'areasqrmt_manual',
        'sale_status_id',
        'layout_description',
        'area_plottable',
        'amenities',
        'open_space',
        'dev_charge',
        'other_charges_percentage',
        'site_map',
        'embedded_map',
        'brochure',
        'youtube_url',
        'status',
        'latitude',
        'longitude',
        'agent_name',
        'agent_designation',
        'profile_picture',
        'facebook',
        'twitter',
        'linkedin',
        'instagram',
        'schedule_payment',


        //end here
        // 'plot_no',
        // 'plot_width',
        // 'plot_length',
        // 'plot_area_sq_ft',
        // 'plot_area_sq_mt',
        // 'east',
        // 'west',
        // 'north',
        // 'south',
        // 'rate_sq_ft',
        // 'layout_image',
        'layout_feature',
    ];

    public function city()
    {
        return $this->belongsTo(City::class);
    }


    public function saleStatus()
    {
        return $this->belongsTo(PlotSaleStatus::class, 'sale_status_id');
    }
    // Inside your ProjectEntry model class
    protected $casts = [
        'layout_image' => 'array',
    ];

    public function firm()
    {
        return $this->hasOne(FirmRegistrationMaster::class, 'id', 'firm_id');
    }
    public function cityname()
    {
        return $this->hasOne(City::class, 'id', 'city_id');
    }
    public function PlotSaleStatus1()
    {
        return $this->hasOne(PlotSaleStatus::class, 'id', 'sale_status_id');
    }
    // public function saleStatus()
    // {
    //     return $this->belongsTo(PlotSaleStatus::class, 'sale_status_id');
    // }


    // for Business Hours / Time Slot

    public function days()
    {
        return $this->belongsToMany(Days::class, 'time_slots', 'project_entry_id', 'days_id')
            ->using(TimeSlot::class)
            ->withPivot(['open_at', 'close_at', 'is_close']);
    }

    public function timeSlots()
    {
        return $this->hasMany(TimeSlot::class, 'project_entry_id', 'id');
    }
}
