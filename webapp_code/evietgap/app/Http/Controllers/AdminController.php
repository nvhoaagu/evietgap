<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;

class AdminController extends Controller
{
  public function __construct() {
    $this->middleware('admin',['except' => 'getLogout']);
  }
  public function getIndex()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          $admin = Auth::guard('admin')->user();
          return view('admin.dashboard',array('admin'=>$admin));
      }
      else
          return redirect('/admin');
  }
  public function getLogout() {
    Auth::guard('admin')->logout();
    return redirect('admin');
  }

  public function QuanTriHeThongMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('cms.quantrihethong.main');
      }
      else
          return redirect('/admin');
  }

  public function QuanLyKyTucXaMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('ktx.quanlykytucxa.main');
      }
      else
          return redirect('/admin');
  }

  public function QuanLyTaiChinhMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('cms.quanlytaichinh.main');
      }
      else
          return redirect('/admin');
  }

  public function QuanLyNhaKhachMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('ktx.quanlynhakhach.main');
      }
      else
          return redirect('/admin');
  }

  public function QuanLyDienNuocMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('ktx.quanlydiennuoc.main');
      }
      else
          return redirect('/admin');
  }

  public function ThongKeMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('ktx.thongke.main');
      }
      else
          return redirect('/admin');
  }

  public function QuanLyDayNhaMain()
  {
      $isLogin = Auth::guard('admin')->check();
      if($isLogin){
          return view('ktx.quanlydaynha.main');
      }
      else
          return redirect('/admin');
  }
}
