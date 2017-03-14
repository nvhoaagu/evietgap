@extends('layouts.admin')
@section('content')
<?php
  $ds_chucnang = DB::table('sys_chucnang')->get();
?>
<div>
  <p>
    Chào mừng <b>{{$admin->name}}</b> đã sử dụng hệ thống. Quyền hạn: {{$admin->chucnang}}
  </p>
</div>
<hr>
<div class="col-md-12">
  <p>
    <a data-toggle="collapse" href="#thongtincoban"><b>Quản trị nội dung Website</b></a>
    <div id="thongtincoban" class="panel-collapse collapse in">
        <div class="col-sm-2 col-md-2" align="center">
            <a href="{{url('canhan/doipass')}}">
                <div class="thumbnail">
                    <img src="{!!url('public/images/doimatkhau.png')!!}" alt="Thông tin cá nhân">
                    <p></p>
                    <label>Đổi mật khẩu</label>
                </div>
            </a>
        </div>
        <div class="col-sm-2 col-md-2" align="center">
            <a href="{{url('admin/logout')}}">
                <div class="thumbnail">
                    <img src="{!!url('public/images/thoat.png')!!}" alt="Thông tin cá nhân">
                    <p></p>
                    <label>Thoát</label>
                </div>
            </a>
        </div>

        <?php if ($admin->chucnang=="quantrihethong" || $admin->chucnang=="administrator"): ?>
          <div class="col-sm-2 col-md-2" align="center">
              <a href="{{url('quantrihethong')}}">
                  <div class="thumbnail">
                      <img src="{!!url('public/images/quantrihethong.png')!!}" alt="Quản trị hệ thống" width="64" height="64">
                      <p></p>
                      <label>Quản trị hệ thống</label>
                  </div>
              </a>
          </div>
        <?php endif; ?>

        <?php if ($admin->chucnang=="quantrinoidung"|| $admin->chucnang=="administrator"): ?>
          <div class="col-sm-2 col-md-2" align="center">
              <a href="{{url('quantrinoidung')}}">
                  <div class="thumbnail">
                      <img src="{!!url('public/images/giaotrinhtailieu.png')!!}" alt="Quản trị nội dung" width="64" height="64">
                      <p></p>
                      <label>Quản trị nội dung</label>
                  </div>
              </a>
          </div>
        <?php endif; ?>

    </div>
  </p>
</div>
@endsection
