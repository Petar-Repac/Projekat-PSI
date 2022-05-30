<?php

// Autor: Vukašin Stepanović

namespace App\Http\Middleware;

use App\Models\User;
use App\Utilities;
use Closure;
use Illuminate\Http\Request;

class DeclareWinner
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
        if (auth()->check() && auth()->user()->isBanned == 0 && $request->header("X-Sender") != "xfetch") {
          $user = auth()->user();
          if ($user->postStatus == 3 || $user->postStatus == 4) {
            if ($user->postStatus == 3) {
              Utilities::showDialog("Obaveštenje", "Vaš post je pobednik selekcije!");
            } else {
              Utilities::showDialog("Obaveštenje", "Vaš post nije prošao selekciju.", "info");
            }
            $user->postStatus = 0;
            
            if ($user instanceof User) {
              $user->save();
            }
          }
        }

        return $next($request);
    }
}
