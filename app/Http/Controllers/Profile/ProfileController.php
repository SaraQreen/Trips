<?php

namespace App\Http\Controllers\Profile;

use App\Models\Driver;
use App\Models\Package;
use App\Models\Passenger_trip;
use App\Models\Trip;
use App\Models\Vehicle_type;
use App\Models\Vehicles;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Geocodio;
use Illuminate\Support\Facades\DB;

class ProfileController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile_user()
    {

        return view('Profile/my_profile');
    }

    public function profile_driver()
    {
        $id = Auth::user()->id;
        $driver = Driver::where('driver_id', $id)->first();

        $id2 = Driver::where('driver_id', $id)->first()->vehicle_id;
        $vehicle = Vehicles::where('vehicle_id', $id2)->first();
        return view('Profile/my_profile_driver', ['vehicle' => $vehicle,'driver' => $driver]);
    }

    public function profile_user_log()
    {
        $id = Auth::user()->id;
        $seats = DB::select(DB::raw("SELECT p.*,t.start_time,t.end_time,u.user_name,ts.name FROM `passenger_trip` p JOIN  trip t ON p.trip_id=t.trip_id JOIN users u ON t.driver_id=u.id JOIN trip_status ts ON t.status_id=ts.status_id WHERE p.passenger_id=$id;"));
        $packages = DB::select(DB::raw("SELECT p.*  ,t.start_time,t.end_time,u.user_name,ts.name 'status',pt.name 'type' FROM `package` p JOIN trip t ON t.trip_id=p.trip_id JOIN users u ON u.id=t.driver_id JOIN trip_status ts ON ts.status_id=t.status_id JOIN package_type pt ON pt.package_type_id=p.package_type_id WHERE p.sender_id=$id;"));
        return view('Profile/my_profile_log', ['seats' => $seats, 'packages' => $packages]);
    }

    public function profile_driver_log()
    {
        $id = Auth::user()->id;
        $trips = DB::select(DB::raw("SELECT t.* ,ts.name 'status' ,ifnull(c.counts,0) counts ,ifnull(c.weight,0) weight,ifnull(c.pac_cost,0)pac_cost,rs.seats,ifnull(pass.distance,0) distance,ifnull(pass.p_cost,0) p_cost,ifnull(p_cost+pac_cost,0)cost
        FROM `trip` t 
        JOIN trip_status ts ON ts.status_id=t.status_id 
        left JOIN (SELECT p.trip_id, COUNT(p.trip_id) as counts,sum(p.weight) as weight ,sum(p.trip_cost) as pac_cost FROM package p GROUP BY p.trip_id) c ON c.trip_id=t.trip_id 
        join (SELECT t.trip_id,(v.passenger_count - t.available_seats) seats FROM trip t JOIN drivers d ON d.driver_id=t.driver_id JOIN vehicles v ON v.vehicle_id=d.vehicle_id) as rs ON rs.trip_id=t.trip_id 
        left join(SELECT t.trip_id,sum(p.km_distance) distance,sum(p.trip_cost)p_cost FROM trip t JOIN passenger_trip p ON p.trip_id=t.trip_id GROUP BY t.trip_id) pass ON pass.trip_id=t.trip_id
        WHERE t.driver_id=$id;"));

        return view('Profile/my_profile_log_driver', ['trips' => $trips]);
    }

    public function profile_driver_vehicle()
    {
        $vehicle_types = Vehicle_type::get();
        $id = Auth::user()->id;
        $id2 = Driver::where('driver_id', $id)->first()->vehicle_id;
        $vehicle = Vehicles::where('vehicle_id', $id2)->first();

        return view('Profile/my_profile_driver_vehicle', ['vehicle' => $vehicle, 'vehicle_types' => $vehicle_types]);
    }

    public function change_password()
    {

        return view('Profile/change_password');
    }


    protected function get()
    {
        $response = Geocodio::reverse('33.900185, 35.484369');
        $id = Auth::user()->id;
        $trips = Passenger_trip::all()->where('passenger_id', $id);
        $packages = Package::all()->where('sender_id', $id);

        return $response;
    }
}
