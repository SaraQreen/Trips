<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    use HasFactory;
    protected $table = 'drivers';
    protected $primaryKey = 'driver_id';
    public $timestamps = false;
    protected $fillable = [
        'driver_id',
        'id_photo',
        'license',
        'vehicle_id',

    ];
}
