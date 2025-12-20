<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class GenerateSitemap extends Command
{
   public function handle()
{
    Sitemap::create()
        ->add(Url::create('/')->setPriority(1.0))
        ->add(Url::create('/cgu')->setPriority(0.3))
        ->add(Url::create('/politique-utilisation')->setPriority(0.3))
        
        // Ajouter tous les profils de modèles
        ->add(Modele::all()->map(function ($modele) {
            return Url::create(route('modele.profile', $modele->id))
                ->setLastModificationDate($modele->updated_at)
                ->setPriority(0.7);
        }))
        
        ->writeToFile(public_path('sitemap.xml'));
}
}
