<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        // Vérifie si l'utilisateur est connecté et s'il est admin
        if (!Auth::check() || !Auth::user()->is_admin) {
            abort(403, 'Accès refusé'); // ou redirect('/'); selon ton choix
        }

        return $next($request);
    }
}
