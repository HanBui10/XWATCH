@extends('layout.admin')

@section('content')
<div class="card">
	<div class="card-header">Thêm sản phẩm</div>
	<div class="card-body">
		<form action="{{ route('admin.sanpham.them') }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="mb-3">
				<label class="form-label" for="loaisanpham_id">Loại sản phẩm</label>
				<select class="form-select @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
					<option value="">-- Chọn --</option>
					@foreach($loaisanpham as $value)
					<option value="{{ $value->id }}">{{ $value->tenloai }}</option>
					@endforeach
				</select>
				@error('loaisanpham_id')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="hangsanxuat_id">Hãng sản xuất</label>
				<select class="form-select @error('hangsanxuat_id') is-invalid @enderror" id="hangsanxuat_id" name="hangsanxuat_id" required>
					<option value="">-- Chọn --</option>
					@foreach($hangsanxuat as $value)
					<option value="{{ $value->id }}">{{ $value->tenhang }}</option>
					@endforeach
				</select>
				@error('hangsanxuat_id')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="tensanpham">Tên sản phẩm</label>
				<input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ old('tensanpham') }}" required />
				@error('tensanpham')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="soluong">Số lượng</label>
				<input type="number" min="0" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ old('soluong') }}" required />
				@error('soluong')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="giamoi">Giá mới</label>
				<input type="number" min="0" class="form-control @error('giamoi') is-invalid @enderror" id="giamoi" name="giamoi" value="{{ old('giamoi') }}" required />
				@error('giamoi')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="giacu">Giá cũ</label>
				<input type="number" min="0" class="form-control @error('giacu') is-invalid @enderror" id="giacu" name="giacu" value="{{ old('giacu') }}" required />
				@error('giacu')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="hinhanh">Hình ảnh sản phẩm</label>
				<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ old('hinhanh') }}" />
				@error('hinhanh')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>
			<div class="mb-3">
				<label class="form-label" for="hinhanh1">Hình ảnh sản phẩm 1</label>
				<input type="file" class="form-control @error('hinhanh1') is-invalid @enderror" id="hinhanh1" name="hinhanh1" value="{{ old('hinhanh1') }}" />
				@error('hinhanh1')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="hinh2">Hình ảnh sản phẩm 2</label>
				<input type="file" class="form-control @error('hinhanh2') is-invalid @enderror" id="hinhanh2" name="hinhanh2" value="{{ old('hinhanh2') }}" />
				@error('hinhanh2')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<!--<div class="mb-3">
				<label class="form-label" for="motasanpham">Mô tả sản phẩm</label>
				<textarea class="form-control" id="motasanpham" name="motasanpham">{{ old('motasanpham') }}</textarea>
			</div>-->

			<div class="mb-3">

				<label class="form-label" for="motasanpham">Mô tả sản phẩm</label>
				<textarea class="form-control" id="motasanpham" name="motasanpham" required>{{ old('motasanpham') }}</textarea>
				@error('motasanpham')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="doinetsanpham">Đôi nét sản phẩm</label>
				<textarea class="form-control" id="doinetsanpham" name="doinetsanpham">{{ old('doinetsanpham') }}</textarea>
				@error('doinetsanpham')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
		</form>
	</div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('public/vendor/ckeditor5/ckeditor.js') }}"></script>
<script>
	ClassicEditor.create(document.querySelector('#motasanpham'), {
		licenseKey: '',
	}).then(editor => {
		window.editor = editor;
	}).catch(error => {
		console.error(error);
	});
</script>
@endsection