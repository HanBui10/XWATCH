@extends('layouts.frontend')
@section('title', $baiviet->tieude)
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
						<a href="{{ route('frontend.baiviet') }}">Tin tức</a>
					</li>
					<li class="breadcrumb-item text-nowrap active" aria-current="page">Chi tiết</li>
				</ol>
			</nav>
		</div>
		<div class="order-lg-1 pe-lg-4 text-center text-lg-start">
			<h1 class="h3 mb-0">{{ $baiviet->tieude }}</h1>
		</div>
	</div>
</div>
<div class="container pb-5">
	<div class="row justify-content-center pt-3 mt-md-3">
		<div class="col-12">
			<div class="d-flex flex-wrap justify-content-between align-items-center pb-4 mt-n1">
				<div class="d-flex align-items-center fs-sm mb-2">{{ $baiviet->NguoiDung->name }}
					<span class="blog-entry-meta-divider"></span>
					<a class="blog-entry-meta-link" href="#date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $baiviet->created_at)->format('d/m/Y') }}</a>
				</div>
				<div class="fs-sm mb-2">
					<a class="blog-entry-meta-link text-nowrap" href="#view" data-scroll><i class="ci-eye"></i>{{ $baiviet->luotxem }}</a>
				</div>
			</div>
			<p style="text-align:justify" class="fw-bold">{{ $baiviet->tomtat }}</p>
			<p style="text-align:justify">{!! $baiviet->noidung !!}</p>
			<div class="d-flex flex-wrap justify-content-between pt-2 pb-4 mb-1">
				<div class="mt-3 me-3">
					<a class="btn-tag mb-2" href="#">#{{ $baiviet->ChuDe->tenchude_slug }}</a>
				</div>
				<div class="mt-3">
					<span class="d-inline-block align-middle text-muted fs-sm me-3 mt-1 mb-2">Chia sẻ:</span>
					<a class="btn-social bs-facebook me-2 mb-2" href="#facebook"><i class="ci-facebook"></i></a>
					<a class="btn-social bs-twitter me-2 mb-2" href="#twitter"><i class="ci-twitter"></i></a>
					<a class="btn-social bs-pinterest me-2 mb-2" href="#pinterest"><i class="ci-pinterest"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div>

		<div>
			<div class="bg-secondary py-5">
				<div class="container py-3">
					<h2 class="h4 text-center pb-4">Bài viết cùng chuyên mục</h2>
					<div class="tns-carousel">
						@php
						function LayHinhDauTien($strNoiDung)
						{
						$first_img = '';
						ob_start();
						ob_end_clean();
						$output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $strNoiDung, $matches);
							if(empty($output))
							return asset('public/img/noimage.png');
							else
							return str_replace('&amp;', '&', $matches[1][0]);
							}
							@endphp
							<div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;autoHeight&quot;: true, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2, &quot;gutter&quot;: 20},&quot;900&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 20}, &quot;1100&quot;:{&quot;items&quot;:3, &quot;gutter&quot;: 30}}}">
								@foreach($baivietcungchuyemuc as $value)
								<article>
									<a class="blog-entry-thumb mb-3" href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
										<img src="{{ LayHinhDauTien($value->noidung) }}" />
									</a>
									<div class="d-flex align-items-center fs-sm mb-2">
										<a class="blog-entry-meta-link" href="#user">bởi {{ $value->NguoiDung->name }}</a>
										<span class="blog-entry-meta-divider"></span>
										<a class="blog-entry-meta-link" href="#date">{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y') }}</a>
									</div>
									<h3 class="h6 blog-entry-title">
										<a href="{{ route('frontend.baiviet.chitiet', ['tenchude_slug' => $value->ChuDe->tenchude_slug, 'tieude_slug' => $value->tieude_slug . '-' . $value->id . '.html']) }}">
											{{ $value->tieude }}
										</a>
									</h3>
								</article>
								@endforeach
							</div>
					</div>
				</div>
			</div>

			@endsection