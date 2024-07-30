@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Slider</div>
    <div class="card-body table-responsive">
        <p>
            <a href="{{ route('admin.slider.them') }}" class="btn btn-info"><i class="fa-light fa-plus"></i> Thêm mới</a>
        </p>
        <table class="table table-bordered table-hover table-sm mb-3">
            <thead>
                <tr>
                  
                    <th width="5%">#</th>
                    <th width="10%" style="text-align: center;">Hình ảnh 1</th>
                    <th width="10%" style="text-align: center;">Hình ảnh 2</th>
                    <th width="10%" style="text-align: center;">Hình ảnh 3</th>
                    <th width="10%" style="text-align: center;">Hình ảnh 4</th>
                    <th width="10%" style="text-align: center;">Hình ảnh 5</th>
                    <th width="5%" style="text-align: center;">Sửa</th>
                    <th width="5%" style="text-align: center;">Xóa</th>

                </tr>
            </thead>
            <tbody>
                @foreach($slider as $value)
                <tr>
                    <td>{{ $loop->index + $slider->firstItem() }}</td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->anh1 }}" width="90" class="img-thumbnail" /></td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->anh2 }}" width="90" class="img-thumbnail" /></td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->anh3 }}" width="90" class="img-thumbnail" /></td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->anh4 }}" width="90" class="img-thumbnail" /></td>
                    <td class="text-center"><img src="{{ env('APP_URL') . '/storage/app/' . $value->anh5 }}" width="90" class="img-thumbnail" /></td>

                    <td class="text-center"><a href="{{ route('admin.slider.sua', ['id' => $value->id]) }}"><i class="far fa-pen-to-square" style="color: blue;"></i></a></td>
                    <td class="text-center"><a href="{{ route('admin.slider.xoa', ['id' => $value->id]) }}" onclick="return confirm('Bạn có muốn xóa slider {{ $value->id }} không?')"><i class="fa-solid fa-trash-can" style="color: red;"></i></a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection