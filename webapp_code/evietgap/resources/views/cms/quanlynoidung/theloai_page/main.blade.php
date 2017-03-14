@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Quản lý thể loại</h3>
  </div>
  <div class="panel-body">
    <div class="form-group">
        <div class="btn-group">
          <a href="{{ url('quantrinoidung/')}}" class="btn btn-default" title="Thêm Mới">Trở về</a>
          <a href="{{ url('quantrinoidung/theloaipage/add')}}" class="btn btn-success" title="Thêm Mới"><img width="20px;" src="{!!url('public/images/add.png')!!}" alt="thêm" /> Thêm Mới</a>
        </div>
    </div>
    <?php $theloai = DB::table("cms_theloai_page")->where("TrangThai",1)->get(); ?>
    <ul class="list-group">
      @foreach($theloai as $tl)
          <li class="list-group-item  list-group-item">{{$tl->TenTheLoai}}
              <a href="{{ url('quantrinoidung/theloaipage/del/'.$tl->id) }}" class="badge">Xóa</a>
              <a href="{{ url('quantrinoidung/theloaipage/edit/'.$tl->id) }}" class="badge">Chỉnh Sửa</a>
          </li>
      @endforeach
    </ul>
  </div>
</div>
@endsection
