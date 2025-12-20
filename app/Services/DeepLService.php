<?php
// app/Services/DeepLService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class DeepLService
{
    private $apiKey;
    private $apiUrl;

    public function __construct()
    {
        $this->apiKey = config('services.deepl.api_key');
        $this->apiUrl = config('services.deepl.api_url');
    }

    /**
     * Traduit un texte
     */
    public function translate(string $text, string $targetLang, ?string $sourceLang = null): ?string
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'DeepL-Auth-Key ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl . '/v2/translate', [
                'text' => [$text],
                'target_lang' => strtoupper($targetLang),
                'source_lang' => $sourceLang ? strtoupper($sourceLang) : null,
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['translations'][0]['text'] ?? null;
            }

            \Log::error('DeepL API Error', [
                'status' => $response->status(),
                'response' => $response->body()
            ]);
            return null;
        } catch (\Exception $e) {
            \Log::error('DeepL Service Exception: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Détecte la langue d'un texte
     */
    public function detectLanguage(string $text): ?string
    {
        try {
            $response = Http::withHeaders([
                'Authorization' => 'DeepL-Auth-Key ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl . '/v2/translate', [
                'text' => [$text],
                'target_lang' => 'EN', // Langue cible arbitraire
            ]);

            if ($response->successful()) {
                $data = $response->json();
                return $data['translations'][0]['detected_source_language'] ?? null;
            }

            return null;
        } catch (\Exception $e) {
            \Log::error('DeepL Detect Language Error: ' . $e->getMessage());
            return null;
        }
    }

    /**
     * Traduit et conserve l'original
     */
    public function translateWithOriginal(string $text, string $targetLang): array
    {
        $translation = $this->translate($text, $targetLang);
        
        return [
            'original' => $text,
            'translated' => $translation,
            'target_lang' => $targetLang,
            'translation_success' => !is_null($translation)
        ];
    }
}