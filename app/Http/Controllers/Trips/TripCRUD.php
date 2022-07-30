<?php

namespace App\Http\Controllers\Trips;

use App\Http\Controllers\Controller;
use App\Models\Trip;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TripCRUD extends Controller
{

    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users'],
        ]);
    }

    protected function store_trip(Request $request)
    {


          $data = $request->all();
          
            $trip = Trip::create([
           
            'start_point_longitude'=> $data['start_long'],
            'start_point_latitude'=> $data['start_lat'],
            'end_point_longitude'=> $data['end_long'],
            'end_point_latitude'=> $data['end_lat'],
            'start_time'=> $data['start_time'],
           // 'end_time'=> $data['end_time'],
            'driver_id'=> $data['id'],
            'available_size'=> $data['size'],
            'available_weight'=> $data['weight'],
            'available_seats'=> $data['seats'],
            'status_id'=> '1',
        ]);


        return $trip;
    }
}
