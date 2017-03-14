@extends('layouts.evietgap_dashboard')
@section('content')
<div class="">
  <div class="w3-panel w3-blue">
        <h4>Phân hệ quản lý cơ sở nuôi - hộ nuôi</h4>
  </div>
  <div class="w3-border">
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <a href="{{url('#')}}">
          <div class="w3-blue w3-border">
              <label>Danh mục vật nuôi</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('#')}}">
          <div class="w3-blue w3-border">
                <label>Kỹ thuật viên</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('#')}}">
          <div class="w3-blue w3-border">
                <label>Cơ sở nuôi</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
@endsection
