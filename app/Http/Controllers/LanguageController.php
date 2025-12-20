<?php
// app/Http/Controllers/LanguageController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\DeepLService;

class LanguageController extends Controller
{
    protected $deeplService;

    public function __construct(DeepLService $deeplService)
    {
        $this->deeplService = $deeplService;
    }

    /**
     * Définir la langue préférée de l'utilisateur
     */
    public function setPreferredLanguage(Request $request)
    {
        $request->validate([
            'language' => 'required|in:FR,EN,ES,IT,DE,PT,NL,PL,RU,ZH,JA,KO'
        ]);

        $user = auth()->user();
        $user->preferred_language = $request->language;
        $user->save();

        return response()->json([
            'success' => true,
            'message' => 'Langue préférée mise à jour',
            'language' => $request->language
        ]);
    }

    /**
     * API de traduction pour usage externe
     */
    public function translate(Request $request)
    {
        $request->validate([
            'text' => 'required|string',
            'target_lang' => 'required|in:FR,EN,ES,IT,DE,PT,NL,PL,RU,ZH,JA,KO',
            'source_lang' => 'sometimes|in:FR,EN,ES,IT,DE,PT,NL,PL,RU,ZH,JA,KO'
        ]);

        $translation = $this->deeplService->translate(
            $request->text,
            $request->target_lang,
            $request->source_lang
        );

        if ($translation) {
            return response()->json([
                'success' => true,
                'translation' => $translation,
                'original' => $request->text,
                'target_lang' => $request->target_lang
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Échec de la traduction'
        ], 500);
    }

    /**
     * Détecter la langue d'un texte
     */
    public function detect(Request $request)
    {
        $request->validate([
            'text' => 'required|string|min:1'
        ]);

        $detected = $this->deeplService->detectLanguage($request->text);

        return response()->json([
            'success' => !is_null($detected),
            'detected_language' => $detected,
            'text' => $request->text
        ]);
    }
}