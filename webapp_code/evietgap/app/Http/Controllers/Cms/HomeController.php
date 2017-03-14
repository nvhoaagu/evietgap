<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Validator;
class HomeController extends Controller
{

    public function Home()
    {
      $baiviet = DB::table("cms_baiviet")->where([["TrangThai",1],["MaTheLoai",'!=',1]])->orderBy("MaBaiViet","desc")->paginate(10,['*'], 'page_new');
      $slide = DB::table("cms_baiviet")->where([["TrangThai",1],["slide",1]])->orderBy("MaBaiViet","desc")->limit(6)->get();
      $thongbao = DB::table("cms_baiviet")->where([["TrangThai",1],["MaTheLoai",1]])->orderBy("MaBaiViet","desc")->paginate(10,['*'], 'page_tb');
      return view('home')->with(["baiviet"=>$baiviet,"thongbao"=> $thongbao,"slide"=>$slide]);
    }

    public function HienThiBaiViet(Request $request)
    {

      $baiviet = DB::table("cms_baiviet")->where("MaBaiViet",$request->id)->first();
      return view('ktx.pages.baiviet')->with(["baiviet" => $baiviet]);
    }
    public function HienThiPage(Request $request)
    {

      $baiviet = DB::table("cms_page")->where("id",$request->id)->first();
      return view('ktx.pages.page')->with(["baiviet" => $baiviet]);
    }

    public function PrintHD()
    {
        return view("layouts.print");
    }
}
