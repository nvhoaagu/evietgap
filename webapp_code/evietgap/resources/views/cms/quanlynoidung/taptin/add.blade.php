@extends('layouts.admin')
@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		<h3 class="panel-title">Thêm Thể Loại</h3>
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
		<form id="upload-file-form" action="{{ url('quantrinoidung/file/add') }}" method="post">
          	<div class="progress hidden">
            	<div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" style="width: 0"> 
            	</div>
          	</div>
          	<div class="form-group">

           	 <input type="file" name="file0">
          	</div>
          	<button type="button" class="btn btn-success" id="add-file">+ Thêm file</button>
         	{{ csrf_field() }}
        	<input type="submit" value="Tải Lên" class="btn btn-primary"/> 
        	<a href="{{url('quantrinoidung/file') }}" class="btn btn-default">Thoát</a>
		</form>
	</div>
</div>
<script type="text/javascript">
$(function(){
  var i = 1;
  var file = "";
    $("#add-file").click(function(event) {
      var html_input = '<div class="form-group"><input type="file" name="file'+i+'"></div>';
      $(this).before(html_input);
      i++;
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
         if(data.indexOf(',') > 0) {
          file += data;
          $("#dinhkem").removeClass('hidden');
          $("#dinhkem input").val(file);
          data = "Upload Thành Công";
         }
         $(".progress").addClass('hidden');
         $(".progress").before('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><strong>'+data+'</strong></div>');
         $('#upload-file-form').clearForm();
         $(":submit").removeProp('disabled'); 
      }
     });
    $("#refesh-form").click(function(event) {
      $('#upload-file-form').clearForm();
    });
});
</script>
@endsection
