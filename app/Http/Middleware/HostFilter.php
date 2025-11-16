<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class HostFilter
{
    public function handle(Request $request, Closure $next)
    {
        $host = $request->getHost();

        // Si on est sur le sous-domaine des modèles
        if ($host === 'modeles.livebeautyofficial.com') {

            // ✅ Autoriser les routes suivantes :
            // - /
            // - /modele/... (login, profil, etc.)
            // - /password/... (mot de passe oublié/réinit)
            // - /logout
            // - /login
            $allowedPatterns = [
    '#^$#',
    '#^modele(/.*)?$#',
    '#^password(/.*)?$#',
    '#^login$#',
    '#^logout$#',

    // Live
    '#^live/start$#',
    '#^live/stop$#',
    '#^live/start-private$#',
    '#^live/stop-private$#',

    // API Live
    '#^api/live/start$#',
    '#^api/live/stop$#',

    // Album (update, delete, edit)
    '#^albums/update/\d+$#',
    '#^albums/\d+/edit$#',
    '#^albums/\d+$#',  // destroy

    // Gallery Photo (update, delete, destroyMultiple)
    '#^gallery-photo/update/\d+$#',
    '#^gallery-photo/\d+$#',
    '#^gallery-photo/destroy/\d+$#',
    '#^gallery-photo/destroyMultiple$#',
];



            $path = ltrim($request->path(), '/');

            $isAllowed = false;
            foreach ($allowedPatterns as $pattern) {
                if (preg_match($pattern, $path)) {
                    $isAllowed = true;
                    break;
                }
            }

            if (!$isAllowed) {
                // Si ce n'est pas une route autorisée → bloquer
                abort(403, 'Accès interdit sur ce sous-domaine');
            }
        }

        // ✅ Continuer la requête normalement
        return $next($request);
    }
}
