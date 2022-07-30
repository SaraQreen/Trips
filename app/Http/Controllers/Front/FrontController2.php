<?php

namespace App\Http\Controllers\Front;

use App\Models\Vehicle_type;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class FrontController2 extends Controller
{
    //


    public function __construct()
    {
        $this->middleware('guest');
    }

    public function register_driver()
    {
        $vehicle_types = Vehicle_type::get();


        return view('Auth/register_driver', ['vehicle_types' => $vehicle_types]);
    }
}
