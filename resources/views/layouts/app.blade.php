<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Favicon and Touch Icons -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('public/img/logo.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('public/img/logo2.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('public/img/logo1.png') }}" />

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/vendor/font-awesome/css/all.min.css') }}" />

    <link href="{{ asset ('NiceAdmin/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
    <link href="{{ asset ('NiceAdmin/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
    @yield('css')
    <link rel="stylesheet" href="{{ asset('public/css/site.css') }}" />

    <link href="{{ asset ('NiceAdmin/assets/css/style.css') }}" rel="stylesheet">
</head>

<body>
    <header style="background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);" id="header" class="header fixed-top d-flex align-items-center">


        <div class="d-flex align-items-center justify-content-between">
            <a href="{{ route('frontend.home') }}" class="logo d-flex align-items-center">
                <img src="{{ asset('public/img/logo3.png') }}" alt="">
                <span class="d-none d-lg-block">xWatch</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div>

        <div class="search-bar">
            <form action="{{ URL::to('/search') }}" method="GET" class="search-form d-flex align-items-center">
                {{csrf_field()}}
                <input type="search" name="keyword" value="{{Request::get('search')}}" placeholder="Tìm kiếm" />
                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>

        </div>
        <nav class="header-nav ms-auto">

            <ul class="d-flex align-items-center" style="padding-right:15px;">


                <li class="nav-item dropdown pe-3">
                    @guest

                    @if (Route::has('login'))
                    @guest
                <li class="nav-item">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0 " href="{{ route('login') }}">


                        <span class="d-none d-md-block toggle">Đăng nhập/</span>
                    </a>
                </li>
                @else
                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#">


                    <span class="d-none d-md-block toggle">{{ Auth::user()->name }}</span>
                </a>
                @endguest
                @endif

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link nav-profile d-flex align-items-center pe-0" href="{{ route('register') }}">
                        <span class="d-none d-md-block toggle">Đăng ký</span>
                    </a>
                </li>
                @endif

                @else


                <a id="navbarDropdown" class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    <img src="{{env('APP_URL') . '/storage/app/' . Auth::user()->image_user}}" alt="Profile" class="rounded-circle">
                    <span class="d-none d-md-block dropdown-toggle ps-2">{{ Auth::user()->name }}</span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">

                    <li>
                        <a class="dropdown-header" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span>Đăng xuất</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
                </li>
                @endguest
            </ul>
        </nav>
    </header>
    <aside style="background-color: #8BC6EC;background-image: linear-gradient(135deg, #8BC6EC 0%, #9599E2 100%);" id="sidebar" class="sidebar">
        
    </aside>
    <main id="main" class="main">
        <div class="container">
            <section class="section dashboard">
                <div class="row">
                    @yield('content')
                </div>
            </section>
        </div>
    </main>
    <footer id="footer" class="footer">
        <div class="copyright">
            &copy; Bản quyền 2024. Thực hiện bởi <strong><span>XWATCH</span></strong>
        </div>

    </footer>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
   
    <script src="{{ asset ('NiceAdmin/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/quill/quill.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset ('NiceAdmin/assets/vendor/php-email-form/validate.js') }}"></script>

    @yield('javascript')

    
    <script src="{{ asset ('NiceAdmin/assets/js/main.js') }}"></script>
    
    <script src="//cdn.ckeditor.com/4.24.0-lts/full/ckeditor.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('noidung');
    </script>

</body>