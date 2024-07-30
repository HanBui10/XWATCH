@extends('layout.admin')

@section('content')
<div class="card">
	<div class="card-header">Thêm slider</div>
	<div class="card-body">
		<form action="{{ route('admin.slider.them') }}" method="post" enctype="multipart/form-data">
			@csrf
			
            <div class="mb-3">
				<label class="form-label" for="anh1">Hình ảnh 1</label>
				<input type="file" class="form-control @error('anh1') is-invalid @enderror" id="anh1" name="anh1" value="{{ old('anh1') }}" />
				@error('anh1')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>
			<div class="mb-3">
				<label class="form-label" for="anh2">Hình ảnh 2</label>
				<input type="file" class="form-control @error('anh2') is-invalid @enderror" id="anh2" name="anh2" value="{{ old('anh2') }}" />
				@error('anh2')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="anh3">Hình ảnh 3</label>
				<input type="file" class="form-control @error('anh3') is-invalid @enderror" id="anh3" name="anh3" value="{{ old('anh3') }}" />
				@error('anh3')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="anh4">Hình ảnh 4</label>
				<input type="file" class="form-control @error('anh4') is-invalid @enderror" id="anh4" name="anh4" value="{{ old('anh4') }}" />
				@error('anh4')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="anh5">Hình ảnh 5</label>
				<input type="file" class="form-control @error('anh5') is-invalid @enderror" id="anh5" name="anh5" value="{{ old('anh5') }}" />
				@error('anh5')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>
			

			<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
		</form>
	</div>
</div>
@endsection
