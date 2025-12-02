<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
public function profil($id)
{
    $user = \App\Models\User::findOrFail($id);
    return view('user-profil', compact('user'));
}

public function checkEmail(Request $request)
{
    $exists = \App\Models\User::where('email', $request->email)->exists();

    return response()->json(['exists' => $exists]);
}

public function checkPseudo(Request $request)
{
    $exists = \App\Models\User::where('pseudo', $request->pseudo)->exists();

    return response()->json(['exists' => $exists]);
}

}
