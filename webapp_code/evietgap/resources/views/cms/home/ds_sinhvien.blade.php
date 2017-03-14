@extends('layouts.webmaster_ktx')
@section('content')
<?php
  $ds_sinhvien = DB::table('ktx_sinhvien')->join('ktx_phong_sinhvien','ktx_phong_sinhvien.MaSinhVien','=','ktx_sinhvien.MaSinhVien')
  ->where([
    ['ktx_phong_sinhvien.TrangThai',1]
  ])
  ->get();
?>
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title"><b>Danh sách Sinh viên lưu trú</b></h3>
  </div>
  <div class="panel-body">
    <table class="display compact table" id="hangdoisinhvienangiang">
      <thead>
        <th>Mã sinh viên</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Phái</th>
        <th>Tỉnh</th>
        <th>Huyện</th>
        <th>Khoa</th>
        <th>Phòng</th>
        <th>Dãy</th>
      </thead>
      <tfoot>
        <th>Mã sinh viên</th>
        <th>Họ</th>
        <th>Tên</th>
        <th>Phái</th>
        <th>Tỉnh</th>
        <th>Huyện</th>
        <th>Khoa</th>
        <th>Phòng</th>
        <th>Dãy</th>
      </tfoot>
      <?php foreach ($ds_sinhvien as $key => $value): ?>
        <tr>
          <td>{{$value->MaSinhVien}}<input type="hidden" name="MaSinhVien" value="{{$value->MaSinhVien}}"></td>
          <td>{{$value->Ho}}</td>
          <td>{{$value->Ten}}</td>
          <td>{{$value->GioiTinh}}</td>
          <td>{{$value->Tinh}}</td>
          <td>{{$value->Huyen}}</td>
          <td>{{$value->TenKhoa}}</td>
          <td>{{$value->MaPhong}}</td>
          <td>{{ DB::table("ktx_phong as p")->join("ktx_day as d","p.MaDay","=","d.MaDay")->select("TenDay")->where("MaPhong",$value->MaPhong)->value("TenDay") }}</td>
        </tr>
      <?php endforeach; ?>
    </table>
  </div>
  <div class="panel-footer">
    Tổng cộng có {{count($ds_sinhvien)}} sinh viên đang lưu trú.
  </div>
</div>
@endsection
