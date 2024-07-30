@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Sản phẩm chi tiết</div>
    <div class="card-body table-responsive">
        <p>
            <a href="{{ route('admin.sanphamchitiet.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a>
            <a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fa-light fa-upload"></i> Nhập từ Excel</a>
            <a href="{{ route('admin.sanphamchitiet.xuat') }}" class="btn btn-success"><i class="fa-light fa-download"></i> Xuất ra Excel</a>
        </p>
        <table class="table table-bordered table-hover table-sm mb-3">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="5%">Model</th>
                    <th width="5%">Màu Sắc</th>
                    <th width="10%">Công nghệ màn hình</th>
                    <th width="10%">kích thước màn hình</th>
                    <th width="15%">Độ phân giải</th>
                    <th width="10%">Bộ nhớ</th>
                    <th width="10%">Chất liệu</th>
                    <th width="10%">Trọng lượng</th>
                    <th width="10%">Tình trạng</th>
                    <th width="10%">Bảo hành</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sanphamchitiet as $value)
                <tr>
                    <td>{{ $loop->index + $sanphamchitiet->firstItem() }}</td>
                    <td>{{ $value->model }}</td>
                    <td>{{ $value->mausac }}</td>
                    <td>{{ $value->congnghemanhinh }}</td>
                    <td>{{ $value->kichthuocmanhinh }}</td>
                    <td>{{ $value->dophangiai }}</td>
                    <td>{{ $value->bonho}}</td>
                    <td>{{ $value->chatlieu}}</td>
                    <td>{{ $value->trongluong }}</td>
                    <td>{{ $value->tinhtrang }}</td>
                    <td>{{ $value->baohanh }}</td>


                    <td class="text-center"><a href="{{ route('admin.sanphamchitiet.sua', ['id' => $value->id]) }}"><i class="far fa-pen-to-square" style="color: blue;"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.sanphamchitiet.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa sản phẩm chi tiết {{ $value->tensanpham }} không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $sanphamchitiet->links('vendor.pagination.bootstrap-4-custom') }}
    </div>
</div>

<form action="{{ route('admin.sanphamchitiet.nhap') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="importModal" tabindex="-1" role="dialog" aria-labelledby="importModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="importModalLabel">Nhập từ Excel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-0">
                        <label for="file_excel" class="form-label">Chọn tập tin Excel</label>
                        <input type="file" class="form-control" id="file_excel" name="file_excel" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-light fa-times"></i> Hủy bỏ</button>
                    <button type="submit" class="btn btn-danger"><i class="fa-light fa-upload"></i> Nhập dữ liệu</button>
                </div>
            </div>
        </div>
    </div>
</form>

@endsection