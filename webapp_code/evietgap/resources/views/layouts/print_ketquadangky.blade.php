<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Đăng Ký Ở Ký Túc Xá</title>
    <link rel="stylesheet" media="all" type="text/css" href="{!! url('public/css/bootstrap.min.css') !!}">
</head>
<style type="text/css">
body {
  background: rgb(204,204,204);
}
#page {
	height: 49%;
}
page {
  background: white;
  display: block;
  margin: 0.5cm auto;
  box-shadow: 0 0 0.5cm rgba(0,0,0,0.5);
  padding: 0.5cm 1cm;
  font-size: 13pt;
}
page[size="A4"] {
  width: 21cm;
  height: 29.7cm;
}
page[size="A4"][layout="portrait"] {
  width: 29.7cm;
  height: 21cm;
}
header {
	padding: 0.2cm ;
	margin: 0.2cm;
}
.head-left,.foot-left {
	float: left;
}
.head-right {
	float: right;
	font-size: 0.5cm;
	padding: 0.5cm;
}
.foot-right {
	float: right;
}
.foot-left,.foot-right {
	text-align: center;
	margin: 0.2cm 1cm;
}
.title {
	clear: both;
    font-size: 0.7cm;
    text-align: center;
    display: block;
}
.subtitle {
    font-size: 0.5cm;
    text-align: center;
    display: block;
}
table {
	margin-top: 0.5cm;
}
th {
	text-align: center;
}
hr {
	border-top: 2px dashed #000;
}
@media print {
  body, page {
    box-shadow: 0;
    padding: 0cm;
  }
  .no-print {
  	display: none;
  }

}

</style>
<body>
<page size="A4">
	<div id="page">
		<header>
      <div class="text-center">
        <p>
          <b>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</b><br>
          <b>Độc lập - Tự do - Hạnh phúc</b><br>
          ------------------------
        </p>
      </div>
		</header>
		<div class="title">ĐƠN ĐĂNG KÝ Ở KÝ TÚC XÁ</div>
		<div class="subtitle">-----o0o-----</div>
    <p class="text-left">
      Kính gửi:<br>
      - Trung tâm Quản lý Ký túc xá ĐHQG – HCM;<br>
      - Phòng Công tác sinh viên.<br>
    </p>
    @yield('content')
	</div>
</page>
</body>
</html>
