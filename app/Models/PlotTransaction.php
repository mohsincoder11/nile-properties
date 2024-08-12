<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlotTransaction extends Model
{
    use HasFactory;
     // Specify the table name if it's not the plural form of the model name
     protected $table = 'transactions';

     // The attributes that are mass assignable
     protected $fillable = [
         'plot_id',
         'customer_id',
         'agent_id',
         'sale_price',
         'commission_amount',
         'parent_commission_amount',
         'sale_date',
     ];
 
     // Define relationships
     public function plot()
     {
         return $this->belongsTo(Plot::class);
     }
 
     public function customer()
     {
         return $this->belongsTo(Customer::class);
     }
 
     public function agent()
     {
         return $this->belongsTo(Agent::class);
     }
}
