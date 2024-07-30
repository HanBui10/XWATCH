@extends('layouts.frontend')
@section('title', 'Trang chủ')
@section('content')

@csrf

<section class="container pt-3 pb-2">
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-2">{{ $loaisanpham_seach->tenloai }}</h2>
        
    </div>
    <div class="row pt-2 mx-n2">
        @foreach($sanpham as $sp)
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
                <a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $loaisanpham_seach->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
                    <img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}" />
                </a>
                <div class="card-body py-2">
                    <a class="product-meta d-block fs-xs pb-1" href="#">{{ $sp->tensanpham }}</a>
                    <h3 class="product-title fs-sm">
                        <a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $loaisanpham_seach->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{
							$sp->tensanpham }}</a>
                    </h3>
                    <div class="d-flex justify-content-between">
                        <div class="product-price">
                            <span class="text-accent">{{ number_format($sp->giamoi, 0, ',', '.')
								}}<small>đ</small></span>
                        </div>
                        
                    </div>
                </div>
                <div class="card-body card-body-hidden">
                    <a class="btn btn-primary btn-sm d-block w-100 mb-2" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sp->tensanpham_slug]) }}">
                        <i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
                    </a>
                </div>
            </div>
            <hr class="d-sm-none">
        </div>
        @endforeach
    
        {{ $sanpham->links('vendor.pagination.bootstrap-4-custom') }}

    </div>
</section>

@endsection