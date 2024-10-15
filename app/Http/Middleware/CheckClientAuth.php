<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckClientAuth
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next)
    {
        // Verifica la autenticación en el guard 'clientes'
        if (!Auth::guard('clientes')->check()) {
            // Redirige al login de clientes si no está autenticado
            return redirect()->route('login-cli');
        }

        // Si está autenticado, continúa con la solicitud
        return $next($request);
    }
}
