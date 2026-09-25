<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

// Solo deja entrar a los módulos que la licencia habilita ("modulo:lux" → modulos.lux === "1").
// Va después de "sesion", que deja la licencia actualizada en la sesión.
class VerificarModulo
{
    public function handle(Request $request, Closure $next, string $modulo)
    {
        if ((session('licencia.modulos')[$modulo] ?? '0') === '1') {
            return $next($request);
        }

        $mensaje = 'Este módulo no está habilitado en su licencia.';
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['message' => $mensaje], 403);
        }

        return redirect('cpr')->with('error', $mensaje);
    }
}
