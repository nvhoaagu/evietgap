@extends('layouts.evietgap_dashboard')
@section('content')
<div class="">
  <div class="w3-panel w3-blue">
        <h4>Màn hình cập nhật nhật ký VietGap trực tuyến</h4>
  </div>
  <div class="w3-border">
    <div class="w3-row">

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 01:<br>Cải tạo Ao</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('tomcangxanh/ghinhatky')}}">
          <div class="w3-red w3-border">
              <label>Nhật ký 02:<br>Thông tin giống</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 03:<br>Xử lý môi trường</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 04:<br>Cho Tôm Ăn</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 05:<br>Sử dụng thuốc</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 06:<br>Kiểm kê</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 07:<br>Theo dõi sức khỏe </label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 08:<br>Theo dõi môi trường</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 09:<br>Theo dõi lượng nước</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 10:<br>Tỉ lệ sống, tăng trọng</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 11:<br>Theo dõi nước thải</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 12:<br>Thu hoạch</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 13:<br>Thu gom chất thải</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 14:<br>Xử lý bao bì</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 15:<br>Xử lý động vật gây hại</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 16:<br>Kiểm kê hết hạn</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 17:<br>Xử lý hết hạn</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Nhật ký 18:<br>Giải quyết cộng đồng</label>
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
