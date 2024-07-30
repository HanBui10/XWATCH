@extends('layout.admin')
@section('content')

<div class="card">
    <div class="card-header">Thêm người dùng</div>
    <div class="card-body">
        <form action="{{ route('admin.nguoidung.them') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="image_user">Image</label>
                <input type="file" class="form-control @error('image_user') is-invalid @enderror" id="image_user" name="image_user" />
                @error('image_user')
                <div class="invalid-feedback"> <strong>{{$message}}</strong> </div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="name">Họ và tên</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required />
                @error('name')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="email">Địa chỉ email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required />
                @error('email')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="role">Quyền hạn</label>
                <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                    <option value="">-- Chọn --</option>
                    <option value="admin">Quản trị viên</option>
                    <option value="user" selected>Khách hàng</option>
                </select>
                @error('role')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Mật khẩu mới</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required />
                @error('password')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="password_confirmation">Xác nhận mật khẩu mới</label>
                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" name="password_confirmation" required />
                @error('password_confirmation')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="address">Address</label>
                <input type="text" class="form-control" id="address" name="address" required></input>
            </div>
            <div class="mb-3">
                <label class="form-label" for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" required></input>
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-light fa-user-plus"></i> Thêm người dùng</button>
        </form>
    </div>
</div>


@endsection