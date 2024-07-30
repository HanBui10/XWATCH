@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Sửa slider</div>
    <div class="card-body">
        <form action="{{ route('admin.slider.sua', ['id' => $slider->id]) }}" method="post" enctype="multipart/form-data">
            @csrf
            
           
            <div class="mb-3">
                <label class="form-label" for="anh1">Hình ảnh 1</label>
                @if(!empty($slider->anh1))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh1 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('anh1') is-invalid @enderror" id="anh1" name="anh1" value="{{ $slider->anh1 }}" />
                @error('anh1')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="anh2">Hình ảnh 2</label>
                @if(!empty($slider->anh2))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh2 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('anh2') is-invalid @enderror" id="anh2" name="anh2" value="{{ $slider->anh2 }}" />
                @error('anh2')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="anh3">Hình ảnh 3</label>
                @if(!empty($slider->anh3))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh3 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('anh3') is-invalid @enderror" id="anh3" name="anh3" value="{{ $slider->anh3 }}" />
                @error('anh3')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="anh4">Hình ảnh 4</label>
                @if(!empty($slider->anh4))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh4 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('anh4') is-invalid @enderror" id="anh4" name="anh4" value="{{ $slider->anh4 }}" />
                @error('anh4')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label" for="anh4">Hình ảnh 5</label>
                @if(!empty($slider->anh5))
                <img class="d-block rounded img-thumbnail" src="{{ env('APP_URL') . '/storage/app/' . $slider->anh5 }}" width="100" />
                <span class="d-block small text-danger">Bỏ trống nếu muốn giữ nguyên ảnh cũ.</span>
                @endif
                <input type="file" class="form-control @error('anh5') is-invalid @enderror" id="anh4" name="anh5" value="{{ $slider->anh5 }}" />
                @error('anh5')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
        </form>
    </div>
</div>
@endsection
