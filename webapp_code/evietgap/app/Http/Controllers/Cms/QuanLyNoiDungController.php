<?php

namespace App\Http\Controllers\Cms;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Validator;
use Storage;
class QuanLyNoiDungController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'getLogout']);
    }
    /**
      Main
    **/
    public function QuanLyNoiDungMain()
    {
      return view('cms.quanlynoidung.main');
    }
    public function QuanLyTheLoaiMain()
    {

      return view('cms.quanlynoidung.theloai.main');
    }
    public function QuanLyFileMain()
    {

      return view('cms.quanlynoidung.taptin.main');
    }

    public function QuanLyBaiVietMain()
    {
      $baiviet = DB::table("cms_baiviet")->where("cms_baiviet.TrangThai",1)->join('cms_theloai', 'cms_theloai.MaTheLoai', '=', 'cms_baiviet.MaTheLoai')->get();
      return view('cms.quanlynoidung.baiviet.main')->with(["baiviet" =>$baiviet]);
    }
    public function QuanLyTheLoaiPageMain()
    {

      return view('cms.quanlynoidung.theloai_page.main');
    }
    public function QuanLyPageMain()
    {
      $baiviet = DB::table("cms_page")->where("cms_page.TrangThai",1)->join('cms_theloai_page', 'cms_theloai_page.id', '=', 'cms_page.LoaiPage') ->select('cms_page.*', 'cms_theloai_page.TenTheLoai')->get();
      return view('cms.quanlynoidung.page.main')->with(["baiviet" =>$baiviet]);
    }
    /**
      Quản Lý Thêm
    **/
    public function QuanLyThemTheLoai()
    {
      return view('cms.quanlynoidung.theloai.add');
    }
    public function QuanLyThemTheLoaiPage()
    {
      return view('cms.quanlynoidung.theloai_page.add');
    }
    public function ThemTheLoai(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TenTheLoai' => 'required',
        'TheLoaiCha' => 'numeric',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Thêm thất bại";
        if(DB::table('cms_theloai')->insert([
          'TenTheLoai' => $request->TenTheLoai,
          'TheLoaiCha' => $request->TheLoaiCha,
        ])){
          $thongbao = "Thêm Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function ThemTheLoaiPage(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TenTheLoai' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Thêm thất bại";
        if(DB::table('cms_theloai_page')->insert([
          'TenTheLoai' => $request->TenTheLoai,
        ])){
          $thongbao = "Thêm Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function QuanLyThemBaiViet()
    {
      return view('cms.quanlynoidung.baiviet.add');
    }
    public function QuanLyThemPage()
    {
      return view('cms.quanlynoidung.page.add');
    }
    public function ThemBaiViet(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TenBaiViet' => 'required',
        'MaTheLoai' => 'numeric|required',
        'NoiDungBaiViet' => 'required'
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thumbnail = preg_match_all('/<img.*src=[\'"]([^\'"]+)[\'"].*>/i', $request->NoiDungBaiViet, $matches);
        $thumbnail =  @$matches[1][0] ?  $matches[1][0] : url("public/images/no-thumbnail.jpg");
        $thongbao = "Thêm thất bại";
        if(DB::table('cms_baiviet')->insert([
          'TenBaiViet' => $request->TenBaiViet,
          'MaTheLoai' => $request->MaTheLoai,
          'NoiDungBaiViet' => htmlentities($request->NoiDungBaiViet),
          'AnhDaiDien' =>$thumbnail,
          'MaFile' => $request->MaFile,
          'slide' => $request->slide,
          'created_at' => date('Y/m/d')
        ])){
          $thongbao = "Thêm Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function ThemPage(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TitlePage' => 'required',
        'TenPage' => 'required',
        'LoaiPage' => 'numeric|required',
        'NoiDung' => 'required'
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Thêm thất bại";
        if(DB::table('cms_page')->insert([
          'TitlePage' => $request->TitlePage,
          'TenPage' => $request->TenPage,
          'LoaiPage' => $request->LoaiPage,
          'NoiDung' => htmlentities($request->NoiDung),
          'MaFile' => $request->MaFile,
          'created_at' => date('Y/m/d')
        ])){
          $thongbao = "Thêm Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function QuanLyThemFile()
    {
      return view('cms.quanlynoidung.taptin.add');
    }
    public function ThemFile(Request $request)
    {
      $ext = array('doc','bin','7z','zip','txt','png','docx','xls','pdf','jpg');
      foreach ($request->file() as $key => $value) {
        $folder = $value->guessClientExtension();
        $name = str_slug($value->getClientOriginalName()).'.'.$folder;
        $check = DB::table("cms_file")->where([["TenFile",$value->getClientOriginalName()],["TrangThai",1]])->orWhere([["UrlFile","public/upload/".$folder.'/'.$name],["TrangThai",1]])->first();
        if(! $check){
          if(in_array($folder,$ext)){
            $folder = "public/upload/".$folder;
            $value->move($folder,$name);
            if(DB::table("cms_file")->insert([
                'TenFile' => $value->getClientOriginalName(),
                "UrlFile" => $folder.'/'.$name,
                'SizeFile' =>$value->getClientSize(),
            ])){
              $file = json_encode(array_reverse(DB::table("cms_file")->where("TrangThai",1)->get()),true);
            }
            else {
                $file = "Upload Thất Bại ";
            }
          }
          else {
              $file = "File không hợp lệ ";
          }
        }
        else {
            $file = "File đã tồn tại ";
        }
      }
      echo $file;
    }
    /**
    Quản Lý Sửa
    **/
    public function QuanLySuaTheLoai(Request $request)
    {
      $theloai = DB::table("cms_theloai")->where("MaTheLoai",$request->id)->first();
      return view('cms.quanlynoidung.theloai.edit')->with(["theloai"=>$theloai]);
    }
    public function QuanLySuaTheLoaiPage(Request $request)
    {
      $theloai = DB::table("cms_theloai_page")->where("id",$request->id)->first();
      return view('cms.quanlynoidung.theloai_page.edit')->with(["theloai"=>$theloai]);
    }
    public function SuaTheLoai(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TenTheLoai' => 'required',
        'TheLoaiCha' => 'numeric',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Chỉnh sửa thất bại";
        if(DB::table('cms_theloai')->where("MaTheLoai",$request->id)->update([
          'TenTheLoai' => $request->TenTheLoai,
          'TheLoaiCha' => $request->TheLoaiCha,
        ])){
          $thongbao = "Chỉnh sửa Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
      return view('cms.quanlynoidung.main');
    }
    public function SuaTheLoaiPage(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TenTheLoai' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Chỉnh sửa thất bại";
        if(DB::table('cms_theloai_page')->where("id",$request->id)->update([
          'TenTheLoai' => $request->TenTheLoai,
        ])){
          $thongbao = "Chỉnh sửa Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
      return view('cms.quanlynoidung.main');
    }
    public function QuanLySuaBaiViet(Request $request)
    {
      $baiviet = DB::table('cms_baiviet')->where("MaBaiViet",$request->id)->first();

      return view('cms.quanlynoidung.baiviet.edit')->with(['baiviet' => $baiviet]);
    }
    public function QuanLySuaPage(Request $request)
    {
      $baiviet = DB::table('cms_page')->where("id",$request->id)->first();

      return view('cms.quanlynoidung.page.edit')->with(['baiviet' => $baiviet]);
    }
    public function SuaBaiViet(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TenBaiViet' => 'required',
        'MaTheLoai' => 'numeric|required',
        'NoiDungBaiViet' => 'required'
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thumbnail = preg_match_all('/<img.*src=[\'"]([^\'"]+)[\'"].*>/i', $request->NoiDungBaiViet, $matches);
        $thumbnail =  @$matches[1][0]?$matches[1][0]: url("public/images/no-thumbnail.jpg");
        $thongbao = "Chỉnh sửa thất bại";
        if(DB::table('cms_baiviet')->where("MaBaiViet",$request->id)->update([
          'TenBaiViet' => $request->TenBaiViet,
          'MaTheLoai' => $request->MaTheLoai,
          'NoiDungBaiViet' => htmlentities($request->NoiDungBaiViet),
          'AnhDaiDien' => $thumbnail,
          'MaFile' => $request->MaFile,
          'slide' => $request->slide,
          'update_at' => date('Y/m/d')
        ])){
          $thongbao = "Chỉnh sửa Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
      return view('cms.quanlynoidung.baiviet.edit');
    }
    public function SuaPage(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'TitlePage' => 'required',
        'TenPage' => 'required',
        'LoaiPage' => 'numeric|required',
        'NoiDung' => 'required'
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Chỉnh sửa thất bại";
        if(DB::table('cms_page')->where("id",$request->id)->update([
          'TitlePage' => $request->TitlePage,
          'TenPage' => $request->TenPage,
          'LoaiPage' => $request->LoaiPage,
          'NoiDung' => htmlentities($request->NoiDung),
          'MaFile' => $request->MaFile,
          'update_at' => date('Y/m/d')
        ])){
          $thongbao = "Chỉnh sửa Thành Công";
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    /**
      Quản Lý Xóa
    **/
    public function QuanLyXoaTheLoai(Request $request)
    {
      $theloai = DB::table("cms_theloai")->where("MaTheLoai",$request->id)->first();
      return view('cms.quanlynoidung.theloai.del')->with(["theloai" => $theloai]);
    }
    public function QuanLyXoaTheLoaiPage(Request $request)
    {
      $theloai = DB::table("cms_theloai_page")->where("id",$request->id)->first();
      return view('cms.quanlynoidung.theloai.del')->with(["theloai" => $theloai]);
    }
    public function XoaTheLoai(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'xoa' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $check = DB::table("cms_theloai")->where([["TheLoaiCha",$request->id],["TrangThai",1]])->get();
        $thongbao = "Xóa thất bại";
        if( count($check) > 0){
          $thongbao = "Xóa Thể Loại Con Trước";
        }
        else {
          if(DB::table('cms_theloai')->where("MaTheLoai",$request->id)->update([
            'TrangThai' => 0
          ])){
            return redirect("quantrinoidung/theloai");
          }
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
      return view('cms.quanlynoidung.main');
    }
    public function XoaTheLoaiPage(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'xoa' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
          $thongbao = "Xóa thất bại";

          if(DB::table('cms_theloai_page')->where("id",$request->id)->update([
            'TrangThai' => 0
          ])){
            return redirect()->back()->with(['thongbao'=>"Xóa Thành Công"]);
          }
        return redirect()->back()->with(['thongbao'=>"Xóa Thất Bại"]);
      }
    }
    public function QuanLyXoaBaiViet(Request $request)
    {
      $baiviet = DB::table("cms_baiviet")->where("MaBaiViet",$request->id)->first();
      return view('cms.quanlynoidung.baiviet.del')->with(["baiviet" => $baiviet]);
    }
    public function QuanLyXoaPage(Request $request)
    {
      $baiviet = DB::table("cms_page")->where("id",$request->id)->first();
      return view('cms.quanlynoidung.page.del')->with(["baiviet" => $baiviet]);
    }
    public function XoaBaiViet(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'xoa' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Xóa thất bại";
        if(DB::table('cms_baiviet')->where("MaBaiViet",$request->id)->update([
          'TrangThai' => 0
        ])){
          return redirect("quantrinoidung/baiviet");
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function XoaPage(Request $request)
    {
      $validator = Validator::make($request->all(),[
        'xoa' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Xóa thất bại";
        if(DB::table('cms_page')->where("id",$request->id)->update([
          'TrangThai' => 0
        ])){
          return redirect("quantrinoidung/page");
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
    public function QuanLyXoaFile(Request $request)
    {
      $file = DB::table("cms_file")->where("MaFile",$request->id)->first();
      return view('cms.quanlynoidung.taptin.del')->with(["file" => $file]);
    }
    public function XoaFile(Request $request){
      $validator = Validator::make($request->all(),[
        'xoa' => 'required',
      ]);
      if($validator->fails())
      {
        return redirect()->back()->withErrors($validator);
      }
      else {
        $thongbao = "Xóa thất bại";
        $file = DB::table("cms_file")->where("MaFile",$request->id)->first();

        if(DB::table('cms_file')->where("MaFile",$request->id)->update([
          'TrangThai' => 0
        ]) && unlink($file->UrlFile)){
          return redirect("quantrinoidung/file");
        }
        return redirect()->back()->with(['thongbao'=>$thongbao]);
      }
    }
}
