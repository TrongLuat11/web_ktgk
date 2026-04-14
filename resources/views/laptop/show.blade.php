<x-laptop-layout :categories="$categories">
    <x-slot name="title">
        {{ $laptop->tieu_de }}
    </x-slot>

    @if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="row bg-white p-4 rounded shadow-sm mt-3 mb-5">
        <div class="col-md-5 text-center d-flex align-items-center justify-content-center">
            <img src="{{ asset('storage/image/' . $laptop->hinh_anh) }}" alt="{{ $laptop->tieu_de }}" class="img-fluid" style="max-height: 400px; object-fit: contain;">
        </div>
        <div class="col-md-7 border-left px-4">
            <h4>{{ $laptop->tieu_de }}</h4>
            <div style="font-size: 15px; color: #555; line-height: 1.8;">
                @if($laptop->cpu)<p class="mb-0"><b>CPU:</b> {{ $laptop->cpu }}</p>@endif
                @if($laptop->ram)<p class="mb-0"><b>RAM:</b> {{ $laptop->ram }}</p>@endif
                @if($laptop->luu_tru)<p class="mb-0"><b>Ổ cứng:</b> {{ $laptop->luu_tru }}</p>@endif
                @if($laptop->chip_do_hoa)<p class="mb-0"><b>Chip đồ họa:</b> {{ $laptop->chip_do_hoa }}</p>@endif
                @if($laptop->nhu_cau)<p class="mb-0"><b>Nhu cầu:</b> {{ $laptop->nhu_cau }}</p>@endif
                @if($laptop->man_hinh)<p class="mb-0"><b>Màn hình:</b> {{ $laptop->man_hinh }}</p>@endif
                @if($laptop->he_dieu_hanh)<p class="mb-0"><b>Hệ điều hành:</b> {{ $laptop->he_dieu_hanh }}</p>@endif
            </div>
            
            <p class="mt-3 text-danger" style="font-size: 22px; font-weight: bold;">
                Giá: {{ number_format($laptop->gia, 0, ',', '.') }} VNĐ
            </p>
            
            <form action="{{ route('trinh.addcart', $laptop->id) }}" method="POST" class="d-flex align-items-center mt-3 border-top pt-3 border-bottom pb-3">
                @csrf
                <label class="mr-2 mb-0 font-weight-bold">Số lượng mua:</label>
                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 80px;">
                <button type="submit" class="btn btn-primary ml-3 px-4"><i class="fa fa-shopping-cart mr-2"></i> Thêm vào giỏ hàng</button>
            </form>

            <h5 class="mt-4 font-weight-bold">Thông tin khác</h5>
            <div style="font-size: 14px; color: #555; line-height: 1.8;">
                @if($laptop->khoi_luong)<p class="mb-0"><b>Khối lượng:</b> {{ $laptop->khoi_luong }}</p>@endif
                @if($laptop->webcam)<p class="mb-0"><b>Webcam:</b> {{ $laptop->webcam }}</p>@endif
                @if($laptop->pin)<p class="mb-0"><b>Pin:</b> {{ $laptop->pin }}</p>@endif
                @if($laptop->ket_noi_khong_day)<p class="mb-0"><b>Kết nối không dây:</b> {{ $laptop->ket_noi_khong_day }}</p>@endif
                @if($laptop->ban_phim)<p class="mb-0"><b>Bàn phím:</b> {{ $laptop->ban_phim }}</p>@endif
                @if($laptop->cong_ket_noi)<p class="mb-0"><b>Cổng kết nối:</b> {{ $laptop->cong_ket_noi }}</p>@endif
            </div>
        </div>
    </div>
</x-laptop-layout>
