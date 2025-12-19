<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use App\Services\AchatJetonsService;
use App\Models\User;

class CryptoController extends Controller
{
    /**
     * Création du paiement crypto
     */
    public function create(Request $request)
    {
        try {
            $user = Auth::user();
            $pack = $request->json('pack');
            
            if (!$pack) {
                return response()->json(['error' => 'Pack manquant'], 400);
            }

            // Validation du pack
            $validPacks = [
                ['jetons' => 30, 'prix' => 5.49],
                ['jetons' => 60, 'prix' => 9.99],
                ['jetons' => 130, 'prix' => 19.99],
                ['jetons' => 300, 'prix' => 44.99],
                ['jetons' => 700, 'prix' => 99.99],
            ];

            $isValid = collect($validPacks)->contains(function ($validPack) use ($pack) {
                return $validPack['jetons'] == $pack['jetons'] && 
                       (float)$validPack['prix'] == (float)$pack['prix'];
            });

            if (!$isValid) {
                return response()->json(['error' => 'Pack invalide'], 400);
            }

            // Configuration NowPayments
            $apiKey = config('services.nowpayments.key');
            if (!$apiKey) {
                return response()->json(['error' => 'Configuration NowPayments manquante'], 500);
            }

            // Configuration cURL personnalisée
            $httpClient = Http::withOptions([
                'verify' => app()->environment('production') 
                    ? true  // Vérification SSL en production
                    : false, // Pas de vérification SSL en développement
                'timeout' => 30,
            ])->withHeaders([
                'x-api-key' => $apiKey,
                'Content-Type' => 'application/json'
            ]);

            // Création de l'invoice
            $response = $httpClient->post('https://api.nowpayments.io/v1/invoice', [
                'price_amount' => (float)$pack['prix'],
                'price_currency' => 'eur',
                'order_id' => 'user_' . $user->id . '_' . time(),
                'order_description' => $pack['jetons'] . ' jetons Live Beauty',
                'ipn_callback_url' => route('crypto.webhook'),
                'success_url' => route('dashboard') . '?crypto=success',
                'cancel_url' => route('dashboard') . '?crypto=cancel',
            ]);

            if (!$response->successful()) {
                \Log::error('NowPayments API Error:', [
                    'status' => $response->status(),
                    'body' => $response->body(),
                    'user_id' => $user->id,
                    'pack' => $pack
                ]);
                
                return response()->json([
                    'error' => 'Échec de la création du paiement',
                    'details' => $response->json()
                ], 500);
            }

            $data = $response->json();
            
            return response()->json([
                'success' => true,
                'invoice_url' => $data['invoice_url'] ?? null,
                'invoice_id' => $data['id'] ?? null,
                'pay_address' => $data['pay_address'] ?? null,
                'pay_amount' => $data['pay_amount'] ?? null
            ]);

        } catch (\Exception $e) {
            \Log::error('Crypto create error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'user_id' => Auth::id(),
                'pack' => $request->all()
            ]);
            
            return response()->json([
                'error' => 'Erreur interne du serveur',
                'message' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Webhook IPN NowPayments
     */
    public function webhook(Request $request, AchatJetonsService $service)
    {
        try {
            $payload = $request->getContent();
            $signature = $request->header('x-nowpayments-sig');
            
            \Log::info('NowPayments Webhook received:', [
                'signature' => $signature,
                'payload' => json_decode($payload, true)
            ]);

            $ipnSecret = config('services.nowpayments.ipn_secret');
            
            if ($ipnSecret) {
                $expected = hash_hmac('sha512', $payload, $ipnSecret);
                
                if (!hash_equals($expected, $signature)) {
                    \Log::error('Invalid signature in webhook');
                    return response()->json(['error' => 'Invalid signature'], 403);
                }
            }

            $data = json_decode($payload, true);
            
            // Extraire l'ID utilisateur de order_id (format: user_ID_TIMESTAMP)
            $orderId = $data['order_id'] ?? '';
            $userId = null;
            
            if (preg_match('/user_(\d+)_/', $orderId, $matches)) {
                $userId = $matches[1];
            }
            
            if (!$userId) {
                \Log::error('User ID not found in order_id', ['order_id' => $orderId]);
                return response()->json(['error' => 'User ID not found'], 400);
            }

            $user = User::find($userId);
            if (!$user) {
                \Log::error('User not found', ['user_id' => $userId]);
                return response()->json(['error' => 'User not found'], 404);
            }

            // Vérifier le statut du paiement
            if ($data['payment_status'] === 'finished') {
                // Extraire le nombre de jetons de la description
                $description = $data['order_description'] ?? '';
                preg_match('/(\d+)\s+jetons/', $description, $matches);
                $jetons = $matches[1] ?? 0;
                
                if ($jetons > 0) {
                    // Créditer les jetons à l'utilisateur
                    $user->increment('jetons', $jetons);
                    
                    \Log::info('Crypto payment successful', [
                        'user_id' => $user->id,
                        'jetons_added' => $jetons,
                        'payment_id' => $data['payment_id'] ?? null
                    ]);
                }
            }

            return response()->json(['success' => true]);

        } catch (\Exception $e) {
            \Log::error('Webhook processing error:', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'payload' => $request->all()
            ]);
            
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }
}