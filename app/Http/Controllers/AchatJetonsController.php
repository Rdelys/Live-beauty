<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserTokenHistory;

class AchatJetonsController extends Controller
{
    public function ajouter(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['success' => false], 401);
        }

        $request->validate([
            'nombre' => 'required|integer|min:1'
        ]);

        $before = $user->jetons;
        $added  = (int) $request->nombre;

        $user->jetons += $added;
        $user->save();

        // Historiser uniquement les ajouts positifs
        if ($added > 0) {
            UserTokenHistory::create([
                'user_id'        => $user->id,
                'previous_jetons'=> $before,
                'new_jetons'     => $user->jetons,
                'delta'          => $added,
                'source'         => 'purchase', // achat côté client
            ]);
        }

        return response()->json([
            'success' => true,
            'jetons'  => $user->jetons
        ]);
    }
}
