@extends('layouts.frontend')
@section('title', 'Giới thiệu')

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
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Giới thiệu</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">Giới thiệu</h1>
        </div>
    </div>
</div>

<section class="container">

    <div class="row">

        <section class="col-sm-8 maincontent">
            <h3></h3>
            <div style="display: flex; align-items: center;">
                <img src="public/img/Anh1.png" alt="" class="img-rounded" style="width: 200px; margin-right: 10px;">
                <p style="flex: 1; text-align: justify;">
                    XWatch không chỉ là nơi bạn tìm thấy những chiếc đồng hồ chất lượng cao từ các thương hiệu nổi tiếng, mà còn là địa chỉ uy tín đáng tin cậy cho những người yêu thích và ưa chuộng đồng hồ.
                </p>
            </div>
            <p style="text-align: justify; margin-top:-50px">
                Bất kể bạn là người mới bắt đầu hoặc là người dùng có kinh nghiệm, chúng tôi luôn sẵn lòng hỗ trợ bạn chọn lựa sản phẩm phù hợp nhất với nhu cầu và mong muốn của mình. Hãy đến XWatch để khám phá thêm về các sản phẩm đồng hồ thông minh và nhận được dịch vụ tư vấn chuyên nghiệp từ đội ngũ của chúng tôi. </p>
        </section>

        <aside class="col-sm-4 sidebar sidebar-right">
            <div class="panel">
                <br>
                <div class="image-gallery">
                    <div class="row">
                        <div class="col-sm-12">
                            <img src="public/img/Anh3.jpg" alt="Combined Image" style="width: 100%;">
                        </div>
                    </div>
                </div>
            </div>
        </aside>
    </div>

    <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12 center767">
            <h3>
                Về chúng tôi
            </h3>

            <img src="public/img/Anh2.jpg" alt="">
            <br>
            <br>

            <p style="flex: 1; text-align: justify;">
                Cửa hàng trực tuyến của chúng tôi là nơi bạn có thể dễ dàng khám phá và mua sắm các mẫu đồng hồ cao cấp từ bộ sưu tập đa dạng
                của chúng tôi. Với dịch vụ giao hàng toàn quốc và chăm sóc khách hàng chuyên nghiệp, chúng tôi mong muốn mang lại trải nghiệm
                mua sắm trực tuyến tốt nhất cho mọi khách hàng của mình.
            </p>
        </div>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <h3>
                Mục tiêu
            </h3>
            <strong>Đa dạng và Phong phú</strong>
            <p style="flex: 1; text-align: justify;"> XWatch tự hào với bộ sưu tập đồng hồ đa dạng, từ các thương hiệu danh tiếng đến những cái tên mới nổi. Bất kể bạn là người yêu thích phong cách cổ điển, thời trang hiện đại hay thiết kế thể thao, chúng tôi luôn có một sản phẩm phù hợp với sở thích và nhu cầu của bạn.</p>
            <strong>Chất lượng đảm bảo</strong>
            <p style="flex: 1; text-align: justify;">Tại XWatch, chất lượng là tiêu chí hàng đầu. Mỗi chiếc đồng hồ đều được lựa chọn kỹ lưỡng và kiểm tra chất lượng một cách cẩn thận để đảm bảo rằng bạn sẽ nhận được sản phẩm hoàn hảo nhất.</p>
            <strong>Uy tín và Trách nhiệm</strong>
            <p style="flex: 1; text-align: justify;">Chúng tôi cam kết mang lại dịch vụ uy tín và trách nhiệm nhất đến khách hàng. Sự hài lòng của bạn là niềm tự hào và động lực của chúng tôi.</p>
            <strong>Dịch vụ Tận tâm</strong>
            <p style="flex: 1; text-align: justify;">Với đội ngũ nhân viên chuyên nghiệp và tận tâm, XWatch cam kết mang đến cho bạn trải nghiệm mua sắm tốt nhất. Chúng tôi luôn sẵn lòng tư vấn và hỗ trợ bạn trong mọi vấn đề liên quan đến sản phẩm và dịch vụ của chúng tôi.</p>

        </div>
    </div>
    </div>
</section>



@endsection