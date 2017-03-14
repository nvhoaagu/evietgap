@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Chỉnh Sửa Thể Loại</h3>
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
				<input type="text" class="form-control" name="TenTheLoai" placeholder="Nhập tên thể loại" value="{{$theloai->TenTheLoai}}" required="required">
			</div>
			{{ csrf_field() }}
			<button type="submit" class="btn btn-primary">Chỉnh sửa</button>
			<a href="{{ url('quantrinoidung/theloaipage')}}" class="btn btn-default" title="Thêm Mới">Trở về</a>
		</form>
	</div>
</div>
@endsection
