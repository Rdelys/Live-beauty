<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqPublicController extends Controller
{
    /**
     * Afficher la page FAQ publique
     */
    public function index()
    {
        // Récupérer uniquement les FAQs actives
        $faqs = Faq::where('active', true)
                   ->orderBy('order', 'asc')
                   ->orderBy('created_at', 'desc')
                   ->get();
        
        // Récupérer les catégories uniques
        $categories = $faqs->pluck('categorie')
                          ->filter()
                          ->unique()
                          ->values();
        
        return view('faq.index', compact('faqs', 'categories'));
    }
    
    /**
     * API pour récupérer les FAQs (pour AJAX)
     */
    public function apiIndex()
    {
        $faqs = Faq::where('active', true)
                   ->orderBy('order', 'asc')
                   ->get();
        
        return response()->json([
            'success' => true,
            'faqs' => $faqs,
            'categories' => $faqs->pluck('categorie')->filter()->unique()->values()
        ]);
    }
    
    /**
     * Afficher une FAQ spécifique
     */
    public function show($id)
    {
        $faq = Faq::where('active', true)->findOrFail($id);
        
        // Récupérer les FAQs similaires (même catégorie)
        $relatedFaqs = Faq::where('active', true)
                          ->where('id', '!=', $id)
                          ->where('categorie', $faq->categorie)
                          ->orderBy('order', 'asc')
                          ->limit(5)
                          ->get();
        
        return view('faq.show', compact('faq', 'relatedFaqs'));
    }
}