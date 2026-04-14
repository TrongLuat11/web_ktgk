<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class MinhController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm (chỉ những sản phẩm có status = 1)
     */
    public function index()
    {
        $sanPhams = SanPham::active()->get();
        return view('san_pham.index', compact('sanPhams'));
    }

    /**
     * Hiển thị chi tiết một sản phẩm
     */
    public function show($id)
    {
        $sanPham = SanPham::active()->findOrFail($id);
        return view('san_pham.show', compact('sanPham'));
    }

    /**
     * Xóa mềm sản phẩm (cập nhật status = 0)
     */
    public function destroy($id)
    {
        $sanPham = SanPham::active()->findOrFail($id);
        $sanPham->status = 0;
        $sanPham->save();

        return redirect()->route('san-pham.index')
            ->with('success', 'Đã xóa sản phẩm "' . $sanPham->tieu_de . '" thành công!');
    }
}
