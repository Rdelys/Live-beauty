<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use GeoIP;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class BlockCountries
{
    protected $blockedCountries = [
    // Afrique
    'DZ','AO','BJ','BW','BF','BI','CM','CV','CF','TD','KM',
    'CG','CD','CI','DJ','EG','GQ','ER','SZ','ET','GA','GM',
    'GH','GN','GW','KE','LS','LR','LY','MG','MW','ML','MR',
    'MU','MA','MZ','NA','NE','NG','RW','ST','SN','SC','SL',
    'SO','ZA','SS','SD','TZ','TG','TN','UG','EH','ZM','ZW',

    // Pays ajoutés hors Afrique
    'IR','SA','AF','BN','MY','PK','IN','CN','RU','TR','BY','KR','ID',
];


    protected $apiToken = '86f36db5694772'; // Remplacez par votre token ipinfo.io

    public function handle(Request $request, Closure $next)
    {
        if ($request->routeIs('forbidden')) {
            return $next($request);
        }

        // Autoriser le sous-domaine modeles.livebeautyofficial.com
        if ($request->getHost() === 'modeles.livebeautyofficial.com') {
            \Log::info("Sous-domaine autorisé, blocage IP ignoré : " . $request->getHost());
            return $next($request);
        }


        $ip = $request->getClientIp();

        // Ignore GeoIP pour local
        if ($ip === '127.0.0.1' || $ip === '::1') {
            \Log::info("IP locale détectée : $ip, GeoIP ignoré.");
            return $next($request);
        }

        // Vérifier si IP déjà en cache
        $cached = Cache::get("geoip_$ip");
        if ($cached) {
            $iso = $cached['iso'];
            $country = $cached['country'];
        } else {
            $iso = null;
            $country = 'Inconnu';

            // 1️⃣ GeoIP locale
            try {
                $location = GeoIP::getLocation($ip);
                $iso = $location->iso_code ?? null;
                $country = $location->country ?? 'Inconnu';
            } catch (\Exception $e) {
                \Log::warning("GeoIP locale a échoué pour IP $ip : ".$e->getMessage());
            }

            // 2️⃣ Si GeoIP local improbable, fallback vers API externe
            if (!$iso || $iso === 'US') {
                try {
                    $response = Http::timeout(2)
                        ->get("https://ipinfo.io/{$ip}/json?token={$this->apiToken}");
                    if ($response->ok()) {
                        $data = $response->json();
                        $iso = $data['country'] ?? $iso;
                        $country = $data['country'] ?? $country;
                    }
                } catch (\Exception $e) {
                    \Log::error("API GeoIP a échoué pour IP $ip : ".$e->getMessage());
                }
            }

            // Mettre en cache 24h pour éviter les appels répétés
            Cache::put("geoip_$ip", ['iso' => $iso, 'country' => $country], 60*24);
        }

        \Log::info("IP détectée : $ip, Pays : $country ($iso)");

        // Blocage si pays interdit
        if ($iso && in_array($iso, $this->blockedCountries)) {
            \Log::warning("Visiteur BLOQUÉ - IP : $ip, Pays : $iso");
            return redirect()->route('forbidden');
        }

        // Console log côté client
        if ($request->isMethod('get') && str_contains($request->header('Accept'), 'text/html')) {
            app()->terminating(function () use ($ip, $country, $iso) {
                echo "<script>console.log('IP: {$ip}, Pays: {$country} ({$iso})');</script>";
            });
        }

        // Stocker le pays dans la session pour Stripe
        session([
            'user_country_iso' => $iso,
            'user_country_name' => $country,
        ]);

        return $next($request);
    }
}
