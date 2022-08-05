<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Routing\Controller;
use App\Models\Package_type;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class ManagementController extends Controller
{
    public function __construct()
    {
    }

    public function create_packagetype()
    {

        //view form to add this Package Type
        return view('Admin.management');
    }

    protected function store_packagetype(Request $request)
    {
        //save Package_Type in DB using AJAX


        $package_Type =Package_Type::create([
            'name' => $request->name,
        ]);

        return response()->json(['package_Type' => $package_Type]);
    }

    // protected function validator(Request $request)
    // {
    //     return Validator::make($request->all(), [
    //         'user_name' => ['required', 'string', 'max:255', 'unique:users'],
    //         'full_name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:6', 'confirmed'],
    //         'phone' => ['required', 'numeric', 'unique:users'],
    //     ]);
    // }


    public function show_packagetype($id)
    {

        $package_Type = package_Type::find($id);
        return response()->json(['package_Type' => $package_Type]);
    }

    protected function update_packagetype(Request $request)
    {
        //save Package Type in DB using AJAX

        $package_Type = Package_Type::find($request->id);


        $package_Type->name = $request->name;
       
        $package_Type->save();

        return response()->json(['package_Type' => $package_Type]);
    }

    public function delete_packagetype($id)
    {

        $package_Type = Package_Type::whereId($id)->first()->delete();
        return response()->json(['package_Type' => $package_Type]);
    }


    
}
