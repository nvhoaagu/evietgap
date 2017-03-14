@extends('layouts.webmaster_ktx') @section('content')
<div class="page-header text-left">
	<h3>Chọn tỉnh (Căn cứ vào hộ khẩu thường trú)</h3>
</div>
<div class="text-left">
	<form action="sinhvien/chontinh" method="post"  role="form">
		  {{ csrf_field() }}
			<input type="submit" value="Đăng ký" class="btn btn-default">
			<input type="reset" value="Hủy bỏ" class="btn btn-danger">
	</form>
</div>
@endsection
