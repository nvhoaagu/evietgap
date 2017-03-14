@extends('layouts.ktx_dashboard')
@section('content')
<div class="col-md-12">
  <div class="btn btn-primary col-md-12" style="margin-bottom: 10px; margin-top: 10px; margin-right: 10px">
      <h4>Thông tin chi tiết sinh viên</h4>
  </div>
  <br>
  <div class="col-md-12">
    <form action="{{url('duyetluutru')}}" method="get">
        Mã sinh viên: {{$sv[0]->MaSinhVien}}<br>
        <br><br><br>
        <hr>
        <a href="{{url('duyetluutru?MaSinhVien=')}}{{$sv[0]->MaSinhVien}}&DuocDuyet=1" class="btn btn-success">Duyệt lưu trú</a>
        <a href="{{url('duyetluutru?MaSinhVien=')}}{{$sv[0]->MaSinhVien}}&DuocDuyet=0" class="btn btn-success">Không duyệt</a>
        <hr>
    </form>
  </div>
</div>
@endsection
