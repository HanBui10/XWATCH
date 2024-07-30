@extends('layouts.frontend')
@section('content')
<style>
    .mins {
        color: #ddd;
        border: 2px solid #ddd;
        width: 27px;
        display: inline-block;
        text-align: center
    }

    .mins:hover {
        border: 2px solid #27ae60;
    }

    .mins:hover i {
        color: #27ae60;
    }

    .qty {
        width: 60px;
        border: 2px solid #ddd;
        text-align: center;
        outline: none;
    }

    .plus {
        color: #ddd;
        border: 2px solid #ddd;
        width: 27px;
        display: inline-block;
        text-align: center;
    }

    .plus:hover {
        border: 2px solid #e74c3c;
    }

    .plus:hover i {
        color: #e74c3c;
    }

    .delete-cart {
        color: #fff;
        text-decoration: none;
        background: #3498db;
        display: inline-block;
        width: 50px;
        height: 27px;
        display: grid;
        place-items: center;
        border-radius: 5px;
    }

    .delete-cart:hover {
        text-decoration: none;
        background-color: #e74c3c;
        color: #fff;
    }

    .buy-order {
        color: #fff;
        text-decoration: none;
        background: #e74c3c;
        display: inline-block;
        width: 100px;
        height: 40px;
        display: grid;
        place-items: center;
        border-radius: 5px;
    }

    .buy-order:hover {
        color: #fff;
        text-decoration: none;
        background: #c0392b;
    }
</style>
<div class="content" style="width:100%;">
    @if (session()->has('status'))
    <div class="alert alert-success text-center" style="position: fixed;
    top: 0;
    right: 0;
    width: 315px;
    height: 150px;
    z-index: 5;
    font-size: 20px;">
        <i class="bi bi-check-circle" style="font-size:35px;display:block;
    margin-bottom:8px;"></i>{{ session()->get('status') }}
    </div>
    @endif
    <div class="container">
        <div class="row">
            <div class="container pb-5 mb-sm-4" style="min-height:500px;">
                <div class="pt-4">
                    @if($donhang->count() > 0)
                    @foreach($donhang as $value)
                    @if($value->tinhtrang != 2)
                    <div class="order-client">
                        <div class="card">
                            <div class="card-header bg-white text-center">
                                @if($value->tinhtrang == 1)
                                <a>
                                    <button type="button" class="btn bg-white">
                                        <i class="bi bi-hourglass-top mr-1 text-danger" style="font-size:20px;"></i><span class="text-danger font-weight-bold">Đang xử lý</span>
                                    </button>
                                </a>
                                @else
                                <a>
                                    <button type="button" class="btn bg-white">
                                        <i class="bi bi-hourglass-top mr-1" style="color:#dcdde1"></i><span style="color:#dcdde1">Đang xử lý</span>
                                    </button>
                                </a>
                                @endif
                                @if($value->tinhtrang == 0)
                                <a>
                                    <button type="button" class="btn bg-white">
                                        <i class="bi bi-hourglass-bottom mr-1 text-success" style="font-size:20px;"></i><span class="text-success font-weight-bold">Hoàn tất</span>
                                    </button>
                                </a>
                                @else
                                <a>
                                    <button type="button" class="btn bg-white">
                                        <i class="bi bi-hourglass-bottom mr-1" style="color:#dcdde1"></i><span style="color:#dcdde1">Hoàn tất</span>
                                    </button>
                                </a>
                                @endif
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <p><i class="bi bi-signpost-split mr-3 text-danger"></i><span><strong class="mr-2"> Địa chỉ nhận hàng:</strong> {{ $value->diachigiaohang }}</span></p>
                                        <p><i class="bi bi-telephone mr-3 text-primary"></i><span><strong class="mr-2"> Số điện thoại:</strong> {{ $value->dienthoaigiaohang }}</span></p>
                                        <p><i class="bi bi-calendar2 mr-3 text-warning"></i><span><strong class="mr-2"> Ngày đặt hàng:</strong> {{ $value->created_at }}</span></p>
                                        <p><i class="bi bi-clock mr-3 text-success"></i><span><strong class="mr-2"> Cập nhật gần nhất:</strong> {{ $value->updated_at }}</span></p>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="jumbotron bg-light p-3 mb-0">
                                            <form action="{{ route('frontend.cancel.order') }}" method="post">
                                                @csrf
                                                @php $tongtien = 0; @endphp
                                                @foreach($donhang_chitiet as $chitiet)
                                                @if($value->id == $chitiet->donhang_id)
                                                <div class="media mb-2">
                                                    <img src="{{ env('APP_URL') . '/storage/app/' . $chitiet->SanPham->hinhanh }}" width="80" class="mr-3 img-thumb" alt="...">
                                                    <div class="media-body">
                                                        <h5 class="mt-0">{{ $chitiet->SanPham->tensanpham }}</h5>
                                                        <input type="hidden" name="id[]" value="{{ $chitiet->id }}">
                                                        <input type="hidden" name="donhang_id" value="{{ $value->id }}">
                                                        <p class="mb-0"><span class="pr-3">{{ $chitiet->soluongban }}</span>x <span class="pl-3">{{ number_format($chitiet->dongiaban,0,'.','.') }}đ</span></p>
                                                    </div>
                                                </div>
                                                @php $tongtien += $chitiet->soluongban * $chitiet->dongiaban; @endphp
                                                @endif
                                                
                                                @endforeach
                                                <hr class="my-2">
                                                <p class="text-right">Tổng:<span class="pl-3">
                                                {{ number_format($tongtien) }}đ
                                                </span></p>
                                                @if($value->tinhtrang == 1)
                                                <button class="btn btn-secondary" type="submit" onclick="return confirm('Bạn muốn hủy đơn hàng này?')">Hủy đơn hàng</button>
                                                @else
                                                <button class="btn btn-secondary" style="visibility: hidden;">Hủy đơn hàng</button>
                                                @endif

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                    @else
                    <div class="container pb-5 mb-sm-4">
                        <div class="pt-4">
                            <div class="card py-3 mt-sm-3">
                                <div class="card-body text-center">
                                    <i class="bi bi-basket-fill" style="font-size:50px;color:#95afc0"></i>
                                    <h2 class="h4 pb-2">Chào bạn đã đến với đơn hàng</h2>
                                    <p class="fs-sm mb-2">Hiện tại bạn chưa thực hiện giao dịch nào!</p>
                                    <a class="btn btn-danger mt-3 me-3" href="{{route('frontend.lichsudonhang')}}') }}">
                                        <i class="ci-cart me-2"></i>Mua hàng
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection