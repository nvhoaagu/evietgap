@extends('ktx.quantrihethong.phong.main')
@section('phong')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Danh Sách Phòng</h3>
	</div>
	<div class="panel-body">
		<table class="table table-hover" id="ds_phong">
		<thead>
			<tr>
				<th>Mã Phòng</th>
				<th>Tên Phòng</th>
				<th>Số Người Ở</th>
				<th>Mã Dãy</th>
				<th>Tầng</th>
				<th>Loại Phòng</th>
				<th>ĐG. Trong Tỉnh</th>
				<th>ĐG. Ngoài Tỉnh</th>
				<th>Hành Động</th>
			</tr>
		</thead>
		<tfoot>
			<tr>
				<th>Mã Phòng</th>
				<th>Tên Phòng</th>
				<th>Số Người Ở</th>
				<th>Mã Dãy</th>
				<th>Tầng</th>
				<th>Loại Phòng</th>
				<th>ĐG. Trong Tỉnh</th>
				<th>ĐG. Ngoài Tỉnh</th>
				<th>Hành Động</th>
			</tr>
		</tfoot>
		<tbody>
			@foreach($phong as $p)
			<tr>
				<td> {{$p->MaPhong }}</td>
				<td> {{$p->TenPhong }}</td>
				<td> {{$p->SoNguoiO }}</td>
				<td> {{$p->MaDay }}</td>
				<td> {{$p->MaTang }}</td>
				<td>@if($p->LoaiPhong == 1)
						Nam
					@elseif($p->LoaiPhong == 2) 
						Nữ
					@else
						Nam + Nữ
					@endif
				</td>
				<td> {{$p->DonGiaTrongTinh }}</td>
				<td> {{$p->DonGiaNgoaiTinh }}</td>
				<td>
					<a style="margin: 0 5px;" href="{{ url('quantrihethong/phong/showedit/'.$p->MaPhong)}}" title="Sửa người dùng">
						<img width="32px" src="{{url('public/images/edit.png')}}" alt="edit">
					</a>
					<a style="margin: 0 5px;" href="{{ url('quantrihethong/phong/showdelete/'.$p->MaPhong)}}" title="Sửa người dùng">
						<img width="32px" src="{{url('public/images/delete.png')}}" alt="delete">
					</a>
				</td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
</div>

@endsection
