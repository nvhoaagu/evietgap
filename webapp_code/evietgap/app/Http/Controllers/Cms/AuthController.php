<?php

namespace App\Http\Controllers\Cms;
use Validator;
use Auth;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
class AuthController extends Controller
{
  use AuthenticatesAndRegistersUsers, ThrottlesLogins;
  protected $redirectTo = '/chondichvu';
  public function __construct()
  {
      $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
  }
  public function getLogin()
  {
      return view('ktx.login');
  }
  public function postLogin(Request $request)
  {
      $this->validateLogin($request);
      $throttles = $this->isUsingThrottlesLoginsTrait();
      if ($throttles && $lockedOut = $this->hasTooManyLoginAttempts($request)) {
          $this->fireLockoutEvent($request);
          return $this->sendLockoutResponse($request);
      }
      $credentials = $this->getCredentials($request);
      if (Auth::guard('admin')->attempt($credentials, $request->has('remember'))) {
            return redirect($this->redirectPath());
      }
      if ($throttles && ! $lockedOut) {
          $this->incrementLoginAttempts($request);
      }
      return $this->sendFailedLoginResponse($request);
  }

  //Route::get ( '/dangkytructuyen', 'KyTucXa\AuthController@dangkytructuyen' );
  public function dangkytructuyen(Request $request)
  {
    switch ($request->doituongsudung) {
      case 'DT1':
        return view('ktx.phieudangky.sinhvienangiang');
        break;
      case 'DT2':
        return view('ktx.phieudangky.sinhvienngoaitinh');
        break;
      case 'DT3':
        return view('ktx.phieudangky.gvthinhgiang');
        break;
      case 'DT4':
      return view('ktx.phieudangky.khachhangdangky');
        break;
      default:
        break;
    }
  }
}
