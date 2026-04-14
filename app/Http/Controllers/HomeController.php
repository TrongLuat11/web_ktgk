<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        // Fetch all laptops from the 'san_pham' table
        $laptops = \Illuminate\Support\Facades\DB::table("san_pham")->get();
        return view("laptop.index", compact('laptops'));
    }

}
