@extends('layouts.webmaster_ktx') @section('content')
<div class="alert alert-info">
	Bạn cần kiểm tra lại các thông tin sau đây. Nếu đồng ý đăng ký thì nhấn nút lưu.
	Nhấn nút Print để In phiếu đăng ký.<br>
<input type="button" onclick="printDiv('printArea')" value="In phiếu đăng ký"/>
<a href="rutdangky/{{$SinhVien[0]->MaSinhVien}}"><button type="button" name="button">Rút đăng ký</button></a>
<a href="{{url('ktx')}}"><button type="button" name="button">Quay lại trang chủ</button></a>
</div>
<form method="post" role="form">
<div id='printArea'>
	<table style="width:100%">
		<tr>
			<div class="text-center">
				<b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
					<b>Độc lập - Tự do - Hạnh phúc</b><br>
					---------------------------------
					<div class="text-center">
						<h3>ĐƠN ĐĂNG KÝ Ở KÝ TÚC XÁ </h3>
					</div>
			</div>
		</tr>
		<tr>
			<td colspan="3">
				<p class="text-left">
					Kính gửi:
					<ul style="list-style-type:disc" class="text-left">
						<li>Trung tâm Quản lý Ký túc xá Đại học An Giang;</li>
						<li>Phòng Công tác sinh viên.</li>
					</ul>
				</p>
			</td>
		</tr>
		<tr>
			<td width="300px">
					Tôi tên: <b>{{$SinhVien[0]->Ho}}{{$SinhVien[0]->Ten}}</b>
			</td>
			<td width="300px">
				Ngày sinh: <b>{{$SinhVien[0]->NgaySinh}}</b>
			</td>
			<td width="200px">
				  Giới tính: <b>{{$SinhVien[0]->GioiTinh}}</b>
			</td>
		</tr>
		<tr>
			<td>Khoa: <b>{{$SinhVien[0]->TenKhoa}}</b></td><td colspan="2">Mã sinh viên: <b>{{$SinhVien[0]->MaSinhVien}}</b></td><td></td>
		</tr>
		<tr>
			<td>Số CMND: <b>{{$SinhVien[0]->CMND}}</td><td>Ngày cấp:<b>{{$SinhVien[0]->NgayCap}}</td><td>Nơi cấp: <b>{{$SinhVien[0]->NoiCap}}</td>
		</tr>
		<tr>
			<td colspan="3">Hộ khẩu thường trú:<b>{{$SinhVien[0]->HoKhau}}</td><td></td><td></td>
		</tr>
		<tr>
			<td>Di động: <b>{{$SinhVien[0]->DienThoaiCaNhan}}</td><td colspan="2">Số điện thoại gia đình: <b>{{$SinhVien[0]->DienThoaiGiaDinh}}</td><td></td>
		</tr>
		<tr>
			<td colspan="3">
				Tôi làm đơn này được đăng ký ở tại Ký túc xá để tiện sinh hoạt và học tập. <br>
				Tôi xin cam kết ở đúng số phòng - số nhà đã được xếp, thực hiện nghiêm túc nội quy Ký túc xá,
				thanh toán đầy đủ các khoản phí và trả phòng đúng thời gian quy định. <br>
				Trân trọng.<br>
			</td>
		</tr>
		<tr align="center">
			<td>
				<div>
					XÁC NHẬN CỦA TRƯỜNG
				</div>
			</td>
			<td>

			</td>
			<td>
				<div >
					An Giang, ngày      tháng     năm <br>
					<b>Người làm đơn</b><br>
					<br>
					<br>
					<b>{{$SinhVien[0]->Ho}} {{$SinhVien[0]->Ten}}
				</div>
			</td>
		</tr>
	</table>
</div>
</form>
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
