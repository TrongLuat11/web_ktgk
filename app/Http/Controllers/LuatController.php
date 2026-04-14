<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LuatController extends Controller
{
    /**
     * Display the shopping cart interface.
     */
    public function gioHang()
    {
        $cart = session()->get('cart', []);

        return view('giohang', compact('cart'));
    }

    /**
     * Remove an item from the shopping cart.
     */
    public function xoaGioHang($id)
    {
        $cart = session()->get('cart', []);
        
        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return redirect()->back();
    }

    /**
     * Process checkout and clear the shopping cart.
     */
    public function datHang(Request $request)
    {
        // Handle checkout business logic here (e.g., save to orders table)
        
        // Clear the cart session
        session()->forget('cart');

        // Redirect back with success message
        return redirect()->route('gio-hang')->with('success', 'Bạn đã đặt hàng thành công!');
    }
}
