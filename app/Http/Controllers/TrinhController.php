<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class TrinhController extends Controller
{
    public function index(Request $request)
    {
        $categories = DB::table('danh_muc_laptop')->get();
        $query = DB::table('san_pham');
        
        if ($request->has('brand_id')) {
            $query->where('id_danh_muc', $request->brand_id);
        }
        
        if ($request->has('keyword')) {
            $query->where('tieu_de', 'like', '%' . $request->keyword . '%');
        }
        
        if ($request->has('sort')) {
            if ($request->sort == 'asc') {
                $query->orderBy('gia', 'asc');
            } elseif ($request->sort == 'desc') {
                $query->orderBy('gia', 'desc');
            }
        } else {
            // Mặc định hiển thị 20 sản phẩm nếu không có yêu cầu khác
            // Mặc dù yêu cầu nói mặc định hiển thị 20 laptop ở trang chủ, ta dùng limit
        }
        
        $laptops = $query->limit(20)->get();
        
        return view('laptop.index', compact('laptops', 'categories'));
    }

    public function show($id)
    {
        $categories = DB::table('danh_muc_laptop')->get();
        $laptop = DB::table('san_pham')->where('id', $id)->first();
        if(!$laptop) {
            abort(404);
        }
        return view('laptop.show', compact('laptop', 'categories'));
    }

    public function addToCart(Request $request, $id)
    {
        $laptop = DB::table('san_pham')->where('id', $id)->first();
        if(!$laptop) {
            abort(404);
        }
        $cart = Session::get('cart', []);
        $qty = $request->input('quantity', 1);
        
        if(isset($cart[$id])) {
            $cart[$id]['quantity'] += $qty;
        } else {
            $cart[$id] = [
                'name' => $laptop->tieu_de,
                'quantity' => $qty,
                'price' => $laptop->gia,
                'image' => $laptop->hinh_anh
            ];
        }
        Session::put('cart', $cart);
        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng thành công!');
    }
}
