<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIP;

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
        'RUS', // Russia
        'TR', // Turkey
        'BY', // Belarus
        'KR', // South Korea
        'ID', // Indonesia
    ];

    public function handle(Request $request, Closure $next)
    {
        try {
            // Récupération IP client (gestion proxy)
            $ip = $request->header('X-Forwarded-For') ?: $request->ip();

            // Utilisation façade GeoIP
            $location = GeoIP::getLocation($ip);

            if (in_array($location->iso_code, $this->blockedCountries)) {
                abort(403, 'Accès refusé depuis votre pays.');
            }
        } catch (\Exception $e) {
            // En cas d’erreur de géolocalisation, on laisse passer (ou bloquer ici si besoin)
        }

        return $next($request);
    }
}
