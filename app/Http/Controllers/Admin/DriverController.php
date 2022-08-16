<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Driver;
use App\Models\Package;
use App\Models\Passenger_trip;
use App\Models\Trip;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Vehicles;
use Faker\Core\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DriverController extends Controller
{
    public function __construct()
    {
    }

    
    public function create()
    {

        //view form to add this driver
        return view('Admin.drivers');
    }

    protected function store(Request $request)
    {
        
        //save driver in DB using AJAX


       
       $vehicle = Vehicles::create([
        'brand' => $request->brand,
        'model' =>  $request->model,
        'license_num' => $request->license_num,
        'color' =>  $request->color,
        'insurance_type' => $request->insurance_type,
        'passenger_count' => $request->passenger_count,
        'vehicle_type' => $request->vehicle_type,
        'max_load_size' => $request->max_load_size,
        'max_load_weight' => $request->max_load_weight,
    ]);
    
    $user = User::create([
        'user_name' => $request->user_name,
        'full_name' => $request->full_name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'phone' => $request->phone,
        'role_type' => 'DRIVER',
    ]);


    $id_photo = $request->id_photo;
    $file_name_id = date("Y-m-d",time()) . '_' . $user['user_name'] . '.' . $id_photo->getClientOriginalExtension();
    $path_ID = 'images/ID';
    $request->id_photo->move($path_ID, $file_name_id);

    $license = $request->license;
    $file_name_license = date("Y-m-d",time()) . '_' . $user['user_name'] . '.' . $license->getClientOriginalExtension();
    $path_license = 'images/License';
    $request->license->move($path_license, $file_name_license);



    $driver = Driver::create([
        'driver_id' => $user['id'],
        'id_photo' =>$file_name_id,
        'license' =>  $file_name_license,
        'vehicle_id' => $vehicle['id'],
    ]);



        return response()->json(['driver' => $driver]);
    }

    protected function valid_driver(Request $request)
    {
        return Validator::make($request->all(), [
            'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name,' . Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
            'phone' => ['required', 'numeric', 'unique:users,phone,' . Auth::user()->id],
        ]);
    }


    public function show($id)
    {
       
        $driver = DB::select(DB::raw("SELECT d.*,u.* FROM `drivers` d  JOIN users u ON u.id=d.driver_id where u.id=$id;"));
        // $driver = User::where('id',$id)->with(['driver'])->get();
        return $driver;
    }

    protected function update(Request $request)
    {
        //save driver in DB using AJAX
        $user = User::find($request->id);
        $data = $request->all();
        if (array_key_exists('u_id_photo', $data) && array_key_exists('u_license', $data)) {
            $user = User::where("id", $data['u_id'])->update([
                'user_name' => $data['user_name'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);
        $id_photo = $request->u_id_photo;
            $file_name_id = date("Y-m-d", time()) . '_' . $data['user_name'] . '.' . $id_photo->getClientOriginalExtension();
            $path_ID = 'images/ID';
            $request->u_id_photo->move($path_ID, $file_name_id);

            $license = $request->u_license;
            $file_name_license = date("Y-m-d", time()) . '_' . $data['user_name'] . '.' . $license->getClientOriginalExtension();
            $path_license = 'images/License';
            $request->u_license->move($path_license, $file_name_license);


        $driver = Driver::where("driver_id", $data['u_id'])->update([
            'id_photo' => $file_name_id,
            'license' =>  $file_name_license,

        ]);
        return response()->json(['driver' => $driver]);
    } elseif (!array_key_exists('u_id_photo', $data) && array_key_exists('u_license', $data)) {
        $user = User::where("id", $data['u_id'])->update([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);

        $license = $request->u_license;
            $file_name_license = date("Y-m-d", time()) . '_' . $data['user_name'] . '.' . $license->getClientOriginalExtension();
            $path_license = 'images/License';
            $request->u_license->move($path_license, $file_name_license);



            $driver = Driver::where("driver_id", $data['u_id'])->update([
                'license' =>  $file_name_license,

            ]);
            return response()->json(['driver' => $driver]);
        }elseif (array_key_exists('u_id_photo', $data) && !array_key_exists('u_license', $data)) {
            $user = User::where("id", $data['u_id'])->update([
                'user_name' => $data['user_name'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);
            $id_photo = $request->u_id_photo;
            $file_name_id = date("Y-m-d", time()) . '_' . $data['user_name'] . '.' . $id_photo->getClientOriginalExtension();
            $path_ID = 'images/ID';
            $request->u_id_photo->move($path_ID, $file_name_id);



            $driver = Driver::where("driver_id", $data['u_id'])->update([
                'id_photo' => $file_name_id,


            ]);
            return response()->json(['driver' => $driver]);
        }else {

            $user = User::where("id", $data['u_id'])->update([
                'user_name' => $data['user_name'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);
            return response()->json(['user' => $user]);
        }
    }

    public function delete( $id)
    {
       // $data = $request->all();
        //$id = Auth::user()->id;
        $user = User::findOrFail($id);
        $driver = Driver::findOrFail($id);
        $vehicle_id=$driver['vehicle_id'];
        $pass_trips = Passenger_trip::where('passenger_id', $id)->get();
        $trips = Trip::where('driver_id', $id)->get();
        $packs = Package::where('sender_id', $id)->get();
        if (isset($pass_trips) || isset($trips) || isset($packs)) {
            $botUser = User::where('user_name', '=', 'bot')->get()->first();

            foreach ($pass_trips as $pass_trip) {
                $pass_trip->passenger_id = $botUser->id;
                $pass_trip->save();
            }

            foreach ($trips as $trip) {
                $trip->driver_id = $botUser->id;
                $trip->save();
            }

            foreach ($packs as $pack) {
                $pack->sender_id = $botUser->id;
                $pack->save();
            }
            $driver->delete();
            $user->delete();
            Vehicles::where('vehicle_id', $vehicle_id)->delete();
        } else {
            $driver->forceDelete();
            $user->forceDelete();
            Vehicles::where('vehicle_id', $vehicle_id)->delete();
        }

        //File::delete(public_path('images/ID/' . $driver->id_photo));
        //File::delete(public_path('images/license/' . $driver->id_photo));
        

    return $driver;
}


}     
    

