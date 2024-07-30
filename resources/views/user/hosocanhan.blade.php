@extends('layouts.frontend')
@section('title', 'Hồ sơ khách hàng')
@section('content')

<div class="bg-secondary py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item">
                        <a class="text-nowrap" href="{{ route('frontend.home') }}">
                            <i class="ci-home"></i>Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap">
                        <a href="{{ route('user.hosocanhan') }}">Khách hàng</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Hồ sơ cá nhân</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Hồ sơ cá nhân</h1>
        </div>
    </div>
</div>

<section class="hero">
    <div class="breadcrumb-option spad set-bg" data-setbg="#">
        <div class="container ">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="{{env('APP_URL') . '/storage/app/' . $nguoidung->image_user}}" alt="Admin" class="rounded-circle border border-primary" width="150">
                        <div class="mt-3">
                            <h4>{{$nguoidung->name}}</h4>
                        </div>
                    </div>
                    <hr class="my-4">
                    <ul class="list-group list-group-flush">
                        <div class="card-body">
                            <div class="row mb-3">
                                <form action="{{ route('user.hosocanhan') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label" for="image_user">Image</label>
                                        @if(empty($nguoidung->image_user))
                                        <image class="d-block rounded img-thumbnail" src="{{env('APP_URL') . '/storage/app/'.$nguoidung->image_user}}" width="100"></image>
                                        <span class="d-block small text-danger">Bỏ trống nếu muốn giữ ảnh cũ.</span>
                                        @endif
                                        <input type="file" class="form-control @error('image_user') is-invalid @enderror" id="image_user" name="image_user" />
                                        @error('image_user')
                                        <div class="invalid-feedback"> <strong>{{$message}}</strong> </div>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="name"> Họ và tên </label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{$nguoidung->name}}" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="email"> Email </label>
                                        <input type="text" class="form-control" id="email" name="email" value="{{$nguoidung->email}}" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address" required></input>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label" for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone" required></input>
                                    </div>

                                    <hr class="my-4">
                                    <div class="mb-3 form-check">
                                        <input class="form-check-input" type="checkbox" id="change_password_checkbox" name="change_password_checkbox" />
                                        <label class="form-check-label" for="change_password_checkbox">Change password</label>
                                    </div>
                                    <div id="change_password_group">
                                        <div class="mb-3">
                                            <label class="form-label" for="password">New Password</label>
                                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" />
                                            @error('password')
                                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label" for="password_confirmation">New Password Confirmation</label>
                                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" />
                                            @error('password_confirmation')
                                            <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                            @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">update</button>
                                </form>
                            </div>
                        </div>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>




@endsection