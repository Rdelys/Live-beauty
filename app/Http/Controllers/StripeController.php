<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class StripeController extends Controller
{
    public function createCheckoutSession(Request $request)
{
    $user = Auth::user();
    $pack = $request->input('pack');
    $currency = $request->input('currency', 'eur'); // eur ou chf

    Stripe::setApiKey(config('services.stripe.secret'));

    // Choix des moyens de paiement selon devise
    $paymentMethods = $currency === 'chf'
        ? ['card', 'twint']  // TWINT seulement en CHF
        : ['card', 'link', 'klarna', 'revolut_pay', 'bancontact', 'blik', 'eps'];

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
            'user_id' => $user->id,
            'jetons'  => $pack['jetons'],
            'currency' => $currency,
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
