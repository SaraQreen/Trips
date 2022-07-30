<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;
    protected $table = 'vehicles';
    public $timestamps = false;
    protected $fillable = [
        'brand',
        'model',
        'license_num',
        'color',
        'insurance_type',
        'passenger_count',
        'vehicle_type',
        'max_load_size',
        'max_load_weight',

    ];
}
