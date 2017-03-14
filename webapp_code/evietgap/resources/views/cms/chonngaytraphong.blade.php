@extends('layouts.ktx_dashboard')
@section('content')
<div class="col-md-12 col-md-offset-0 panel-group">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<b>SINH VIÊN TRẢ PHÒNG</b>
		</div>
		<div class="row">
			<div class="panel-body">
				<div class="panel-body" id="print-content">
						<form method="post" class="form-inline" action="./traphong">
								{{ csrf_field() }}
								<input type="hidden" name="MaSinhVien" value="{{$MaSinhVien}}">
								<input type="hidden" name="MaPhong" value="{{$MaPhong}}">
								<input type="hidden" name="NgayNhanPhong" value="{{$NgayNhanPhong}}">
								<table>
									<tr>
										<td width="400px">
											<label>Mã sinh viên:</label>
											{{$SinhVien[0]->MaSinhVien}}
										</td>
										<td>
											<label>Họ tên:</label>
											{{$SinhVien[0]->Ho}} {{$SinhVien[0]->Ten}}
										</td>
									</tr>
									<tr>
										<td>
											<label>Khoa</label>
											{{$SinhVien[0]->TenKhoa}}
										</td>
										<td>
											<label>Lớp</label>
											{{$SinhVien[0]->TenLop}}<br>
										</td>
									</tr>
									<tr>
										<td>
											<label>Ngày bắt đầu ở:</label>
											{{$NgayNhanPhong}}
										</td>
										<td>
											<label>Ngày trả phòng: </label>
											<input type="date" name="NgayTraPhong" value="{{date('Y-m-d')}}" class="form-control">
										</td>
									</tr>
									<tr>
										<td colspan="2">
												<input type="submit" value="Đồng ý" class="btn btn-success" onclick="check()">
										</td>
									</tr>
								</table>
						</form>
				</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
function check(){
		<?php

		?>
}
</script>
@endsection
