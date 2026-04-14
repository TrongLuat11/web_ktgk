<x-laptop-layout>
    <x-slot name="title">Thêm Sản Phẩm</x-slot>

    <div style="margin-top: 24px; margin-bottom: 30px; max-width: 800px; margin-left: auto; margin-right: auto;">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color:#1a73e8; font-weight:bold; margin:0;">
                <i class="fa fa-plus-circle"></i> THÊM SẢN PHẨM MỚI
            </h4>
            <a href="{{ route('san-pham.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Quay lại
            </a>
        </div>

        @if($errors->any())
            <div class="alert alert-danger" style="font-size:13px;">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- FORM THÊM THỦ CÔNG --}}
        <div class="card shadow-sm mb-4">
            <div class="card-header" style="background:#122333; color:white; font-weight:bold; font-size:14px;">
                <i class="fa fa-pencil"></i> Thêm thủ công
            </div>
            <div class="card-body" style="font-size:13px;">
                <form action="{{ route('san-pham.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Tiêu đề <span class="text-danger">*</span></label>
                            <input type="text" name="tieu_de" class="form-control form-control-sm" value="{{ old('tieu_de') }}" required>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Danh mục <span class="text-danger">*</span></label>
                            <select name="id_danh_muc" class="form-control form-control-sm" required>
                                <option value="">-- Chọn danh mục --</option>
                                @foreach($danhMucs as $dm)
                                    <option value="{{ $dm->id }}">{{ $dm->ten_danh_muc }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Giá (VND) <span class="text-danger">*</span></label>
                            <input type="number" name="gia" class="form-control form-control-sm" value="{{ old('gia') }}" required>
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Hình ảnh</label>
                            <input type="file" name="hinh_anh_file" class="form-control-file" accept="image/*,.webp">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">CPU</label>
                            <input type="text" name="cpu" class="form-control form-control-sm" value="{{ old('cpu') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">RAM</label>
                            <input type="text" name="ram" class="form-control form-control-sm" value="{{ old('ram') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Ổ cứng</label>
                            <input type="text" name="luu_tru" class="form-control form-control-sm" value="{{ old('luu_tru') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Chip đồ họa</label>
                            <input type="text" name="chip_do_hoa" class="form-control form-control-sm" value="{{ old('chip_do_hoa') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Màn hình</label>
                            <input type="text" name="man_hinh" class="form-control form-control-sm" value="{{ old('man_hinh') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Nhu cầu</label>
                            <input type="text" name="nhu_cau" class="form-control form-control-sm" value="{{ old('nhu_cau') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Hệ điều hành</label>
                            <input type="text" name="he_dieu_hanh" class="form-control form-control-sm" value="{{ old('he_dieu_hanh') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Khối lượng</label>
                            <input type="text" name="khoi_luong" class="form-control form-control-sm" value="{{ old('khoi_luong') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Pin</label>
                            <input type="text" name="pin" class="form-control form-control-sm" value="{{ old('pin') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Webcam</label>
                            <input type="text" name="webcam" class="form-control form-control-sm" value="{{ old('webcam') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Kết nối không dây</label>
                            <input type="text" name="ket_noi_khong_day" class="form-control form-control-sm" value="{{ old('ket_noi_khong_day') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Bàn phím</label>
                            <input type="text" name="ban_phim" class="form-control form-control-sm" value="{{ old('ban_phim') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Cổng kết nối</label>
                            <input type="text" name="cong_ket_noi" class="form-control form-control-sm" value="{{ old('cong_ket_noi') }}">
                        </div>
                        <div class="col-md-6 form-group mb-2">
                            <label class="font-weight-bold">Bảo hành</label>
                            <input type="text" name="bao_hanh" class="form-control form-control-sm" value="{{ old('bao_hanh') }}">
                        </div>
                    </div>

                    <div class="text-center mt-3">
                        <button type="submit" class="btn btn-primary px-5">
                            <i class="fa fa-save"></i> Lưu sản phẩm
                        </button>
                    </div>
                </form>
            </div>
        </div>

        {{-- FORM IMPORT CSV --}}
        <div class="card shadow-sm mb-5">
            <div class="card-header" style="background:#28a745; color:white; font-weight:bold; font-size:14px;">
                <i class="fa fa-file-text-o"></i> Import từ file CSV
            </div>
            <div class="card-body" style="font-size:13px;">
                <p class="text-muted mb-2">
                    File CSV cần có hàng đầu tiên là tên cột:
                    <code>tieu_de, gia, id_danh_muc, cpu, ram, luu_tru, ...</code>
                </p>
                <form action="{{ route('san-pham.import-csv') }}" method="POST" enctype="multipart/form-data" class="d-flex align-items-center">
                    @csrf
                    <input type="file" name="csv_file" class="form-control-file mr-3" accept=".csv,.txt" required>
                    <button type="submit" class="btn btn-success">
                        <i class="fa fa-upload"></i> Import CSV
                    </button>
                </form>
            </div>
        </div>

    </div>
</x-laptop-layout>
