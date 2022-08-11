<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use App\Models\Package_type;
use App\Models\Price;
use App\Models\Vehicle_type;
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


        $packages_type =Package_type::create([
            'name' => $request->name,
        ]);

        return response()->json(['package_type' => $packages_type]);
    }

     


    public function show_packagetype($id)
    {

        $packages_type = Package_type::where('package_type_id',$id)->first();
        
        return response()->json(['packages_type' => $packages_type]);
    }

    protected function update_packagetype(Request $request)
    {
        //save Package Type in DB using AJAX

        $packages_type = Package_type::find($request->id);


        $packages_type->name = $request->name;
       
        $packages_type->save();

        return response()->json(['packages_type' => $packages_type]);
    }

    public function delete_packagetype($id)
    {

        $packages_type = Package_type::where('package_type_id',$id)->delete();
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


        $vehicle_types =Vehicle_type::create([
            'name' => $request->name,
        ]);

        return response()->json(['vehicle_type' => $vehicle_types]);
    }

    public function show_vehicletype($id)
    {

        $vehicles_type = Vehicle_type::where('vehicle_type_id',$id)->first();
        
        return response()->json(['vehicles_type' => $vehicles_type]);
    }

    protected function update_vehicletype(Request $request)
    {

        $vehicles_type = Vehicle_type::find($request->id);


        $vehicles_type->name = $request->name;
       
        $vehicles_type->save();

        return response()->json(['vehicles_type' => $vehicles_type]);
    }

    public function delete_vehicletype($id)
    {

        $vehicles_type = Vehicle_type::where('vehicle_type_id',$id)->delete();
        return response()->json(['vehicles_type' => $vehicles_type]);
    }


 //price management

 public function create_price()
 {

     //view form to add this price
     return view('Admin.management');
 }

 protected function store_price(Request $request)
 {
     //save Price in DB using AJAX

     $prices =Price::create([
         'vehicle_type_id' => $request->vehicle_type_id,
         'p4km' => $request->p4km,
         'p4kg' => $request->p4kg,
     ]);

     return response()->json(['prices' => $prices]);
 }

 public function show_price($id)
    {
        $vehicle_types = Vehicle_type::get();

        $prices = Price::where('price_id',$id)->first();
        
        return response()->json(['prices' => $prices,'vehicle_types'=>$vehicle_types]);
    }

    protected function update_price(Request $request)
    {

        $prices = Price::find($request->id);

        $prices->vehicle_type_id =$request->vehicle_type_id;
        $prices->p4km = $request->p4km;
        $prices->p4kg = $request->p4kg;
       
        $prices->save();

        return response()->json(['prices' => $prices]);
    }

    public function delete_price($id)
    {

        $prices = Price::where('price_id',$id)->delete();
        return response()->json(['prices' => $prices]);
    }







  


    

    
}
