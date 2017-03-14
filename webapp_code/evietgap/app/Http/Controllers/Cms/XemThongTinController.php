<?php

namespace App\Http\Controllers\KyTucXa;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;

class XemThongTinController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin', ['except' => 'getLogout']);
    }

    public function HienThiManHinhQuanLyTaiChinh()
    {
      return 'ok';
    }
}
