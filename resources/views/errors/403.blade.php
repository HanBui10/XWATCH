@extends('layouts.frontend')
@section('title', 403)
@section('content')

<div id="notfound">
    <div class="notfound">
        <div class="notfound-404">
            <h1>4<span>0</span>3</h1>
        </div>
        <h3>Trang không tìm thấy</h3>
        <br><a href="{{ route('frontend.home') }}">home page</a></br>
    </div>
</div>

@endsection