<?php

namespace App\Http\Controllers\Front;

use App\Models\Vehicle_type;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
class FrontController extends Controller
{
    //
   
    public function about()
    {
        return view('Front/about');
    }

    public function contact()
    {
        return view('Front/contact');
    }

    public function services()
    {
        return view('Front/services');
    }

   
}
