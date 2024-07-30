@extends('layout.admin')

@section('content')
	<div class="card">
		<div class="card-header">Sửa loại sản phẩm</div>
		<div class="card-body">
			<form action="{{ route('admin.loaisanpham.sua', ['id' => $loaisanpham->id]) }}" method="post">
				@csrf
				
				<div class="mb-3">
					<label class="form-label" for="tenloai">Tên loại</label>
					<input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai" name="tenloai" value="{{ $loaisanpham->tenloai }}" required />
					@error('tenloai')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Cập nhật</button>
			</form>
		</div>
	</div>
@endsection