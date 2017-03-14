<?php

namespace App\Http\Controllers\Evietgap;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use Validator;
use Storage;
class TomCangXanhController extends Controller
{
    public function __construct()
    {
        //$this->middleware('admin', ['except' => 'getLogout']);
    }

    public function main()
    {
      return view('evietgap.tomcangxanh.main');
    }

    public function ghinhatky()
    {
      return view('evietgap.tomcangxanh.ghinhatky');
    }

}
