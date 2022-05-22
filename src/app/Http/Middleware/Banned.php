<?php

// Autor: Vukašin Stepanović

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Banned
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->isBanned) {

            if (auth()->user()->banned_till == 0) {
                $message = 'Your account has been banned.';
            }

            auth()->logout();
            return redirect()->route('login')->with('message', $message);
        }

        return $next($request);
    }
}
