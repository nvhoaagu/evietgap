@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Đổi Mật Khẩu</h3>
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
					<label for="">Mật khẩu hiện tại *</label>
					<input type="password" class="form-control" id="pass_old" name="pass_old" placeholder="Nhập mật khẩu hiện tại">
				</div>
				<div class="form-group">
					<label for="">Mật khẩu mới</label>
					<input type="password" class="form-control" id="pass_new" name="pass_new" placeholder="Nhập mật khẩu mới">
				</div>
				<div class="form-group">
					<label for="">Mật lại khẩu mới</label>
					<input type="password" class="form-control" id="pass_new_2" name="pass_new_2" placeholder="Nhập mật lại khẩu mới">
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary" id="edit">Chỉnh Sửa</button>
				<a href="{{url('admin')}}" class="btn btn-default">Trở Lại</a>
			</form>
		</div>
	</div>
@endsection
