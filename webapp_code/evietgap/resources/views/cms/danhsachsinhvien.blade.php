@extends('layouts.day_dashboard')
@section('content')
    <div class="col-md-12">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>MÀN HÌNH SẮP PHÒNG CHO SINH VIÊN</b>
            </div>
      <div class="row">
        <div class="panel-body">
          <div class="panel-body">
            <a href="{{url('/'.$day[0]->MaDay)}}">
              <button class="btn btn-info"><b>{{$day[0]->TenDay}}</b></button>
            </a>
            <a href="{{url('/'.$day[0]->MaDay.'/'.$phong[0]->MaPhong)}}">
              <button class="btn btn-primary">Phòng <b>{{$phong[0]->TenPhong}}</b></button>
            </a>
            <form method="POST" role="form" action="{{url('/{MaDay}/{MaPhong}{MaSinhVien}')}}">
            <input type="hidden" name="_token" value="{!! csrf_token() !!}" />
            </p>
              <table  id="danhsachsinhvien" class="display compact">
              <thead>
                <tr>
                  <th>Mã SV</th>
                  <th>Họ</th>
                  <th>Tên</th>
                  <th>Phái</th>
                  <th>Khoa</th>
                  <th>Tỉnh</th>
                  <th>Huyện</th>
                  <th>Ưu tiên</th>
                  <th>Nhận phòng</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>Mã SV</th>
                  <th>Họ</th>
                  <th>Tên</th>
                  <th>Phái</th>
                  <th>Khoa</th>
                  <th>Tỉnh</th>
                  <th>Huyện</th>
                  <th>Ưu tiên</th>
                  <th>Nhận phòng</th>
                </tr>
              </tfoot>
              <tbody>
              <?php foreach ($ds_tatcasinhvien as $key => $sinhvien): ?>
                <tr>
                  <td>
                    <label name="MaSinhVien">{{$sinhvien->MaSinhVien}}</label>
                  </td>
                  <td>{{$sinhvien->Ho}}</td>
                  <td>{{$sinhvien->Ten}}</td>
                  <td>{{$sinhvien->GioiTinh}}</td>
                  <td>{{$sinhvien->TenKhoa}}</td>
                  <td>{{$sinhvien->Tinh}}</td>
                  <td>{{$sinhvien->Huyen}}</td>
                  <td>{{$sinhvien->MaDoiTuongUuTien}}</td>
                  <td>
                    <a href="{{$sinhvien->MaSinhVien}}/chonngaynhanphong">
                      <button type="button" class="btn btn-primary">Nhận phòng</button>
                    </a>
                    <a href="capnhat/{{$sinhvien->MaSinhVien}}">
                      <button type="button" name="button" class="btn btn-info">Cập nhật</button>
                    </a>
                    <a href="xoa/{{$sinhvien->MaSinhVien}}">
                      <button type="button" name="button" class="btn btn-danger">Xóa</button>
                    </a>
                  </td>
                </tr>
              <?php endforeach; ?>
            </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
