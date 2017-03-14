@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm Thể Loại</h3>
	</div>
	<div class="panel-body">
	@if(session()->has('thongbao'))
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>{{session('thongbao')}}</strong> 
		</div>
	@endif
	@if($errors->all())
		@foreach($errors->all() as $err)
		<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<strong>Lỗi!</strong> {{$err}}
		</div>
		@endforeach
	@endif
		<form action="" method="POST" role="form">
			<div class="form-group">
				<label for="">Tên Thể Loại</label>
				<input type="text" class="form-control" name="TenTheLoai" placeholder="Nhập tên thể loại" required="required">
			</div>
			<div class="form-group">
				<label for="">Thể Loại Cha</label>
				<?php $theloai = DB::table("cms_theloai")->where([["TheLoaiCha",0],["TrangThai",1]])->get();?>
				<select name="TheLoaiCha" class="form-control" required="required">
					<option value="0">ROOT</option>
					@foreach($theloai as $tl)
					<option value="{{$tl->MaTheLoai}}">- {{$tl->TenTheLoai}}</option>
					@endforeach
				</select>
			</div>
						{{ csrf_field() }}
			<button type="submit" class="btn btn-primary">Thêm Mới</button>
			<a href="{{ url('quantrinoidung/theloai')}}" title="Trở về" class="btn btn-default">Trở về</a>
		</form>
	</div>
</div>
@endsection
