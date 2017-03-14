@extends('layouts.webmaster_ktx')
@section('content')
    <div class="container">
        <div style="margin-bottom: 10px; margin-top: 20px;">
            <a href="{{$cur_path}}">
                <button type="button" name="button" class="btn btn-primary">Quay lại</button>
            </a>
        </div>
        <div id="products" class="row">
            <div class="item  col-xs-9 col-lg-9 grid-group-item ">
                <div class="thumbnail itempm1">
                    <div class="caption">
                        <h4 class="group inner list-group-item-heading titleItemPM">
                            <span class="MauPhanMem">Thông báo lỗi</span></h4>
                        <div class="alert alert-danger">
                            {{$ThongBaoLoi}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="footer">
        <hr/>
        <p><b>Ban quản lý Ký túc xá - Trường Đại học An Giang</b>
        <p>© 2015 Trường Đại Học An Giang - Số 18 Ung Văn Khiêm, Phường Đông Xuyên,
            TP Long Xuyên - Tỉnh An Giang
        <p>Điện thoại: 0766 25 65 65 (1712) ; Fax: 0763 842 560 - Email: ktx@agu.edu.vn
        <hr/>
    </div>
@endsection
