@extends('layouts.webmaster_ktx')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Danh sách dãy Ký túc xá</b>
  </div>
  <div class="panel-body">
    <?php
      $ds_day = DB::table('ktx_day')->get();
    ?>
      @foreach($ds_day as $value)
          <?php
            $dango = DB::table('ktx_phong_sinhvien as sv')->join("ktx_phong as p","p.MaPhong","=","sv.MaPhong")->where([["TrangThai",1],["MaDay",$value->MaDay]])->groupBy("sv.MaPhong")->select("p.MaPhong")->get();
          ?>
      <div class="col-md-3 img-thumbnail text-center">
        <a href="{{url('/')}}/{{$value->MaDay}}">
        <img src="{!!url("public/images/daynha.png")!!}" alt="{{$value->TenDay}}">
        <br><label>{{$value->TenDay}}</label>
        </a>
        <br><label>Đã dùng {{count($dango)}} /
        {{ DB::table("ktx_phong")->where("MaDay",$value->MaDay)->count() }} phòng</label>
      </div>

      @endforeach
  </div>
  <div class="panel-footer">
    Tổng cộng có {{count($ds_day)}} dãy phòng.
  </div>
</div>
@endsection
