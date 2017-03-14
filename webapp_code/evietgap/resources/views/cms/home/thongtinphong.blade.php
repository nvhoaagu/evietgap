@extends('layouts.webmaster_ktx')
@section('content')
<?php
  $ds_tang = DB::table('ktx_tang')->get();
?>
<div class="panel panel-primary">
  <div class="panel-heading ">
    <div class="col-sm-4">
      <b>Ký túc xá <b>{{$TenDay[0]->TenDay}}</b>
    </div>
    <div class="text-right">
      <a href="{{url('danhsachday')}}"><img src="{{url('public/images/exit.png')}}" alt="Quay lại màn hình chính"/ ></a>
    </div>
  </div>
  <div class="panel-body">
    <?php foreach ($ds_tang as $key => $tang): ?>
      <div class="panel panel-info">
        <div class="panel-heading">
          <h3 class="panel-title"><b>{{$tang->TenTang}}</b></h3>
        </div>
        <div class="panel-body">
          <?php foreach ($ds_phong as $key => $value_phong): ?>
          <?php if ($value_phong->MaTang == $tang->MaTang): ?>
              <div class="col-md-3 text-center">
                  Phòng {{$value_phong->TenPhong}}
                  <?php $SoNguoiDangO = 0?>
                  <?php foreach ($ds_sinhvien as $value_sinhvien): ?>
                  @if($value_sinhvien->MaPhong == $value_phong->MaPhong)
                      <?php  $SoNguoiDangO = $value_sinhvien->SoLuongSV;?>
                      ({{$value_sinhvien->SoLuongSV}} /
                  @endif
                  <?php endforeach;?>
                  @if($SoNguoiDangO==0)
                      (0 /
                          @endif
                          {{$value_phong->SoNguoiO}})</p>
                  <div class="thumbnail" align="left">
                      @if($value_phong->LoaiPhong==1)
                        <img src="{{url('public/images/boy.png')}}" alt="" />
                      @else
                        <img src="{{url('public/images/girl.png')}}" alt="" />
                      @endif
                  </div>
              </div>
              <?php endif; ?>
          <?php endforeach; ?>
        </div>
        <div class="panel-footer">
          Danh sách phòng ở {{$tang->TenTang}}
        </div>
      </div>
    <?php endforeach; ?>
  </div>
  <div class="panel-footer">
    Dãy {{$TenDay[0]->TenDay}} có {{count($ds_phong)}} phòng. Hiện tại có {{count($ds_sinhvien)}} sinh viên đang ở.
  </div>
@endsection
