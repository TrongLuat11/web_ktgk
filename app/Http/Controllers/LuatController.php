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
     * Process checkout, send confirmation email, and clear the shopping cart.
     */
    public function datHang(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('gio-hang')->with('error', 'Giỏ hàng trống!');
        }

        // Tính tổng tiền
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $paymentMethod = $request->input('payment_method', 'cash');
        $user = auth()->user();
        $customerName = $user ? $user->name : 'Khách hàng';
        $customerEmail = $user ? $user->email : null;

        // Gửi email xác nhận đơn hàng
        if ($customerEmail) {
            \Illuminate\Support\Facades\Mail::to($customerEmail)
                ->send(new \App\Mail\OrderConfirmation($cart, $total, $paymentMethod, $customerName));
        }

        // Clear the cart session
        session()->forget('cart');

        return redirect()->route('gio-hang')->with('success', 'Bạn đã đặt hàng thành công! Email xác nhận đã được gửi.');
    }
}
