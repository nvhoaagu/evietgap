@extends('layouts.evietgap_dashboard')
@section('content')
<div class="">
  <div class="w3-panel w3-blue">
        <h4>Hệ thống hỗ trợ nuôi tôm càng xanh theo chuẩn VietGap</h4>
  </div>
  <div class="w3-border">
    <div class="w3-row">

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Cấu hình<br> Qui trình nuôi</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('tomcangxanh/ghinhatky')}}">
          <div class="w3-red w3-border">
              <label>Cập nhật <br>Nhật ký trực tuyến</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý<br> Thu hoạch</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Hệ thống<br> theo dõi sản lượng</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý<br> Cơ sở nuôi</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý<br> Ao nuôi</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý <br>Thông tin nhân công</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý danh mục<br> thuốc, kháng sinh, hóa chất</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý <br>Danh mục thức ăn</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý <br>Danh mục Cấm</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý <br>Thành Phầm</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m3 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Tổng hợp <br>Thống kê</label>
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
