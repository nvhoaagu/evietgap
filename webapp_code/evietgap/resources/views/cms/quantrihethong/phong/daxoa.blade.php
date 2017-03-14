@extends('layouts.admin')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title">Danh sách phòng đã xóa</h3>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<div class="btn-group">
					<a href="{{ url('quantrihethong/phong')}}" class="btn btn-default" title="Thêm Mới">Trở về</a>
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
					<?php $day = DB::table("ktx_phong")->where("TinhTrang",0)->get();?>
					<?php foreach ($day as $key => $value) {?>
						<tr>
							<td>{{$value->MaPhong}}</td>
							<td>{{$value->TenPhong}}</td>
							<td>
								<a style="margin: 0 5px;" href="{{ url('quantrihethong/phong/showdelete/'.$value->MaPhong)}}" title="Khôi Phục">
									<img width="32px" src="{{url('public/images/add.png')}}" alt="Khôi Phục">
								</a>
							</td>
						</tr>
					<?php }?>
				</tbody>
			</table>
			</div>
		</div>

	
@endsection
