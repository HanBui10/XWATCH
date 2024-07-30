@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Người dùng</div>
    <div class="card-body table-responsive">
        <p><a href="{{ route('admin.nguoidung.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a></p>
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Họ và tên</th>
                    <th width="15%">Tên đăng nhập</th>
                    <th width="20%">Email</th>
                    <th width="5%">Quyền hạn</th>
                    <th width="20%">Image</th>
                    <th width="25%">Address</th>
                    <th width="25%">Phone</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nguoidung as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->username }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->role }}</td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/'.$value->image_user}}" width="100" class="img-thumbnail" /> </td>
                    <td>{{ $value->address}}</td>
                    <td>{{ $value->phone}}</td>
                    <td class="text-center"><a href="{{ route('admin.nguoidung.sua', ['id' => $value->id]) }}"><i class="far fa-pen-to-square" style="color: blue;"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.nguoidung.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa người dùng {{ $value->name }} không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection