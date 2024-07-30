@extends('layout.admin')
@section('content')
<div class="card">
	<div class="card-header">Thêm sản phẩm chi tiết</div>
	<div class="card-body">
		<form action="{{ route('admin.sanphamchitiet.them') }}" method="post" enctype="multipart/form-data">
			@csrf

			<div class="mb-3">
				<label class="form-label" for="thuocsanpham">Thuộc sản phẩm</label>
				<select class="form-select" aria-label="Default select example" name="sanpham_id">
					<option selected>Chọn</option>
					@foreach($sanpham as $value)
					<option value="1">{{ $value->tensanpham }}</option>
					@endforeach
				</select>
				@error('sanpham_id')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>
			<div class="mb-3">
				<label class="form-label" for="model">Model</label>
				<input type="text" class="form-control @error('model') is-invalid @enderror" id="model" name="model" value="{{ old('model') }}" required />
				@error('model')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="mausac">Màu Sắc</label>
				<input type="text" class="form-control @error('mausac') is-invalid @enderror" id="mausac" name="mausac" value="{{ old('mausac') }}" required />
				@error('mausac')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="congnghemanhinh">Công nghệ màn hình</label>
				<input type="text" class="form-control @error('congnghemanhinh') is-invalid @enderror" id="congnghemanhinh" name="congnghemanhinh" value="{{ old('congnghemanhinh') }}" required />
				@error('congnghemanhinh')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="kichthuocmanhinh">Kích thước màn hình</label>
				<input type="text" class="form-control @error('kichthuocmanhinh') is-invalid @enderror" id="kichthuocmanhinh" name="kichthuocmanhinh" value="{{ old('kichthuocmanhinh') }}" required />
				@error('kichthuocmanhinh')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="dophangiai">Độ phân giải</label>
				<input type="text" class="form-control @error('dophangiai') is-invalid @enderror" id="dophangiai" name="dophangiai" value="{{ old('dophangiai') }}" required />
				@error('dophangiai')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="bonho">Bộ nhớ</label>
				<input type="text" class="form-control @error('bonho') is-invalid @enderror" id="bonho" name="bonho" value="{{ old('bonho') }}" required />
				@error('bonho')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="chatlieu">Chất liệu</label>
				<input type="text" class="form-control @error('chatlieu') is-invalid @enderror" id="chatlieu" name="chatlieu" value="{{ old('chatlieu') }}" required />
				@error('chatlieu')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="trongluong">Trọng lượng</label>
				<input type="text" class="form-control @error('trongluong') is-invalid @enderror" id="trongluong" name="trongluong" value="{{ old('trongluong') }}" required />
				@error('trongluong')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="tinhtrang">Tình trạng</label>
				<input type="text" class="form-control @error('tinhtrang') is-invalid @enderror" id="tinhtrang" name="tinhtrang" value="{{ old('tinhtrang') }}" />
				@error('tinhtrang')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<div class="mb-3">
				<label class="form-label" for="baohanh">Bảo hành</label>
				<input type="text" class="form-control @error('baohanh') is-invalid @enderror" id="baohanh" name="baohanh" value="{{ old('baohanh') }}" required />
				@error('baohanh')
				<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
				@enderror
			</div>

			<button type="submit" class="btn btn-primary"><i class="fal fa-save"></i> Thêm vào CSDL</button>
		</form>
	</div>
</div>
@endsection