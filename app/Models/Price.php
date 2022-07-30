<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;
    protected $table='prices';
    public $timestamps = false;
    protected $fillable = ['vehicle_type_id','p4km','p4kg',];
}
