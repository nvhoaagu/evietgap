@extends('layouts.evietgap_dashboard')
@section('content')
<div class="">
  <div class="w3-panel w3-blue">
        <h4>PHÂN HỆ QUẢN TRỊ CHUNG HỆ THỐNG EVIETGAP</h4>
  </div>
  <div class="w3-panel w3-blue">
        <h4>Quản lý thông tin cơ sở sản xuất, giống, thu mua, tài khoản kỹ thuật viên, nhân công</h4>
  </div>
  <div class="w3-border">
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Quản lý <br>Cơ sở nông nghiệp</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/kythuatvien')}}">
          <div class="w3-blue w3-border">
                <label>Quản lý <br>Kỹ thuật viên</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                <label>Quản lý <br>Nhân công</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                <label>Quản lý <br>Cơ sở cung cấp Giống</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                <label>Quản lý <br>Cơ sở thu mua</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>

    </div>
  </div>
  <div class="w3-panel w3-blue">
        <h4>Quản lý các danh mục thông số cơ bản của hệ thống</h4>
  </div>
  <div class="w3-border">
    <div class="w3-row">
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Danh mục<br>Các loại Đơn vị tính</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/kythuatvien')}}">
          <div class="w3-blue w3-border">
                <label>Danh mục<br>Các loại Rác thải</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                <label>Danh mục<br>Phương pháp thu gom rác</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                  <label>Danh mục<br>Phương pháp xử lý rác</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m2 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                <label>Quản lý <br>Cơ sở thu mua</label>
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
