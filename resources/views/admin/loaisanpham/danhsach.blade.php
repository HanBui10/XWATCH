@extends('layout.admin')

@section('content')
<div class="card">
	<div class="card-header">Loại sản phẩm</div>
	<div class="card-body table-responsive">
		<p>
			<a href="{{ route('admin.loaisanpham.them') }}" class="btn btn-info"><i class="fal fa-plus"></i> Thêm mới</a>
			<a href="#nhap" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#importModal"><i class="fa-light fa-upload"></i> Nhập từ Excel</a>
			<a href="{{ route('admin.loaisanpham.xuat') }}" class="btn btn-success"><i class="fa-light fa-download"></i> Xuất ra Excel</a>
		</p>
		<table class="table table-bordered table-hover table-sm mb-0">
			<thead>
				<tr>
					<th width="5%">#</th>
					<th width="45%">Tên loại</th>
					<th width="40%">Tên loại không dấu</th>
					<th width="5%">Sửa</th>
					<th width="5%">Xóa</th>
				</tr>
			</thead>
			<tbody>
				@foreach($loaisanpham as $value)
				<tr>
					<td>{{ $loop->iteration }}</td>
					<td>{{ $value->tenloai }}</td>
					<td>{{ $value->tenloai_slug }}</td>
					<td class="text-center"><a href="{{ route('admin.loaisanpham.sua', ['id' => $value->id]) }}"><i class="far fa-pen-to-square" style="color: blue;"></i></a></td>
					<td class="text-center"><a href="{{ route('admin.loaisanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa loại sản phẩm {{ $value->tenloai }} không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>

<form action="{{ route('admin.loaisanpham.nhap') }}" method="post" enctype="multipart/form-data">
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