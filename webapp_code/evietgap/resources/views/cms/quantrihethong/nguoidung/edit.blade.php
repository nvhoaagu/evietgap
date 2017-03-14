@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Chỉnh sửa thông tin người dùng</h3>
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
					<label for="">Tên người dùng</label>
					<input type="text" class="form-control" value="{{ $nguoidung->name}}" name="name" placeholder="Nhập tên người dùng">
				</div>
				<div class="form-group">
					<label for="">Email người dùng</label>
					<input type="text" class="form-control" value="{{ $nguoidung->email}}" name="email" id="" placeholder="Nhập Email">
				</div>
				<div class="form-group">
					<label for="">Chức năng</label>
					<select name="chucnang" class="form-control" required="required" value="">
					<?php $chucnang = DB::table('ktx_chucnang')->get();
						foreach ($chucnang as $key => $value) {?>
							<option value="{{$value->MaChucNang}}" @if($value->MaChucNang == $nguoidung->chucnang) selected="selected" @endif>{{ $value->MoTa}}</option>
						<?php }?>
					</select>
				</div>
				<div class="form-group">
					<label for="">Phụ Trách</label>
					<div class="row">
						<?php $phutrach = DB::table("ktx_day")->where("TrangThai",1)->get(); ?>
						<div class="col-md-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" @if($nguoidung->dayphutrach == "all")checked="checked" @endif name="phutrach[]" value="all">
									Tất Cả
								</label>
							</div>
						</div>
						@foreach($phutrach as $pt)
						<div class="col-md-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" @if(in_array("".$pt->MaDay."",explode(',',$nguoidung->dayphutrach)))checked="checked" @endif name="phutrach[]" value="{{$pt->MaDay}}">
									{{$pt->TenDay }}
								</label>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				{{ csrf_field() }}
  		<button type="submit" class="btn btn-primary">Sửa</button>
  		<a href="{{url('quantrihethong/nguoidung')}}" class="btn btn-default">Trở lại</a>
  	</form>
  </div>
  <div class="panel-footer">

  </div>
</div>
@endsection
