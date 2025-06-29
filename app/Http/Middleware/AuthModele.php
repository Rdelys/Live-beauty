<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthModele
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session('modele_logged_in')) {
            return redirect()->route('modele.login');
        }

        return $next($request);
    }
}
