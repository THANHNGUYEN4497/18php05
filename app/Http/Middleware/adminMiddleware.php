<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Auth;
use Closure;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            $infoUser = Auth::guard('admin')->user();
            if ($infoUser->is_admin == 1) {
                return $next($request);
            }
            else {
                return redirect('admin/login')->with('notAdmin','Access Denied !!');
            }
        }
        else {
            return redirect('admin/login');
        }
    }
}
