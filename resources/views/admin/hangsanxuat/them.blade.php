@extends('layout.admin')

@section('content')
	<div class="card">
		<div class="card-header">Thêm hãng sản xuất</div>
		<div class="card-body">
			<form action="{{ route('admin.hangsanxuat.them') }}" method="post" enctype="multipart/form-data">
				@csrf
				
				<div class="mb-3">
					<label class="form-label" for="tenhang">Tên hãng sản xuất</label>
					<input type="text" class="form-control @error('tenhang') is-invalid @enderror" id="tenhang" name="tenhang" value="{{ old('tenhang') }}" required />
					@error('tenhang')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<div class="mb-3">
					<label class="form-label" for="hinhanh">Hình ảnh</label>
					<input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" />
					@error('hinhanh')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
					@enderror
				</div>
				
				<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
			</form>
		</div>
	</div>
@endsection