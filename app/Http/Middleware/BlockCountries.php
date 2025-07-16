<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIP;

class BlockCountries
{
    protected $blockedCountries = [
        'IR', 'SA', 'AF', 'BN', 'MY',
        'PK', 'IN', 'CN', 'RU', 'TR',
        'BY', 'KR', 'ID','US',
    ];

    public function handle(Request $request, Closure $next)
    {
        $ip = $request->getClientIp();

        try {
            $location = GeoIP::getLocation($ip);

            $iso = $location->iso_code ?? null;
            $country = $location->country ?? 'Inconnu';

            \Log::info("GeoIP - IP : $ip, Pays : $country ($iso)");

            if (!$iso) {
                \Log::warning("GeoIP - iso_code manquant pour IP : $ip");
            }

            if (in_array($iso, $this->blockedCountries)) {
                \Log::warning("Visiteur BLOQUÉ - IP : $ip, Pays : $iso");
                abort(403, 'Accès refusé depuis votre pays.');
            }

            // Injection console log uniquement pour les requêtes HTML (pas API/AJAX)
            if ($request->isMethod('get') && str_contains($request->header('Accept'), 'text/html')) {
                app()->terminating(function () use ($ip, $country, $iso) {
                    echo "<script>console.log('IP: {$ip}, Pays: {$country} ({$iso})');</script>";
                });
            }

        } catch (\Exception $e) {
            \Log::error("Erreur GeoIP - IP : $ip, message : " . $e->getMessage());

            // Facultatif : aussi afficher l’erreur dans la console navigateur
            if ($request->isMethod('get') && str_contains($request->header('Accept'), 'text/html')) {
                app()->terminating(function () use ($ip, $e) {
                    $message = addslashes($e->getMessage());
                    echo "<script>console.error('GeoIP ERROR - IP: {$ip}, Message: {$message}');</script>";
                });
            }
        }

        return $next($request);
    }
}
