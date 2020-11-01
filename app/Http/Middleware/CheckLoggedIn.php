<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckLoggedIn
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
        //リクエスト処理前 実行
        if(!Auth::check()) {
            return redirect('login');
        }

        return $next($request);

        //リクエスト処理後 実行
        // $response = $next($request);

        // if (!Auth::check()) {
        //     return redirect('login');
        // }

        // return $response;
    }
}
