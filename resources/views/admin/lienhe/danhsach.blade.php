@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Liên hệ</div>
    <div class="card-body table-responsive">
        <!--<p><a href="{{ route('admin.lienhe') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a></p>-->
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Họ và tên</th>
                    <th width="20%">Email</th>
                    <th width="15%">Subject</th>
                    <th width="20%">Message</th>
                    <th width="10%">Kiểm duyệt</th>
                    <th width="5%">Xóa</th>
                    <!--<th width="5%">Xóa</th>-->
                </tr>
            </thead>
            <tbody>
                @foreach($lienhe as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->name }}</td>
                    <td>{{ $value->email }}</td>
                    <td>{{ $value->subject }}</td>
                    <td>{{ $value->message }}</td>
                    <td class="text-center" title="Trạng thái kiểm duyệt">
                        <a href="{{ route('admin.lienhe.kiemduyet', ['id' => $value->id]) }}">
                            @if($value->kiemduyet == 1)
                            <i class="fa-light fa-lg fa-circle-check"></i>
                            @else
                            <i class="fa-light fa-lg fa-circle-xmark text-danger"></i>
                            @endif
                        </a>
                    </td>
                    <td class="text-center"><a href="{{ route('admin.lienhe.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa liên hệ không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection