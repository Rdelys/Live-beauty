<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function addTokens(Request $request, $id)
    {
        $request->validate(['jetons' => 'required|integer|min:1']);
        $client = User::findOrFail($id);
        $client->jetons += $request->jetons;
        $client->save();

        return back()->with('success', "✅ {$request->jetons} jetons ajoutés à {$client->pseudo}");
    }

    public function removeTokens(Request $request, $id)
    {
        $request->validate(['jetons' => 'required|integer|min:1']);
        $client = User::findOrFail($id);
        $client->jetons = max(0, $client->jetons - $request->jetons); // jamais négatif
        $client->save();

        return back()->with('success', "❌ {$request->jetons} jetons retirés de {$client->pseudo}");
    }

    public function toggleBan($id)
    {
        $client = User::findOrFail($id);
        $client->banni = !$client->banni;
        $client->save();

        return back()->with('success', $client->banni ? "🚫 Client banni" : "✅ Client débloqué");
    }
}
