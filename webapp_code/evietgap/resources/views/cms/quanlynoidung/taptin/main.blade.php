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
          <a href="{{ url('quantrinoidung/file/add')}}" class="btn btn-success" title="Thêm Mới"><img width="20px;" src="{!!url('public/images/add.png')!!}" alt="thêm" /> Thêm Mới</a>
        </div>
    </div>
    <?php $file = DB::table("cms_file")->where("TrangThai",1)->get(); ?>
      <table class="table table-hover">
        <thead>
          <tr>
            <th>Tên File</th>
            <th>Dung Lượng</th>
            <th>Đường Dẫn</th>
            <th>Hàng Động</th>
          </tr>
        </thead>
        <tfoot>
          <tr>
            <th>Tên File</th>
            <th>Dung Lượng</th>
            <th>Đường Dẫn</th>
            <th>Hàng Động</th>
          </tr>
        </tfoot>    
        <tbody>
          @foreach($file as $f)
          <tr>
            <td>{{$f->TenFile}}</td>
            <td>{{round($f->SizeFile / (1024*1024),2)}} MB</td>
            <td><a href="{{url($f->UrlFile)}}">{{url($f->UrlFile)}}</a></td>
            <td>
              <a style="margin: 0 5px;" href="{{ url('quantrinoidung/file/del/'.$f->MaFile)}}" title="Xóa">
                <img width="32px" src="{{url('public/images/delete.png')}}" alt="delete">
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </ul>
  </div>
</div>
@endsection
