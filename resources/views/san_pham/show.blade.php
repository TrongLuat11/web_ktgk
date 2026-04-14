<x-laptop-layout>
    <x-slot name="title">Chi Tiết Sản Phẩm</x-slot>

    <div style="margin-top: 20px; max-width: 800px;">

        <div style="margin-bottom:15px;">
            <a href="{{ route('san-pham.index') }}" class="btn btn-secondary btn-sm">
                <i class="fa fa-arrow-left"></i> Quay lại danh sách
            </a>
        </div>

        <h3 style="color:#1a73e8; font-weight:bold; margin-bottom:20px;">
            <i class="fa fa-laptop"></i> Chi Tiết Sản Phẩm
        </h3>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="row">
                    {{-- Hình ảnh sản phẩm --}}
                    <div class="col-md-4 text-center mb-3">
                        @if($sanPham->hinh_anh)
                            <img src="{{ asset('storage/image/' . $sanPham->hinh_anh) }}"
                                 alt="{{ $sanPham->tieu_de }}"
                                 style="max-width:100%; max-height:200px; object-fit:contain; border:1px solid #ddd; border-radius:8px; padding:8px;">
                        @else
                            <div style="width:100%; height:150px; background:#f5f5f5; border:1px solid #ddd; border-radius:8px; display:flex; align-items:center; justify-content:center;">
                                <i class="fa fa-image fa-3x text-muted"></i>
                            </div>
                        @endif
                    </div>

                    {{-- Thông tin sản phẩm --}}
                    <div class="col-md-8">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <th style="width:35%; background:#f8f9fa;">Tiêu đề</th>
                                    <td><strong>{{ $sanPham->tieu_de }}</strong></td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">CPU</th>
                                    <td>{{ $sanPham->cpu }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">RAM</th>
                                    <td>{{ $sanPham->ram }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">Ổ cứng</th>
                                    <td>{{ $sanPham->o_cung }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">Khối lượng</th>
                                    <td>{{ $sanPham->khoi_luong }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">Nhu cầu</th>
                                    <td>{{ $sanPham->nhu_cau }}</td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">Giá</th>
                                    <td style="color:#e53935; font-weight:bold;">
                                        {{ number_format($sanPham->gia, 0, ',', '.') }} đ
                                    </td>
                                </tr>
                                <tr>
                                    <th style="background:#f8f9fa;">Trạng thái</th>
                                    <td>
                                        @if($sanPham->status == 1)
                                            <span class="badge badge-success">Đang bán</span>
                                        @else
                                            <span class="badge badge-danger">Đã xóa</span>
                                        @endif
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- Nút thao tác --}}
                <div style="margin-top:15px; padding-top:15px; border-top:1px solid #eee;">
                    <a href="{{ route('san-pham.index') }}" class="btn btn-secondary">
                        <i class="fa fa-list"></i> Danh sách
                    </a>

                    <form action="{{ route('san-pham.destroy', $sanPham->id) }}"
                          method="POST"
                          style="display:inline;"
                          onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger ml-2">
                            <i class="fa fa-trash"></i> Xóa sản phẩm này
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-laptop-layout>
