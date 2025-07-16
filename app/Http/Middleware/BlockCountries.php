<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIP; // ⬅️ Ajoute cette ligne


class BlockCountries
{
    protected $blockedCountries = [
        'IR', // Iran
        'SA', // Saudi Arabia
        'AF', // Afghanistan
        'BN', // Brunei
        'MY', // Malaysia
        'PK', // Pakistan
        'IN', // India
        'CN', // China
        'RU', // Russia
        'TR', // Turkey
        'BY', // Belarus
        'KR', // South Korea
        'ID', // Indonesia
    ];

    public function handle(Request $request, Closure $next)
    {
        try {
            $location = geoip($request->ip());

            if (in_array($location->iso_code, $this->blockedCountries)) {
                // Option 1 : Bloquer
                abort(403, 'Accès refusé depuis votre pays.');

                // Option 2 : Rediriger vers une page spécifique
                // return redirect('/blocked');
            }
        } catch (\Exception $e) {
            // Si l’IP ne peut pas être localisée
            // Tu peux décider de bloquer ou autoriser par défaut
        }

        return $next($request);
    }
}

