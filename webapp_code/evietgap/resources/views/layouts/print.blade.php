<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title','HÓA ĐƠN THANH TOÁN TIỀN PHÒNG')</title>
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
  font-size: 12pt;
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
#print {
	font-size: 20px;
	position: fixed;
	right: 0;
	top: 50px;
	background: #fff;
	padding: 15px;
	margin: 10px;
}

@media print {
  body, page {
    margin: 0;
    box-shadow: 0;
    padding: 0cm;
  }
  .no-print {
  	display: none;
  }

}

</style>
<script type="text/javascript">
	function Print(){
		window.print();
	}
</script>
<body>
<div id="print" onclick="Print();" class="no-print"><span class="glyphicon glyphicon-print"></span> in</div>
<page size="A4">
	<div id="page">
		<header>
			<div class="head-left">
				@yield('qrcode')
			</div>
			<div class="head-right">Ban quản lý Ký túc xá - Đại học An Giang</div>
		</header>
		<div class="title">@yield('title','HÓA ĐƠN THANH TOÁN TIỀN PHÒNG')</div>
		<div class="subtitle">-----o0o-----</div>
	   @yield('content')
	</div>
	<hr />
	<div id="page">
		<header>
			<div class="head-left">
			@yield('qrcode')
			</div>
			<div class="head-right">Ban quản lý Ký túc xá - Đại học An Giang</div>
		</header>
		<div class="title">@yield('title','HÓA ĐƠN THANH TOÁN TIỀN PHÒNG')</div>
		<div class="subtitle">-----o0o-----</div>
	   @yield('content')
	</div>
</page>
</body>
</html>
