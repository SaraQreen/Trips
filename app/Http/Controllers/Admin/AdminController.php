<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle_type;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
      
    }
   
    public function admin()
    {
        return view('admin');
    }
    public function drivers()
    {
        
       $drivers = DB::select(DB::raw("SELECT d.*,u.* FROM `drivers` d  JOIN users u ON u.id=d.driver_id;"));
        return view('Admin/drivers',['drivers'=>$drivers]);
    }

    public function management()
    {
        return view('Admin/management');
    }

    public function packages()
    {
        $packages = DB::select(DB::raw("SELECT * FROM `package`"));
        return view('Admin/packages',['packages'=>$packages]);
    }

    public function trips()
    {
        $trips = DB::select(DB::raw("SELECT trip_id,start_point_longitude,end_point_longitude,start_time,end_time,driver_id,status_id FROM `trip`"));
        return view('Admin/trips',['trips'=>$trips]);
    }

    public function users()
    {
        $users = DB::select(DB::raw("SELECT * FROM `users` WHERE role_type='USER'"));
        return view('Admin/users',['users'=>$users]);
    }

    public function vehicles()
    {
        $vehicle_types = Vehicle_type::get();
        $vehicles = DB::select(DB::raw("SELECT * FROM `vehicles`"));
        return view('Admin/vehicles',['vehicles' => $vehicles, 'vehicle_types' => $vehicle_types]);
    }
}
