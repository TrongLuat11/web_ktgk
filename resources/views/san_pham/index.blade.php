<x-laptop-layout>
    <x-slot name="title">Quản Lý Sản Phẩm</x-slot>

    <div style="margin-top: 24px; margin-bottom: 30px;">

        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 style="color:#1a73e8; font-weight:bold; font-size:20px; margin:0; letter-spacing:1px;">
                QUẢN LÝ SẢN PHẨM
            </h2>
            <a href="{{ route('san-pham.create') }}" class="btn btn-primary btn-sm">
                <i class="fa fa-plus"></i> Thêm sản phẩm
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size:14px;">
                <i class="fa fa-check-circle"></i> {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
            </div>
        @endif

        <table id="sanPhamTable"
               class="table table-bordered table-striped table-hover"
               style="width:100%; font-size:13px;">
            <thead>
                <tr style="background:#f2f2f2;">
                    <th>Tiêu đề</th>
                    <th>CPU</th>
                    <th>RAM</th>
                    <th>Ổ cứng</th>
                    <th>Khối lượng</th>
                    <th>Nhu cầu</th>
                    <th>Giá</th>
                    <th>Ảnh</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($sanPhams as $sp)
                <tr>
                    <td>{{ $sp->tieu_de }}</td>
                    <td>{{ $sp->cpu }}</td>
                    <td>{{ $sp->ram }}</td>
                    <td>{{ $sp->luu_tru }}</td>
                    <td>{{ $sp->khoi_luong }}</td>
                    <td>{{ $sp->nhu_cau }}</td>
                    <td>{{ number_format($sp->gia, 2) }}</td>
                    <td style="text-align:center; vertical-align:middle;">
                        @if($sp->hinh_anh)
                            <img src="{{ asset('storage/image/' . $sp->hinh_anh) }}"
                                 alt="{{ $sp->tieu_de }}"
                                 style="width:48px; height:38px; object-fit:cover; border-radius:3px; border:1px solid #ddd;">
                        @else
                            <span style="color:#aaa;">—</span>
                        @endif
                    </td>
                    <td style="white-space:nowrap; vertical-align:middle; text-align:center;">
                        <a href="{{ route('san-pham.show', $sp->id) }}"
                           class="btn btn-primary btn-sm"
                           style="padding:2px 10px; font-size:13px;">
                            Xem
                        </a>
                        <form action="{{ route('san-pham.destroy', $sp->id) }}"
                              method="POST"
                              style="display:inline;"
                              onsubmit="return confirm('Bạn có chắc muốn xóa sản phẩm này?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    style="padding:2px 10px; font-size:13px;">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" style="text-align:center; color:#999;">Không có sản phẩm nào.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        $(document).ready(function () {
            $('#sanPhamTable').DataTable({
                pageLength: 10,
                lengthMenu: [10, 25, 50, 100],
                ordering: true,
                searching: true,
                language: {
                    lengthMenu: '_MENU_ entries per page',
                    search: 'Search:',
                    paginate: { previous: '&laquo;', next: '&raquo;' },
                    zeroRecords: 'Không tìm thấy sản phẩm nào',
                    emptyTable: 'Không có dữ liệu',
                    info: 'Hiển thị _START_ đến _END_ trong tổng số _TOTAL_ sản phẩm',
                    infoEmpty: 'Hiển thị 0 đến 0 trong 0 sản phẩm',
                    infoFiltered: '(lọc từ _MAX_ sản phẩm)',
                },
                columnDefs: [
                    { orderable: false, targets: [7, 8] }
                ]
            });
        });
    </script>

</x-laptop-layout>
