@extends('layouts.frontend')
@section('title', 'Trang chủ')
@section('content')

<section class="container mt-4 mb-grid-gutter">
    <div class="bg-faded-info rounded-3 py-4">
        <div class="row align-items-center">
            <div class="col-md-5">
                <div class="px-4 pe-sm-0 ps-sm-5">
                    <span class="badge bg-warning">Khuyến mãi đặc biệt</span>
                    <h3 class="mt-4 mb-1 text-body fw-light">Sản phẩm mới 100%</h3>
                    <h2 class="mb-1">Đồng Hồ Bản Mới</h2>
                    <p class="h5 text-body fw-light">Số lượng sản phẩm có hạn!</p>
                    <a class="btn btn-accent" href="{{route('frontend.home')}}">Xem chi tiết<i class="ci-arrow-right fs-ms ms-1"></i></a>
                </div>

            </div>
            @foreach($slider as $slider)
            <div class="col-md-7">
                <div class="image-scroll-container" style="overflow-x: hidden; white-space: nowrap;">
                    <img class="image-slider" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh1 }}" style="max-width: 100%; margin-left: 10px;" />
                    <img class="image-slider" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh2 }}" style="max-width: 100%; margin-left: 10px;" />
                    <img class="image-slider" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh3 }}" style="max-width: 100%; margin-left: 10px;" />
                </div>
            </div>

        </div>
    </div>
</section>
<section class="container">

    <div class="tns-carousel border-end">
        <div class="tns-carousel-inner" data-carousel-options="{ &quot;nav&quot;: false, &quot;controls&quot;: false, &quot;autoplay&quot;: true, &quot;autoplayTimeout&quot;: 4000, &quot;loop&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;360&quot;:{&quot;items&quot;:2},&quot;600&quot;:{&quot;items&quot;:3},&quot;991&quot;:{&quot;items&quot;:4},&quot;1200&quot;:{&quot;items&quot;:4}} }">
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'apple-watch']) }}" style="margin-right:-.0625rem;">

                    <img class="d-block mx-auto" src="{{ asset('public/img/brands/apple.png') }}" style="width:70px;" />
                </a>
            </div>
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'xiaomi']) }}" style="margin-right:-.0625rem;">
                    <img class="d-block mx-auto" src="{{ asset('public/img/brands/xiaomi.png') }}" style="width:70px;" />
                </a>
            </div>
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'amazfit']) }}" style="margin-right:-.0625rem;">
                    <img class="d-block mx-auto" src="{{ asset('public/img/brands/huami.jpg') }}" style="width:70px;" />
                </a>
            </div>
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'garmin']) }}" style="margin-right:-.0625rem;">
                    <img class="d-block mx-auto" src="{{ asset('public/img/brands/garmin.png') }}" style="width:70px;" />
                </a>
            </div>
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'huawei']) }}" style="margin-right:-.0625rem;">
                    <img class="d-block mx-auto" src="{{ asset('public/img/brands/huawei.png') }}" style="width:70px;" />
                </a>
            </div>
            <div>
                <a class="d-block bg-white border py-4 py-sm-5 px-2" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'samsung']) }}" style="margin-right:-.0625rem;">
                    <img class="d-block mx-auto" src="{{ asset('public/img/brands/samsung.png') }}" style="width:70px;" />
                </a>
            </div>
        </div>
    </div>
</section>
@csrf

<section class="container pt-3 pb-2">
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-2">Tất cả sản phẩm</h2>
    </div>
    <div class="row pt-2 mx-n2">

        @foreach($sanpham as $sp)

        <div class="col-lg-3 col-md-4 col-sm-6 px-2 mb-4">
            <div class="card product-card">
                <a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">
                    <img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}" />
                </a>
                <div class="card-body py-2">
                    <a class="product-meta d-block fs-xs pb-1" href="#">{{ $sp->LoaiSanPham->tenloai }}</a>
                    <h3 class="product-title fs-sm">
                        <a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{
                            $sp->tensanpham }}</a>
                    </h3>
                    <div class="d-flex justify-content-between">
                        <div class="product-price">
                            <span class="text-accent">{{ number_format($sp->giamoi, 0, ',', '.')
                                }}<small>đ</small></span>
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

        @endforeach
    </div>
    <br>
    {{ $sanpham->links('vendor.pagination.bootstrap-4-custom') }}

</section>
<section class="container pb-4 mb-md-3">
    <div class="row">
        <div class="col-md-8 mb-5">

            <div class="d-sm-flex justify-content-between align-items-center bg-secondary overflow-hidden rounded-lg">

            </div><img style="margin-left:15px;width:1200px" class="d-block ml-auto" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh4 }}" alt="Shop Converse">


        </div>

    </div>
    </div>
</section>
<section class="container mb-4 pb-3 pb-sm-0 mb-sm-5">
    <div class="d-flex flex-wrap justify-content-between align-items-center pt-1 border-bottom pb-4 mb-4">
        <h2 class="h3 mb-0 pt-3 me-2">Sản phẩm bán chạy</h2>
    </div>
    <div class="row pt-2 mx-n2">
        <div class="row">
            <div class="col-md-5">
                <a class="d-none d-md-block mt-auto" href="#"><img class="d-block w-1000" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh5 }}" alt="For Women"></a>
            </div>
            <div class="col-md-7 pt-4 pt-md-0">
                <div class="cz-carousel">
                    <div class="cz-carousel-inner" data-carousel-options="{&quot;nav&quot;: false, &quot;controlsContainer&quot;: &quot;#hoodie-day&quot;}">
                        <div>
                            <div class="row mx-n2">
                                @foreach($sanpham_new->take(6) as $sp)
                                <div class="col-lg-4 col-6 px-0 px-sm-2 mb-sm-4 d-none d-lg-block">
                                    <div class="card product-card card-static">
                                        <a class="card-img-top d-block overflow-hidden" href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}"><img src="{{ env('APP_URL') . '/storage/app/' . $sp->hinhanh }}" alt="Product"></a>

                                        <div class="card-body py-2"><a class="product-meta d-block font-size-xs pb-1" href="#">{{ $sp->LoaiSanPham->tenloai }} &amp;</a>
                                            <h3 class="product-title" style="font-size:15px" ;><a href="{{ route('frontend.sanpham.chitiet', ['tenloai_slug' => $sp->LoaiSanPham->tenloai_slug, 'tensanpham_slug' => $sp->tensanpham_slug]) }}">{{$sp->tensanpham }}</a></h3>

                                            <div class="d-flex justify-content-between">
                                                <div class="product-price">
                                                    <span class="text-accent">{{ number_format($sp->giamoi, 0, ',', '.')}}<small>đ</small></span>
                                                </div>
                                                <div class="star-rating">
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star-filled active"></i>
                                                    <i class="star-rating-icon ci-star"></i>
                                                </div>
                                            </div>
                                            <style>
                                                .card.product-card #hidden {
                                                    display: none;
                                                }

                                                .card.product-card:hover #hidden {
                                                    display: block;
                                                }
                                            </style>
                                            <div class="card-body py-2 px-0" id="hidden">
                                                <a class="btn btn-primary btn-sm d-block w-100 mb-2" href="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sp->tensanpham_slug]) }}">
                                                    <i class="ci-cart fs-sm me-1"></i>Thêm vào giỏ hàng
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <hr class="d-sm-none">
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
</section>

<script>
    var images = document.querySelectorAll('.image-slider');
    var index = 0;
    var timeInterval = 3000; // Thời gian chuyển đổi 2 giây
    var fadeTime = 1000; // Thời gian fade mỗi ảnh 1 giây

    setInterval(function() {
        var currentImage = images[index];
        var nextIndex = (index + 1) % images.length;
        var nextImage = images[nextIndex];

        currentImage.style.transition = 'opacity ' + fadeTime / 1000 + 's';
        currentImage.style.opacity = '0';

        setTimeout(function() {
            currentImage.style.display = 'none'; // Ẩn ảnh hiện tại sau khi fade out
            nextImage.style.transition = 'opacity ' + fadeTime / 1000 + 's';
            nextImage.style.opacity = '1';
            nextImage.style.display = 'inline-block'; // Hiển thị ảnh tiếp theo
        }, fadeTime);

        index = nextIndex;
    }, timeInterval);
</script>

@endsection