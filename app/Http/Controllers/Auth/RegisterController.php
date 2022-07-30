<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\ImageServiceProvider;
use Intervention\Image\Facades\Image;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
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
    protected function valid_driver(Request $request)
    {
        return Validator::make($request->all(), [
            'user_name' => ['required', 'string', 'max:255', 'unique:users'],
            'full_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
            'phone' => ['required', 'numeric', 'unique:users'],
            'license_num' => ['required', 'numeric', 'unique:vehicles'],
        ]);
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
        ]);
    }

    protected function get()
    {
        return User::get();
    }

    protected function store_user(Request $request)
    {
        $vaild = $this->validator($request);
        if ($vaild->fails()) {
            return redirect()->back()->withErrors($vaild)->withInput($request->all());
        }

        $data = $request->all();
        $user = User::create([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'role_type' => 'USER',
        ]);

        Auth::login($user);
        return redirect()->to('home');
    }

    protected function store_driver(Request $request)
    {

        $vaild = $this->valid_driver($request);
        if ($vaild->fails()) {
            return redirect()->back()->withErrors($vaild)->withInput($request->all());
        }
        $data = $request->all();

        $vehicle = Vehicles::create([
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
        
        $user = User::create([
            'user_name' => $data['user_name'],
            'full_name' => $data['full_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
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



        Auth::login($user);
       return redirect()->to('home');
    }
}
