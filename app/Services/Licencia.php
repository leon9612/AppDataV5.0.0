<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;

// Valida la licencia del dispositivo contra appdatacontrol desde el servidor.
// Solo se permite el uso con una respuesta válida y vigente: una respuesta vacía, inválida
// o un error de red bloquean, salvo la gracia sin conexión (GRACIA_HORAS) contada desde la
// última validación exitosa, que se guarda cifrada con la APP_KEY (no en el navegador).
class Licencia
{
    const URL_DISPOSITIVO = 'https://appdataingeniersoftware.com/appdatacontrol/index.php/Cdispositivo';
    const URL_APPDATA = 'https://appdataingeniersoftware.com/appdatacontrol/index.php/Cappdata';
    // appdatacontrol lee el header "autorization" (sin la "h" y en minúsculas)
    const TOKEN_APPDATA = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.Ijg5NnNkYndmZTg3dmNzZGFmOTg0bmc4ZmdoMjRvMTI5MHIi.HraZ7y3eG3dGhKngzOWge-je8Y3lxZgldXjbRbcA7cA';

    // Ids del menú que la licencia habilita con "1"
    const MODULOS = [
        'ali', 'fre', 'frem', 'fremc', 'gase', 'gasem',
        'lux', 'luxm', 'opac', 'son', 'sus', 'tax',
        'visual', 'actu', 'cal', 'fot',
    ];

    const GRACIA_HORAS = 24;
    const REVALIDAR_MINUTOS = 5;
    const REINTENTO_SIN_CONEXION_MINUTOS = 2;
    const ZONA = 'America/Bogota';

    /**
     * Devuelve ['permitido' => bool, 'motivo' => string, 'mensaje' => string,
     *           'fechavigencia' => ?string, 'diasRestantes' => ?int, 'modulos' => array, 'sinConexion' => bool]
     */
    public static function validar(string $dominio, string $mac, bool $forzar = false): array
    {
        $guardado = self::leer($dominio, $mac);
        $ahora = Carbon::now(self::ZONA);

        // Resultado reciente: no se consulta appdatacontrol en cada petición. $forzar (carga de
        // página y login) consulta siempre, para que un cambio en la licencia se vea enseguida.
        if (!$forzar && $guardado && empty($guardado['resultado']['sinConexion'])) {
            $validadoEn = Carbon::createFromTimestamp($guardado['validadoEn'], self::ZONA);
            if ($ahora->gte($validadoEn->copy()->subMinutes(5)) && $ahora->lt($validadoEn->copy()->addMinutes(self::REVALIDAR_MINUTOS))) {
                return self::conDiasRestantes($guardado['resultado'], $ahora);
            }
        }

        // Tras un fallo de conexión no se reintenta enseguida: sin internet cada página
        // esperaría los timeouts de appdatacontrol (también al forzar)
        $claveFallo = 'licencia_sin_conexion_' . sha1(mb_strtolower($dominio) . '|' . mb_strtolower($mac));
        if (Cache::has($claveFallo)) {
            return self::sinConexion($guardado, $ahora);
        }

        try {
            $dispositivo = self::http()->asForm()->post(self::URL_DISPOSITIVO, ['mac' => $mac, 'dominio' => $dominio]);
            $appdata = self::http()->withHeaders(['autorization' => self::TOKEN_APPDATA])
                ->get(self::URL_APPDATA, ['dominio' => $dominio]);
        } catch (\Throwable $e) {
            $dispositivo = $appdata = null;
        }

        if (!$dispositivo || !$appdata || !$dispositivo->successful() || !$appdata->successful()) {
            Cache::put($claveFallo, true, now()->addMinutes(self::REINTENTO_SIN_CONEXION_MINUTOS));
            return self::sinConexion($guardado, $ahora);
        }
        Cache::forget($claveFallo);

        // La fecha de "hoy" la da el servidor de licencias, no el reloj del equipo
        $hoy = $appdata->header('Date')
            ? Carbon::parse($appdata->header('Date'))->setTimezone(self::ZONA)
            : $ahora;

        $resultado = self::evaluar($dispositivo->json('estado'), $appdata->json(), $hoy);

        self::guardar($dominio, $mac, [
            'validadoEn' => $hoy->timestamp,
            'resultado' => $resultado,
        ]);

        return self::conDiasRestantes($resultado, $hoy);
    }

    private static function evaluar($estadoDispositivo, $licencias, Carbon $hoy): array
    {
        if ($estadoDispositivo === null || (string) $estadoDispositivo === '0') {
            return self::bloqueo('dispositivo_inactivo', 'Dispositivo inactivo, por favor comunicarse con el administrador del sistema.');
        }

        $licencia = is_array($licencias) && isset($licencias[0]) && is_array($licencias[0]) ? $licencias[0] : null;
        $vigencia = $licencia ? self::fecha($licencia['fechavigencia'] ?? null) : null;
        if (!$vigencia) {
            return self::bloqueo('licencia_no_encontrada', 'No se encontró una licencia válida para este dominio. Comuníquese con el administrador del sistema.');
        }

        if ($hoy->copy()->startOfDay()->gte($vigencia)) {
            return self::bloqueo('vencida', 'Su licencia ha expirado. Comuníquese con el administrador para renovarla.', $vigencia->toDateString());
        }

        switch ((string) ($licencia['valor'] ?? '')) {
            case '1':
                return self::bloqueo('vencida', 'Lo sentimos su licencia esta vencida.', $vigencia->toDateString());
            case '2':
                return self::bloqueo('encriptacion', 'Se detectó un cambio en el sistema, por su seguridad se ha bloqueado. Comuníquese con el administrador del sistema.');
            case '3':
                return self::bloqueo('bloqueado', 'Por favor, póngase en contacto con el administrador del sistema para verificar el estado del software y conocer los motivos de este bloqueo.');
        }

        $modulos = [];
        foreach (self::MODULOS as $modulo) {
            $modulos[$modulo] = (string) ($licencia[$modulo] ?? '0') === '1' ? '1' : '0';
        }

        return [
            'permitido' => true,
            'motivo' => 'activa',
            'mensaje' => '',
            'fechavigencia' => $vigencia->toDateString(),
            'modulos' => $modulos,
            'sinConexion' => false,
        ];
    }

    // Sin respuesta de appdatacontrol: solo se permite si la última validación fue exitosa,
    // hace menos de GRACIA_HORAS, la licencia sigue vigente y el reloj no se atrasó.
    private static function sinConexion(?array $guardado, Carbon $ahora): array
    {
        $bloqueo = self::bloqueo('sin_conexion', 'No se pudo validar la licencia con el servidor. Verifique la conexión a internet e intente nuevamente.');

        if (!$guardado || empty($guardado['resultado']['permitido'])) {
            return $bloqueo;
        }

        $validadoEn = Carbon::createFromTimestamp($guardado['validadoEn'], self::ZONA);
        $vigencia = self::fecha($guardado['resultado']['fechavigencia'] ?? null);

        $relojAtrasado = $ahora->lt($validadoEn->copy()->subMinutes(5));
        $graciaVencida = $ahora->gt($validadoEn->copy()->addHours(self::GRACIA_HORAS));
        $licenciaVencida = !$vigencia || $ahora->copy()->startOfDay()->gte($vigencia);

        if ($relojAtrasado || $graciaVencida || $licenciaVencida) {
            return $bloqueo;
        }

        $resultado = $guardado['resultado'];
        $resultado['sinConexion'] = true;
        $resultado['mensaje'] = 'Sin conexión con el servidor de licencias. Puede seguir trabajando hasta el '
            . $validadoEn->copy()->addHours(self::GRACIA_HORAS)->format('Y-m-d H:i') . '.';

        return self::conDiasRestantes($resultado, $ahora);
    }

    private static function bloqueo(string $motivo, string $mensaje, ?string $fechavigencia = null): array
    {
        return [
            'permitido' => false,
            'motivo' => $motivo,
            'mensaje' => $mensaje,
            'fechavigencia' => $fechavigencia,
            'modulos' => array_fill_keys(self::MODULOS, '0'),
            'sinConexion' => false,
            'diasRestantes' => null,
        ];
    }

    private static function conDiasRestantes(array $resultado, Carbon $hoy): array
    {
        $vigencia = self::fecha($resultado['fechavigencia'] ?? null);
        $resultado['diasRestantes'] = $resultado['permitido'] && $vigencia
            ? (int) $hoy->copy()->startOfDay()->diffInDays($vigencia, false)
            : null;
        return $resultado;
    }

    private static function fecha($valor): ?Carbon
    {
        if (!is_string($valor) || !preg_match('/^\d{4}-\d{2}-\d{2}$/', $valor)) {
            return null;
        }
        try {
            return Carbon::createFromFormat('Y-m-d', $valor, self::ZONA)->startOfDay();
        } catch (\Throwable $e) {
            return null;
        }
    }

    private static function http()
    {
        // El PHP de los equipos no trae certificados raíz: se usa el paquete incluido en el proyecto
        return Http::withOptions(['verify' => resource_path('certs/cacert.pem')])->connectTimeout(5)->timeout(10);
    }

    private static function ruta(string $dominio, string $mac): string
    {
        return storage_path('app/system/licencia/' . sha1(mb_strtolower($dominio) . '|' . mb_strtolower($mac)) . '.dat');
    }

    private static function leer(string $dominio, string $mac): ?array
    {
        $ruta = self::ruta($dominio, $mac);
        if (!file_exists($ruta)) {
            return null;
        }
        try {
            $datos = json_decode(Crypt::decryptString(file_get_contents($ruta)), true);
        } catch (\Throwable $e) {
            return null; // archivo alterado o de otra APP_KEY: como si no existiera
        }
        return is_array($datos) && isset($datos['validadoEn'], $datos['resultado']) ? $datos : null;
    }

    private static function guardar(string $dominio, string $mac, array $datos): void
    {
        $ruta = self::ruta($dominio, $mac);
        if (!is_dir(dirname($ruta))) {
            mkdir(dirname($ruta), 0777, true);
        }
        file_put_contents($ruta, Crypt::encryptString(json_encode($datos)));
    }

    // MAC del equipo que hace la petición (por ARP en la red local; si no aparece, la del servidor)
    public static function macCliente(): string
    {
        $ipAddress = $_SERVER['REMOTE_ADDR'] ?? '';
        $macAddr = '';
        if ($ipAddress !== '') {
            $arp = (string) shell_exec('arp -a ' . escapeshellarg($ipAddress));
            foreach (explode("\n", $arp) as $line) {
                $cols = preg_split('/\s+/', trim($line));
                if (($cols[0] ?? '') === $ipAddress && !empty($cols[1])) {
                    $macAddr = $cols[1];
                }
            }
        }

        if ($macAddr === '') {
            $macAddr = (string) exec('getmac | findstr "Device"');
            $macAddr = (string) strtok($macAddr, ' ');
        }

        return mb_convert_encoding($macAddr, 'UTF-8', 'ISO-8859-1');
    }
}
