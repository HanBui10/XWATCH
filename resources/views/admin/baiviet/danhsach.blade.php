@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Bài viết</div>
    <div class="card-body table-responsive">
        <p><a href="{{ route('admin.baiviet.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a></p>
        <table class="table table-bordered table-hover table-sm mb-0">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="20%">Chủ đề</th>
                    <th width="55%">Thông tin bài viết</th>
                    <th width="20%" colspan="4" class="text-center">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($baiviet as $value)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $value->ChuDe->tenchude }}</td>
                    <td>
                        <span class="d-block fw-bold text-primary"><a href="{{ route('admin.baiviet.sua', ['id' => $value->id]) }}">{{ $value->tieude }}</a></span>
                        <span class="d-block small">
                            Ngày đăng: <strong>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $value->created_at)->format('d/m/Y H:i:s') }}</strong>
                            <br />Người đăng: <strong>{{ $value->NguoiDung->name }}</strong>
                            <br />Có <strong>{{ $value->luotxem }}</strong> lượt xem
                        </span>
                    </td>
                    <td class="text-center" title="Trạng thái kiểm duyệt">
                        <a href="{{ route('admin.baiviet.kiemduyet', ['id' => $value->id]) }}">
                            @if($value->kiemduyet == 1)
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1">Duyệt</i>
                            @else
                                <span class="badge bg-warning text-dark"><i class="bi bi-info-circle me-1">Chưa Duyệt</i>
                            @endif
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.baiviet.sua', ['id' => $value->id]) }}">
                            <i class="far fa-pen-to-square fa-lg" style="color: blue;"></i>
                        </a>
                    </td>
                    <td class="text-center">
                        <a href="{{ route('admin.baiviet.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa bài viết {{ $value->tieude }} không?')">
                            <i class="fa-solid fa-trash-can fa-lg" style="color: red;"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $baiviet->links('vendor.pagination.bootstrap-4-custom') }}

    </div>
</div>
@endsection