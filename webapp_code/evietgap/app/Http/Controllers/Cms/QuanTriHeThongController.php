<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Validator;
use Illuminate\Support\Facades\Hash;

class QuanTriHeThongController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'getLogout']);
    }

    public function HienThiGiaoDienQuanTri()
    {
      return view('cms.quantrihethong.main');
    }
    
    public function HienThiGiaoDienQuanTriNguoiDung()
    {
      return view('cms.quantrihethong.nguoidung.main');
    }

    public function HienThiGiaoDienQuanTriThemNguoiDung()
    {
      return view('cms.quantrihethong.nguoidung.add');
    }
    public function ThemNguoiDung(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|unique:admins|email',
        'chucnang' => 'required',
        'phutrach' => 'required',
        'password' => 'required'
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Thêm thất bại";
        if(DB::table('admins')->insert([
          'name' => $request->name,
          'email' => $request->email,
          'chucnang' => $request->chucnang,
          'password' => Hash::make($request->password),
          'dayphutrach' => implode(",", $request->phutrach)
        ])){
          $thongbao = "Thêm Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function HienThiGiaoDienQuanTriSuaNguoiDung(Request $request)
    {
      $nguoidung = DB::table("admins")->where('id',$request->id)->first();
      return view('cms.quantrihethong.nguoidung.edit')->with(['nguoidung' => $nguoidung]);
    }
    public function SuaNguoiDung(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'name' => 'required',
        'email' => 'required|email',
        'chucnang' => 'required',
        'phutrach' => 'required'
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Sửa thất bại";
        if(DB::table('admins')->where("id",$request->id)->update([
          'name' => $request->name,
          'email' => $request->email,
          'chucnang' => $request->chucnang,
          'dayphutrach' => implode(",", $request->phutrach)
        ])){
          $thongbao = "Sửa Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function HienThiGiaoDienQuanTriXoaNguoiDung(Request $request)
    {
      $nguoidung = DB::table("admins")->where('id',$request->id)->first();
      return view('cms.quantrihethong.nguoidung.delete')->with(['nguoidung' => $nguoidung]);
    }
    public function XoaNguoiDung(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'xoa' => 'required|numeric',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        if(DB::table('admins')->where("id",$request->id)->update([
          "TrangThai" => '0',
        ])){
        }
        return redirect("quantrihethong/nguoidung");
      }
    }

    /**
      Quản lý phòng
    **/
    public function HienThiGiaoDienQuanTriPhong()
    {
      return view('cms.quantrihethong.phong.main');
    }
    public function HienThiGiaoDienQuanTriDayPhong(Request $request)
    {
      $phong = DB::table("ktx_phong")->where([["TinhTrang","=","1"],["MaDay","=",$request->maday]])->get();
      return view('cms.quantrihethong.phong.phong')->with(["phong" => $phong]);
    }
    public function HienThiGiaoDienThemPhong()
    {
      return view('cms.quantrihethong.phong.add');
    }
    public function ThemPhong(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'MaPhong' => 'required|unique:ktx_phong',
        'TenPhong' => 'required',
        'SoNguoiO' => 'required|numeric|min:0',
        'MaDay' => 'required',
        'MaTang' => 'required',
        'LoaiPhong' => 'required',
        'DonGiaTrongTinh' => 'required|numeric|min:0',
        'DonGiaNgoaiTinh' => 'required|numeric|min:0',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Thêm thất bại";
        if(DB::table('ktx_phong')->insert([
        'MaPhong' => $request->MaPhong,
        'TenPhong' => $request->TenPhong,
        'SoNguoiO' => $request->SoNguoiO,
        'MaDay' => $request->MaDay,
        'MaTang' => $request->MaTang,
        'LoaiPhong' => $request->LoaiPhong,
        'DonGiaTrongTinh' => $request->DonGiaTrongTinh,
        'DonGiaNgoaiTinh' => $request->DonGiaNgoaiTinh,
        ])){
          $thongbao = "Thêm Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function HienThiGiaoDienSuaPhong(Request $request)
    {
      $phong = DB::table("ktx_phong")->where("MaPhong",$request->maphong)->first();
      return view('ktx.quantrihethong.phong.edit')->with(["phong" => $phong]);
    }

    public function SuaPhong(Request $request)
    {
       $validator = Validator::make($request->all(),[
        'MaPhong' => 'required|unique:ktx_phong,MaPhong,'.$request->maphong.',MaPhong',
        'TenPhong' => 'required',
        'SoNguoiO' => 'required|numeric|min:0',
        'MaDay' => 'required',
        'MaTang' => 'required',
        'LoaiPhong' => 'required',
        'DonGiaTrongTinh' => 'required|numeric|min:0',
        'DonGiaNgoaiTinh' => 'required|numeric|min:0',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Sửa thất bại";
        if(DB::table('ktx_phong')->where("MaPhong",$request->maphong)->update([
        'MaPhong' => $request->MaPhong,
        'TenPhong' => $request->TenPhong,
        'SoNguoiO' => $request->SoNguoiO,
        'MaDay' => $request->MaDay,
        'MaTang' => $request->MaTang,
        'LoaiPhong' => $request->LoaiPhong,
        'DonGiaTrongTinh' => $request->DonGiaTrongTinh,
        'DonGiaNgoaiTinh' => $request->DonGiaNgoaiTinh,
        ])){
          $thongbao = "Sửa Thành Công";
        }
        return redirect("quantrihethong/phong/showedit/".$request->MaPhong)->with(['thongbao'=>$thongbao]);
      }
    }
    public function HienThiGiaoDienXoaPhong(Request $request)
    {
      $phong = DB::table("ktx_phong")->where('MaPhong',$request->maphong)->first();
      return view('ktx.quantrihethong.phong.delete')->with(['phong' => $phong]);
    }
    public function XoaPhong(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'xoa' => 'required|numeric',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        if(DB::table('ktx_phong')->where("MaPhong",$request->maphong)->update([
          "TinhTrang" => $request->xoa,
        ])){
      }
        return redirect("quantrihethong/phong/day/".$request->xoa);
      }
    }
    public function HienThiGiaoDienQuanTriPhongDaXoa()
    {
      return view('ktx.quantrihethong.phong.daxoa');
    }
    /**
      Quản Lý Setting
    **/
    public function HienThiGiaoDienQuanTriSetting()
    {
      return view('ktx.quantrihethong.setting.main');
    }
    /**
      Quản lý lịch
    **/
    public function HienThiGiaoDienQuanTriCalendar()
    {
      return view('ktx.quantrihethong.calendar.main');
    }


}
