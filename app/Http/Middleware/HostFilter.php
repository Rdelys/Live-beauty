<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HostFilter
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Si on est sur le sous-domaine modeles
        if ($host === 'modeles.livebeautyofficial.com') {

            // Autoriser uniquement les routes "modele" ou "login" ou racine "/"
            if (!preg_match('#^/(modele|login|logout|password)#', $request->path()) && $request->path() !== '/') {
                abort(403, 'Accès interdit sur ce sous-domaine');
            }
        }

        return $next($request);
    }
}
