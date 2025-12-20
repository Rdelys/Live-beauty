<?php

namespace App\Http\Controllers;

use App\Models\Modele;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SitemapController extends Controller
{
    public function index(): Response
    {
        $modeles = Modele::where('en_ligne', true)->get();
        $baseUrl = config('app.url');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">';

        // Page d'accueil - PRIORITÉ MAXIMALE
        $xml .= '<url>';
        $xml .= '<loc>https://www.livebeautyofficial.com</loc>';
        $xml .= '<lastmod>' . now()->format('Y-m-d') . '</lastmod>';
        $xml .= '<changefreq>daily</changefreq>';
        $xml .= '<priority>1.0</priority>';
        $xml .= '</url>';

        // Pages statiques
        $staticPages = [
            ['url' => '/cgu', 'priority' => 0.5, 'freq' => 'monthly'],
            ['url' => '/pu', 'priority' => 0.5, 'freq' => 'monthly'],
            ['url' => '/contact', 'priority' => 0.6, 'freq' => 'monthly'],
            ['url' => '/faq', 'priority' => 0.6, 'freq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $xml .= '<url>';
            $xml .= '<loc>' . $baseUrl . $page['url'] . '</loc>';
            $xml .= '<lastmod>' . now()->format('Y-m-d') . '</lastmod>';
            $xml .= '<changefreq>' . $page['freq'] . '</changefreq>';
            $xml .= '<priority>' . $page['priority'] . '</priority>';
            $xml .= '</url>';
        }

        // Profils des modèles en ligne
        foreach ($modeles as $modele) {
            $xml .= '<url>';
            $xml .= '<loc>' . route('modele.profile', $modele->id) . '</loc>';
            $xml .= '<lastmod>' . $modele->updated_at->format('Y-m-d') . '</lastmod>';
            $xml .= '<changefreq>weekly</changefreq>';
            $xml .= '<priority>0.9</priority>';
            $xml .= '</url>';
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml',
            'Content-Length' => strlen($xml)
        ]);
    }
}