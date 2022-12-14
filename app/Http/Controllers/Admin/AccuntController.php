<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccuntController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {

        //view form to add this admin
        return view('Admin.admins');
    }

    protected function store(Request $request)
    {
        //save admin in DB using AJAX


        $admin = User::create([
            'user_name' => $request->user_name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_type' => 'ADMIN',
        ]);

        return response()->json(['admin' => $admin]);
    }

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

     public function show($id)
    {

        $admin = User::find($id);
        return response()->json(['admin' => $admin]);
    }

    protected function update(Request $request)
    {
        //update admin in DB using AJAX

        $admin = User::find($request->id);


        $admin->user_name = $request->user_name;
        $admin->full_name = $request->full_name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->save();

        return response()->json(['admin' => $admin]);
    }

    public function delete($id)
    {

        $admin = User::where('id',$id)->first()->delete();
       
    }





}
