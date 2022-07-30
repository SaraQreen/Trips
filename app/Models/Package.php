<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use HasFactory;
    protected $table='package';
    public $timestamps = false;
    protected $primaryKey = 'package_id';
    protected $fillable = [
        'weight',
        'width',
        'height',
        'length',
        'start_point_longitude',
        'start_point_latitude',
        'end_point_longitude',
        'end_point_latitude',
        'trip_cost',
        'receiver_name',
        'receiver_phone',
        'sender_id',
        'trip_id',
        'package_type_id',
        'sender_rating',
        
    ];

}
