@extends('layouts.admin')
@section('content')
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách người dùng</h3>
		</div>
		<div class="panel-body">
		<div class="form-group">
			<div class="btn-group">
				<a href="{{ url('quantrihethong')}}" class="btn btn-danger" title="Trở Lại">Trở lại màn hình quản trị</a>
				<a href="{{ url('quantrihethong/nguoidung/showadd')}}" class="btn btn-success">Thêm mới người dùng</a>
				<a href="{{url('admin/logout')}}" class="btn btn-danger">Thoát khỏi hệ thống</a>
			</div>
		</div>
			<table class="table table-striped" id="ds_nguoidung">
				<thead>
					<tr>
						<th>Tên người dùng</th>
						<th>Email</th>
						<th>Phụ trách</th>
						<th>Chức Năng</th>

						<th>Hành Động</th>
					</tr>
				</thead>
				<tfoot>
						<th>Tên người dùng</th>
						<th>Email</th>
						<th>Phụ trách</th>
						<th>Chức Năng</th>

						<th>Hành Động</th>
				</tfoot>
				<tbody>
					<?php $nguoidung = DB::table("admins")->where("TrangThai",1)->get();?>
					<?php foreach ($nguoidung as $key => $value) {?>
						<tr>
							<td>{{$value->name}}</td>
							<td>{{$value->email}}</td>
							<td>{{ $value->dayphutrach }}</td>
							<?php $chucnang = DB::table('ktx_chucnang')->select("MoTa")->where("MaChucNang",$value->chucnang)->get();?>
							<td>
								@foreach($chucnang as $cn)
								{{$cn->MoTa}}
								@endforeach
							</td>
							<td>
								<a style="margin: 0 5px;" href="{{ url('quantrihethong/nguoidung/showedit/'.$value->id)}}" title="Sửa người dùng">
									<img width="32px" src="{{url('public/images/edit.png')}}" alt="edit">
								</a>
								<a style="margin: 0 5px;" href="{{ url('quantrihethong/nguoidung/showdelete/'.$value->id)}}" title="Xóa người dùng">
									<img width="32px" src="{{url('public/images/delete.png')}}" alt="delete">
								</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			</div>
			<div class="panel-footer">
				Tổng cộng có {{count($nguoidung)}} người dùng
			</div>
		</div>


@endsection
