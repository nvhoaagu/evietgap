@extends('layouts.webmaster_ktx')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Danh Sách Nhà Khách</b>
  </div>
  <div class="panel-body text-center">
    <?php
      $ds_nk = DB::table('ktx_phongngay')->get();
    ?>
      @foreach($ds_nk as $value)
       <?php $sl = DB::table("ktx_phongngay_khachhang")->where(["id_phongngay" => $value->MaPhong,"TrangThai" => 1])->count(); ?>
      <div class="col-md-3 img-thumbnail">
        <img src="@if($sl == $value->SoLuong){!!url("public/images/daynha3.png")!!} @elseif($sl == 0){!!url("public/images/daynha.png")!!} @else {!!url("public/images/daynha2.png")!!} @endif" alt="{{$value->MaPhong}}" />
        <br /><label>{{$value->MaPhong}}</label>
        <br /><label>Đang ở {{ $sl }} / {{$value->SoLuong}} người</label>
      </div>
      @endforeach 
  </div>
  <div class="panel-footer">
    Tổng cộng có {{count($ds_nk)}} dãy phòng.
  </div>
</div>
@endsection
