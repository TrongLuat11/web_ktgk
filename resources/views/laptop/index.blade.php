<x-laptop-layout>
    <x-slot name="title">
        Laptop
    </x-slot>

    @if(isset($laptops) && count($laptops) > 0)
    <div class="list-laptop mt-4">
        @foreach($laptops as $laptop)
        <div class="laptop p-2">
            <a href="#">
                <img src="{{ asset('images/'.$laptop->hinh_anh) }}" alt="{{ $laptop->tieu_de }}" width="100%">
                <h6 class="mt-2 text-dark">{{ $laptop->tieu_de }}</h6>
                <div class="laptop-info mt-2">
                    <span class="text-danger font-weight-bold">{{ number_format($laptop->gia, 0, ',', '.') }}đ</span>
                </div>
            </a>
            <div class="mt-2">
                <a href="#"><button class="btn btn-sm btn-primary">Mua ngay</button></a>
                <a href="#"><button class="btn btn-sm btn-success">Thêm giỏ hàng</button></a>
            </div>
        </div>
        @endforeach
    </div>
    @else
    <p class="text-center mt-4">Không có sản phẩm nào.</p>
    @endif
</x-laptop-layout>