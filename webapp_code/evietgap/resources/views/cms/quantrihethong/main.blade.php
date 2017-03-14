@extends('layouts.admin')
@section('content')
<div class="w3-panel w3-red w3-shadow">
  <h4>QUẢN TRỊ NGƯỜI DÙNG</h4>
</div>
<p></p>
<div class="container">
  <div class="row" align="center">

    <div class="col-md-2">
      <a href="{{url('quantrihethong/nguoidung')}}">
        <div class="thumbnail">
            <div class="caption">
                  <label>Người Dùng</label><br>
                  <img src="{{url('public/images/quanlynguoidung.png')}}" alt="Quản lý người dùng" height="64" width="64">
            </div>
        </div>
      </a>
    </div>

  </div>
</div>
<p></p>
@endsection
