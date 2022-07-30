<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
    }

    public function create()
    {

        //view form to add this user
        return view('Admin.users');
    }

    protected function store(Request $request)
    {
        //save user in DB using AJAX


        $user = User::create([
            'user_name' => $request->user_name,
            'full_name' => $request->full_name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role_type' => 'USER',
        ]);

        return response()->json(['user' => $user]);
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

        $user = User::find($id);
        return response()->json(['user' => $user]);
    }

    protected function update(Request $request)
    {
        //update user in DB using AJAX

        $user = User::find($request->id);


        $user->user_name = $request->user_name;
        $user->full_name = $request->full_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->role_type = $user->role_type;
        $user->save();

        return response()->json(['user' => $user]);
    }

    public function delete($id)
    {

        $user = User::whereId($id)->first()->delete();
        return response()->json(['user' => $user]);
    }
}
