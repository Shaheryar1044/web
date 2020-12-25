<?php

namespace App\Http\Middleware;

use Closure;

class Language
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
        $getLocale = \Session::get('locale');
        if(is_null($getLocale)) {
            \App::setLocale('de');
        } else {
            \Session::put('locale',$getLocale);
        }
        \App::setLocale($getLocale);
        return $next($request);
    }
}
