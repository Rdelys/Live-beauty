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
}
