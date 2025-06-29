<?php

// app/Http/Controllers/LiveController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Live;
use App\Models\Modele;
use Illuminate\Support\Facades\Auth;

class LiveController extends Controller
{
    public function startLive()
    {
        $modele = Auth::guard('modele')->user();

        $live = Live::updateOrCreate(
            ['modele_id' => $modele->id],
            ['is_active' => true]
        );

        return response()->json(['status' => 'started']);
    }

    public function stopLive()
    {
        $modele = Auth::guard('modele')->user();

        Live::where('modele_id', $modele->id)->update(['is_active' => false]);

        return response()->json(['status' => 'stopped']);
    }

    public function activeLives()
    {
        $lives = Live::with('modele')->where('is_active', true)->get();
        return response()->json($lives->map(function ($live) {
            return [
                'id' => $live->modele->id,
                'prenom' => $live->modele->prenom,
            ];
        }));
    }

    public function showLive($id)
    {
        $modele = Modele::findOrFail($id);
        return view('live', compact('modele'));
    }
}
