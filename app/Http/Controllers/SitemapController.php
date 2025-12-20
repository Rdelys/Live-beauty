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
        $baseUrl = config('app.url', 'https://www.livebeautyofficial.com');

        $xml = '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
        $xml .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

        // Page d'accueil
        $xml .= '<url>' . "\n";
        $xml .= '  <loc>https://www.livebeautyofficial.com</loc>' . "\n";
        $xml .= '  <lastmod>' . now()->format('Y-m-d') . '</lastmod>' . "\n";
        $xml .= '  <changefreq>daily</changefreq>' . "\n";
        $xml .= '  <priority>1.0</priority>' . "\n";
        $xml .= '</url>' . "\n";

        // Pages statiques
        $staticPages = [
            ['url' => 'https://www.livebeautyofficial.com/cgu', 'priority' => 0.5, 'freq' => 'monthly'],
            ['url' => 'https://www.livebeautyofficial.com/pu', 'priority' => 0.5, 'freq' => 'monthly'],
            ['url' => 'https://www.livebeautyofficial.com/contact', 'priority' => 0.6, 'freq' => 'monthly'],
            ['url' => 'https://www.livebeautyofficial.com/faq', 'priority' => 0.6, 'freq' => 'monthly'],
        ];

        foreach ($staticPages as $page) {
            $xml .= '<url>' . "\n";
            $xml .= '  <loc>' . $page['url'] . '</loc>' . "\n";
            $xml .= '  <lastmod>' . now()->format('Y-m-d') . '</lastmod>' . "\n";
            $xml .= '  <changefreq>' . $page['freq'] . '</changefreq>' . "\n";
            $xml .= '  <priority>' . $page['priority'] . '</priority>' . "\n";
            $xml .= '</url>' . "\n";
        }

        // Profils des modèles
        foreach ($modeles as $modele) {
            $xml .= '<url>' . "\n";
            $xml .= '  <loc>' . route('modele.profile', $modele->id) . '</loc>' . "\n";
            $xml .= '  <lastmod>' . $modele->updated_at->format('Y-m-d') . '</lastmod>' . "\n";
            $xml .= '  <changefreq>weekly</changefreq>' . "\n";
            $xml .= '  <priority>0.9</priority>' . "\n";
            $xml .= '</url>' . "\n";
        }

        $xml .= '</urlset>';

        return response($xml, 200, [
            'Content-Type' => 'application/xml; charset=utf-8',
            'Content-Length' => strlen($xml)
        ]);
    }
}