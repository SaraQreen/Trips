<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Package_type extends Model
{
    use HasFactory;
    protected $table='package_type';
    public $timestamps = false;
    protected $fillable = ['name',];
}
