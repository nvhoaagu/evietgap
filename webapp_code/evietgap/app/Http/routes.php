<?php



Route::get('','Cms\HomeController@Home');
Route::get('/','Cms\HomeController@Home');
Route::get('/index','Cms\HomeController@Home');
Route::get('/home','Cms\HomeController@Home');


// Dang Nhap
Route::group(['prefix' => 'admin'], function() {
	Route::get('/', 'AdminController@getIndex');
	Route::get('login', 'Admin\AuthController@getLogin');
	Route::post('login', 'Admin\AuthController@postLogin');
	Route::post('register', 'Admin\AuthController@postRegister');
	Route::get('dashboard', 'AdminController@getIndex');
	Route::get('logout', 'AdminController@getLogout');
});
Route::group([
    'middleware' => [
        'web'
    ]
], function () {
    Route::get('admin/register', 'Admin\AuthController@getRegister');
});

//-----------------------------------------------------------------------------------------------------------//
/**
Quản trị hệ thống
**/
Route::group(['prefix' => 'quantrihethong','middleware' =>['admin','phutrach']], function() {
	Route::get('/', 'AdminController@QuanTriHeThongMain');
  //-- Quản lý người dùng --//
	Route::get('nguoidung','Cms\QuanTriHeThongController@HienThiGiaoDienQuanTriNguoiDung');
	Route::get('nguoidung/showadd','Cms\QuanTriHeThongController@HienThiGiaoDienQuanTriThemNguoiDung');
	Route::post('nguoidung/showadd','Cms\QuanTriHeThongController@ThemNguoiDung');
	Route::get('nguoidung/showedit/{id}','Cms\QuanTriHeThongController@HienThiGiaoDienQuanTriSuaNguoiDung');
	Route::post('nguoidung/showedit/{id}','Cms\QuanTriHeThongController@SuaNguoiDung');
	Route::get('nguoidung/showdelete/{id}','Cms\QuanTriHeThongController@HienThiGiaoDienQuanTriXoaNguoiDung');
	Route::post('nguoidung/showdelete/{id}','Cms\QuanTriHeThongController@XoaNguoiDung');
	// -- //
	Route::get('setting','Cms\QuanTriHeThongController@HienThiGiaoDienQuanTriSetting');
	Route::get('calendar','Cms\QuanTriHeThongController@HienThiGiaoDienQuanTriCalendar');
});

//-----------------------------------------------------------------------------------------------------------//
// -- Đổi Mật Khẩu --//
Route::group(['prefix' => 'canhan','middleware' =>'admin'], function() {
	Route::get('/', function() {
	    return redirect('/admin');
	});
    Route::get('doipass','Cms\CaNhanController@HienThiGiaoDienDoiMatKhau');
	Route::post('doipass','Cms\CaNhanController@DoiMatKhau');
});

//Quản Lý Nội Dung
//------------------------------------------------------------------------------------------------------------//
Route::group(['prefix' => 'quantrinoidung','middleware' =>['admin','phutrach']], function() {
	Route::get('/', 'Cms\QuanLyNoiDungController@QuanLyNoiDungMain');
	Route::group(['prefix' => 'theloai'], function() {
	   	Route::get('/', 'Cms\QuanLyNoiDungController@QuanLyTheLoaiMain');
	   	Route::get('add', 'Cms\QuanLyNoiDungController@QuanLyThemTheLoai');
	   	Route::post('add','Cms\QuanLyNoiDungController@ThemTheLoai');
	   	Route::get('edit/{id}', 'Cms\QuanLyNoiDungController@QuanLySuaTheLoai');
	   	Route::post('edit/{id}','Cms\QuanLyNoiDungController@SuaTheLoai');
	   	Route::get('del/{id}', 'Cms\QuanLyNoiDungController@QuanLyXoaTheLoai');
	   	Route::post('del/{id}','Cms\QuanLyNoiDungController@XoaTheLoai');
	});
	Route::group(['prefix' => 'file'], function() {
	   	Route::get('/', 'Cms\QuanLyNoiDungController@QuanLyFileMain');
	   	Route::get('add', 'Cms\QuanLyNoiDungController@QuanLyThemFile');
	   	Route::post('add','Cms\QuanLyNoiDungController@ThemFile');
	   	Route::get('del/{id}', 'Cms\QuanLyNoiDungController@QuanLyXoaFile');
	   	Route::post('del/{id}','Cms\QuanLyNoiDungController@XoaFile');
	});
	Route::group(['prefix' => 'baiviet'], function() {
	   	Route::get('/', 'Cms\QuanLyNoiDungController@QuanLyBaiVietMain');
	   	Route::get('add', 'Cms\QuanLyNoiDungController@QuanLyThemBaiViet');
	   	Route::post('add','Cms\QuanLyNoiDungController@ThemBaiViet');
	   	Route::get('edit/{id}', 'Cms\QuanLyNoiDungController@QuanLySuaBaiViet');
	   	Route::post('edit/{id}','Cms\QuanLyNoiDungController@SuaBaiViet');
	   	Route::get('del/{id}', 'Cms\QuanLyNoiDungController@QuanLyXoaBaiViet');
	   	Route::post('del/{id}','Cms\QuanLyNoiDungController@XoaBaiViet');
	});
	Route::group(['prefix' => 'theloaipage'], function() {
	   	Route::get('/', 'Cms\QuanLyNoiDungController@QuanLyTheLoaiPageMain');
	   	Route::get('add', 'Cms\QuanLyNoiDungController@QuanLyThemTheLoaiPage');
	   	Route::post('add','Cms\QuanLyNoiDungController@ThemTheLoaiPage');
	   	Route::get('edit/{id}', 'Cms\QuanLyNoiDungController@QuanLySuaTheLoaiPage');
	   	Route::post('edit/{id}','Cms\QuanLyNoiDungController@SuaTheLoaiPage');
	   	Route::get('del/{id}', 'Cms\QuanLyNoiDungController@QuanLyXoaTheLoaiPage');
	   	Route::post('del/{id}','Cms\QuanLyNoiDungController@XoaTheLoaiPage');
	});
	Route::group(['prefix' => 'page'], function() {
	   	Route::get('/', 'Cms\QuanLyNoiDungController@QuanLyPageMain');
	   	Route::get('add', 'Cms\QuanLyNoiDungController@QuanLyThemPage');
	   	Route::post('add','Cms\QuanLyNoiDungController@ThemPage');
	   	Route::get('edit/{id}', 'Cms\QuanLyNoiDungController@QuanLySuaPage');
	   	Route::post('edit/{id}','Cms\QuanLyNoiDungController@SuaPage');
	   	Route::get('del/{id}', 'Cms\QuanLyNoiDungController@QuanLyXoaPage');
	   	Route::post('del/{id}','Cms\QuanLyNoiDungController@XoaPage');
	});

});
//Hiển thị bài viết trang chú
//------------------------------------------------------------------------------------------------------------//
Route::get('bai-viet/{id}-{slug}.html','Cms\HomeController@HienThiBaiViet');
Route::get('page/{id}-{slug}.html','Cms\HomeController@HienThiPage');
//-------------------------------------------------------------------------------------------------------------//

//Trang chủ
Route::get('/gioithieu','Cms\HomeController@GioiThieu');
Route::get('/noiquyravao','Cms\HomeController@NoiQuyRaVao');
Route::get('/gioithieu','Cms\HomeController@GioiThieu');
Route::get('/lienhe','Cms\HomeController@LienHe');
Route::get('/chucnangnhiemvu','Cms\HomeController@ChucNangNhiemVu');
Route::get('/danhsachday','Cms\HomeController@DanhSachDay');
Route::get('/danhsachnhakhach','Cms\HomeController@DSNhaKhach');
Route::get('/danhsachsinhvien', 'Cms\HomeController@DanhSachSinhVien');
Route::get('/dongia', 'Cms\HomeController@DonGiaDichVu');

Route::group(['prefix' => 'evietgap'], function() {
		Route::get('/dashboard', 'Evietgap\MainController@main');
		Route::get('/vatnuoi', 'Evietgap\VatNuoiController@main');
		Route::get('/cosonuoi', 'Evietgap\CoSoNuoiController@main');
		Route::get('/kythuatvien', 'Evietgap\KyThuatVienController@main');
		Route::get('/chonvietgap', 'Evietgap\MainController@chonvietgap');
});

Route::group(['prefix' => 'thuysan'], function() {
		Route::get('/', 'Evietgap\ThuySanController@main');
});

Route::group(['prefix' => 'channuoi'], function() {
		Route::get('/', 'Evietgap\ChanNuoiController@main');
});

Route::group(['prefix' => 'trongtrot'], function() {
		Route::get('/', 'Evietgap\TrongTrotController@main');
});

Route::group(['prefix' => 'tomcangxanh'], function() {
		Route::get('/', 'Evietgap\TomCangXanhController@main');
		Route::get('/ghinhatky', 'Evietgap\TomCangXanhController@ghinhatky');
});
