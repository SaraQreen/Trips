<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\vehicles;
class VehicleController extends Controller
{
    public function create()
    {

        //view form to add this vehicle
        return view('Vehicle.Create');
    }


    protected function store(Request $request)
    {
        //save vehicle in DB using AJAX


        $vehicle = vehicles::create([
            'brand' => $request->brand,
            'model' => $request->model,
            'license_num' => $request->license_num,
            'color' => $request->color,
            'insurance_type' => $request->insurance_type,
            'passenger_count' => $request->passenger_count,
            'vehicle_type_id' => $request->vehicle_type_id,
            'max_load_size' => $request->max_load_size,
            'max_load_weight' => $request->max_load_weight,

        ]);

        return response()->json(['vehicle' => $vehicle]);
    }
        
    

    //protected function validator(Request $request)
    //{
       // return Validator::make($request->all(), [
            //'brand' => ['required', 'string', 'max:255', ],
            //'model' => ['required', 'string', 'max:255'],
            //'license_num' => ['required', 'string',  'max:255'],
            //'color' => ['required', 'string',],
            //'insurance_type' => ['required', 'string'],
            //'passenger_count' => ['required', 'numeric', 'max:255'],
            //'vehicle_type_id' => ['required', 'string', 'max:255'],
            //'max_load_size' => ['required', 'numeric', 'max:255'],
            //'max_load_weight' => ['required', 'numeric', 'max:255'],
       // ]);


      public function show($vehicle_id)
    {

        $vehicle = vehicles::find($vehicle_id);
        return response()->json(['vehicle' => $vehicle]);
    }

    protected function update(Request $request)
    {
        //update vehicle in DB using AJAX
        
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
        return response()->json(['vehicle' => $vehicle]);
    }

    public function delete($vehicle_id)
    {

        $vehicle = vehicles::whereId($vehicle_id)->first()->delete();
        return response()->json(['vehicle' => $vehicle]);
    }
}
