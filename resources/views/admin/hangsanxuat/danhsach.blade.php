@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Hãng sản xuất</div>
    <div class="card-body table-responsive">
        <p>
            <a href="{{ route('admin.hangsanxuat.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a>
            <a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fa-light fa-upload"></i> Nhập từ Excel</a>
            <a href="{{ route('admin.hangsanxuat.xuat') }}" class="btn btn-success"><i class="fa-light fa-download"></i> Xuất ra Excel</a>
        </p>
        
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="10%">Hình ảnh</th>
                    <th width="45%">Tên hãng sản xuất</th>
                    <th width="30%">Tên hãng sản xuất không dấu</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hangsanxuat as $value)
                <tr>
                    <!--<td>{{ $loop->iteration }}</td>-->
                    <td>{{ $loop->index + $hangsanxuat->firstItem() }}</td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->hinhanh }}" width="100" class="img-thumbnail" /></td>
                    <td>{{ $value->tenhang }}</td>
                    <td>{{ $value->tenhang_slug }}</td>
                    <td class="text-center"><a href="{{ route('admin.hangsanxuat.sua', ['id' => $value->id]) }}"><i class="far fa-pen-to-square" style="color: blue;"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.hangsanxuat.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa hãng sản xuất {{ $value->tenloai }} không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $hangsanxuat->links('vendor.pagination.bootstrap-4-custom')}}

    </div>
</div>

<form action="{{ route('admin.hangsanxuat.nhap') }}" method="post" enctype="multipart/form-data">
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