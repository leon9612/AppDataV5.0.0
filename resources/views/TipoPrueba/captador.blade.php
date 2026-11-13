@include('layout.heder')
<style>
    /* Simulador de captador RPM/Temp — compacto, pensado para celular y pantalla dividida:
       una sola columna estrecha, controles que se acomodan solos con auto-fit. */
    #visor-captador { padding: 8px 0; }
    #visor-captador .container { padding-left: 8px; padding-right: 8px; }
    .cap-wrap { max-width: 560px; margin: 0 auto; }
    .cap-card { background: var(--surface, #fff); border: 1px solid var(--border, #E5E7EB); border-radius: 12px; padding: 10px; margin-bottom: 8px; }
    .cap-etq { font-size: .72rem; font-weight: 700; color: var(--muted, #6B7280); text-transform: uppercase; letter-spacing: .04em; margin-bottom: 4px; display: block; }

    .cap-head { display: flex; align-items: center; justify-content: space-between; gap: 6px; margin-bottom: 8px; }
    .cap-head h2 { font-size: 1rem; font-weight: 700; margin: 0; }
    #estadoConexionSimulador { font-size: .78rem; padding: .4em .65em; white-space: nowrap; }
    #avisoExclusividad { font-size: .8rem; padding: 8px 10px; margin-bottom: 8px; }

    /* Botones segmentados (tipo de tablero y tipo de perfil) */
    .cap-seg { display: grid; grid-template-columns: repeat(auto-fit, minmax(80px, 1fr)); gap: 6px; }
    .cap-seg .btn, .cap-perfiles .btn, .cap-acciones .btn { min-height: 44px; padding: 4px 6px; font-size: .88rem; display: flex; align-items: center; justify-content: center; gap: 4px; }

    /* Lectura en vivo: dos casillas siempre lado a lado */
    .cap-lecturas { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
    .cap-lectura { border: 1px solid var(--border, #E5E7EB); border-radius: 10px; padding: 6px 8px; min-width: 0; }
    .cap-lectura .val { font-size: 1.7rem; font-weight: 800; line-height: 1.1; font-variant-numeric: tabular-nums; }
    .cap-lectura .val small { font-size: .8rem; font-weight: 600; color: var(--muted, #6B7280); }
    .cap-lectura .obj { font-size: .7rem; color: var(--muted, #6B7280); }
    .cap-lectura .progress { height: 5px; margin-top: 4px; }

    /* Entradas RPM / °C lado a lado */
    .cap-entradas { display: grid; grid-template-columns: 1fr 1fr; gap: 8px; }
    .cap-entradas label { font-size: .72rem; font-weight: 700; color: var(--muted, #6B7280); text-transform: uppercase; margin-bottom: 2px; display: block; }
    .cap-entradas input { min-height: 44px; font-size: 1.05rem; padding: 4px 8px; }

    .cap-bloque + .cap-bloque { margin-top: 8px; }
    .cap-perfiles { display: grid; grid-template-columns: repeat(auto-fit, minmax(80px, 1fr)); gap: 6px; }
    .cap-perfiles .btn small { font-size: .7rem; opacity: .75; }
    .cap-acciones { display: grid; grid-template-columns: repeat(auto-fit, minmax(84px, 1fr)); gap: 6px; }
    .cap-acciones .btn { font-weight: 600; }
</style>
<main id="main">
    <section id="visor-captador" class="contact">
        <div class="container">
            <div class="cap-wrap" id="captadorApp" data-rpm-max="9000" data-temp-max="150">

                <div class="cap-head">
                    <h2>🎛️ Captador RPM / Temp</h2>
                    <span id="estadoConexionSimulador" class="badge bg-danger"><i class="bi bi-plug"></i> Desconectado</span>
                </div>

                @if (!empty($avisoVigenciaRpm))
                    <div id="avisoVigenciaRpm" class="alert alert-warning" role="alert" style="font-size:.8rem;padding:8px 10px;margin-bottom:8px;">
                        <i class="bi bi-calendar-event"></i>
                        La licencia del captador vence {{ $avisoVigenciaRpm->dias === 1 ? 'mañana' : 'en ' . $avisoVigenciaRpm->dias . ' días' }}{{ $avisoVigenciaRpm->fecha ? ' (' . $avisoVigenciaRpm->fecha . ')' : '' }}.
                    </div>
                @endif

                <div id="avisoExclusividad" class="alert alert-warning d-none" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <strong>Detenido por otro simulador.</strong> Vuelva a conectar el captador para retomarlo.
                </div>

                <!-- Lectura en vivo -->
                <div class="cap-card">
                    <div class="cap-lecturas">
                        <div class="cap-lectura">
                            <span class="cap-etq mb-0">RPM</span>
                            <div class="val"><span id="lecRpm">0</span></div>
                            <div class="obj">Obj. <span id="objRpm">0</span></div>
                            <div class="progress" role="progressbar" aria-label="RPM">
                                <div class="progress-bar bg-warning" id="barRpm" style="width:0%"></div>
                            </div>
                        </div>
                        <div class="cap-lectura">
                            <span class="cap-etq mb-0">Temperatura</span>
                            <div class="val"><span id="lecTemp">0.0</span> <small>°C</small></div>
                            <div class="obj">Obj. <span id="objTemp">0</span> °C</div>
                            <div class="progress" role="progressbar" aria-label="Temperatura">
                                <div class="progress-bar bg-danger" id="barTemp" style="width:0%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="cap-card">
                    <!-- Tipo de tablero: solo los habilitados por la licencia -->
                    <div class="cap-bloque">
                        <span class="cap-etq">Pista</span>
                        <div class="cap-seg" id="capTipos">
                            @foreach ($tipos as $i => $tipo)
                            <input type="radio" class="btn-check" name="capTipo" id="capTipo{{ $tipo->valor }}" value="{{ $tipo->valor }}" autocomplete="off" @checked($i === 0)>
                            <label class="btn btn-outline-primary" for="capTipo{{ $tipo->valor }}"><i class="bi {{ $tipo->icono }}"></i> {{ $tipo->texto }}</label>
                            @endforeach
                        </div>
                    </div>

                    <!-- Valores a enviar -->
                    <div class="cap-bloque cap-entradas">
                        <div>
                            <label for="inpRpm">RPM</label>
                            <input type="number" class="form-control" id="inpRpm" inputmode="numeric" min="0" max="9000" step="10" value="850">
                        </div>
                        <div>
                            <label for="inpTemp">Temp °C</label>
                            <input type="number" class="form-control" id="inpTemp" inputmode="decimal" min="0" max="150" step="0.1" value="65">
                        </div>
                    </div>

                    <!-- Perfiles rápidos: el tipo de vehículo define las RPM; la temperatura no se toca -->
                    <div class="cap-bloque">
                        <span class="cap-etq">Perfil rápido (solo RPM)</span>
                        <div class="cap-seg mb-2" id="capVehiculos">
                            <input type="radio" class="btn-check" name="capVeh" id="capVehLiviano" value="liviano" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary" for="capVehLiviano"><i class="bi bi-car-front"></i> Liviano</label>
                            <input type="radio" class="btn-check" name="capVeh" id="capVehPesado" value="pesado" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="capVehPesado"><i class="bi bi-truck"></i> Pesado</label>
                        </div>
                        <div class="cap-perfiles" id="capPerfiles">
                            <button type="button" class="btn btn-outline-warning" data-perfil="ralenti"><i class="bi bi-speedometer"></i> Ralentí <small id="rpmRalenti"></small></button>
                            <button type="button" class="btn btn-outline-success" data-perfil="crucero"><i class="bi bi-speedometer2"></i> Crucero <small id="rpmCrucero"></small></button>
                        </div>
                    </div>

                    <div class="cap-bloque cap-acciones">
                        <button type="button" class="btn btn-success" id="btnConectarCaptador"><i class="bi bi-plug-fill"></i> Conectar</button>
                        <button type="button" class="btn btn-primary" id="btnEnviarCaptador" disabled><i class="bi bi-send-fill"></i> Enviar</button>
                        <button type="button" class="btn btn-danger" id="btnDesconectarCaptador" disabled><i class="bi bi-stop-circle-fill"></i> Detener</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('layout.footer')
<script src="{{ asset('assets/data/captador.js') }}?v={{ time() }}"></script>
