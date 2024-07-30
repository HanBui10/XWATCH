@extends('layouts.frontend')
@section('title', 'Tìm kiếm')
@section('content')

<div class="container mt-4 mb-grid-gutter">
    @if ($sanpham->count() > 0)
    <h2 class="title text-center">Kết quả tìm kiếm</h2>
    <p class="text-center">Tìm thấy {{ $sanpham->count() }} kết quả:</p>
    <div class="row pt-2 mx-n2">
        @forelse($sanpham as $sp)
        @if ($sp->loaisanpham)
        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
                <a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
                    <img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}" />
                </a>
                <div class="card-body py-2">
                    <a class="product-meta d-block fs-xs pb-1" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug]) }}">{{ $sp->loaisanpham->tenloai }}</a>
                    <h3 class="product-title fs-sm">
                        <a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->loaisanpham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{ $sp->tensanpham }}</a>
                    </h3>
                    <div class="d-flex justify-content-between">
                        <div class="product-price">
                            <span class="text-accent">{{ number_format($sp->giamoi, 0, ',', '.') }}<small>đ</small></span>
                        </div>
                        <div class="star-rating">
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star-filled active"></i>
                                    <i class="star-rating-icon ci-star"></i>
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
        @endif
        @empty
      
        @endforelse
    </div>
    @else
  
    <p class="text-center">Không tìm thấy sản phẩm nào.</p>
    @endif
</div>

@endsection

