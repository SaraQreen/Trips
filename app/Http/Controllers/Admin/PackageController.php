<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function create()
    {return view('package.create');}

public function store(Request $request)
{    //validate
     //insert
     $rules=[
       
        'weigth' => 'required'|'numeric',
        
        'trip_cost'  => 'required'|'numeric',
        'receiver_name' => 'required',
        'receiver_phone' => 'required'|'numeric',
     ];
    $messages= [
        'weight.required' =>'وزن الطرد مطلوب',
        'trip_cost.required' =>'كلفة الرحلة مطلوبة' ,
        'trip_cost.numeric' =>'كلفة الرحلة يجب أن تكون رقمية' ,
        'receiver_name.required'  =>'اسم المستقبل مطلوب' ,
        'receiver_phone.required'  =>'رقم المستقبل مطلوب' ,
     ];
     $validator=Validator::make([$request->all()],$rules,$messages);
     if( $validator -> fails()){
         return redirect() ->back() ->withErrors( $validator) ->withInputs($request->all());
     }
      Package::create([
        'weight' => $request->weight,
        'width' => $request->width,
        'height' => $request->height,
        'length' => $request->lenght,
        'start_point_longitude' => $request->start_point_longitude,
        'start_point_latitude' =>  $request->start_point_latitude,
        'end_point_longitude' => $request->end_point_longitude,
        'end_point_latitude' => $request->end_point_latitude,
        'trip_cost' => $request->trip_cost,
        'receiver_name' => $request->receiver_name,
        'receiver_phone' => $request->receiver_phone,
        'sender_rating' => $request->sender_rating,
      ]);
      return redirect()->back()->with(['success' =>'تم إضافة الطرد بنجاح']);
}
}
