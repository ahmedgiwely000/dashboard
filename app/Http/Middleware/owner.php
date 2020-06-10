<?php

namespace App\Http\Middleware;

use Closure;

class owner
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
        $user = auth()->user();
        if(strtolower($user->email) == 'agiwely92@gmail.com'){
            return $next($request);
        }
        return abort(404);
    }
}
