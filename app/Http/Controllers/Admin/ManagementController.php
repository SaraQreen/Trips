<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Routing\Controller;
use App\Models\Package_type;
use App\Models\Price;
use App\Models\Vehicle_type;
use App\Models\Vehicles;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class ManagementController extends Controller
{
    public function __construct()
    {
    }

    //Package_type management

    public function create_packagetype()
    {

        //view form to add this Package Type
        return view('Admin.management');
    }

    protected function store_packagetype(Request $request)
    {
        //save Package_Type in DB using AJAX


        $packages_type = Package_type::create([
            'name' => $request->name,
        ]);

        return response()->json(['package_type' => $packages_type]);
    }


    public function show_packagetype($id)
    {

        $packages_type = Package_type::where('package_type_id', $id)->first();

        return  $packages_type;
    }

    protected function update_packagetype(Request $request)
    {
        $id = $request->package_type_id;
        $update = Package_type::where("package_type_id", $id)->update([
            'name' => $request->name,
        ]);


        // return response()->json(['packages_type' => $packages_type]);
    }

    public function delete_packagetype($id)
    {

        $packages_type = Package_type::where('package_type_id', $id)->delete();
        return response()->json(['packages_type' => $packages_type]);
    }


    //Vehicle_type management

    public function create_vehicletype()
    {

        //view form to add this Vehicle Type
        return view('Admin.management');
    }

    protected function store_vehicletype(Request $request)
    {
        //save Vehicle_Type in DB using AJAX
         $request;

        $vehicle_types = Vehicle_type::create([
            'name' => $request->name,
        ]);
        // $vehicle_types['id'];
         $prices = Price::create([
            'vehicle_type_id' =>  $vehicle_types['id'],
            'p4km' => $request->Price_Per_KM,
            'p4kg' => $request->Price_Per_KG,
        ]);

    
    }

    public function show_vehicletype($id)
    {

        $vehicles_type = Vehicle_type::where('vehicle_type_id', $id)->first();

        return  $vehicles_type;
    }

    protected function update_vehicletype(Request $request)
    {

        $id = $request->vehicle_type_id;
        return $update = Vehicle_type::where("vehicle_type_id", $id)->update([
            'name' => $request->name,
        ]);
    }

    public function delete_vehicletype($id)
    {
        $prices = Price::where('vehicle_type_id', $id)->delete();
        $vehicles_type = Vehicle_type::where('vehicle_type_id', $id)->delete();
       
        
    }


    //price management

    public function create_price()
    {

        //view form to add this price
        return view('Admin.management');
    }



    public function show_price($id)
    {
       

        $prices = Price::where('price_id', $id)->first();

        return $prices;
    }

    protected function update_price(Request $request)
    {
        $id = $request->price_id_edit;
        return $update = Price::where("price_id", $id)->update([
           
            'p4km' => $request->p4km,
            'p4kg' => $request->p4kg,
        ]);





        //$prices = Price::find($request->id);

        //$prices->vehicle_type_id = $request->vehicle_type_id;
        //$prices->p4km = $request->p4km;
        //$prices->p4kg = $request->p4kg;

        //$prices->save();

        //return response()->json(['prices' => $prices]);
    }

    
}
