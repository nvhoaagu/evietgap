@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thêm Phòng</h3>
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
					<label for="">Mã Phòng</label>
					<input type="text" class="form-control" id="" name="MaPhong" placeholder="Nhập Mã Phòng" value="{{$phong->MaPhong}}">
				</div>
				<div class="form-group">
					<label for="">Tên Phòng</label>
					<input type="text" class="form-control" name="TenPhong" id="" placeholder="Nhập Tên Phòng" value="{{$phong->TenPhong}}">
				</div>
				<div class="form-group">
					<label for="">Số Người Ở</label>
					<input type="text" class="form-control" name="SoNguoiO" id="" placeholder="Nhập Số Người Ở" value="{{$phong->SoNguoiO}}">
				</div>
				<div class="form-group">
					<label for="">Dãy</label>
					<?php $day = DB::table("ktx_day")->where("TrangThai",1)->get(); ?>
					<select name="MaDay" id="input" class="form-control" required="required">
						@foreach($day as $d)
						<option value="{{$d->MaDay}}" @if($d->MaDay == $phong->MaDay)selected="selected"@endif>{{ $d->TenDay }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Tầng</label>
					<?php $tang = DB::table("ktx_tang")->get(); ?>
					<select name="MaTang" id="input" class="form-control" required="required">
						@foreach($tang as $d)
						<option value="{{$d->MaTang}}" @if($d->MaTang == $phong->MaTang)selected="selected"@endif>{{ $d->TenTang }}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					<label for="">Loại Phòng</label>
					<select name="LoaiPhong" class="form-control" required="required">
						<option value="1">Nam</option>
						<option value="2">Nữ</option>
						<option value="3">Cả Hai</option>
					</select>
				</div>
				<div class="form-group">
					<label for="">Đơn Giá Trong Tỉnh</label>
					<input type="text" class="form-control" name="DonGiaTrongTinh" value="{{$phong->DonGiaTrongTinh}}" placeholder="Nhập Đơn Giá Trong Tỉnh">
				</div>
				<div class="form-group">
					<label for="">Đơn Giá Ngoài Tỉnh</label>
					<input type="text" class="form-control" name="DonGiaNgoaiTinh" value="{{$phong->DonGiaNgoaiTinh}}" placeholder="Nhập Đơn Giá Ngoài Tỉnh">
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
				<a href="{{url('quantrihethong/phong')}}" class="btn btn-default">Trở Lại</a>
			</form>
			
		</div>
	</div>
@endsection
