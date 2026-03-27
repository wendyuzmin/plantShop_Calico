<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Verificar si está autenticado
        if (!Auth::check()) {
            return response()->json([
                'message' => 'No autenticado'
            ], 401); //lo tenia nomas hasta aqui
        }

        // Verificar rol //nuevo 
        if (Auth::user()->role != $role) {
            return response()->json([
                'message' => 'No autorizado'
            ], 403);
        }

        return $next($request);
    }
}

//me faltaba $role donde laravel nunca lo recibio y si no hay usuario logueado tronaba faltaba permitir pasar el rol desde la ruta