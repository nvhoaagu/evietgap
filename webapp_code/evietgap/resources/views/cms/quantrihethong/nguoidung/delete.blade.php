@extends('layouts.admin')
@section('content')
<div class="panel panel-danger">
		<div class="panel-heading">
			<h3 class="panel-title">Xóa người dùng</h3>
		</div>
		<div class="panel-body">
		@if($errors->all())
			@foreach($errors->all() as $err)
			<div class="alert alert-danger">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>Lỗi!</strong> {{$err}}
			</div>
			@endforeach
		@endif
			<form action="" method="POST" role="form">
				Bạn thực sự muốn xóa người dùng <b>{{$nguoidung->name}}</b>
				<input type="hidden" class="form-control" name="xoa" value="1" />
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary">Xóa</button>
				<a href="{{url('quantrihethong/nguoidung')}}" class="btn btn-default">Trở Lại</a>
			</form>

		</div>
	</div>
@endsection
