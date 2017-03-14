@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Quản lý bài viết</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
        <div class="btn-group">
          <a href="{{ url('quantrinoidung/')}}" class="btn btn-default" title="Thêm Mới">Trở về</a>
          <a href="{{ url('quantrinoidung/page/add')}}" class="btn btn-success" title="Thêm Mới"><img width="20px;" src="{!!url('public/images/add.png')!!}" alt="thêm" /> Thêm Mới</a>
        </div>
    </div>

    <table class="table table-hover" id="ds_baiviet">
      <thead>
        <tr>
          <th>Tiều Đề Trang</th>
          <th>Tên Trang</th>
          <th>Thể Loại</th>
          <th>Ngày Chỉnh Sửa</th>
          <th>Ngày Đăng</th>
          <th>Hành Động</th>
        </tr>
      </thead>
      <tfoot>
        <tr>
          <th>Tiều Đề Trang</th>
          <th>Tên Trang</th>
          <th>Thể Loại</th>
          <th>Ngày Chỉnh Sửa</th>
          <th>Ngày Đăng</th>
          <th>Hành Động</th>
        </tr>
      </tfoot>
      <tbody>
        @foreach($baiviet as $bv)
        <tr>
          <td>{{$bv->TitlePage}}</td>
          <td>{{$bv->TenPage}}</td>
          <td>{{$bv->TenTheLoai}}</td>
          <td>{{$bv->update_at}}</td>
          <td>{{$bv->created_at}}</td>
          <td>
            <a style="margin: 0 5px;" href="{{ url('quantrinoidung/page/edit/'.$bv->id)}}" title="Chỉnh Sửa">
              <img width="32px" src="{{url('public/images/edit.png')}}" alt="edit">
            </a>
            <a style="margin: 0 5px;" href="{{ url('quantrinoidung/page/del/'.$bv->id)}}" title="Xóa">
              <img width="32px" src="{{url('public/images/delete.png')}}" alt="delete">
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
@endsection
