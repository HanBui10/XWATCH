@extends('layouts.frontend')
@section('title', 'Đăng ký tài khoản')
@section('content')
<!--<div class="container py-4 my-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow">
                <div class="card-body">
                    <h2 class="h4 mb-3 text-center"> Đăng ký</h2>
                    <p class="fs-sm text-muted mb-4">Việc đăng ký chỉ mất chưa đầy một phút nhưng mang lại cho bạn toàn quyền kiểm soát đơn hàng của mình.</p>
                    <form method="post" action="{{ route('register') }}" class="needs-validation" novalidate>
                        @csrf
                        <div class="row gx-4 gy-3">
                            <div class="col-sm-6">
                                <label class="form-label" for="name">Họ và tên</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
                                @error('name')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="email">Địa chỉ email</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                                @error('email')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="password">Mật khẩu</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
                                @error('password')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-12">
                                <label class="form-label" for="password-confirm">Xác nhận mật khẩu</label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password-confirm" name="password_confirmation" required />
                                @error('password_confirmation')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="col-12 text-end">
                                <button class="btn btn-primary" type="submit"><i class="ci-user me-2 ms-n1"></i>Đăng ký</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>-->

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
                                                <h4 class="text-center">ĐĂNG KÝ TÀI KHOẢN</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <!--<div class="row">
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
                                    </div>-->
                                    <form action="{{ route('register') }}" method="post">
                                        @csrf
                                        <div class="row gy-3 overflow-hidden">
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="name" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name') }}" placeholder="name" required>
                                                    <label for="name" class="form-label">Họ và tên</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email') }}" placeholder="email" required>
                                                    <label for="email" class="form-label">Địa chỉ email</label>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="password" required>
                                                    <label for="password" class="form-label">Mật khẩu</label>
                                                    @error('password')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="form-floating mb-3">
                                                    <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password-confirm" placeholder="password-confirm" required>
                                                    <label for="password-confirm" class="form-label">Xác nhận mật khẩu</label>
                                                    @error('password_confirmation')
                                                    <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <div class="d-grid">
                                                    <button class="btn btn-dark btn-lg" type="submit">Đăng ký</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection