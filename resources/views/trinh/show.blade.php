@extends('trinh.layout')
@section('content')

@if(session('success'))
<div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<div class="row bg-white p-4 rounded shadow-sm">
    <div class="col-md-5 text-center d-flex align-items-center justify-content-center">
        <img src="{{ asset('storage/image/' . $laptop->hinh_anh) }}" alt="{{ $laptop->tieu_de }}" class="img-fluid" style="max-height: 400px; object-fit: contain;">
    </div>
    <div class="col-md-7">
        <h4>{{ $laptop->tieu_de }}</h4>
        <div style="font-size: 15px; color: #555; line-height: 1.8;">
            @if($laptop->cpu)<p class="mb-0">CPU: {{ $laptop->cpu }}</p>@endif
            @if($laptop->ram)<p class="mb-0">RAM: {{ $laptop->ram }}</p>@endif
            @if($laptop->luu_tru)<p class="mb-0">Ổ cứng: {{ $laptop->luu_tru }}</p>@endif
            @if($laptop->chip_do_hoa)<p class="mb-0">Chip đồ họa: {{ $laptop->chip_do_hoa }}</p>@endif
            @if($laptop->nhu_cau)<p class="mb-0">Nhu cầu: {{ $laptop->nhu_cau }}</p>@endif
            @if($laptop->man_hinh)<p class="mb-0">Màn hình: {{ $laptop->man_hinh }}</p>@endif
            @if($laptop->he_dieu_hanh)<p class="mb-0">Hệ điều hành: {{ $laptop->he_dieu_hanh }}</p>@endif
        </div>
        
        <p class="mt-3 text-danger" style="font-size: 22px; font-weight: bold;">
            Giá: {{ number_format($laptop->gia, 0, ',', '.') }} VNĐ
        </p>
        
        <form action="{{ route('trinh.addcart', $laptop->id) }}" method="POST" class="d-flex align-items-center mt-3 border-top pt-3 border-bottom pb-3">
            @csrf
            <label class="me-2 fw-bold">Số lượng mua:</label>
            <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 80px;">
            <button type="submit" class="btn btn-primary ms-3 px-4"><i class="fas fa-shopping-cart me-2"></i> Thêm vào giỏ hàng</button>
        </form>

        <h5 class="mt-4 fw-bold">Thông tin khác</h5>
        <div style="font-size: 14px; color: #555; line-height: 1.8;">
            @if($laptop->khoi_luong)<p class="mb-0">Khối lượng: {{ $laptop->khoi_luong }}</p>@endif
            @if($laptop->webcam)<p class="mb-0">Webcam: {{ $laptop->webcam }}</p>@endif
            @if($laptop->pin)<p class="mb-0">Pin: {{ $laptop->pin }}</p>@endif
            @if($laptop->ket_noi_khong_day)<p class="mb-0">Kết nối không dây: {{ $laptop->ket_noi_khong_day }}</p>@endif
            @if($laptop->ban_phim)<p class="mb-0">Bàn phím: {{ $laptop->ban_phim }}</p>@endif
            @if($laptop->cong_ket_noi)<p class="mb-0">Cổng kết nối: {{ $laptop->cong_ket_noi }}</p>@endif
        </div>
    </div>
</div>
@endsection
