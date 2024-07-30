@extends('layout.admin')

@section('content')
	<div class="card">
		<div class="card-header">Thêm loại sản phẩm</div>
		<div class="card-body">
			<form action="{{ route('admin.loaisanpham.them') }}" method="post">
				@csrf
				
				<div class="mb-3">
					<label class="form-label" for="tenloai">Tên loại</label>
					<input type="text" class="form-control @error('tenloai') is-invalid @enderror" id="tenloai" name="tenloai" value="{{ old('tenloai') }}" required />
					@error('tenloai')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection