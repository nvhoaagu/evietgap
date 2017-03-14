@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Thêm người dùng mới</h3>
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
			<form action="{{ url('quantrihethong/nguoidung/showadd')}}" method="POST" role="form">
				<div class="form-group">
					<label for="">Tên người dùng</label>
					<input type="text" class="form-control" id="" name="name" placeholder="Nhập tên người dùng">
				</div>
				<div class="form-group">
					<label for="">Email người dùng</label>
					<input type="email" class="form-control" name="email" re placeholder="Nhập Email">
				</div>
				<div class="form-group">
					<label for="">Mật Khẩu</label>
					<input type="password" class="form-control" name="password" id="" placeholder="Nhập Mật Khẩu">
				</div>
				<div class="form-group">
					<label for="">Chức năng</label>
					<select name="chucnang" class="form-control" required="required">
					<?php $chucnang = DB::table('ktx_chucnang')->get();
						foreach ($chucnang as $key => $value) {?>
						<option value="{{$value->MaChucNang}}">{{ $value->MoTa}}</option>
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
									<input type="checkbox" name="phutrach[]" value="all">
									Tất Cả
								</label>
							</div>
						</div>
						@foreach($phutrach as $pt)
						<div class="col-md-4">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="phutrach[]" value="{{$pt->MaDay}}">
									{{$pt->TenDay }}
								</label>
							</div>
						</div>
						@endforeach
					</div>
				</div>
				{{ csrf_field() }}
				<button type="submit" class="btn btn-primary">Thêm</button>
				<a href="{{url('quantrihethong/nguoidung')}}" class="btn btn-default">Trở Lại</a>
			</form>

		</div>
	</div>
@endsection
