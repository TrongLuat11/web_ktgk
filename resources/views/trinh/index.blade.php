@extends('trinh.layout')
@section('content')

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="price-sort-bar">
    <span class="me-2">Tìm kiếm theo</span>
    @php
        $paramsAsc = request()->query();
        $paramsAsc['sort'] = 'asc';
        
        $paramsDesc = request()->query();
        $paramsDesc['sort'] = 'desc';
    @endphp
    <a href="{{ route('trinh.index', $paramsAsc) }}" class="btn btn-outline-secondary btn-sm {{ request('sort') == 'asc' ? 'active' : '' }}">Giá tăng dần</a>
    <a href="{{ route('trinh.index', $paramsDesc) }}" class="btn btn-outline-secondary btn-sm ms-2 {{ request('sort') == 'desc' ? 'active' : '' }}">Giá giảm dần</a>
</div>

<div class="row">
    @foreach($laptops as $laptop)
    <div class="col-md-3 d-flex align-items-stretch">
        <a href="{{ route('trinh.show', $laptop->id) }}" style="text-decoration: none; color: inherit; width: 100%;">
            <div class="product-card">
                <img src="{{ asset('storage/image/' . $laptop->hinh_anh) }}" alt="{{ $laptop->tieu_de }}" class="product-img">
                <div class="product-title">{{ $laptop->tieu_de }}</div>
                <div class="product-price">{{ number_format($laptop->gia, 0, ',', '.') }} VNĐ</div>
            </div>
        </a>
    </div>
    @endforeach
    
    @if(count($laptops) == 0)
    <div class="col-12 text-center mt-5">
        <p>Không có sản phẩm nào cho tiêu chí này.</p>
    </div>
    @endif
</div>
@endsection
