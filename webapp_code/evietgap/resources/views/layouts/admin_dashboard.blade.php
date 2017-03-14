<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Trang quản trị</title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/ktx.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap-theme.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/dataTables.bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/jquery.dataTables.min.css') !!}">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('public/scripts/jquery.min.js')}}"></script>
    <script src="{{ url('public/scripts/bootstrap.min.js')}}"></script>

</head>
<body id="app-layout">
<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <!-- Branding Image -->
            <a class="navbar-brand" href="{{ url('/') }}">
                TRANG QUẢN TRỊ HỆ THỐNG
            </a>
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                <li><a href="{{ url('http://www.agu.edu.vn') }}">Trang chủ</a></li>
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guard('admin')->check())
                    <li><a href="{{ url('admin/logout') }}">Đăng xuất</a></li>
                @else
                    <li><a href="{{ url('admin/login') }}">Đăng nhập</a></li>
                @endif
            </ul>

        </div>
    </div>
</nav>

@yield('content')

<!-- JavaScripts -->
{{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
