<?php

// Autor: Vukašin Stepanović

namespace App\Http\Middleware;

use App\Utilities;
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
            auth()->logout();
            Utilities::showDialog('Obaveštenje', 'Vašem nalogu je zabranjen pristup.', 'error');
            return redirect()->route('login');
        }

        return $next($request);
    }
}
