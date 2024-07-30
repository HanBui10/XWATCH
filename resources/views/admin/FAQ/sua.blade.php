@extends('layout.admin')
@section('content')
<div class="card">
    <div class="card-header">Sửa FAQ</div>
    <div class="card-body">
        <form action="{{ route('admin.faq.sua', ['id' => $faq->id]) }}" method="post">
            @csrf
            
            <div class="mb-3">
                <label class="form-label" for="tieude">Tiêu đề</label>
                <input type="text" class="form-control @error('tieude') is-invalid @enderror" id="tieude" name="tieude" value="{{ $faq->tieude }}" required />
                @error('tieude')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            
            <div class="mb-3">
                <label class="form-label" for="noidung">Nội dung FAQ</label>
                <textarea class="form-control" id="noidung" name="noidung" required>{{ $faq->noidung }}</textarea>
                @error('noidung')
                <div class="invalid-feedback"><strong>{{ $message }}</strong></div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary"><i class="fa-light fa-save"></i> Cập nhật</button>
        </form>
    </div>
</div>
@endsection


