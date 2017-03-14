<?php

namespace App\Http\Controllers\Cms;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Validator;
use Hash;
class CaNhanController extends Controller
{
  public function __construct()
  {
        $this->middleware('admin', ['except' => 'getLogout']);
  }
  public function HienThiGiaoDienDoiMatKhau(Request $request)
  {
    return view('cms.canhan.password');
  }
  public function DoiMatKhau(Request $request)
  {
    $user = Auth::guard("admin")->user();
    $validator = Validator::make($request->all(),[
      'pass_old' => 'required',
      'pass_new' => 'required',
      'pass_new_2' => 'required'
    ]);
    if($validator->fails())
    {
      return redirect()->back()->withErrors($validator);
    }
    else {
      $thongbao = "Đổi mật khẩu thất bại";
      if($request->pass_new_2 == $request->pass_new){
        if(Hash::check($request->pass_old, $user->password)){
          if(DB::table("admins")->where("id",$user->id)->update([
            'password' => Hash::make($request->pass_new),
          ])){
            $thongbao = "Đổi Mật Khẩu Thành Công";
          }
        }
        else
          $thongbao = "Sai mật khẩu hiện tại";
      }
      else
        $thongbao = "Mật khẩu mới không khớp";

      return redirect()->back()->with(["thongbao" => $thongbao]);
    }
  }
}
