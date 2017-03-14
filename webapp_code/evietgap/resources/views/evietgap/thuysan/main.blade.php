@extends('layouts.evietgap_dashboard')
@section('content')
<div class="">
  <div class="w3-panel w3-blue">
        <h4>Hệ thống thông tin hỗ trợ nuôi trồng thủy sản theo VietGap</h4>
  </div>
  <div class="w3-border">
    <div class="w3-row">
      <div class="w3-col m4 text-center">
        <a href="{{url('/tomcangxanh')}}">
          <div class="w3-blue w3-border">
              <label>Tôm càng xanh (Macrobrachium)</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/vatnuoi/macrobrachium.jpg')!!}">
          </div>
        </a>
      </div>

      <div class="w3-col m4 text-center">
        <a href="{{url('/luon')}}">
          <div class="w3-blue w3-border">
              <label>Lươn (Monopterus)</label>
          </div>
          <div class="thumbnail">
              <img src="{!!url('public/images/vatnuoi/marmoratus.jpg')!!}">
          </div>
        </a>
      </div>

    </div>
  </div>
</div>
@endsection
