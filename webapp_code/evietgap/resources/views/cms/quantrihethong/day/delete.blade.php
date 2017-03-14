@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">@if($day->TrangThai)Xóa Dãy @else Khôi phục dãy @endif</h3>
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
				@if($day->TrangThai)
					Bạn thực sự muốn xóa dãy <b>{{$day->TenDay}}</b>
					<input type="hidden" class="form-control" name="xoa" value="0" />
				@else
					Bạn thực sự muốn khôi phục dãy <b>{{$day->TenDay}}</b>
					<input type="hidden" class="form-control" name="xoa" value="1" />
				@endif
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary">@if($day->TrangThai)Xóa Dãy @else Khôi phục dãy @endif</button>
				<a href="{{url('quantrihethong/nguoidung')}}" class="btn btn-default">Trở Lại</a>
			</form>
			
		</div>
	</div>
@endsection
