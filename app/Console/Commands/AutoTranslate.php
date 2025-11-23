<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class AutoTranslate extends Command
{
    protected $signature = 'translate:auto {lang}';
    protected $description = 'Auto translate JSON language file by scanning Blade files';

    public function handle()
    {
        $lang = $this->argument('lang');
        $json = resource_path("lang/$lang.json");

        // Charger les anciennes traductions
        $translations = file_exists($json)
            ? json_decode(file_get_contents($json), true)
            : [];

        // Trouver tous les fichiers Blade (compatible Windows)
        $files = [];
        $directory = resource_path('views');

        $iterator = new \RecursiveIteratorIterator(
            new \RecursiveDirectoryIterator($directory)
        );

        foreach ($iterator as $file) {
            if ($file->isFile() && $file->getExtension() === 'php') {
                $files[] = $file->getPathname();
            }
        }

        // Extraire les textes dans __('...')
        foreach ($files as $file) {
            preg_match_all('/__\([\'"](.*?)[\'"]\)/', file_get_contents($file), $matches);

            foreach ($matches[1] as $text) {
                if (!isset($translations[$text])) {

                    // Traduction automatique avec détection de langue
                    $translated = $this->translateText($text, $lang);
                    $translations[$text] = $translated;

                    $this->info("$text => $translated");
                }
            }
        }

        file_put_contents(
            $json,
            json_encode($translations, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE)
        );

        $this->info("✔ Fichier langue mis à jour : lang/$lang.json");
    }

    // TRADUCTION AVEC DÉTECTION AUTO (sl=auto)
    public function translateText($text, $target)
    {
        $url = "https://translate.googleapis.com/translate_a/single?client=gtx&sl=auto&tl=$target&dt=t&q=" . urlencode($text);

        $response = json_decode(file_get_contents($url), true);

        return $response[0][0][0] ?? $text;
    }
}
