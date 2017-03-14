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
          <a href="{{ url('quantrinoidung/theloai/add')}}" class="btn btn-success" title="Thêm Mới"><img width="20px;" src="{!!url('public/images/add.png')!!}" alt="thêm" /> Thêm Mới</a>
        </div>
    </div>
    <?php $theloai = DB::table("cms_theloai")->where("TrangThai",1)->get(); ?>
    <ul class="list-group">
      @foreach($theloai as $tl)
        @if($tl->TheLoaiCha == 0)
          <li class="list-group-item  list-group-item-success">{{$tl->TenTheLoai}}
              <a href="{{ url('quantrinoidung/theloai/del/'.$tl->MaTheLoai) }}" class="badge">Xóa</a>
              <a href="{{ url('quantrinoidung/theloai/edit/'.$tl->MaTheLoai) }}" class="badge">Chỉnh Sửa</a>
          </li>
          @foreach($theloai as $t)
            @if($t->TheLoaiCha == $tl->MaTheLoai)
              <li class="list-group-item" style="padding-left:30px">{{$t->TenTheLoai}} 
                <a href="{{ url('quantrinoidung/theloai/del/'.$t->MaTheLoai) }}" class="badge">Xóa</a>
                <a href="{{ url('quantrinoidung/theloai/edit/'.$t->MaTheLoai) }}" class="badge">Chỉnh Sửa</a>
              </li>
              @endif
          @endforeach
        @endif
      @endforeach
    </ul>
  </div>
</div>
@endsection
