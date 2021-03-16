<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPanelAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->user()->isSuperUser() || $request->user()->isStaff()){
            return $next($request);
        }
        alert()->error('شما اجازه دسترسی به این بخش ندارید !','ورود ممنوع !');
        return redirect('/');
    }
}
