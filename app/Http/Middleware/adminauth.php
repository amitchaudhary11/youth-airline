<?php

namespace App\Http\Middleware;

use Closure;

class adminauth
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
        if(!session()->has('adminID')) {
            return redirect('/admin/getLogin');
        }

        return $next($request);
    }
}
