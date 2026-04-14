<x-laptop-layout :categories="$categories">
    <x-slot name="title">Trang Chủ - Laptops</x-slot>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="mt-3 mb-3 d-flex align-items-center">
        <span class="mr-3 font-weight-bold">Sắp xếp theo:</span>
        <a href="{{ route('trinh.index', ['sort' => 'asc']) }}" class="btn btn-sm btn-outline-secondary {{ request('sort') == 'asc' ? 'active' : '' }}">Giá tăng dần</a>
        <a href="{{ route('trinh.index', ['sort' => 'desc']) }}" class="btn btn-sm btn-outline-secondary ml-2 {{ request('sort') == 'desc' ? 'active' : '' }}">Giá giảm dần</a>
    </div>

    <div class="list-laptop">
        @foreach($laptops as $laptop)
        <div class="laptop pb-2 shadow-sm">
            <a href="{{ route('trinh.show', $laptop->id) }}">
                <img src="{{ asset('storage/image/' . $laptop->hinh_anh) }}" width="100%" style="object-fit:cover; max-height:200px">
                <div class="p-2 font-weight-bold text-dark" style="font-size:13px">{{ $laptop->tieu_de }}</div>
                <div style="color:red; font-weight:bold; padding-bottom:5px">{{ number_format($laptop->gia, 0, ',', '.') }} VNĐ</div>
            </a>
            <form action="{{ route('trinh.addcart', $laptop->id) }}" method="POST" class="mt-2 mb-2 px-2">
                @csrf
                <button type="submit" class="btn btn-sm btn-success w-100"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ</button>
            </form>
        </div>
        @endforeach
    </div>

    @if(count($laptops) == 0)
        <div class="text-center mt-5">
            <p>Không có sản phẩm nào.</p>
        </div>
    @endif
</x-laptop-layout>