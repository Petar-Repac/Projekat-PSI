<?php

// Autor: Vukašin Stepanović 0133/2019

namespace App\Http\Middleware;

use App\Utilities;
use Closure;
use Illuminate\Http\Request;

/**
 * Middleware koji proverava da li je korisnik banovan. Ako jeste, izloguje ga i prikazuje poruku.
 */
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
