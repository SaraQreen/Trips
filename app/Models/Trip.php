<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $table='trip';
    public $timestamps = false;
    protected $primaryKey = 'trip_id';
    protected $fillable = [
       
        'start_point_longitude',
        'start_point_latitude',
        'end_point_longitude',
        'end_point_latitude',
        'start_time',
        'end_time',
        'driver_id',
        'available_size',
        'available_weight',
        'available_seats',
        'status_id',
        'driver_rating',
        
    ];

}
