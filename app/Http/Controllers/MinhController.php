<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MinhController extends Controller
{
    /**
     * Hiển thị danh sách sản phẩm
     */
    public function index()
    {
        $sanPhams = SanPham::all();
        return view('san_pham.index', compact('sanPhams'));
    }

    /**
     * Xem chi tiết sản phẩm - chuyển đến trang chi tiết chính
     */
    public function show($id)
    {
        return redirect()->route('trinh.show', $id);
    }

    /**
     * Hiển thị form thêm sản phẩm
     */
    public function create()
    {
        $danhMucs = DB::table('danh_muc_laptop')->get();
        return view('san_pham.create', compact('danhMucs'));
    }

    /**
     * Lưu sản phẩm mới
     */
    public function store(Request $request)
    {
        $request->validate([
            'tieu_de' => 'required|string|max:255',
            'gia' => 'required|numeric|min:0',
            'id_danh_muc' => 'required|integer',
            'hinh_anh_file' => 'nullable|file|mimes:jpg,jpeg,png,gif,webp,bmp,svg|max:51200',
        ]);

        $data = $request->only([
            'tieu_de', 'ten', 'gia', 'id_danh_muc', 'bao_hanh', 'series_model',
            'mau_sac', 'nhu_cau', 'cpu', 'chip_do_hoa', 'man_hinh', 'webcam',
            'ram', 'luu_tru', 'cong_ket_noi', 'ket_noi_khong_day', 'ban_phim',
            'he_dieu_hanh', 'pin', 'khoi_luong', 'bao_mat',
        ]);

        // Xử lý upload hình ảnh
        if ($request->hasFile('hinh_anh_file')) {
            $file = $request->file('hinh_anh_file');
            $filename = time() . '_' . preg_replace('/\s+/', '_', $file->getClientOriginalName());
            $uploadPath = base_path('storage/public/image');

            // Tạo thư mục nếu chưa tồn tại
            if (!file_exists($uploadPath)) {
                mkdir($uploadPath, 0755, true);
            }

            $file->move($uploadPath, $filename);
            $data['hinh_anh'] = $filename;
        }

        SanPham::create($data);

        return redirect()->route('san-pham.index')
            ->with('success', 'Đã thêm sản phẩm "' . $data['tieu_de'] . '" thành công!');
    }

    /**
     * Import sản phẩm từ file CSV
     */
    public function importCsv(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|file|mimes:csv,txt|max:5120',
        ]);

        $file = $request->file('csv_file');
        $handle = fopen($file->getPathname(), 'r');

        // Đọc dòng header
        $header = fgetcsv($handle);
        if (!$header) {
            fclose($handle);
            return redirect()->back()->with('error', 'File CSV trống hoặc không hợp lệ!');
        }

        // Chuẩn hóa header (trim khoảng trắng, BOM)
        $header = array_map(function ($col) {
            return trim(preg_replace('/[\x00-\x1F\x80-\xFF]/', '', $col));
        }, $header);

        $count = 0;
        while (($row = fgetcsv($handle)) !== false) {
            if (count($row) !== count($header)) continue;

            $rowData = array_combine($header, $row);

            // Chỉ lấy các cột hợp lệ
            $fillable = (new SanPham)->getFillable();
            $data = [];
            foreach ($fillable as $col) {
                if (isset($rowData[$col]) && $rowData[$col] !== '') {
                    $data[$col] = $rowData[$col];
                }
            }

            if (!empty($data) && isset($data['tieu_de'])) {
                SanPham::create($data);
                $count++;
            }
        }

        fclose($handle);

        return redirect()->route('san-pham.index')
            ->with('success', "Đã import thành công {$count} sản phẩm từ CSV!");
    }

    /**
     * Xóa sản phẩm
     */
    public function destroy($id)
    {
        $sanPham = SanPham::findOrFail($id);
        $sanPham->delete();

        return redirect()->route('san-pham.index')
            ->with('success', 'Đã xóa sản phẩm "' . $sanPham->tieu_de . '" thành công!');
    }
}
