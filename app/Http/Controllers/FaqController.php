<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * API pour récupérer toutes les FAQs
     */
    public function indexApi()
    {
        try {
            $faqs = Faq::orderBy('order', 'asc')
                      ->orderBy('created_at', 'desc')
                      ->get();
            
            return response()->json([
                'success' => true,
                'faqs' => $faqs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement des FAQs',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * API pour récupérer une FAQ spécifique pour édition
     */
    public function editApi($id)  // CHANGEZ CE PARAMÈTRE
    {
        try {
            $faq = Faq::find($id);
            
            if (!$faq) {
                return response()->json([
                    'success' => false,
                    'message' => 'FAQ non trouvée'
                ], 404);
            }
            
            // Retournez UNIQUEMENT l'objet FAQ, pas un tableau
            return response()->json($faq);
            
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Erreur lors du chargement de la FAQ',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Créer une nouvelle FAQ
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'reponse' => 'required|string',
            'categorie' => 'nullable|string|max:100',
            'order' => 'integer|min:0',
            'active' => 'boolean'
        ]);

        $faq = Faq::create([
            'question' => $validated['question'],
            'reponse' => $validated['reponse'],
            'categorie' => $validated['categorie'] ?? null,
            'order' => $validated['order'] ?? 0,
            'active' => $validated['active'] ?? true
        ]);

        return response()->json([
            'success' => true,
            'message' => 'FAQ ajoutée avec succès.',
            'faq' => $faq
        ]);
    }

    /**
     * Mettre à jour une FAQ
     */
    public function update(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'reponse' => 'required|string',
            'categorie' => 'nullable|string|max:100',
            'order' => 'integer|min:0',
            'active' => 'boolean'
        ]);

        $faq->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'FAQ mise à jour avec succès.',
            'faq' => $faq
        ]);
    }

    /**
     * Supprimer une FAQ
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();
        
        return response()->json([
            'success' => true,
            'message' => 'FAQ supprimée avec succès.'
        ]);
    }

    /**
     * Changer le statut actif/inactif
     */
    public function toggleActive(Faq $faq)
    {
        $faq->update(['active' => !$faq->active]);
        
        return response()->json([
            'success' => true,
            'message' => 'Statut de la FAQ mis à jour.',
            'faq' => $faq
        ]);
    }
}