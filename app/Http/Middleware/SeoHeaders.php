<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SeoHeaders
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);
        
        // Ne pas ajouter de headers pour les fichiers statiques
        if ($this->isStaticFile($request)) {
            return $response;
        }
        
        // Headers SEO et sécurité
        $headers = [
            'X-Robots-Tag' => 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1',
            'X-Content-Type-Options' => 'nosniff',
            'Referrer-Policy' => 'strict-origin-when-cross-origin',
            'Permissions-Policy' => 'camera=(), microphone=(), geolocation=()',
        ];
        
        // Pour les pages adultes
        if ($request->is('/') || $request->is('modele/*') || $request->is('live/*')) {
            $headers['Rating'] = 'RTA-5042-1996-1400-1577-RTA';
            $headers['PICS-Label'] = '(pics-1.1 "http://www.icra.org/pics/vocabularyv03/" l gen true for "https://www.livebeautyofficial.com" r (cz 1 lz 1 nz 1 oz 1 vz 1) "http://www.rsac.org/ratingsv01.html" l gen true for "https://www.livebeautyofficial.com" r (n 1 s 1 v 1 l 1))';
        }
        
        foreach ($headers as $key => $value) {
            $response->headers->set($key, $value);
        }
        
        return $response;
    }
    
    private function isStaticFile(Request $request): bool
    {
        $path = $request->path();
        return preg_match('/\.(css|js|jpg|jpeg|png|gif|ico|svg|woff|woff2|ttf|eot|mp4|webm)$/', $path);
    }
}