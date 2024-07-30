@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Đánh giá sản phẩm</div>
    <div class="card-body table-responsive">
     
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Thuộc sản phẩm</th>
                    <th width="20%">Họ và tên</th>
                    <th width="20%">Email</th>
                    <th width="15%">Nội dung</th>
                    <th width="10%">Kiểm duyệt</th>
                    <th width="5%">Xóa</th>
                    <!--<th width="5%">Xóa</th>-->
                </tr>
            </thead>
            <tbody>
                @foreach($danhgiasanpham as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $chitiet->SanPham->hinhanh }}" width="90" class="img-thumbnail" /></td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->noidung }}</td>
                    <td class="text-center" title="Trạng thái kiểm duyệt">
                        <a href="{{ route('admin.danhgiasanpham.kiemduyet', ['id' => $value->id]) }}">
                            @if($value->kiemduyet == 1)
                            <i class="fa-light fa-lg fa-circle-check"></i>
                            @else
                            <i class="fa-light fa-lg fa-circle-xmark text-danger"></i>
                            @endif
                        </a>
                    </td>
                    <td class="text-center"><a href="{{ route('admin.danhgiasanpham.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa đánh giá không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection