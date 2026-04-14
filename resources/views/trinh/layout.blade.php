<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Laptop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; font-family: Arial, sans-serif; }
        .navbar-custom { background-color: #0f2027; }
        .navbar-custom .nav-link { color: white; font-weight: bold; margin-right: 15px;}
        .navbar-custom .nav-link:hover { color: #f39c12; }
        .product-card { 
            background: white; border: 1px solid #ddd; border-radius: 8px; 
            padding: 15px; margin-bottom: 20px; transition: transform 0.2s; 
            text-align: center; height: 100%;
        }
        .product-card:hover { transform: translateY(-5px); box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .product-img { max-width: 100%; height: 200px; object-fit: contain; }
        .product-title { font-size: 14px; font-weight: 600; height: 60px; overflow: hidden; margin-top: 10px; color: #333;}
        .product-price { color: #d70018; font-weight: bold; font-size: 16px; margin-top: 10px; }
        .price-sort-bar { padding-bottom: 10px; margin-bottom: 20px; text-align: center;}
        .cart-icon { position: relative; color: white; font-size: 20px; text-decoration: none;}
        .cart-badge { position: absolute; top: -8px; right: -8px; background: #28a745; color: white; border-radius: 50%; padding: 2px 6px; font-size: 12px; }
        .user-menu { background: #28a745; color: white; border: none; padding: 5px 15px; border-radius: 4px; font-weight: bold;}
    </style>
</head>
<body>
    <div class="container-fluid p-0">
        <div class="w-100">
            <img src="{{ asset('images/banner.png') }}" class="img-fluid w-100" alt="Banner Laptop">
        </div>
        
        <nav class="navbar navbar-expand-lg navbar-custom py-2">
            <div class="container">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    @foreach($danh_mucs as $dm)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('trinh.index', ['brand_id' => $dm->id]) }}">{{ $dm->ten_danh_muc }}</a>
                    </li>
                    @endforeach
                </ul>
                <div class="d-flex align-items-center">
                    <form class="d-flex me-3">
                        <input class="form-control rounded-pill px-4" type="search" placeholder="Tìm kiếm laptop..." aria-label="Search" style="width: 250px;">
                    </form>
                    
                    @php
                        $cart = session('cart', []);
                        $totalQty = 0;
                        foreach($cart as $item) $totalQty += $item['quantity'];
                    @endphp
                    <a href="#" class="cart-icon me-4">
                        <i class="fas fa-shopping-cart"></i>
                        <span class="cart-badge">{{ $totalQty }}</span>
                    </a>
                    
                    <button class="user-menu">Kiên <i class="fas fa-caret-down"></i></button>
                </div>
            </div>
        </nav>
    </div>

    <div class="container mt-4 mb-5">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
