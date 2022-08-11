<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\vehicles;
class VehicleController extends Controller
{
    public function __construct()
    {

    }
    
    protected function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'brand' => ['required', 'string', 'max:255', ],
            'model' => ['required', 'string', 'max:255'],
            'license_num' => ['required', 'string',  'max:255'],
            'color' => ['required', 'string',],
            'insurance_type' => ['required', 'string'],
            'passenger_count' => ['required', 'numeric', 'max:255'],
            'vehicle_type' => ['required', 'string', 'max:255'],
            'max_load_size' => ['required', 'numeric', 'max:255'],
            'max_load_weight' => ['required', 'numeric', 'max:255'],
        ]);
    }
    

      public function show($id)
    {

        $vehicle = vehicles::find($id);
        return response()->json(['vehicle' => $vehicle]);
    }

    protected function update(Request $request)
    {
        //update vehicle in DB using AJAX
        
        $vehicle = vehicles::find($request->id);


        $vehicle->brand = $request->brand;
        $vehicle->model = $request->model;
        $vehicle->license_num = $request->license_num;
        $vehicle->color = $request->color;
        $vehicle->insurance_type = $request->insurance_type;
        $vehicle->passenger_count = $request->passenger_count;
        $vehicle->vehicle_type = $request->vehicle_type;
        $vehicle->max_load_size = $request->max_load_size;
        $vehicle->max_load_weight = $request->max_load_weight;
        $vehicle->save();
        return response()->json(['vehicle' => $vehicle]);
    }
    

    
}
