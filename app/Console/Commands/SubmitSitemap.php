<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class SubmitSitemap extends Command
{
    protected $signature = 'sitemap:submit';
    protected $description = 'Submit sitemap to search engines';

    public function handle()
    {
        $sitemapUrl = 'https://www.livebeautyofficial.com/sitemap.xml';
        
        // Google
        $googleResponse = Http::get('https://www.google.com/ping', [
            'sitemap' => $sitemapUrl
        ]);
        
        $this->info($googleResponse->successful() 
            ? 'Sitemap submitted to Google successfully' 
            : 'Failed to submit to Google');
        
        // Bing
        $bingResponse = Http::get('https://www.bing.com/ping', [
            'sitemap' => $sitemapUrl
        ]);
        
        $this->info($bingResponse->successful() 
            ? 'Sitemap submitted to Bing successfully' 
            : 'Failed to submit to Bing');
        
        return Command::SUCCESS;
    }
}