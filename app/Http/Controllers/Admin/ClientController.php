<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserTokenHistory;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function addTokens(Request $request, $id)
    {
        $request->validate(['jetons' => 'required|integer|min:1']);
        $client = User::findOrFail($id);

        $before = $client->jetons;
        $added  = (int) $request->jetons;

        $client->jetons += $added;
        $client->save();

        // Historiser uniquement les ajouts positifs
        if ($added > 0) {
            UserTokenHistory::create([
                'user_id'        => $client->id,
                'previous_jetons'=> $before,
                'new_jetons'     => $client->jetons,
                'delta'          => $added,
                'source'         => 'admin',
            ]);
        }

        return back()->with('success', "✅ {$added} jetons ajoutés à {$client->pseudo}");
    }

    public function removeTokens(Request $request, $id)
    {
        $request->validate(['jetons' => 'required|integer|min:1']);
        $client = User::findOrFail($id);

        $removed = (int) $request->jetons;
        $client->jetons = max(0, $client->jetons - $removed); // jamais négatif
        $client->save();

        // ⚠️ Pas d’historisation des retraits (conformément à ta règle)

        return back()->with('success', "❌ {$removed} jetons retirés de {$client->pseudo}");
    }

    public function toggleBan($id)
    {
        $client = User::findOrFail($id);
        $client->banni = !$client->banni;
        $client->save();

        return back()->with('success', $client->banni ? "🚫 Client banni" : "✅ Client débloqué");
    }
}
