<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Modele;

class GenerateSitemap extends Command
{
    /**
     * The name and signature of the console command.
     * ⚠️ CETTE PROPRIÉTÉ EST OBLIGATOIRE
     *
     * @var string
     */
    protected $signature = 'sitemap:generate';

    /**
     * The console command description.
     * ⚠️ CETTE PROPRIÉTÉ EST OBLIGATOIRE
     *
     * @var string
     */
    protected $description = 'Generate XML sitemap for the website';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Starting sitemap generation...');
        
        // Créer le sitemap
        $sitemap = Sitemap::create()
            ->add(Url::create('/')->setPriority(1.0))
            ->add(Url::create('/cgu')->setPriority(0.3))
            ->add(Url::create('/politique-utilisation')->setPriority(0.3));
        
        // Ajouter tous les modèles
        $modeles = Modele::all();
        
        foreach ($modeles as $modele) {
            $sitemap->add(
                Url::create(route('modele.profile', $modele->id))
                    ->setLastModificationDate($modele->updated_at)
                    ->setPriority(0.7)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
            );
        }
        
        // Ajouter d'autres pages importantes
        $sitemap->add(Url::create('/login')->setPriority(0.1));
        $sitemap->add(Url::create('/register')->setPriority(0.1));
        
        // Écrire le fichier
        $sitemap->writeToFile(public_path('sitemap.xml'));
        
        $this->info('Sitemap generated successfully!');
        $this->info('Total URLs: ' . (count($modeles) + 5));
        
        return 0;
    }
}