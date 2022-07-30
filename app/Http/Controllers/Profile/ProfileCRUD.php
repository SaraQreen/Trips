<?php

namespace App\Http\Controllers\Profile;

use App\Models\Driver;
use App\Models\Package;
use App\Models\Passenger_trip;
use App\Models\Trip;
use App\Models\User;
use App\Models\Vehicle_type;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileCRUD extends Controller
{

    protected function valid_driver(Request $request)
    {
        return Validator::make($request->all(), [
            'user_name' => ['required', 'string', 'max:255', 'unique:users,user_name,' . Auth::user()->id],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . Auth::user()->id],
            'phone' => ['required', 'numeric', 'unique:users,phone,' . Auth::user()->id],
        ]);
    }


    public function update_driver(Request $request)
    {
        $vaild = $this->valid_driver($request);
        if ($vaild->fails()) {
            return redirect()->back()->withErrors($vaild)->withInput($request->all());
        }
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
            return $driver;
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
            return $driver;
        } elseif (array_key_exists('u_id_photo', $data) && !array_key_exists('u_license', $data)) {
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
            return $driver;
        } else {

            $user = User::where("id", $data['u_id'])->update([
                'user_name' => $data['user_name'],
                'full_name' => $data['full_name'],
                'email' => $data['email'],
                'phone' => $data['phone'],
            ]);
            return redirect()->back()->with(['success' => 'updated successfuly']);
        }
    }

    public function update_vehicle(Request $request)
    {
        $vaild = $request->validate([
            'license_num' => ['required', 'numeric', 'unique:vehicles'],
        ]);

        $data = $request->all();

        $vehicle = Vehicles::where("vehicle_id", $data['u_id'])->update([
            'brand' => $data['brand'],
            'model' =>  $data['model'],
            'license_num' =>  $data['license_num'],
            'color' =>  $data['color'],
            'insurance_type' => $data['insurance_type'],
            'passenger_count' =>  $data['passenger_count'],
            'vehicle_type' => $data['vehicle_type'],
            'max_load_size' => $data['max_load_size'],
            'max_load_weight' => $data['max_load_weight'],
        ]);
        return redirect()->back()->with(['success' => 'updated successfuly']);
    }

    public function changePasswordPost(Request $request)
    {
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // The passwords matches
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        if (strcmp($request->get('current-password'), $request->get('new-password')) == 0) {
            // Current password and new password same
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        //Change Password

        $user = User::where("id", Auth::user()->id)->update([
            'password' => Hash::make($request->get('new-password')),
        ]);

        return redirect()->back()->with("success", "Password successfully changed!");
    }

    public function delete_driver(Request $request)
    {
        $data = $request->all();
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $driver = Driver::findOrFail($id);
        $vehicle_id=$data['d_id'];
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

        File::delete(public_path('images/ID/' . $driver->id_photo));
        File::delete(public_path('images/license/' . $driver->id_photo));
        return redirect()->route('home');
    }

    public function delete_user()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $pass_trips = Passenger_trip::where('passenger_id', $id)->get();
        $packs = Package::where('sender_id', $id)->get();
        if (isset($pass_trips) || isset($trips) || isset($packs)) {
            $botUser = User::where('user_name', '=', 'bot')->get()->first();

            foreach ($pass_trips as $pass_trip) {
                $pass_trip->passenger_id = $botUser->id;
                $pass_trip->save();
            }

            foreach ($packs as $pack) {
                $pack->sender_id = $botUser->id;
                $pack->save();
            }

            $user->delete();
        } else {

            $user->forceDelete();
        }


        return redirect()->route('home');
    }

    public function update_user(Request $request)
    {
        $data = $request->all();
        $id = Auth::user()->id;
        $user = User::where("id", $id)->update([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'phone' => $data['phone'],
        ]);
        return redirect()->back()->with(['success' => 'updated successfuly']);

    }
}
