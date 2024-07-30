@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">FAQ</div>
    <div class="card-body table-responsive">
        <p>
            <a href="{{ route('admin.faq.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a>
        </p>
        <table class="table table-bordered table-hover table-sm mb-3">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="10%">Tiêu đề</th>
                    <th width="20%">Nội dung</th>
                    <th width="5%">Sửa</th>
                    <th width="5%">Xóa</th>
                    

                </tr>
            </thead>
            <tbody>
                @foreach($faq as $value)
                <tr>
                    
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->tieude }}</td>
                    <td>{{ $value->noidung }}</td>

                    <td class="text-center"><a href="{{ route('admin.faq.sua', ['id' => $value->id]) }}"><i class="far fa-pen-to-square" style="color: blue;"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.faq.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa không FAQ không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection