<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle_type extends Model
{
    use HasFactory;
    protected $table = 'vehicle_types';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];
}
