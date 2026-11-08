<?php

namespace App\Services;

use Carbon\Carbon;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

// Valida la licencia del dispositivo contra appdatacontrol desde el servidor.
// Solo se permite el uso con una respuesta válida y vigente: una respuesta vacía, inválida
// o un error de red bloquean siempre (no hay gracia sin conexión). La última validación se
// guarda cifrada con la APP_KEY (no en el navegador) solo para no consultar en cada petición.
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
        'simcapmot', 'simcapliv',
    ];

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

        // Tras un fallo de conexión no se reintenta enseguida: sin internet cada petición
        // esperaría los timeouts de appdatacontrol. Al forzar (carga de página y login) sí se
        // reintenta, para que al volver la conexión se desbloquee recargando.
        $claveFallo = 'licencia_sin_conexion_' . sha1(mb_strtolower($dominio) . '|' . mb_strtolower($mac));
        if (!$forzar && Cache::has($claveFallo)) {
            return self::sinConexion();
        }

        try {
            $dispositivo = self::enviar(self::URL_DISPOSITIVO, function ($http, $url) use ($mac, $dominio) {
                return $http->asForm()->post($url, ['mac' => $mac, 'dominio' => $dominio]);
            });
            $appdata = self::enviar(self::URL_APPDATA, function ($http, $url) use ($dominio) {
                return $http->withHeaders(['autorization' => self::TOKEN_APPDATA])->get($url, ['dominio' => $dominio]);
            });
        } catch (\Throwable $e) {
            Log::warning('Licencia: error al consultar appdatacontrol: ' . $e->getMessage());
            $dispositivo = $appdata = null;
        }

        if ($dispositivo && $appdata && (!$dispositivo->successful() || !$appdata->successful())) {
            Log::warning('Licencia: appdatacontrol respondió dispositivo=' . $dispositivo->status() . ' appdata=' . $appdata->status());
        }

        if (!$dispositivo || !$appdata || !$dispositivo->successful() || !$appdata->successful()) {
            Cache::put($claveFallo, true, now()->addMinutes(self::REINTENTO_SIN_CONEXION_MINUTOS));
            return self::sinConexion();
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
            // 0 = sin simuladores y acordeón de prueba abierto; sin la columna se asume 1 (comportamiento actual)
            'aplicaresolucion' => (string) ($licencia['aplicaresolucion'] ?? '1') === '0' ? '0' : '1',
            'sinConexion' => false,
        ];
    }

    // Sin respuesta de appdatacontrol siempre se bloquea, aunque la última validación haya sido exitosa
    private static function sinConexion(): array
    {
        return self::bloqueo('sin_conexion', 'No se pudo validar la licencia con el servidor. Verifique la conexión a internet e intente nuevamente.');
    }

    private static function bloqueo(string $motivo, string $mensaje, ?string $fechavigencia = null): array
    {
        return [
            'permitido' => false,
            'motivo' => $motivo,
            'mensaje' => $mensaje,
            'fechavigencia' => $fechavigencia,
            'modulos' => array_fill_keys(self::MODULOS, '0'),
            'aplicaresolucion' => '1',
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

    public static function http()
    {
        // El PHP de los equipos no trae certificados raíz: se usa el paquete incluido en el proyecto.
        // Si aún no llegó con la actualización, se intenta con los certificados del sistema.
        $certificados = resource_path('certs/cacert.pem');
        // appdatacontrol publica IPv6 que no acepta conexiones: se fuerza IPv4 para no caer en "Connection refused".
        return Http::withOptions([
            'verify' => is_file($certificados) ? $certificados : true,
            'force_ip_resolve' => 'v4', // sirve con curl y con streams (el PHP de Apache no trae curl)
        ])->connectTimeout(5)->timeout(10);
    }

    // El dominio está en la CDN de Hostinger, que responde con IPs distintas en cada consulta DNS y
    // desde algunas redes el 443 de varias de ellas no conecta. Guzzle solo usa la primera IP, así
    // que aquí se prueba cada una (empezando por la última que funcionó) hasta que una conecte.
    // $enviar recibe (PendingRequest, url) y devuelve la respuesta.
    public static function enviar(string $url, callable $enviar)
    {
        $host = parse_url($url, PHP_URL_HOST);
        $claveIp = 'licencia_ip_' . $host;
        $ips = array_values(array_unique(array_filter(array_merge([Cache::get($claveIp)], self::ipsDe($host)))));

        if (!$ips) {
            return $enviar(self::http(), $url); // sin DNS propio: que Guzzle resuelva como antes
        }

        $error = null;
        $puerto = parse_url($url, PHP_URL_SCHEME) === 'http' ? 80 : 443;
        foreach ($ips as $i => $ip) {
            // Con streams (el PHP de Apache no trae curl) Guzzle ignora connectTimeout y una IP muerta
            // tardaría el timeout completo: se comprueba antes que el puerto conecte
            if ($i < count($ips) - 1 && !self::conecta($host, $ip, $puerto)) {
                Log::warning("Licencia: $host no conecta por $ip:$puerto, se prueba otra IP");
                continue;
            }
            try {
                $respuesta = $enviar(self::httpPorIp($host, $ip, $i > 0), self::conIp($url, $host, $ip));
                Cache::forever($claveIp, $ip);
                return $respuesta;
            } catch (ConnectionException $e) {
                Log::warning("Licencia: sin conexión con $host por $ip: " . $e->getMessage());
                $error = $e;
            }
        }
        Cache::forget($claveIp);
        throw $error;
    }

    // Se negocia TLS y no solo TCP: en las IPs que fallan el TCP conecta pero el handshake se queda colgado.
    // Solo mide si la IP responde; el certificado lo valida después la petición real.
    private static function conecta(string $host, string $ip, int $puerto): bool
    {
        $contexto = stream_context_create(['ssl' => ['peer_name' => $host, 'verify_peer' => false, 'verify_peer_name' => false]]);
        $destino = ($puerto === 443 ? 'ssl' : 'tcp') . "://$ip:$puerto";
        $socket = @stream_socket_client($destino, $codigo, $mensaje, 3, STREAM_CLIENT_CONNECT, $contexto);
        if (!$socket) {
            return false;
        }
        fclose($socket);
        return true;
    }

    private static function ipsDe(string $host): array
    {
        $registros = @dns_get_record($host, DNS_A);
        $ips = is_array($registros) ? array_column($registros, 'ip') : [];
        if (!$ips) {
            $ips = @gethostbynamel($host) ?: [];
        }
        return array_values(array_filter($ips, function ($ip) {
            return filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4);
        }));
    }

    private static function httpPorIp(string $host, string $ip, bool $reintento)
    {
        $http = self::http()->withOptions(['force_ip_resolve' => null]);
        if ($reintento) {
            $http->connectTimeout(3); // que probar todas las IPs no deje la página esperando demasiado
        }

        if (extension_loaded('curl')) {
            // curl: la URL conserva el dominio y se le indica a qué IP conectar
            return $http->withOptions(['curl' => [CURLOPT_RESOLVE => ["$host:443:$ip", "$host:80:$ip"]]]);
        }

        // streams: la URL lleva la IP, el certificado se valida contra el dominio y el Host lo identifica
        return $http->withHeaders(['Host' => $host])
            ->withOptions(['stream_context' => ['ssl' => ['peer_name' => $host, 'SNI_server_name' => $host]]]);
    }

    private static function conIp(string $url, string $host, string $ip): string
    {
        return extension_loaded('curl') ? $url : preg_replace('#^(https?://)' . preg_quote($host, '#') . '#i', '${1}' . $ip, $url);
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
            // getmac tarda ~2.5 s y la MAC del servidor no cambia: se guarda un día
            $macAddr = Cache::remember('licencia_mac_servidor', now()->addDay(), function () {
                return (string) strtok((string) exec('getmac | findstr "Device"'), ' ');
            });
        }

        return mb_convert_encoding($macAddr, 'UTF-8', 'ISO-8859-1');
    }
}
