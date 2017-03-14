@extends('layouts.ktx_dashboard')
@section('content')
<div class="col-md-12 col-md-offset-0 panel-group">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<b>PHIẾU NHẬN PHÒNG</b>
		</div>
		<div class="row">
			<div class="panel-body">
				<div class="panel-body" id="print-content">
						<form method="post" class="form-inline" action="nhanphong">
								{{ csrf_field() }}
								<div class="container-fluid" id="print">
									<div class="row">
										<div class="col-md-12">
											<fieldset id="el01">
												<legend>Thông tin khách hàng</legend>
												Mã sinh viên: {{$SinhVien[0]->MaSinhVien}}<br>
												<input type='hidden' name="MaSinhVien" value="{{$SinhVien[0]->MaSinhVien}}">
												Họ tên: {{$SinhVien[0]->Ho}} {{$SinhVien[0]->Ten}}<br>
												<input type='hidden' name="Ho" value="{{$SinhVien[0]->Ho}}">
												<input type='hidden' name="Ten" value="{{$SinhVien[0]->Ten}}">
												Lớp {{$SinhVien[0]->TenLop}}.
												<input type='hidden' value="{{$SinhVien[0]->TenLop}}">
												Khoa {{$SinhVien[0]->TenKhoa}}<br>
												<input type='hidden' value="{{$SinhVien[0]->TenKhoa}}">
												Phòng {{$Phong[0]->TenPhong}}
												<input type='hidden' name="MaPhong" value="{{$Phong[0]->MaPhong}}">
												<input type='hidden' value="{{$Phong[0]->TenPhong}}">
											</fieldset>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<fiedset id="el01">
												<legend>Thời gian nhận phòng</legend>
												Ngày nhận phòng</td>
												<input type='date' name="NgayNhanPhong" class="form-control" value="{{date('Y-m-d')}}">
											</fieldset>
										</div>
									</div>
								</div>
								<div class="col-md-12 text-center">
									<input type="submit" value="Đồng ý" class="btn btn-success">
									<input type="button" value="In phiếu" onClick="window.print()" class="btn btn-success">
								</div>
						</form>
				</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function printDiv(divName) {
	 var printContents = document.getElementById(divName).innerHTML;
	 w=window.open();
	 w.document.write(printContents);
	 w.print();
	 w.close();
}
</script>
@endsection
