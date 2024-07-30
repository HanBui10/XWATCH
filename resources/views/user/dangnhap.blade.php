@extends('layouts.frontend')
@section('title', 'Đăng nhập')
@section('content')

<section class="bg-light p-3 p-md-4 p-xl-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-xxl-11">
                <div class="card border-light-subtle shadow-sm">
                    <div class="row g-0">
                        <div class="col-12 col-md-6">
                            <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{ asset('public/img/img5.jpg') }}" alt="Welcome back you've been missed!">
                        </div>
                        <div class="col-12 col-md-6 d-flex align-items-center justify-content-center">
                            <div class="col-12 col-lg-11 col-xl-10">
                                <div class="card-body p-3 p-md-4 p-xl-5">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="mb-5">
                                                <div class="text-center mb-4">
                                                    <a class="navbar-brand d-none d-sm-block flex-shrink-0" style="margin-left:80px" href="{{ route('frontend.home') }}">
                                                        <img src="{{ asset('public/img/WATCH.jpg') }}" width="170" />
                                                    </a>
                                                </div>
                                                <h4 class="text-center">ĐĂNG NHẬP TÀI KHOẢN</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-3 flex-column">
                                                <a href="{{ route('google.login') }}" class="btn btn-lg btn-outline-dark">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                                        <path d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                                    </svg>
                                                    <span class="ms-2 fs-6">Đăng nhập with Google</span>
                                                </a>
                                            </div>
                                            <p class="text-center mt-4 mb-5">Hoặc đăng nhập với</p>
                                        </div>
                                    </div>
                                    <form action="{{ route('login') }}" method="post">
                                        @csrf
                                        @if(session('warning'))
                                        <div class="alert alert-danger fs-base" role="alert">
                                            <i class="ci-close-circle me-2"></i>{{ session('warning') }}
                                        </div>
                                        @endif
                                        @if($errors->has('email') || $errors->has('username'))
                                        <div class="alert alert-danger fs-base" role="alert">
                                            <i class="ci-close-circle me-2"></i>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                                        </div>
                                        @endif
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control {{ ($errors->has('email') || $errors->has('username')) ? 'is-invalid' : '' }}" name="email" id="email" value="{{ old('email') }}" placeholder="name@example.com" required>
                                                    <label for="email" class="form-label">Email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" value="" placeholder="Password" required>
                                                    <label for="password" class="form-label">Password</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                                                    <label class="form-check-label text-secondary" for="remember_me">
                                                        Giữ đăng nhập 
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Đăng nhập</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-center mt-5">
                                                @if (Route::has('register'))
                                                <a href="{{ route('user.dangky') }}" class="link-secondary text-decoration-none">
                                                    <i class="fas fa-sign-in-alt"></i> 
                                                    <span style="margin-left: 5px;">Tạo tài khoản mới</span>
                                                </a>
                                                @endif
                                                @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}" class="link-secondary text-decoration-none">
                                                    <i class="fas fa-lock"></i>
                                                    <span style="margin-left: 5px;">Quên mật khẩu?</span>
                                                </a>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--<body>
    <div class="limiter">
        <div class="container-login100" style="background-image: url('public/img/bg-01.png')">
            <div class="wrap-login100 p-l-110 p-r-110 p-t-62 p-b-33">
                <form method="post" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf
                    @if(session('warning'))
                    <div class="alert alert-danger fs-base" role="alert">
                        <i class="ci-close-circle me-2"></i>{{ session('warning') }}
                    </div>
                    @endif
                    @if($errors->has('email') || $errors->has('username'))
                    <div class="alert alert-danger fs-base" role="alert">
                        <i class="ci-close-circle me-2"></i>{{ empty($errors->first('email')) ? $errors->first('username') : $errors->first('email') }}
                    </div>
                    @endif
                    <span class="login100-form-title p-b-53">
                        ĐĂNG NHẬP
                    </span>
                    <a href="{{ route('google.login') }}" class="btn-face m-b-20">
                        <i class="bi bi-google"></i>
                        Google
                    </a>
                    <div class="p-t-31 p-b-9">
                        <span class="txt1">
                            Tài khoản
                        </span>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Username is required">
                        <input type="text" class="input100" {{ ($errors->has('email') || $errors->has('username')) ? 'is-invalid' : '' }}" id="email" name="email" value="{{ old('email') }}" placeholder="Email, Tên đăng nhập hoặc Điện thoại" required />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="p-t-13 p-b-9">
                        <span class="txt1">
                            Mật khẩu
                        </span>
                        <a href="{{route('password.request')}}" class="txt2 bo1 m-l-5">
                            Quên mật khẩu?
                        </a>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input type="password" class="input100 @error('password') is-invalid @enderror" id="password" name="password" placeholder="Mật khẩu" required />
                        <span class="focus-input100"></span>
                    </div>

                    <div class="container-login100-form-btn m-t-17">
                        <button style="margin-top: 20px;" class="login100-form-btn">
                            ĐĂNG NHẬP
                        </button>
                    </div>

                    <div class="w-full text-center p-t-55">
                        <span class="txt2">
                            Chưa có tài khoản?
                        </span>
                        <a href="{{route('register')}}" class="txt2 bo1">
                            Đăng ký ngay
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div id="dropDownSelect1"></div>

</body>-->

@endsection