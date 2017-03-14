<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class KiemTraPhuTrach
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   $chucnang = Auth::guard('admin')->user()->chucnang;
        $path = $request->path();
        $path = explode('/',$path);
        $path = $path[0];
        if('administrator' != $chucnang)
        {
            if($path != $chucnang)
            {
                return redirect('/admin');
            }
        }
        return $next($request);
    }
}
