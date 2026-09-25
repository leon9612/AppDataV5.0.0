<?php

namespace App\Http\Middleware;

use App\Services\Licencia;
use Closure;
use Illuminate\Http\Request;

// Solo deja pasar si el login se validó en el servidor (Clogin@login creó sesionUser) y la
// licencia del dispositivo sigue válida (Licencia::validar revalida cada pocos minutos).
// Las llamadas AJAX reciben JSON 401/403; la navegación normal vuelve al login.
class VerificarSesion
{
    public function handle(Request $request, Closure $next)
    {
        if (!session('sesionUser')) {
            return $this->rechazar($request, 401, 'Sesión no iniciada o vencida');
        }

        $sesionLicencia = session('licencia');
        if (empty($sesionLicencia['dominio']) || empty($sesionLicencia['mac'])) {
            session()->forget('sesionUser');
            return $this->rechazar($request, 401, 'Sesión no iniciada o vencida');
        }

        $licencia = Licencia::validar($sesionLicencia['dominio'], $sesionLicencia['mac']);
        session(['licencia' => $licencia + ['dominio' => $sesionLicencia['dominio'], 'mac' => $sesionLicencia['mac']]]);

        if (!$licencia['permitido']) {
            session()->forget('sesionUser');
            return $this->rechazar($request, 403, $licencia['mensaje']);
        }

        return $next($request);
    }

    private function rechazar(Request $request, int $codigo, string $mensaje)
    {
        if ($request->ajax() || $request->expectsJson()) {
            return response()->json(['message' => $mensaje], $codigo);
        }

        return redirect('/')->with('error', $mensaje);
    }
}
