@extends('layouts.ktx_dashboard')
@section('content')
			<div class="col-md-12">
				<div class="panel panel-primary">
					<div class="panel-heading">
						HỆ THỐNG QUẢN LÝ KÝ TÚC XÁ ĐẠI HỌC AN GIANG
					</div>
					<div class="panel-body">
						<p>
							Chào mừng <b>{{$nguoidung->name}}</b> đã sử dụng hệ thống. Vui
							lòng chọn dãy nhà phụ trách quản lý để thực hiện các thao tác quản
							trị
						</p>
						<div>
							@foreach($ds_day as $value)
							<a href="{{$value->MaDay}}">
							<div class="img-thumbnail">
								<img src="{!!url("public/images/kytucxa.jpg")!!}" alt="{{$value->TenDay}}">
								<br><label>{{$value->TenDay}} ({{$value->SoLuong}} phòng)</label>
							</label>
							</div>
							</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
@endsection
