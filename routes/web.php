<?php


use App\Http\Controllers\Cvh;
use App\Http\Controllers\Cal;
use App\Http\Controllers\Csuspension;
use App\Http\Controllers\Csonometro;
use App\Http\Controllers\Ctaximetro;
use App\Http\Controllers\Cfrenometro;
use App\Http\Controllers\Copacidad;
use App\Http\Controllers\Clogin;
use App\Http\Controllers\Cgases;
use App\Http\Controllers\Cgasesmotos;
use App\Http\Controllers\Cluces;
use App\Http\Controllers\Clucesmotos;
use App\Http\Controllers\Cprincipal;
use App\Http\Controllers\Cfrenomotos;
use App\Http\Controllers\Cfrenomotocarro;
use App\Http\Controllers\Cvisual;
use App\Http\Controllers\Cactualizar;
use App\Http\Controllers\Calibracion;
use App\Http\Controllers\Cfotos;
use App\Traits\EventosTrait;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::resource('/', Clogin::class);

// ─── Públicas: login y configuración inicial del dispositivo ─────────────
// El login se valida en el servidor contra appdatacontrol (ver Clogin@login).
Route::post('/login', [Clogin::class, 'login'])->middleware('throttle:10,1');
Route::post('/licencia', [Clogin::class, 'validarLicencia'])->middleware('throttle:30,1');
Route::get('/close', [Clogin::class, 'cerrarSesion']);
Route::post('/getlineas', [Cprincipal::class, 'getlineas']);
Route::get('/getmac', [Clogin::class, 'getMac']);
Route::get('/configapp', [Clogin::class, 'getConfigApp']);
Route::post('/configapp', [Clogin::class, 'saveConfigApp']);

// ─── Protegidas: sesión iniciada con Clogin@login y licencia válida ('sesion');
//     'modulo:<id>' exige además que la licencia habilite ese módulo del menú
Route::middleware('sesion')->group(function () {
    Route::resource('al', Cal::class)->middleware('modulo:ali');
    Route::resource('su', Csuspension::class)->middleware('modulo:sus');
    Route::resource('op', Copacidad::class)->middleware('modulo:opac');
    Route::resource('so', Csonometro::class)->middleware('modulo:son');
    Route::resource('tax', Ctaximetro::class)->middleware('modulo:tax');
    Route::resource('fr', Cfrenometro::class)->middleware('modulo:fre');
    Route::resource('frm', Cfrenomotos::class)->middleware('modulo:frem');
    Route::resource('ga', Cgases::class)->middleware('modulo:gase');
    Route::resource('gam', Cgasesmotos::class)->middleware('modulo:gasem');
    Route::resource('lu', Cluces::class)->middleware('modulo:lux');
    Route::resource('lum', Clucesmotos::class)->middleware('modulo:luxm');
    Route::resource('cpr', Cprincipal::class);
    Route::resource('frmotocarro', Cfrenomotocarro::class)->middleware('modulo:fremc');
    Route::resource('visual', Cvisual::class)->middleware('modulo:visual');
    Route::resource('update', Cactualizar::class)->middleware('modulo:actu');
    Route::resource('cal', Calibracion::class)->middleware('modulo:cal');
    Route::resource('fot', Cfotos::class)->middleware('modulo:fot');

    Route::post('/buscarvehiculo', [Cprincipal::class, 'getVehiculo']);

    Route::post('/getMaquina', [Cprincipal::class, 'getMaquina']);
    Route::post('/getActualizacion', [Cactualizar::class, 'getActualizacion'])->middleware('modulo:actu');
    Route::post('/getCalibracion', [Calibracion::class, 'getCalibracion'])->middleware('modulo:cal');

    Route::post('/consultarImagen', [Cfotos::class, 'consultarImagen'])->middleware('modulo:fot');

    Route::post('/getevento', [Cprincipal::class, 'eventosindra']);
    Route::post('/getDefectos', [Cvisual::class, 'getDefectos']); // también la usa Calibración
    Route::post('/updateObservacion', [Cvisual::class, 'updateObservacion'])->middleware('modulo:visual');
    Route::post('/saveObservacionAdicional', [Cvisual::class, 'saveObservacionAdicional'])->middleware('modulo:visual');
    Route::post('/deleteDefectos', [Cvisual::class, 'deleteDefectos'])->middleware('modulo:visual');
    Route::post('/saveDefectos', [Cvisual::class, 'saveDefectos'])->middleware('modulo:visual');
    Route::post('/saveLabrado', [Cvisual::class, 'saveLabrado'])->middleware('modulo:visual');
    //Route::resource('principal', Cprincipal::class);

    Route::post('/getPlacas', [EventosTrait::class, 'getPlacas']);

    Route::post('/getPlacasByTipo', [Cprincipal::class, 'getPlacasByTipo']);
    Route::get('/getPlacasByTipo/{tipoejecucion}', [Cprincipal::class, 'getPlacasByTipo']);

    Route::get('/get-archivo-desencriptado', [Cprincipal::class, 'getArchivoDesencriptado']);
});

// Route::post('/proxy-analizador', function (Request $request) {
//     $tipoprueba = $request->post('tipoprueba');
//     unset($request['tipoprueba']);
//     try {
//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//         ])->post('http://localhost:3000/' . $tipoprueba . '/escribir-datos', $request->all());

//         return response()->json($response->json(), $response->status());
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// })->name('proxy.analizador');


// Route::post('/proxy-detener-escritura', function (Request $request) {
//     $tipoprueba = $request->post('tipoprueba');
//     unset($request['tipoprueba']);
//     try {
//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//         ])->post('http://localhost:3000/' . $tipoprueba . '/detener-escritura', $request->all());

//         return response()->json($response->json(), $response->status());
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// })->name('proxy.detener.escritura');

// Route::post('/proxy-iniciar-captador', function (Request $request) {
//     $tipoprueba = $request->post('tipoprueba');
//     unset($request['tipoprueba']);
//     // echo "Datos recibidos en Laravel: " . json_encode($request->all()) . "\n";

//     try {
//         $response = Http::withHeaders([
//             'Content-Type' => 'application/json',
//         ])->post('http://localhost:3000/' . $tipoprueba . '/iniciar-captador', $request->all());

//         return response()->json($response->json(), $response->status());
//     } catch (\Exception $e) {
//         return response()->json(['error' => $e->getMessage()], 500);
//     }
// })->name('proxy.iniciar.captador');
