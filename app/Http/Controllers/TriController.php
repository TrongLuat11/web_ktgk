<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TriController extends Controller
{
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $laptops = DB::table("san_pham")
            ->where("tieu_de", "like", "%" . $keyword . "%")
            ->get();
        return view("laptop.index", compact("laptops"));
    }

    public function category($id) {
        $laptops = DB::table("san_pham")
            ->where("id_danh_muc", $id)
            ->get();
        return view("laptop.index", compact("laptops"));
    }
}
