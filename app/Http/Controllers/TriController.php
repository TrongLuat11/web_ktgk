<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TriController extends Controller
{
    public function search(Request $request) {
        $keyword = $request->input('keyword');
        $categories = DB::table('danh_muc_laptop')->get();
        $laptops = DB::table("san_pham")
            ->where("tieu_de", "like", "%" . $keyword . "%")
            ->get();
        return view("laptop.index", compact("laptops", "categories"));
    }

    public function category($id) {
        $categories = DB::table('danh_muc_laptop')->get();
        $laptops = DB::table("san_pham")
            ->where("id_danh_muc", $id)
            ->get();
        return view("laptop.index", compact("laptops", "categories"));
    }
}
