<x-laptop-layout :categories="$categories">
    <x-slot name="title">Trang Chủ - Laptops</x-slot>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif

    <div class="mt-3 mb-3 d-flex align-items-center">
        <span class="mr-3" style="font-style:italic; color:#555;">Tìm kiếm theo</span>
        <a href="{{ route('trinh.index', array_merge(request()->query(), ['sort' => 'asc'])) }}" class="btn btn-sm btn-outline-secondary {{ request('sort') == 'asc' ? 'active' : '' }}">Giá tăng dần</a>
        <a href="{{ route('trinh.index', array_merge(request()->query(), ['sort' => 'desc'])) }}" class="btn btn-sm btn-outline-secondary ml-2 {{ request('sort') == 'desc' ? 'active' : '' }}">Giá giảm dần</a>
    </div>

    <div class="list-laptop">
        @foreach($laptops as $laptop)
        <div class="laptop">
            <a href="{{ route('trinh.show', $laptop->id) }}">
                <img src="{{ asset('storage/image/' . $laptop->hinh_anh) }}" width="100%" style="object-fit:contain; height:150px; padding:10px;">
                <div class="p-2 text-dark" style="font-size:13px; line-height:1.4; min-height:60px;">{{ $laptop->tieu_de }}</div>
                <div style="color:red; font-style:italic; padding:0 10px 10px; font-size:14px;">{{ number_format($laptop->gia, 0, ',', '.') }} VND</div>
            </a>
        </div>
        @endforeach
    </div>

    @if(count($laptops) == 0)
        <div class="text-center mt-5">
            <p>Không có sản phẩm nào.</p>
        </div>
    @endif
</x-laptop-layout>