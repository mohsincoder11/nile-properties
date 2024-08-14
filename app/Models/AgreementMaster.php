<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgreementMaster extends Model
{
    use HasFactory;
    protected $table = 'agreement_master';

    // Specify the primary key if it is not an auto-incrementing integer
    protected $primaryKey = 'id';

    // Disable timestamps if you don't want to use created_at and updated_at columns
    public $timestamps = true;

    // Define which attributes are mass assignable
    protected $fillable = [
        'document_name',
        'language',
        'description',
    ];
}