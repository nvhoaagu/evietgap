<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang quản trị hệ thống</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/w3.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/ktx.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap-theme.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/dataTables.bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/jquery.dataTables.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/jquery-ui.css') !!}">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('public/scripts/jquery.min.js')}}"></script>
    <script src="{{ url('public/scripts/bootstrap.min.js')}}"></script>
    <script src="{{ url('public/scripts/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ url('public/scripts/jquery.form.js')}}"></script>
    <script src="{{ url('public/scripts/jquery-ui.js')}}"></script>
    <script src="{{ url('public/scripts/datepicker-vi.js')}}"></script>

</head>
<body id="app-layout">
  <div class="container" style="margin-top: 5px">
    <div class="row">
      <div class="w3-container w3-green text-center">
        <hr>
        <h3 class="w3-text-shadow">HỆ THỐNG THÔNG TIN NHẬT KÝ ĐIỆN TỬ EVIETGAP</h3>
        <hr>
      </div>
    </div>
    <div class="row">
      <div class="w3-container w3-border">
        <p></p>
        <div class="">
            @yield('content')
        </div>
      </div>
    </div>
    <div class="row">
      <div class="w3-container w3-green text-center">
        <p></p>
        <p>Nhóm nghiên cứu và ứng dụng công nghệ thông tin ICTAGU</p>
        <p></p>
      </div>
    </div>
  </div>
<script src="{{ url('public/scripts/jquery.dataTables.min.js')}}"></script>
<nav class="navbar navbar-inverse navbar-fixed-bottom">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{url('/admin/dashboard')}}">Start</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="{{url('tracuu')}}"><i class="glyphicon glyphicon-search"></i> Tìm kiếm</a></li>
      <li><a href="{{url('thongke')}}"><i class="glyphicon glyphicon-search"></i> Thống kê</a></li>
      <li class="active"><a href="{{url('admin/logout')}}"><i class="w3-large glyphicon glyphicon-log-out"></i> Thoát</a></li>
    </ul>
  </div>
</nav>
</body>
</html>
