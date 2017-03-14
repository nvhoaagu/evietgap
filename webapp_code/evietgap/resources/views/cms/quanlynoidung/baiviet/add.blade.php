@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
  <div class="panel-heading">
    <h3 class="panel-title">Thêm Bài Viết</h3>
  </div>
  <div class="panel-body">
    @if(session()->has('thongbao'))
    <div class="alert alert-success">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>{{session('thongbao')}}</strong> 
    </div>
  @endif
  @if($errors->all())
    @foreach($errors->all() as $err)
    <div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Lỗi!</strong> {{$err}}
    </div>
    @endforeach
  @endif
    <form action="" method="POST" role="form">
      <div class="form-group">
        <label for="">Tên Bài Viết</label>
        <input type="text" class="form-control" name="TenBaiViet" placeholder="Tên bài viết">
      </div>
      <div class="form-group">
        <label for="">Nội Dung Bài Viết</label>
        <textarea name="NoiDungBaiViet" placeholder="Nội dung" id="textarea" class="form-control"></textarea>
        <script>
            CKEDITOR.replace( 'textarea' );
        </script>
      </div>

      <div class="form-group">
        <div class="input-group" data-toggle="modal" data-target="#myModal">
          <span class="input-group-btn">
            <a href="#" class="btn btn-default">Đính Kèm!</a>
          </span>
          <input type="text" class="form-control" id="nameDK" placeholder="Chưa có file đính kèm">
          <input type="hidden" class="form-control" id="idDK" name="MaFile" placeholder="ID file đính kèm">
        </div>
      </div>
      <div class="form-group">
        <label for="">Thể Loại</label>
        <?php $theloai = DB::table("cms_theloai")->where("TrangThai",1)->get(); ?>
        <select name="MaTheLoai" id="inputMaTheLoai" class="form-control" required="required">
          @foreach($theloai as $tl)
          @if($tl->TheLoaiCha == 0)
           <option value="{{$tl->MaTheLoai}}">{{$tl->TenTheLoai}}</option>
            @foreach($theloai as $t)
              @if($t->TheLoaiCha == $tl->MaTheLoai)
                <option value="{{$t->MaTheLoai}}">--{{$t->TenTheLoai}}</option>
              @endif
            @endforeach
          @endif
          @endforeach
        </select>
      </div>
      <div class="checkbox">
        <label>
          <input type="checkbox" value="1" name="slide">
          Hiển thị lên slide
        </label>
      </div>
      {{ csrf_field() }}
      <button type="submit" class="btn btn-primary">Đăng Bài</button>
      <a href="{{ url('quantrinoidung/baiviet') }}" class="btn btn-default">Thoát</a>
    </form>

  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> 
  
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#dkselect" aria-controls="dkselect" role="tab" data-toggle="tab"><h4>Chọn File</h4></a></li>
            <li role="presentation"><a href="#dkupload" aria-controls="dkupload" role="tab" data-toggle="tab"><h4>Upload</h4></a></li>
          </ul>
      </div>
      <div class="modal-body">

          <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="dkselect">
                
            </div>
            <div role="tabpanel" class="tab-pane" id="dkupload">
              <form id="upload-file-form" action="{{ url('quantrinoidung/file/add') }}" method="post">
                <div class="progress hidden">
                  <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width: 0"> 
                  </div>
                </div>
                <div class="form-group">
                  <input type="file" name="file0">
                </div>
                {{ csrf_field() }}

                <button type="button" class="btn btn-success" id="add-file">+ Thêm file</button>
                <button type="button" class="btn btn-danger" id="del-file">Làm Lại</button>
                <input type="submit" class="pull-right btn btn-primary" value="Tải Lên"/> 
              </form>
            </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Xong</button>
      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
$(function(){
  var i = 1;
    $("#add-file").click(function(event) {
      var html_input = '<div class="form-group form-upload"><input type="file" name="file'+i+'"></div>';
      $(this).before(html_input);
      i++;
    });
    $("#del-file").click(function(event) {
      $(".form-upload").remove();
      $('#upload-file-form').clearForm();
    });
    var list = <?php echo json_encode(DB::table("cms_file")->where("TrangThai",1)->get());?>;
    var text = '';
    $.each(list, function(index, val) {
      text += '<div class="checkbox"><label><input type="checkbox" value="'+val.MaFile+'" class="check">'+val.TenFile+'</label></div>';
    });
    $("#dkselect").html(text);
    $("#myModal").on('hidden.bs.modal', function () {
      var dk = $(".check:checked").toArray();
      var txt = "";
      var name = "";
      $.each(dk, function(index, val) {
        txt += val.value+",";
        name += val.parentElement.innerText+",";
      });
      $("#idDK").val(txt);
      $("#nameDK").val(name);
    });
    $('#upload-file-form').ajaxForm({
      beforeSubmit: function() {
        if(! $(':file').val())
            return false;
        $(".progress").removeClass('hidden');
        $(".progress-bar").text('0%');
        $(".progress-bar").width(0);
        $(":submit").attr('disabled',"disabled");
      },
      uploadProgress: function(event, position, total, percentComplete) {
       $(".progress-bar").text(percentComplete + '%');
       $(".progress-bar").width(percentComplete+'%');
      },
      success: function() {
       $(".progress-bar").text('100%');
       $(".progress-bar").width('100%');
      },
      complete: function(xhr) {     
        var data = xhr.responseText;
        console.log(data);
        if(data.indexOf(',') > 0) {
          var text = '';
          $.each(JSON.parse(data), function(index, val) {
            text += '<div class="checkbox"><label><input type="checkbox" value="'+val.MaFile+'" class="check">'+val.TenFile+'</label></div>';
          });
          $("#dkselect").html(text);
          data = "Upload Thành Công";
        }
        $(".progress").addClass('hidden');
        $(".progress").before('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'+data+'</strong></div>');
        $('#upload-file-form').clearForm();
        $(":submit").removeProp('disabled'); 
      }
    });
});
</script>
@endsection
