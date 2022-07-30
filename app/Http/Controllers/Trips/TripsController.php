<?php

namespace App\Http\Controllers\Trips;

use App\Models\Driver;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TripsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function trips_user()
    {
        
        
        $trips = DB::select(DB::raw("SELECT t.*,v.vehicle_type,u.user_name FROM `trip` t JOIN drivers d ON d.driver_id=t.driver_id JOIN vehicles v ON v.vehicle_id=d.vehicle_id JOIN users u ON u.id=d.driver_id;"));
        return view('Trips/book_trip',['trips'=>$trips]);
    }

    public function trips_driver()
    {
        return view('Trips/book_trip_driver');
    }

    public function announce_trips()
    {
        $id = Auth::user()->id;
        $id2 = Driver::where('driver_id', $id)->first()->vehicle_id;
        $vehicle = Vehicles::where('vehicle_id', $id2)->first();


        return view('Trips/announce_trip', ['vehicle' => $vehicle]);
    }

    public function book_trips_seat()
    {
        return view('Trips/book_trip_seat_form');
    }

    public function book_trips_package()
    {
        return view('Trips/book_trip_package_form');
    }

    public function track_trips_user()
    {
        return view('Trips/trip_track');
    }

    public function track_trips_driver()
    {
        return view('Trips/trip_track_driver');
    }
}
