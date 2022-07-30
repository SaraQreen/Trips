<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Passenger_trip extends Model
{
    use HasFactory;
    protected $table='passenger_trip';
    public $timestamps = false;
    protected $fillable = [
        'passenger_id',
        'trip_id',
        'seat_reserved',
        'start_point_longitude',
        'start_point_latitude',
        'end_point_longitude',
        'end_point_latitude',
        'km_distance',
        'trip_cost',
        'passenger_rating',
    ];

}
