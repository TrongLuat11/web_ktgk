<x-laptop-layout :categories="$categories">
    <x-slot name="title">{{ $laptop->tieu_de }}</x-slot>

    @if(session('success'))
    <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="row mt-3 mb-5">
        <div class="col-md-4 text-center">
            <img src="{{ asset('storage/image/' . $laptop->hinh_anh) }}" alt="{{ $laptop->tieu_de }}" class="img-fluid" style="max-height: 350px; object-fit: contain;">
        </div>
        <div class="col-md-8">
            <h5 style="font-weight:bold; margin-bottom:15px;">{{ $laptop->tieu_de }}</h5>
            <div style="font-size: 14px; color: #333; line-height: 2;">
                @if($laptop->cpu)<div><b>CPU:</b> {{ $laptop->cpu }}</div>@endif
                @if($laptop->ram)<div><b>RAM:</b> {{ $laptop->ram }}</div>@endif
                @if($laptop->luu_tru)<div><b>Ổ cứng:</b> {{ $laptop->luu_tru }}</div>@endif
                @if($laptop->chip_do_hoa)<div><b>Chip đồ họa:</b> {{ $laptop->chip_do_hoa }}</div>@endif
                @if($laptop->nhu_cau)<div><b>Nhu cầu:</b> {{ $laptop->nhu_cau }}</div>@endif
                @if($laptop->man_hinh)<div><b>Màn hình:</b> {{ $laptop->man_hinh }}</div>@endif
                @if($laptop->he_dieu_hanh)<div><b>Hệ điều hành:</b> {{ $laptop->he_dieu_hanh }}</div>@endif
                <div><b>Giá:</b> <span style="color:red; font-weight:bold;">{{ number_format($laptop->gia, 0, ',', '.') }} VND</span></div>
            </div>

            <form action="{{ route('trinh.addcart', $laptop->id) }}" method="POST" class="d-flex align-items-center mt-3 pt-3" style="border-top:1px solid #ddd;">
                @csrf
                <label class="mr-2 mb-0" style="font-weight:bold;">Số lượng mua:</label>
                <input type="number" name="quantity" value="1" min="1" class="form-control" style="width: 70px;">
                <button type="submit" class="btn btn-outline-primary ml-3 px-4">Thêm vào giỏ hàng</button>
            </form>

            <div style="border-top:1px solid #ddd; margin-top:15px; padding-top:15px;">
                <h6 style="font-weight:bold;">Thông tin khác</h6>
                <div style="font-size: 14px; color: #333; line-height: 2;">
                    @if($laptop->khoi_luong)<div><b>Khối lượng:</b> {{ $laptop->khoi_luong }}</div>@endif
                    @if($laptop->webcam)<div><b>Webcam:</b> {{ $laptop->webcam }}</div>@endif
                    @if($laptop->pin)<div><b>Pin:</b> {{ $laptop->pin }}</div>@endif
                    @if($laptop->ket_noi_khong_day)<div><b>Kết nối không dây:</b> {{ $laptop->ket_noi_khong_day }}</div>@endif
                    @if($laptop->ban_phim)<div><b>Bàn phím:</b> {{ $laptop->ban_phim }}</div>@endif
                    @if($laptop->cong_ket_noi)<div><b>Cổng kết nối:</b> {{ $laptop->cong_ket_noi }}</div>@endif
                </div>
            </div>
        </div>
    </div>
</x-laptop-layout>
