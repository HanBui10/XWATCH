@extends('layouts.frontend')
@section('title', 'Sản phẩm chi tiết')
@section('content')

<div class="bg-secondary py-4">
	<div class="container d-lg-flex justify-content-between py-2 py-lg-3">
		<div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb flex-lg-nowrap justify-content-center justify-content-lg-start">
					<li class="breadcrumb-item">
						<a class="text-nowrap" href="{{ route('frontend.home') }}"><i class="ci-home"></i>Trang chủ</a>
					</li>
					<li class="breadcrumb-item text-nowrap">
						<a href="{{ route('frontend.home') }}">Sản phẩm</a>
					</li>
					<li class="breadcrumb-item text-nowrap active" aria-current="page">Sản phẩm chi tiết</li>
				</ol>
			</nav>
		</div>
	</div>
</div>


<section class="product-container">

	<div class="img-card">
		<img src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" alt="" id="featured-image">

		<div class="small-Card">
			<img src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" alt="" class="small-Img">
			<img src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh1 }}" alt="" class="small-Img">
			<img src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh2 }}" alt="" class="small-Img">

		</div>

	</div>

	<div class="product-info">

		<h3> {{ $sanpham->tensanpham }} </h3>
		<h5>{{ number_format($sanpham->giamoi, 0, ',', '.') }}đ <del>{{ number_format($sanpham->giacu, 0, ',', '.') }}đ</del></h5>
		<div class="star-rating">
			<i class="star-rating-icon ci-star-filled active"></i>
			<i class="star-rating-icon ci-star-filled active"></i>
			<i class="star-rating-icon ci-star-filled active"></i>
			<i class="star-rating-icon ci-star-filled active"></i>
			<i class="star-rating-icon ci-star"></i>
		</div>

		<p style="text-align: justify;">{{ $sanpham->doinetsanpham }}</p>


		<form class="quantity" action="{{ route('frontend.giohang.them', ['tensanpham_slug' => $sanpham->tensanpham_slug]) }}" method="get">
			@csrf
			<input type="number" min="1" value="1" name="soluong">

			<button>Thêm vào giỏ hàng</button>

		</form>



		<div class="devvn_icon_box">
			<div class="devvn_img"><img decoding="async" src="https://masta.vn/wp-content/uploads/2023/03/8898827.png" alt="" width="68" height="86" class="alignnone size-full wp-image-17540 entered lazyloaded" data-lazy-src="https://masta.vn/wp-content/uploads/2023/03/8898827.png" data-ll-status="loaded"><noscript><img decoding="async" src="https://masta.vn/wp-content/uploads/2023/03/8898827.png" alt="" width="68" height="86" class="alignnone size-full wp-image-17540" /></noscript></div>
			<div class="devvn_content">
				<ul>
					<li><strong>Vui lòng gọi kiểm tra số lượng trước khi tới cửa hàng:</strong></li>
					<li>* Gọi Mua hàng/Tư vấn (8h00 – 21h30): <strong>0889398477</strong></li>
					<li>* Gọi Bảo hành/Sửa chữa (8h30 – 18h00): <strong>0889398478</strong></li>
					<li>* Thời Gian làm việc: <strong>T2 – T7 (9h — 21h:00) CN (9h — 20h:00)</strong></li>
				</ul>
			</div>
		</div>



		<div class="accordion mb-4" id="productPanels">

			<div class="accordion-item">
				<h3 class="accordion-header">
					<a class="accordion-button" href="#productInfo" role="button" data-bs-toggle="collapse" aria-expanded="true" aria-controls="productInfo">
						<i class="ci-settings text-muted lead align-middle mt-n1 me-2"></i>Thông số kỹ thuật
					</a>
				</h3>
				<div class="accordion-collapse collapse show" id="productInfo" data-bs-parent="#productPanels">
					<div class="accordion-body">
						<p>
						<ul class="product-info">
							<li><span class="label">Hãng sản xuất:</span> {{ $sanpham->HangSanXuat->tenhang }}</li>
							@if(!empty($sanphamct))
							<li><span class="label">Model:</span> {{ $sanphamct->model }}</li>
							<li><span class="label">Màu sắc:</span> {{ $sanphamct->mausac }}</li>
							<li><span class="label">Công nghệ màn hình:</span> {{ $sanphamct->congnghemanhinh }}</li>
							<li><span class="label">Kích thước màn hình:</span> {{ $sanphamct->kichthuocmanhinh }}</li>
							<li><span class="label">Độ phân giải:</span> {{ $sanphamct->dophangiai }}</li>
							<li><span class="label">Bộ nhớ:</span> {{ $sanphamct->bonho }}</li>
							<li><span class="label">Chất liệu:</span> {{ $sanphamct->chatlieu }}</li>
							<li><span class="label">Trọng lượng:</span>{{ $sanphamct->trongluong }}</li>
							<li><span class="label">Tình trạng:</span> {{ $sanphamct->tinhtrang }}</li>
							<li><span class="label">Bảo hành:</span> {{ $sanphamct->baohanh }}</li>
							@endif
						</ul>
						</p>
					</div>
				</div>
			</div>
		</div>

		<br>
	</div>
</section>



<!--<div class="col-xs-9">
	
		
		
	
	<div style="width:100%;border-top:1px solid silver">
	@php
		function LayHinhDauTien($strMoTaSanPham)
		{
		$first_img = '';
		ob_start();
		ob_end_clean();
		$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strMoTaSanPham, $matches);
			if(empty($output))
			return asset('public/img/noimage.png');
			else
			return str_replace('&amp;', '&', $matches[1][0]);
			}
			@endphp
		<small>
			<ul style="font-size: 15px;">
				<li>{!! $sanpham->motasanpham !!}</li>
				
			</ul>
		</small>
	</div>
</div>-->



@endsection