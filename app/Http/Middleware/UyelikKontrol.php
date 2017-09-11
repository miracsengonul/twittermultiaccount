<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class UyelikKontrol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if (Auth::user()->devam == 0) {
            return redirect()->route('sure_bitti');
        };

        return $next($request);

    }
}
