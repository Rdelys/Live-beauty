<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request) {
        $request->validate([
    'pseudo' => 'required',
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6',
]);

        $user = User::create([
    'pseudo' => $request->pseudo,
    'email' => $request->email,
    'password' => Hash::make($request->password),
]);


        Auth::login($user);
        return redirect('/dashboard');
    }

    public function login(Request $request) {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect('/dashboard');
        }
        return back()->withErrors(['email' => 'Identifiants invalides']);
    }

    public function logout() {
        Auth::logout();
        return redirect('/');
    }

    public function dashboard() {
        return view('dashboard');
    }
}
