@extends('layouts.admin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách dãy</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="btn-block">
					<a href="{{ url('quantrihethong')}}" class="btn btn-danger" title="Trở Lại" >Trở lại màn hình quản trị</a>
					<a href="{{ url('quantrihethong/day/showadd')}}" class="btn btn-success" title="Thêm Mới">Thêm Dãy Mới</a>
					<a href="{{ url('quantrihethong/day/daxoa')}}" class="btn btn-warning" title="Thêm Mới">Phục hồi Dãy Đã Xóa</a>
					<a href="{{url('admin/logout')}}" class="btn btn-danger">Thoát khỏi hệ thống</a>

				</div>
				</div>
			<table class="table table-striped" id="ds_nguoidung">
				<thead>
					<tr>
						<th>Mã Dãy</th>
						<th>Tên Dãy</th>
						<th>Hành Động</th>
					</tr>
				</thead>
				<tfoot>
						<th>Mã Dãy</th>
						<th>Tên Dãy</th>
						<th>Hành Động</th>
				</tfoot>
				<tbody>
					<?php $day = DB::table("ktx_day")->where("TrangThai",1)->get();?>
					<?php foreach ($day as $key => $value) {?>
						<tr>
							<td>{{$value->MaDay}}</td>
							<td>{{$value->TenDay}}</td>
							<td>
								<a style="margin: 0 5px;" href="{{ url('quantrihethong/day/showedit/'.$value->MaDay)}}" title="Sửa người dùng">
									<img width="32px" src="{{url('public/images/edit.png')}}" alt="edit">
								</a>
								<a style="margin: 0 5px;" href="{{ url('quantrihethong/day/showdelete/'.$value->MaDay)}}" title="Xóa người dùng">
									<img width="32px" src="{{url('public/images/delete.png')}}" alt="delete">
								</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			</div>
			<div class="panel-footer">
				Tổng cộng có {{count($day)}} người dùng
			</div>
		</div>


@endsection
