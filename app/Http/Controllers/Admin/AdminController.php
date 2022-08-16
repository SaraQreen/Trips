<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
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
        
        $drivers = DB::select(DB::raw("SELECT d.*,u.* FROM `drivers` d  JOIN users u ON u.id=d.driver_id WHERE u.role_type='DRIVER';"));
    //   $drivers = User::where('role_type','DRIVER')->with(['driver'])->get();
       $vehicle_types= Vehicle_type::get();
        return view('Admin/drivers',['drivers'=>$drivers,'vehicle_types'=>$vehicle_types]);
    }

    public function management()
    {
        $packages_type=DB::select(DB::raw("SELECT * FROM `package_type`"));
        $vehicle_types=DB::select(DB::raw("SELECT * FROM `vehicle_types`"));
        $vehicles_types = Vehicle_type::get();
        $prices=DB::select(DB::raw("SELECT p.*,v.name FROM `prices` p JOIN vehicle_types v on v.vehicle_type_id=p.vehicle_type_id"));
        return view('Admin/management',['packages_type'=>$packages_type, 'vehicle_types'=>$vehicle_types,'prices'=>$prices,'vehicles_types'=>$vehicles_types]);
    }

    public function packages()
    {
        $packages = DB::select(DB::raw("SELECT weight,width,height,start_address,end_address,trip_cost,receiver_name,receiver_phone,package_type,trip_status FROM `package`"));
        return view('Admin/packages',['packages'=>$packages]);
    }

    public function trips()
    {
        $trips = DB::select(DB::raw("SELECT start_address,end_address,start_time,end_time,available_size,available_weight,available_seats FROM `trip`"));
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

      public function admins()
    {
        $admins = DB::select(DB::raw("SELECT * FROM `users` WHERE role_type='ADMIN'"));
        return view('Admin/admins',['admins'=>$admins]);
    }

}
