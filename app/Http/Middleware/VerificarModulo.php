<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

// Solo deja entrar a los módulos que la licencia habilita ("modulo:lux" → modulos.lux === "1").
// Admite varios ids ("modulo:simcapmot,simcapliv"): basta con que uno esté habilitado.
// Va después de "sesion", que deja la licencia actualizada en la sesión.
class VerificarModulo
{
    public function handle(Request $request, Closure $next, string ...$modulos)
    {
        $habilitados = session('licencia.modulos', []);
        foreach ($modulos as $modulo) {
            if (($habilitados[$modulo] ?? '0') === '1') {
                return $next($request);
            }
        }

        $mensaje = 'Este módulo no está habilitado en su licencia.';

        // Captador RPM con vigencia propia vencida: se avisa con la fecha en vez del mensaje genérico
        if (session('licencia.rpmVencido') && array_intersect($modulos, ['simcapmot', 'simcapliv'])) {
            $fecha = session('licencia.fechavigenciarpm');
            $fechaTexto = $fecha ? Carbon::createFromFormat('Y-m-d', $fecha)->format('d/m/Y') : null;
            $mensaje = 'La licencia del captador RPM venció' . ($fechaTexto ? " el $fechaTexto" : '') . '.';
        }
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['message' => $mensaje], 403);
        }

        return redirect('cpr')->with('error', $mensaje);
    }
}
