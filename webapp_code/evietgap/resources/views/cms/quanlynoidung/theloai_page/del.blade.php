`@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Xóa Thể Loại</h3>
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
	Bạn có chắc muốn xóa thể loại: <b>{{$theloai->TenTheLoai}}</b>
		<form action="" method="POST" role="form">

			<input name="xoa" type="hidden" value="1" />
						{{ csrf_field() }}
			<button type="submit" class="btn btn-primary">Xóa</button>
			<a href="{{ url('quantrinoidung/theloaipage')}}" title="Trở về" class="btn btn-default">Trở về</a>
		</form>
	</div>
</div>
@endsection
