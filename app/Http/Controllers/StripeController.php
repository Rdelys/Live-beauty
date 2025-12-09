<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{

    private function getPaymentConfig(?string $iso)
{
    switch ($iso) {

        // 🇨🇭 Suisse
        case 'CH':
            return [
                'currency' => 'chf',
                'methods'  => ['card', 'link', 'twint'],
            ];

        // 🇪🇺 Zone euro
        case 'FR': case 'BE': case 'LU': case 'DE': case 'ES': case 'IT':
        case 'NL': case 'AT': case 'FI': case 'GR': case 'PT': case 'IE':
            return [
                'currency' => 'eur',
                'methods'  => [
                    'card', 'link', 'revolut_pay', 'bancontact',
                    'blik', 'eps', 'klarna'
                ],
            ];

        // 🇬🇧 Royaume-Uni
        case 'GB':
            return [
                'currency' => 'gbp',
                'methods'  => ['card', 'link'],
            ];

        // 🌍 par défaut
        default:
            return [
                'currency' => 'eur',
                'methods'  => ['card', 'link'],
            ];
    }
}

    public function createCheckoutSession(Request $request)
{
    $user = Auth::user();
    $pack = $request->input('pack');

    Stripe::setApiKey(config('services.stripe.secret'));

    // Récupérer le pays détecté dans le middleware
    $iso = session('user_country_iso'); // ex : CH, FR, BE...

    // Charger la config de paiement selon le pays
    $config = $this->getPaymentConfig($iso);

    $currency = $config['currency'];
    $paymentMethods = $config['methods'];

    $session = Session::create([
        'payment_method_types' => $paymentMethods,

        'line_items' => [[
            'price_data' => [
                'currency' => $currency,
                'product_data' => [
                    'name' => $pack['jetons'].' Jetons',
                ],
                'unit_amount' => intval($pack['prix'] * 100),
            ],
            'quantity' => 1,
        ]],

        'mode' => 'payment',
        'success_url' => route('stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
        'cancel_url' => route('stripe.cancel'),

        'metadata' => [
            'user_id'  => $user->id,
            'jetons'   => $pack['jetons'],
            'currency' => $currency,
            'country'  => $iso,
        ],
    ]);

    return response()->json(['id' => $session->id]);
}



    public function success(Request $request)
    {
        $session_id = $request->get('session_id');

        Stripe::setApiKey(env('STRIPE_SECRET'));
        $session = \Stripe\Checkout\Session::retrieve($session_id);

        if ($session->payment_status === 'paid') {
            $user = Auth::user();
            $nombre = $session->metadata->jetons ?? 0;

            // Réutilise ton contrôleur AchatJetonsController
            app(AchatJetonsController::class)->ajouter(new Request(['nombre' => $nombre]));

            return redirect()->route('dashboard')->with('success', 'Jetons ajoutés avec succès !');
        }

        return redirect()->route('dashboard')->with('error', 'Paiement non validé.');
    }

    public function cancel()
    {
        return redirect()->route('dashboard')->with('error', 'Paiement annulé.');
    }
}
