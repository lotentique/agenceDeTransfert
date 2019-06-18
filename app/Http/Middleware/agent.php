<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;

class agent
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



        if (auth()->check() ) {
            if (Auth::user()->type_user != "agent" ) {
                //abort(403, 'Unauthorized action.');
                return back();
            }
            return $next($request);
        }
        return redirect('login');
    }
}
