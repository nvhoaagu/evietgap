<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Ký Túc Xá Trường Đại Học An Giang') | KTX ĐHAG</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/w3.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/ktx.css') !!}">
<!--    <link rel="stylesheet" type="text/css" href="{!! url('public/css/bootstrap-theme.min.css') !!}"> -->
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/dataTables.bootstrap.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/jquery.dataTables.min.css') !!}">
    <link rel="stylesheet" type="text/css" href="{!! url('public/css/metro.css') !!}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">

    <!-- Latest compiled and minified JavaScript -->
    <script src="{{ url('public/scripts/jquery.min.js')}}"></script>
    <script src="{{ url('public/scripts/bootstrap.min.js')}}"></script>
    <script src="{{ url('public/scripts/masonry.pkgd.min.js')}}"></script>

</head>
<body>
<div class="container">
  <div class="row">
      <div id="banner">
        <div id="logo">
            <a href="{{ url('/') }}/">
                <img src='{{url("public/images/logo.ico")}}'/>
            </a>
        </div>
        <div id="titleBanner">
            <div id="titleSo">
                <span id="lb_tenso">ĐẠI HỌC AN GIANG</span>
            </div>
            <div id="titleHTTT">
                <span>BAN QUẢN LÝ KÝ TÚC XÁ</span>
            </div>
        </div>
        <div id="nenBannerRight">
            <img src="{{url('public/images/bg.png')}}"/>
        </div>
      </div>
      <ul class="w3-navbar w3-blue w3-hoverable">
        <li><a class="w3-blue w3-hover-light-blue" href="{{url('http://www.agu.edu.vn')}}"><i class="glyphicon glyphicon-home"></i> Trang chủ AGU</a></li>
        <li><a class="w3-blue w3-hover-light-blue" href="{{url('http://mail.agu.edu.vn')}}"><i class="glyphicon glyphicon-envelope"></i> Hệ thống Email</a></li>
        <li><a class="w3-blue w3-hover-light-blue" href="{{url('http://regis.agu.edu.vn')}}"><i class="glyphicon glyphicon-check"></i> Đăng ký học phần</a></li>
        <li><a  class="w3-blue w3-hover-light-blue" href="{{url('admin')}}"><i class="glyphicon glyphicon-user"></i> Đăng nhập</a></li>
      </ul>
  </div>
  <div class="row" style="margin-top: 20px;">
      <div class="col-md-3">
          <?php $tlpage = DB::table("cms_theloai_page")->where("TrangThai",1)->get();?>
          <?php $page = Db::table("cms_page")->select("id","TitlePage","LoaiPage","TenPage")->where("TrangThai",1)->get(); ?>
          @foreach($tlpage as $tp)
            <div class="list-group">
              <a href="#" class="list-group-item active">{{$tp->TenTheLoai}}</a>
            @foreach($page as $p)
              @if($tp->id == $p->LoaiPage)
                <a href="{{url('page/'.str_slug($p->id.'-'.$p->TenPage).'.html')}}" class="list-group-item"> {{$p->TitlePage}}</a>
              @endif
            @endforeach
            </div>
          @endforeach
      </div>
      <div class="col-md-9">
          @yield('content')
      </div>
  </div>
</div>
<script src="{{ url('public/scripts/jquery.dataTables.min.js')}}"></script>
<script src="{{ url('public/scripts/dataTables.buttons.min.js')}}"></script>
<script src="{{ url('public/scripts/jszip.min.js')}}"></script>
<script src="{{ url('public/scripts/buttons.html5.min.js')}}"></script>
<script>
    $('table tfoot th').each( function () {
          var title = $('.table thead th').eq( $(this).index() ).text();
          $(this).html( '<input style="width: 100%;" type="text" placeholder="'+title+'" />' );
      } );
      var table = $('table').DataTable({
        dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            className: 'btn btn-success',
            text: "Xuất ra Excel",

        } ]
    } );

      // Apply the filter
      table.columns().every( function () {

          var column = this;

          $( 'input', this.footer() ).on( 'keyup change', function () {
              column
                  .search( this.value )
                  .draw();
          } );
      } );
</script>
<script type="text/javascript">
$('.panel-body .row').masonry({
  // options
  itemSelector: '.item',
});
$(document).ready(function(){

  var clickEvent = false;
  $('#myCarousel').carousel({
    interval:   3000
  });
});
$(window).load(function() {
    var boxheight = $('#myCarousel .carousel-inner').innerHeight();
    var itemlength = $('#myCarousel .list-group-item').length;
    var triggerheight = Math.round(boxheight/itemlength+1);
  $('#myCarousel .list-group-item').outerHeight(triggerheight);
  if(itemlength == 6)
  $('#myCarousel .list-group-item h4').outerHeight(triggerheight / 1.7)
});
</script>

</body>
</html>
