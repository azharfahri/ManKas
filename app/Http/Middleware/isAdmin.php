<?php

namespace App\Http\Middleware;
//use Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class isAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->routeIs('home.*','dana.*','pemasukan.*','pengeluaran.*')&& Auth::user()->is_admin !==0) {
            abort(403,'not found');
        }
        return $next($request);
    }
}
