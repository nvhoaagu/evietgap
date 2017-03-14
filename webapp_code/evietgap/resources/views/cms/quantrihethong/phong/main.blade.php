@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <b>Quản lý cập nhật thông tin phòng nghỉ</b>
  </div>
  <div class="panel-body">
    <div class="form-group">
      
      <div class="btn-group">
        <a href="{{ url('quantrihethong')}}" class="btn btn-default">Trở Lại</a>
        <a href="{{ url('quantrihethong/phong/showadd')}}" class="btn btn-success" title="Thêm Mới">Thêm Phòng Mới</a>
        <a href="{{ url('quantrihethong/phong/daxoa')}}" class="btn btn-warning" title="Thêm Mới">Phục hồi Phòng đã Xóa</a>
      </div>
    </div>
    <?php
      $ds_day = DB::table('ktx_day')->where('TrangThai',1)->get();
    ?>
    <div class="row text-center">
      @foreach($ds_day as $day)
      <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
          <a href="{{url('quantrihethong/phong/day/'.$day->MaDay)}}">
              <div class="thumbnail">
                  <img src="{!!url('public/images/daynha.png')!!}" alt="">
                  <label>{{$day->TenDay}}</label>
              </div>
          </a>
      </div>
      @endforeach
    </div>
  </div>
</div>
  @yield('phong')
@endsection
