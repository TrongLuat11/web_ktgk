<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <style>
        body { font-family: Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .email-container { max-width: 600px; margin: 20px auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .header { background: linear-gradient(135deg, #122333, #1a3a5c); color: #ffffff; padding: 25px; text-align: center; }
        .header h1 { margin: 0; font-size: 22px; }
        .header p { margin: 5px 0 0; font-size: 14px; opacity: 0.8; }
        .content { padding: 25px; }
        .greeting { font-size: 16px; color: #333; margin-bottom: 15px; }
        table { width: 100%; border-collapse: collapse; margin: 15px 0; }
        th { background-color: #122333; color: #fff; padding: 10px; text-align: left; font-size: 13px; }
        td { padding: 10px; border-bottom: 1px solid #eee; font-size: 13px; color: #555; }
        tr:last-child td { border-bottom: none; }
        .total-row { background-color: #f9f9f9; font-weight: bold; }
        .total-row td { color: #e74c3c; font-size: 15px; }
        .payment-info { background: #e8f5e9; border-left: 4px solid #4caf50; padding: 12px 15px; margin: 15px 0; border-radius: 4px; }
        .payment-info strong { color: #2e7d32; }
        .footer { background-color: #f8f9fa; padding: 15px; text-align: center; font-size: 12px; color: #999; border-top: 1px solid #eee; }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>🎉 Đặt hàng thành công!</h1>
            <p>Cảm ơn bạn đã mua sắm tại Laptop Store</p>
        </div>

        <div class="content">
            <p class="greeting">Xin chào <strong>{{ $customerName }}</strong>,</p>
            <p style="color: #555;">Đơn hàng của bạn đã được tiếp nhận thành công. Dưới đây là chi tiết:</p>

            <table>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Sản phẩm</th>
                        <th>SL</th>
                        <th>Đơn giá</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    @php $stt = 1; @endphp
                    @foreach($cart as $item)
                    <tr>
                        <td>{{ $stt++ }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>{{ number_format($item['price'], 0, ',', '.') }}đ</td>
                        <td>{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}đ</td>
                    </tr>
                    @endforeach
                    <tr class="total-row">
                        <td colspan="4" style="text-align: right;">TỔNG CỘNG:</td>
                        <td>{{ number_format($total, 0, ',', '.') }}đ</td>
                    </tr>
                </tbody>
            </table>

            <div class="payment-info">
                <strong>Hình thức thanh toán:</strong> {{ $paymentMethod == 'cash' ? 'Tiền mặt' : 'Chuyển khoản' }}
            </div>

            <p style="color: #555; font-size: 14px;">Chúng tôi sẽ liên hệ bạn sớm nhất để xác nhận đơn hàng. Nếu có thắc mắc, vui lòng phản hồi email này.</p>
        </div>

        <div class="footer">
            <p>© {{ date('Y') }} Laptop Store. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
