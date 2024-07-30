@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
	<div class="col-md-4">
		<div class="card">
			<div class="card-header bg-black text-white text-center">Đăng nhập</div>
			<div class="card-body">
				<form method="post" action="{{ route('login') }}">
					@csrf
					<br>
					<div class="mb-3">
						<label class="form-label" for="email">Tên Đăng Nhập</label>
						<input type="text"
							class="form-control {{ ($errors->has('email') || $errors->has('username')) ? 'is-invalid' : '' }}"
							id="email" name="email" value="{{ old('email') }}"
							placeholder="" required />
						@if($errors->has('email') || $errors->has('username'))
						<div class="invalid-feedback"><strong>{{ empty($errors->first('email')) ?
								$errors->first('username') : $errors->first('email') }}</strong></div>
						@enderror
					</div>

					<div class="mb-3">
						<label class="form-label" for="password">Mật khẩu</label>
						<input type="password" class="form-control @error('password') is-invalid @enderror"
							id="password" name="password" required />
						@error('password')
						<div class="invalid-feedback"><strong>{{ $message }}</strong></div>
						@enderror
					</div>

					<div class="mb-3 form-check">
						<input type="checkbox" class="form-check-input" name="remember" id="remember" {{ old('remember')
							? 'checked' : '' }} />
						<label class="form-check-label" for="remember">Duy trì đăng nhập</label>
					</div>

					<div class="mb-0 text-center">
						<button type="submit" class="btn btn-info"><i class="fa-light fa-sign-in-alt"></i> Đăng
							nhập</button>
						@if (Route::has('password.request'))
						<a class="btn btn-link" href="{{ route('password.request') }}">Quên mật khẩu?</a>
						@endif
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection