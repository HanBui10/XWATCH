@extends('layouts.frontend')
@section('title', 'Thanh toán')
@section('content')
<div class="page-title-overlap bg-black pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item">
                        <a class="text-nowrap" href="{{ route('frontend.home') }}"><i class="ci-home"></i>Trang chủ</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap">
                        <a href="{{ route('frontend.giohang') }}">Giỏ hàng</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Thanh toán</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Thanh toán</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="card">
        <div class="card-top border-bottom text-center">
            <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{ route('frontend.home') }}">
                <img style="margin-left:400px" src="{{asset('public/img/WATCH.jpg')}}" />
            </a>
        </div>
        <div class="card-body">
            <div class="row upper">
                <div class="steps steps-light pt-2 pb-3 mb-5" style="background:#fff">
                    <a class="step-item active" href="{{ route('frontend.giohang') }}">
                        <div class="step-progress"><span class="step-count">1</span></div>
                        <div style="color:#000" class="step-label"><i class="ci-cart"></i>Giỏ hàng</div>
                    </a>
                    <a class="step-item active current" href="#">
                        <div class="step-progress"><span class="step-count">2</span></div>
                        <div style="color:#000" class="step-label"><i class="ci-card"></i>Thanh toán</div>
                    </a>
                    <a class="step-item" href="#">
                        <div class="step-progress"><span class="step-count">3</span></div>
                        <div style="color:#000" class="step-label"><i class="ci-check-circle"></i>Hoàn tất</div>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <div class="left border">
                        <h2 class="h6 pt-1 pb-3 mb-3" style="text-align: center; font-size:18px">Thông tin giao hàng</h2>
                        <form method="post" action="{{ route('user.dathang') }}" class="needs-validation" novalidate>
                            @csrf
                            <div class="mb-3">
                                <label class="form-label" for="HoVaTen">&mdash; Khách hàng &mdash;</label>
                                <input class="form-control" type="text" id="HoVaTen" value="{{ Auth::user()->name ?? '' }}" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="HoVaTen">&mdash; Địa chỉ email &mdash;</label>
                                <input class="form-control" type="text" id="HoVaTen" value="{{ Auth::user()->email ?? '' }}" disabled />
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="dienthoaigiaohang">&mdash; Điện thoại giao hàng &mdash;</label>
                                <input class="form-control @error('dienthoaigiaohang') is-invalid @enderror" type="text" id="dienthoaigiaohang" name="dienthoaigiaohang" required />
                                @error('dienthoaigiaohang')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label class="form-label" for="diachigiaohang">&mdash; Địa chỉ giao hàng &mdash;</label>
                                <input class="form-control @error('diachigiaohang') is-invalid @enderror" type="text" id="diachigiaohang" name="diachigiaohang" required />
                                @error('diachigiaohang')
                                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>
                            <input type="submit" id="submit-form" hidden />
                        </form>

                        <div class="d-none d-lg-flex pt-4 mt-3">
                            <div class="w-50 pe-3">
                                <a class="btn btn-secondary d-block w-100" href="{{ route('frontend.giohang') }}">
                                    <i class="ci-arrow-left mt-sm-0 me-1"></i>
                                    <span class="d-none d-sm-inline">Quay lại giỏ hàng</span>
                                    <span class="d-inline d-sm-none">Quay lại</span>
                                </a>
                            </div>
                            <div class="w-50 ps-2">
                                <label for="submit-form" class="btn btn-primary d-block w-100">
                                    <span class="d-none d-sm-inline">Hoàn tất đặt hàng</span>
                                    <span class="d-inline d-sm-none">Hoàn tất</span>
                                    <i class="ci-arrow-right mt-sm-0 ms-1"></i>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="right border">
                        <h2 class="widget-title text-center">Sản phẩm đã đặt</h2>
                        @foreach(Cart::content() as $value)
                        <div class="d-flex align-items-center pb-2 border-bottom">
                            <a class="d-block flex-shrink-0" href="#">
                                <img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" width="64" />
                            </a>
                            <div class="ps-2">
                                <h6 class="widget-product-title">{{ $value->name }}</h6>
                                <div class="widget-product-meta">
                                    <span class="text-accent me-2">{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></span>
                                    <span class="text-muted">x {{ $value->qty }}</span>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <a sclass="d-flex justify-content-between align-items-center">
                            <span style="font-size:20px; font-weight:bold;text-align:center;color:tomato" class="me-2">Tổng tiền sản phẩm: {{ Cart::priceTotal() }}<small>đ</small></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection