@extends('layouts.frontend')
@section('title', 'Giỏ hàng')
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
                        <a href="{{ route('frontend.sanpham') }}">Sản phẩm</a>
                    </li>
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Giỏ hàng</h1>
        </div>
    </div>
</div>
<div class="container pb-5 mb-2 mb-md-4">
    <div class="card">
        <section class="rounded-3 shadow-lg p-4">
            <form action="{{ route('frontend.giohang.capnhat') }}" method="post">
                @csrf
                <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                    <h2 class="h6 text-light mb-0">Sản phẩm trong giỏ</h2>
                    <a class="btn btn-outline-primary btn-sm ps-2" href="{{ route('frontend.home') }}">
                        <i class="bi bi-box-arrow-left me-2"></i>Trở về trang chủ
                    </a>
                </div>
                @foreach(Cart::content() as $value)
                <div class="d-sm-flex justify-content-between align-items-center pb-3 border-bottom">
                    <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                        <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="#">
                            <img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" width="160" />
                        </a>
                        <div class="pt-2">
                            <h3 class="product-title fs-base mb-2">{{ $value->name }}</h3>
                            <div class="fs-lg text-accent pt-2">{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></div>
                        </div>
                    </div>
                    <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start" style="max-width:12rem;">
                        <label class="form-label" for="quantity">Số lượng</label>
                        <div class="input-group">
                            <span class="input-group-text"><a href="{{ route('frontend.giohang.giam', ['row_id' => $value->rowId]) }}"><i class="bi bi-dash-circle"></i></a>
                            </span>
                            <input class="form-control text-center" type="text" id="qty" name="qty[{{ $value->rowId }}]" min="1" value="{{ $value->qty }}" />
                            <span class="input-group-text">
                                <a href="{{ route('frontend.giohang.tang', ['row_id' => $value->rowId]) }}"><i class="bi bi-plus-circle"></i></a>
                            </span>
                        </div>
                        <a class="btn btn-link px-0 text-danger" href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}">
                            <i class="ci-close-circle me-2"></i><span class="fs-sm">Xóa</span>
                        </a>
                    </div>
                </div>
                @endforeach
                <div style="margin-top:20px" class="text-center mb-4 pb-3 border-bottom">
                    <a class="h4 mb-3 pb-1 mt-2">Tổng tiền: </a>
                    <span class="fw-normal h4 mb-3 pb-1 mt-2">{{ Cart::priceTotal() }}<small>đ</small></span>
                </div>
                <div class="d-none d-lg-flex pt-4 mt-3">
                    <div class="w-50 ps-2">
                        <a class="btn btn-info btn-shadow d-block w-100 mt-4" href="{{ route('user.dathang') }}">
                            <i class="ci-card fs-lg me-2"></i>Thanh toán
                        </a>
                    </div>
                    <div class="w-50 ps-2">
                        <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ route('frontend.giohang.tatca')}}">
                            <i class="ci-close-circle me-2"></i>Xóa tất cả
                        </a>
                    </div>
                    <div class="w-50 ps-2">
                        <a class="btn btn-secondary btn-shadow d-block w-200 mt-4">
                            <i class="ci-loading fs-base me-2"></i>Cập nhật giỏ hàng
                        </a>
                    </div>
                    <div class="w-50 ps-2">
                        <a href="{{ route('frontend.lichsudonhang')}}" class="btn btn-warning btn-shadow d-block w-200 mt-4">
                            <i class="ci-cart fs-base me-2"></i>Lịch sử đơn hàng
                        </a>
                    </div>
                </div>
            </form>
        </section>
    </div>
</div>
@endsection