@extends('layouts.evietgap_dashboard')
@section('content')
<div class="">
  <div class="w3-panel w3-blue">
        <h4>VietGap Chăn Nuôi</h4>
  </div>
  <div class="">
    <div class="w3-row">
      <div class="w3-col m4 text-center">
        <a href="{{url('evietgap/vatnuoi')}}">
          <div class="w3-blue w3-border">
              <label>Thủy sản</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m4 text-center">
        <a href="{{url('evietgap/kythuatvien')}}">
          <div class="w3-blue w3-border">
                <label>Chăn nuôi</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/chucnang.png')!!}">
          </div>
        </a>
      </div>
      <div class="w3-col m4 text-center">
        <a href="{{url('evietgap/cosonuoi')}}">
          <div class="w3-blue w3-border">
                <label>Trồng trọt</label>
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
