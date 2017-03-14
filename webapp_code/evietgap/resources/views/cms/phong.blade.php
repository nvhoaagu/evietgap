@extends('layouts.ktx_dashboard')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12 col-md-offset-0 panel-group">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<b>MÀN HÌNH QUẢN LÝ PHÒNG</b>
				</div>
				<div class="row">
					<div class="panel-body">
						<div class="panel-body">
							<div class="alert alert-warning">
								Phòng {{$Phong[0]->TenPhong}} của ký túc xá {{$Day[0]->TenDay}} có <b>{{$Phong[0]->SoNguoiO}} chỗ ở.</b>
								Phòng chỉ nhận sinh viên <b>@if($Phong[0]->LoaiPhong==1) Nam @else Nữ @endif </b>
							</div>
							@if(count($ds_sinhvien)==$Phong[0]->SoNguoiO)
								<div class="alert alert-danger">
									Phòng đã đủ người. Chọn phòng khác để sắp sinh viên vào ở.
								</div>
								<a href="{{url('/'.$Day[0]->MaDay)}}">
									<button class="btn btn-info">Quay lại danh sách phòng</button>
								</a>
							@elseif($Phong[0]->SoNguoiO-count($ds_sinhvien)<$Phong[0]->SoNguoiO)
							<div>
								<div class="alert alert-danger">
									Phòng còn {{$Phong[0]->SoNguoiO-count($ds_sinhvien)}} chỗ ở.
								</div>
								<a href="{{url('/'.$Day[0]->MaDay)}}">
									<button class="btn btn-info">Quay lại danh sách phòng</button>
								</a>
								<a
									href="{{url('/'.$Day[0]->MaDay.'/'.$Phong[0]->MaPhong.'/danhsachsinhvien')}}">
									<button class="btn btn-primary">Danh sách chờ xếp phòng</button>
								</a>
								<a
									href="{{url('/'.$Day[0]->MaDay.'/'.$Phong[0]->MaPhong.'/danhsachsinhvien')}}">
									<button class="btn btn-primary">In phiếu thu theo quí</button>
								</a>
							</div>
							@elseif($Phong[0]->SoNguoiO-count($ds_sinhvien)==$Phong[0]->SoNguoiO)
								<div class="alert alert-danger">
									Phòng còn trống. Chọn danh sách chờ xếp phòng để thêm sinh viên vào phòng.
								</div>
									<a href="{{url('/'.$Day[0]->MaDay)}}">
									<button class="btn btn-info">Quay lại danh sách phòng</button>
									</a>
									<a
										href="{{url('/'.$Day[0]->MaDay.'/'.$Phong[0]->MaPhong.'/danhsachsinhvien')}}">
										<button class="btn btn-primary">Danh sách chờ xếp phòng</button>
									</a>
								</div>
							@endif
						</div>
						<div class="panel-body">
                              <?php if (count($ds_sinhvien)>0): ?>
                                <div>
								Danh sách gồm có <b>{{count($ds_sinhvien)}} </b>sinh viên
								<div>
									<table class="table table-hover table-bordered">
										<tr>
											<th>Mã sinh viên</th>
											<th>Họ</th>
											<th>Tên</th>
											<th>Lớp</th>
											<th>Ngày nhận phòng</th>
											<th>Đơn giá</th>
											<th>Chức năng</th>
										</tr>
                                      <?php foreach ($ds_sinhvien as $key => $sinhvien): ?>
                                        <tr>
											<td>{{$sinhvien->MaSinhVien}}</td>
											<td>{{$sinhvien->Ho}}</td>
											<td>{{$sinhvien->Ten	}}</td>
											<td>{{$sinhvien->TenLop}}</td>
											<td>{{$sinhvien->NgayNhanPhong}}</td>
											<td>
												<?php if ($sinhvien->Tinh!="An Giang"): ?>
													13000
												<?php else: ?>
													90000
												<?php endif; ?>
											</td>
											<td>
												<a href="{{url('/'.$Day[0]->MaDay.'/'.$Phong[0]->MaPhong.'/'.$sinhvien->MaSinhVien.'/chonngaytraphong/')}}">
												<button class="btn btn-primary">Trả phòng</button></a>
											</td>
										</tr>
                                      <?php endforeach; ?>
                                    </table>
								</div>
							</div>
                              <?php endif; ?>
                          </div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
