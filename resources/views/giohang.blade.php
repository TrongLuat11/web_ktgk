<x-laptop-layout>
    <x-slot name="title">
        Giỏ hàng
    </x-slot>

    <div class="mt-4">
        <div class="text-center mb-3">
            <h5 class="text-primary font-weight-bold" style="color: #0056b3; text-transform: uppercase;">DANH SÁCH SẢN PHẨM</h5>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered text-center align-middle bg-white">
            <thead class="bg-light">
                <tr>
                    <th style="width: 50px;">STT</th>
                    <th>Tên sản phẩm</th>
                    <th style="width: 100px;">Số lượng</th>
                    <th style="width: 150px;">Đơn giá</th>
                    <th style="width: 80px;">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0; $stt = 1; @endphp
                @if(session('cart') && count(session('cart')) > 0)
                    @foreach(session('cart') as $id => $details)
                        @php $total += $details['price'] * $details['quantity']; @endphp
                        <tr>
                            <td>{{ $stt++ }}</td>
                            <td class="text-left">{{ $details['name'] }}</td>
                            <td>{{ $details['quantity'] }}</td>
                            <td>{{ number_format($details['price'], 0, ',', '.') }}đ</td>
                            <td>
                                <a href="{{ route('gio-hang.xoa', $id) }}" class="btn btn-danger btn-sm">Xóa</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">Giỏ hàng trống</td>
                    </tr>
                @endif
                <tr class="font-weight-bold">
                    <td colspan="3" class="text-center">Tổng cộng</td>
                    <td colspan="2" class="text-left">{{ number_format($total, 0, ',', '.') }}đ</td>
                </tr>
            </tbody>
        </table>

        @if(session('cart') && count(session('cart')) > 0)
        <div class="text-center mt-4 mb-5">
            <form action="{{ route('gio-hang.dat') }}" method="POST">
                @csrf
                <div class="form-group d-flex justify-content-center align-items-center flex-column">
                    <label class="font-weight-bold">Hình thức thanh toán</label>
                    <select class="form-control text-center" name="payment_method" style="width: 150px;">
                        <option value="cash">Tiền mặt</option>
                        <option value="transfer">Chuyển khoản</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary mt-2">ĐẶT HÀNG</button>
            </form>
        </div>
        @endif
    </div>
</x-laptop-layout>
