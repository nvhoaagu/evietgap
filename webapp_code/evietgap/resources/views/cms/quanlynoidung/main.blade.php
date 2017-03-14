@extends('layouts.admin')
@section('content')
<div class="w3-panel w3-red">
	<h3>Quản lý nội dung website, cập nhật tin tức</h3>
</div>
<div class="row">
	<div class="col-md-2">
		<a href="{{ url('quantrinoidung/theloai')}}" class="thumbnail text-center">
			<img src="{{url('public/images/quanlytheloai.png')}}" alt="..."><br />
			<b>Quản lý thể loại</b>
		</a>
	</div>
	<div class="col-md-2">
		<a href="{{ url('quantrinoidung/baiviet')}}" class="thumbnail text-center">
			<img src="{{url('public/images/quanlybaiviet.png')}}" alt="..."><br />
			<b>Bài Viết</b>
		</a>
	</div>
	<div class="col-md-2">
		<a href="{{ url('quantrinoidung/file')}}" class="thumbnail text-center">
			<img src="{{url('public/images/quanlytaptin.png')}}" alt="..."><br />
			<b>Quản lý File</b>
		</a>
	</div>
	<div class="col-md-2">
		<a href="{{ url('quantrinoidung/theloaipage')}}" class="thumbnail text-center">
			<img src="{{url('public/images/quanlytheloaitrang.png')}}" alt="..."><br />
			<b>Chuyên mục trang</b>
		</a>
	</div>
	<div class="col-md-2">
		<a href="{{ url('quantrinoidung/page')}}" class="thumbnail text-center">
			<img src="{{url('public/images/quanlytrang.png')}}" alt="..."><br />
			<p></p>
			<p></p>
			<b>Quản lý Trang</b>
		</a>
	</div>
</div>
@endsection
