<?php

namespace App\Http\Middleware;

use Closure;

class IsOperator
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
        if (auth()->user()->role == 'Operator') {
            return $next($request);
        }else{
            return redirect()->back();
        }
    }
}
