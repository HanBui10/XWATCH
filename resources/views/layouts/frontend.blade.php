<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <!-- SEO Meta Tags -->
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="" />
    <!-- Viewport -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="theme-color" content="#ffffff" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>@yield('title', 'Trang chủ') - {{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/logo.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/logo2.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/logo1.png') }}" />

    <!-- CSS -->
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/simplebar/simplebar.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/tiny-slider/tiny-slider.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/nouislider/nouislider.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/drift-zoom/drift-basic.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/vendor/lightgallery/lightgallery-bundle.min.css') }}" />
    <link rel="stylesheet" media="screen" href="{{ asset('public/css/theme.min.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('resources/css/notfound.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('resources/css/noaccess.css') }}" />
    <link rel="stylesheet" href="{{ asset('resources/css/contactPage.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('resources/css/user.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('resources/css/detail.css') }}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="{{ asset('resources/css/faq.css') }}" />
    <link type="text/css" rel="stylesheet" href="{{ asset('resources/css/login.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
    <!--<link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.3/dist/css/bootstrap.min.css">-->

</head>

<body class="handheld-toolbar-enabled">
    <main class="page-wrapper">
        <header class="shadow-sm">
            <div style="background-color: #8EC5FC;background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);" class="navbar-sticky bg-light">
                <div class="navbar navbar-expand-lg navbar-light">
                    <div class="container">
                        <a class="navbar-brand d-none d-sm-block flex-shrink-0" href="{{ route('frontend.home') }}">
                            <img src="{{ asset('public/img/WATCH.jpg') }}" width="150" />
                        </a>
                        <a class="navbar-brand d-sm-none flex-shrink-0 me-2" href="{{ route('frontend.home') }}">
                            <img src="{{ asset('public/img/logo-icon.png') }}" width="74" />
                        </a>


                        <div class="input-group d-none d-lg-flex mx-4">
                            <form action="{{ URL::to('/search') }}" method="GET" role="search" style="width:90%" class="input-group">
                                {{csrf_field()}}
                                <input style="border-top-left-radius: 5px; border-bottom-left-radius:5px;" class="form-control rounded-end pe-5" type="search" name="keyword" value="{{Request::get('search')}}" placeholder="Tìm kiếm" />
                                <button type="submit" class="btn btn-info"><i class="ci-search"></i></button>
                            </form>
                        </div>
                        <div class="navbar-toolbar d-flex flex-shrink-0 align-items-center">
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <a style="margin-left: 15px" class="navbar-tool navbar-stuck-toggler" href="#menu">
                                <span class="navbar-tool-tooltip">Mở rộng menu</span>
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-menu"></i></div>
                            </a>
                            @guest
                            <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-5" href="{{ route('user.dangnhap') }}">
                                <div class="navbar-tool-icon-box"><i class="navbar-tool-icon ci-user"></i></div>
                                <div class="navbar-tool-text ms-n3"><small>Xin chào</small>Khách hàng</div>
                            </a>
                            @else

                            <style>
                                .boss {
                                    position: relative;
                                    cursor: pointer;
                                    margin-right: 15px;
                                }

                                ul.info {
                                    position: absolute;
                                    top: 36px;
                                    left: 0;
                                    background-color: #fff;
                                    list-style: none;
                                    padding: 0;
                                    width: 200px;
                                    min-height: 50px;
                                    z-index: 3;
                                    display: none;
                                }

                                .boss:hover ul.info {
                                    display: block;
                                }

                                ul.info li.item-info {
                                    width: 100%;
                                    height: 40px;
                                    display: grid;
                                    place-items: center;
                                    padding: 0 15px;
                                }

                                ul.info li.item-info:hover {
                                    background-color: #ddd;
                                }
                            </style>
                            <div class="navbar-tool-icon-box mr-2">
                                @if(!empty(Auth::user()->image_user))
                                <div>
                                    <img class="navbar-tool-icon-box bg-secondary" src="{{env('APP_URL') . '/storage/app/' . Auth::user()->image_user}}">
                                </div>
                                @else
                                <i class="navbar-tool-icon ci-user"></i>
                                @endif
                            </div>
                            <div class="navbar-tool-text boss"><small>Xin chào</small>
                                {{ Auth::user()->name }}
                                <ul class="info">
                                    <li class="item-info"> <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" href="{{ route('hosocanhan') }}">Hồ sơ cá nhân</a></li>
                                    @if(auth::user()->role =="admin")
                                    <li class="item-info"> <a class="navbar-tool ms-1 ms-lg-0 me-n1 me-lg-2" style="color:blue;" href="{{ route('admin.home') }}">Admin</a></li>
                                    @endif
                                    <li class="item-info"> <a class="dropdown-item text-center" style="color:#000;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Đăng xuất
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>

                            @endguest


                            <form action="your-action-url" method="post">

                                <div class="navbar-tool dropdown ml-3" style="width: 9rem;">
                                    <a class="navbar-tool-icon-box dropdown-toggle" href="{{ route('frontend.giohang') }}">
                                        <span class="navbar-tool-label">{{ Cart::count() ?? 0 }}</span>
                                        <i class="navbar-tool-icon ci-cart"></i>
                                    </a>
                                    <a class="navbar-tool-text" href="{{ route('frontend.giohang') }}">
                                        <small>Giỏ hàng</small>{{ Cart::priceTotal() }}đ
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" style="width: 18rem;">
                                        <div class="widget widget-cart px-3 pt-2 pb-3">
                                            <div style="height: 15rem;" data-simplebar data-simplebar-auto-hide="false">
                                                @foreach(Cart::content() as $value)
                                                <div class="widget-cart-item py-2 border-bottom">

                                                    <div class="media align-items-center">
                                                        <a class="d-block mr-2" href="{{ route('frontend.giohang') }}">
                                                            <img width="64" src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}" alt="Product" />
                                                        </a>
                                                        <div class="media-body">
                                                            <h6 class="widget-product-title">
                                                                <a href="{{route('frontend.giohang') }}">{{ $value->name }}</a>
                                                            </h6>

                                                            <div class="widget-product-meta">
                                                                <span class="text-accent mr-2">{{ number_format($value->price, 0, ',', '.') }}<small>đ</small></span>
                                                                <span class="text-muted">x {{ $value->qty }}</span>
                                                                <div class="d-flex ml-auto">
                                                                    <a class="btn btn-link px-0 text-danger me-2" href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}">
                                                                        <i class="ci-close-circle me-2"></i><span class="fs-sm">Xóa</span>
                                                                    </a>

                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>


                                        <div class="d-flex flex-wrap justify-content-between align-items-center py-3">
                                            <div class="font-size-sm mr-2 py-2">
                                                <span class="text-muted">Tổng:</span>
                                                <span class="text-accent font-size-base ml-1">{{ Cart::priceTotal() }}<small>đ</small></span>
                                            </div>
                                            <a class="btn btn-outline-secondary btn-sm ml-2" href="{{ route('frontend.giohang') }}">Kiểm tra<i class="czi-arrow-right ml-1 mr-n1"></i></a>
                                        </div>
                                        <div class="text-center mt-3">
                                            <a class="btn btn-primary btn-sm btn-block" href="{{ route('user.dathang') }}"><i class="czi-card mr-2 font-size-base align-middle"></i>Đặt hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
                <div class="navbar navbar-expand-lg navbar-light navbar-stuck-menu mt-n2 pt-0 pb-2">
                    <div class="container">
                        <div class="collapse navbar-collapse justify-content-center text-center" id="navbarCollapse">
                            <div class="input-group d-lg-none my-3">
                                <i class="ci-search position-absolute top-50 start-0 translate-middle-y text-muted fs-base ms-3"></i>
                                <input class="form-control rounded-start" name="keyword" type="text" placeholder="Tìm kiếm" />
                            </div>
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link ps-lg-0" href="{{ route('frontend.home') }}">
                                        <i class="fas fa-home me-2"></i>Trang chủ
                                    </a>
                                </li>
                            </ul>
                            <ul class="navbar-nav">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="{{ route('frontend.sanpham') }}" data-bs-toggle="dropdown" data-bs-auto-close="outside"><i class="fas fa-gift me-2"></i>Sản phẩm</a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'apple-watch']) }}">Apple Watch</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'amazfit']) }}">Amazfit</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'garmin']) }}">Garmin</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'huawei']) }}">Huawei</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'samsung']) }}">Samsung</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.sanpham.phanloai', ['tenloai_slug' => 'Xiaomi']) }}">Xiaomi</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.baiviet') }}"><i class="fas fa-globe me-2"></i>Tin tức</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.gioithieu') }}"><i class="far fa-address-card fa-lg me-2"></i> Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.lienhe') }}"><i class="fas fa-project-diagram me-2"></i> Liên hệ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('frontend.faq') }}"><i class="fas fa-question-circle me-2"></i>FAQ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        @yield('content')
    </main>
    <footer class="footer bg-dark">
        <div style="background-color: #85adfb;" class="pt-5 bg">
            <div class="container">
                <div class="row pb-3">
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="media"><i class="czi-rocket text-primary" style="font-size: 2.25rem;"></i>
                            <div class="media-body pl-3">
                                <h6 class="font-size-base text-light mb-1">Giao hàng nhanh và miễn phí</h6>
                                <p class="mb-0 font-size-ms text-light opacity-50">Đơn hàng 1 triệu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="media"><i class="czi-currency-exchange text-primary" style="font-size: 2.25rem;"></i>
                            <div class="media-body pl-3">
                                <h6 class="font-size-base text-light mb-1">Đảm bảo hoàn tiền</h6>
                                <p class="mb-0 font-size-ms text-light opacity-50">Hoàn tiền nếu sản phẩm lỗi</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="media"><i class="czi-support text-primary" style="font-size: 2.25rem;"></i>
                            <div class="media-body pl-3">
                                <h6 class="font-size-base text-light mb-1">Hỗ trợ khách hàng</h6>
                                <p class="mb-0 font-size-ms text-light opacity-50">Hỗ trợ khách hàng 24/7</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="media"><i class="czi-card text-primary" style="font-size: 2.25rem;"></i>
                            <div class="media-body pl-3">
                                <h6 class="font-size-base text-light mb-1">Thanh toán trực tuyến an toàn</h6>
                                <p class="mb-0 font-size-ms text-light opacity-50">Chúng tôi sẽ bảo mật thông tin của bạn</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="hr-light pb-4 mb-3">
                <div class="row pb-2">
                    <div class="col-md-6 text-center text-md-start mb-4">
                        <div class="text-nowrap mb-4">
                            <a class="d-inline-block align-middle mt-n1 me-3" href="#"><img class="d-block" src="{{ asset('public/img/logofooter.png') }}" width="117" /></a>
                        </div>

                        <div class="widget widget-links widget-light">

                            <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="{{ route('frontend.home') }}">Trang chủ</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="{{ route('frontend.sanpham') }}">Sản phẩm</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="{{ route('frontend.baiviet') }}">Tin tức</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="{{ route('frontend.gioithieu') }}">Giới thiệu</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="{{ route('frontend.lienhe') }}">Liên hệ</a></li>
                                <li class="widget-list-item me-4"><a class="widget-list-link" href="{{ route('frontend.faq') }}">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 text-center text-md-end mb-4">

                        <div class="mb-3">
                            <a class="btn-social bs-light bs-twitter ms-2 mb-2" href="#"><i class="ci-twitter"></i></a>
                            <a class="btn-social bs-light bs-facebook ms-2 mb-2" href="#"><i class="ci-facebook"></i></a>
                            <a class="btn-social bs-light bs-instagram ms-2 mb-2" href="#"><i class="ci-instagram"></i></a>
                            <a class="btn-social bs-light bs-pinterest ms-2 mb-2" href="#"><i class="ci-pinterest"></i></a>
                            <a class="btn-social bs-light bs-youtube ms-2 mb-2" href="#"><i class="ci-youtube"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pb-4 font-size-xs text-light opacity-50 text-center text-md-left"> Bản quyền © 2024. Thực hiện bởi <a class="text-light" href="https://createx.studio/" target="_blank">XWatch</a></div>
        </div>
        </div>
    </footer>

    <a class="btn-scroll-top" href="#top" data-scroll>
        <span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span>
        <i class="btn-scroll-top-icon ci-arrow-up"></i>
    </a>
    <script src="{{ asset('public/vendor/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('public/vendor/tiny-slider/tiny-slider.js') }}"></script>
    <script src="{{ asset('public/vendor/smooth-scroll/smooth-scroll.polyfills.min.js') }}"></script>
    <script src="{{ asset('public/vendor/nouislider/nouislider.min.js') }}"></script>
    <script src="{{ asset('public/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('public/vendor/shufflejs/shuffle.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/lightgallery.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/plugins/fullscreen/lg-fullscreen.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/plugins/zoom/lg-zoom.min.js') }}"></script>
    <script src="{{ asset('public/vendor/lightgallery/plugins/video/lg-video.min.js') }}"></script>
    <script src="{{ asset('public/vendor/drift-zoom/Drift.min.js') }}"></script>
    <script src="{{ asset('public/js/theme.min.js') }}"></script>
    <script src="{{ asset('public/js/detail.js') }}"></script>

</body>

</html>