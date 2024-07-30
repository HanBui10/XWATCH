@extends('layouts.frontend')
@section('title', 'Liên hệ')

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
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Liên hệ</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Liên hệ</h1>
        </div>
    </div>
</div>

<section class="contact" id="contact" >
    <div class="container">
        <div class="heading text-center">
            <h2>Liên hệ
                <span> chúng tôi </span>
            </h2>
            <p>Bạn có thể liên hệ với chúng tôi qua những thông tin
                <br>được cung cấp bên dưới.
            </p>
        </div>
        <div class="row">
            <div class="col-md-5">
                <div class="title">
                    <h3>Liên hệ chi tiết</h3>
                    <p>Thông tin bao gồm số điện thoại, email, địa chỉ. </p>
                </div>
                <div class="content">
                   
                    <div class="info">
                        <i class="fas fa-mobile-alt"></i>
                        <h4 class="d-inline-block">ĐIỆN THOẠI :
                            <span>0889398477</span>
                        </h4>
                    </div>
                   
                    <div class="info">
                        <i class="far fa-envelope"></i>
                        <h4 class="d-inline-block">EMAIL :
                            <span>buih72436@gmail.com</span>
                        </h4>
                    </div>
                    
                    <div class="info">
                        <i class="fas fa-map-marker-alt"></i>
                        <h4 class="d-inline-block">ĐỊA CHỈ :
                            <span>6743 Long Xuyên, An Giang</span>
                        </h4>
                    </div>
                </div>
            </div>

           

            <div class="col-md-7">
                <div class="card-block">
                   

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                  
                    <form action="{{ route('frontend.postLienHe') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <input type="text" class="form-control" placeholder="Họ và Tên" name="name">
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" placeholder="Email" name="email">
                            </div>
                            <div class="col-sm-12">
                                <input type="text" class="form-control" placeholder="Đối tượng" name="subject">
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="5" id="comment" placeholder="Nội dung" name="message"></textarea>
                        </div>
                        <button class="btn btn-block" type="submit">Send Now!</button>
                    </form>


                    
                </div>
            </div>
        </div>
</section>


<br>


<div class="col-md-12">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d62795.46790091366!2d105.4769152!3d10.3645184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1svi!2s!4v1710431422338!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

<div class="col-md-12" style="margin-top: 20px;">

    <script type="text/javascript">
        function init_map() {
            var myOptions = {
                zoom: 14,
                center: new google.maps.LatLng(40.805478, -73.96522499999998),
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
            marker = new google.maps.Marker({
                map: map,
                position: new google.maps.LatLng(40.805478, -73.96522499999998)
            });
            infowindow = new google.maps.InfoWindow({
                content: "<b>The Breslin</b><br/>2880 Broadway<br/> New York"
            });
            google.maps.event.addListener(marker, "click", function() {
                infowindow.open(map, marker);
            });
            infowindow.open(map, marker);
        }
        google.maps.event.addDomListener(window, 'load', init_map);
    </script>
</div>

</section>


@endsection