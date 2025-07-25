<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        $user->jetons += $request->nombre;
        $user->save();

        return response()->json(['success' => true, 'jetons' => $user->jetons]);
    }
}
