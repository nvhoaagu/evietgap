@extends('layouts.day_dashboard')
@section('content')
<div>
    <div class="panel panel-primary">
        <div class="panel-heading">Ký túc xá <b>{{$TenDay[0]->TenDay}}</b></div>
        <div class="panel-body">
          <ol class="breadcrumb">
            <li><a href="{{$MaDay}}/danhsachsinhvien">Danh sách sinh viên</a></li>
          </ol>
            <div class="panel panel-primary">
                <div class="panel-heading">Tầng 2</div>
            </div>
            <div class="panel-body">
                <?php foreach ($ds_phong as $key => $value_phong): ?>
                <?php if ($value_phong->MaTang == 2): ?>
                <a href="{{url('/'.$value_phong->MaDay.'/'.$value_phong->MaPhong)}}">
                    <div class="col-md-2 text-center">
                        Phòng {{$value_phong->TenPhong}}
                        <?php $SoNguoiDangO = 0?>
                        <?php foreach ($ds_sinhvien as $value_sinhvien): ?>
                        @if($value_sinhvien->MaPhong == $value_phong->MaPhong)
                            <?php  $SoNguoiDangO = $value_sinhvien->SoLuongSV;?>
                            ({{$value_sinhvien->SoLuongSV}} /
                        @endif
                        <?php endforeach;?>
                        @if($SoNguoiDangO==0)
                            (0 /
                                @endif
                                {{$value_phong->SoNguoiO}})</p>
                        <div class="thumbnail" align="left">
                            @if($value_phong->LoaiPhong==1)
                              <img src="{{url('public/images/boy.png')}}" alt="" />
                            @else
                              <img src="{{url('public/images/girl.png')}}" alt="" />
                            @endif
                        </div>
                    </div>
                    <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Tầng 1</div>
            </div>
            <div class="panel-body">
                <?php foreach ($ds_phong as $key => $value_phong): ?>
                <?php if ($value_phong->MaTang == 1): ?>
                <a href="{{url('/'.$value_phong->MaDay.'/'.$value_phong->MaPhong)}}">
                <div class="col-md-2">
                    Phòng {{$value_phong->TenPhong}}
                    <?php $SoNguoiDangO = 0?>
                    <?php foreach ($ds_sinhvien as $value_sinhvien): ?>
                    @if($value_sinhvien->MaPhong == $value_phong->MaPhong)
                        <?php  $SoNguoiDangO = $value_sinhvien->SoLuongSV;?>
                        ({{$value_sinhvien->SoLuongSV}} /
                    @endif
                    <?php endforeach;?>
                    @if($SoNguoiDangO==0)
                        (0 /
                            @endif
                            {{$value_phong->SoNguoiO}})
                    <div class="thumbnail" align="left">
                      @if($value_phong->LoaiPhong==1)
                        <img src="{{url('public/images/boy.png')}}" alt="" />
                      @else
                        <img src="{{url('public/images/girl.png')}}" alt="" />
                      @endif

                    </div>
                </div>
                <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
            <div class="panel panel-primary">
                <div class="panel-heading">Tầng trệt</div>
            </div>
            <div class="panel-body">
                <?php foreach ($ds_phong as $key => $value_phong): ?>
                <?php if ($value_phong->MaTang == 0): ?>
                <a href="{{url('/'.$value_phong->MaDay.'/'.$value_phong->MaPhong)}}">
                <div class="col-md-2">
                  Phòng {{$value_phong->TenPhong}}
                  <?php $SoNguoiDangO = 0?>
                  <?php foreach ($ds_sinhvien as $value_sinhvien): ?>
                  @if($value_sinhvien->MaPhong == $value_phong->MaPhong)
                      <?php  $SoNguoiDangO = $value_sinhvien->SoLuongSV;?>
                      ( {{$value_sinhvien->SoLuongSV}} /
                  @endif
                  <?php endforeach;?>
                  @if($SoNguoiDangO==0)
                      ( 0 /
                          @endif
                          {{$value_phong->SoNguoiO}} )
                    <div class="thumbnail" align="left">
                      @if($value_phong->LoaiPhong==1)
                        <img src="{{url('public/images/boy.png')}}" alt="" />
                      @else
                        <img src="{{url('public/images/girl.png')}}" alt="" />
                      @endif

                    </div>
                </div>
                <?php endif; ?>
                </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
@endsection
