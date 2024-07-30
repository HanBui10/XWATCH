@extends('layouts.frontend')
@section('title', 'FAQ')

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
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">FAQ</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 mb-0">FAQ</h1>
        </div>
    </div>
</div>

<section class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-style1 border-0">
                    <div class="card-body p-4 p-md-5 p-xl-6">
                        <div class="text-center mb-2-3 mb-lg-6">
                           
                            <h2 class="h1 mb-0 text-secondary">Câu Hỏi Thường Gặp</h2>
                        </div>
                        <div id="accordion" class="accordion-style">
                            @foreach($lienhe as $value)
                            <div class="card mb-3">
                                <div class="card-header" id="headingOne">
                                    <h5 class="mb-0">
                                        <button class="btn btn-link" data-bs-toggle="collapse" data-bs-target="#collapse{{$value->id}}" aria-expanded="true" aria-controls="collapseOne"><span class="text-theme-secondary me-2">{{ $value->tieude }}</span> </button>
                                    </h5>
                                </div>
                                <div id="collapse{{ $value->id }}" class="collapse show" aria-labelledby="headingOne" data-bs-parent="#accordion">
                                    <div class="card-body">
                                        {{ $value->noidung}}
                                    </div>
                                </div>
                            </div>
                            @endforeach 
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



@endsection