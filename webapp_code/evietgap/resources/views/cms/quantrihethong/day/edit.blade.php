@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Chỉnh Sửa Dãy</h3>
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
					<label for="">Mã Dãy</label>
					<input type="text" class="form-control" id="" name="MaDay" value="{{ $day->MaDay }}">
				</div>
				<div class="form-group">
					<label for="">Tên Dãy</label>
					<input type="text" class="form-control" name="TenDay" id="" value="{{ $day->TenDay }}">
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
				<a href="{{url('quantrihethong/day')}}" class="btn btn-default">Trở Lại</a>
			</form>
			
		</div>
	</div>
@endsection
