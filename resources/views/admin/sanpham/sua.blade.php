@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Sửa sản phẩm</div>
    <div class="card-body">
        <form action="{{ route('admin.sanpham.sua', ['id' => $sanpham->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="loaisanpham_id">Loại sản phẩm</label>
                <select class="form-select @error('loaisanpham_id') is-invalid @enderror" id="loaisanpham_id" name="loaisanpham_id" required>
                    <option value="">-- Chọn --</option>
                    @foreach($loaisanpham as $value)
                    <option value="{{ $value->id }}" {{ ($sanpham->loaisanpham_id == $value->id) ? 'selected' : '' }}>{{ $value->tenloai }}</option>
                    @endforeach
                </select>
                @error('loaisanpham_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="hangsanxuat_id">Hãng sản xuất</label>
                <select class="form-select @error('hangsanxuat_id') is-invalid @enderror" id="hangsanxuat_id" name="hangsanxuat_id" required>
                    <option value="">-- Chọn --</option>
                    @foreach($hangsanxuat as $value)
                    <option value="{{ $value->id }}" {{ ($sanpham->hangsanxuat_id == $value->id) ? 'selected' : '' }}>{{ $value->tenhang }}</option>
                    @endforeach
                </select>
                @error('hangsanxuat_id')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="tensanpham">Tên sản phẩm</label>
                <input type="text" class="form-control @error('tensanpham') is-invalid @enderror" id="tensanpham" name="tensanpham" value="{{ $sanpham->tensanpham }}" required />
                @error('tensanpham')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="soluong">Số lượng</label>
                <input type="number" min="0" class="form-control @error('soluong') is-invalid @enderror" id="soluong" name="soluong" value="{{ $sanpham->soluong }}" required />
                @error('soluong')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="giamoi">Giá mới</label>
                <input type="number" min="0" class="form-control @error('giamoi') is-invalid @enderror" id="giamoi" name="giamoi" value="{{ $sanpham->giamoi }}" required />
                @error('giamoi')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="giacu">Giá cũ</label>
                <input type="number" min="0" class="form-control @error('giacu') is-invalid @enderror" id="giacu" name="giacu" value="{{ $sanpham->giacu }}" required />
                @error('giacu')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="hinhanh">Hình ảnh sản phẩm</label>
                @if(!empty($sanpham->hinhanh))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('hinhanh') is-invalid @enderror" id="hinhanh" name="hinhanh" value="{{ $sanpham->hinhanh }}" />
                @error('hinhanh')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="hinhanh1">Hình ảnh sản phẩm</label>
                @if(!empty($sanpham->hinhanh1))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh1 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('hinhanh1') is-invalid @enderror" id="hinhanh1" name="hinhanh1" value="{{ $sanpham->hinhanh1 }}" />
                @error('hinhanh1')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="hinhanh2">Hình ảnh sản phẩm</label>
                @if(!empty($sanpham->hinhanh2))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $sanpham->hinhanh2 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('hinhanh2') is-invalid @enderror" id="hinhanh2" name="hinhanh2" value="{{ $sanpham->hinhanh2 }}" />
                @error('hinhanh2')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>


            <!--<div class="mb-3">
                <label class="form-label" for="motasanpham">Mô tả sản phẩm</label>
                <textarea class="form-control" id="motasanpham" name="motasanpham">{{ $sanpham->motasanpham }}</textarea>
            </div>-->

            <div class="mb-3">
                <label class="form-label" for="motasanpham">Mô tả sản phẩm</label>
                <textarea class="form-control" id="motasanpham" name="motasanpham" required>{{ $sanpham->motasanpham }}</textarea>
                @error('motasanpham')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="doinetsanpham">Đôi nét sản phẩm</label>
                <textarea class="form-control" id="doinetsanpham" name="doinetsanpham">{{ $sanpham->doinetsanpham }}</textarea>
                @error('doinetsanpham')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
        </form>
    </div>
</div>
@endsection
@section('javascript')
<script src="{{ asset('public/vendor/ckeditor5/ckeditor.js') }}"></script>
<script>
    ClassicEditor.create(document.querySelector('#motasanpham'), {
        licenseKey: '',
    }).then(editor => {
        window.editor = editor;
    }).catch(error => {
        console.error(error);
    });
</script>
@endsection