@extends('layouts.webmaster_ktx')
@section('title',$baiviet->TenPage)
@section('content')
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary panel-none">
				<div class="panel-heading">
					<h1 class="panel-title"><span class="glyphicon glyphicon-grain"></span> {{ $baiviet->TenPage }}</b>
				</div>
				<div class="panel-body panel-none">
					{!! htmlspecialchars_decode($baiviet->NoiDung) !!}
					<?php $file = DB::table("cms_file")->where("TrangThai",1)->whereIn("MaFile",explode(",",$baiviet->MaFile))->get(); ?>
					@if($file)
					<table class="table table-hover">
						<thead>
							<tr>
								<th>Tên File</th>
								<th>Xem / Tải</th>
							</tr>
						</thead>
						<tbody>
							@foreach($file as $f)
							<tr>
								<td>{{ $f->TenFile }}</td>
								<td><a href="{{ url($f->UrlFile)}}" title="Tải Xuống">Tải Xuống</a></td>
							</tr>
							@endforeach	
						</tbody>
					</table>
					@endif
				</div>
			</div>
		</div>
	</div>
</div>
@endsection