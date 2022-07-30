<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip_status extends Model
{
    use HasFactory;
    protected $table = 'trip_status';
    public $timestamps = false;
    protected $fillable = [
        'name',
    ];

}
