<div class="container">
    <div class="section-title">
        <h2>{{ $nombreprueba }}</h2>
    </div>
    <div class="row" data-aos="fade-in">
        <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">
            <div class="accordion w-100" id="accordionSimulador">
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConexionSimulador" aria-expanded="true">
                            🔌Simulador De Pruebas
                        </button>
                    </h2>
                    <div id="collapseConexionSimulador" class="accordion-collapse collapse show" data-bs-parent="#accordionSimulador">
                        <div class="accordion-body">
                            <div class="row">
                                <x-conexion-simulador
                                    id-conectar="btnConectarSimulador"
                                    id-desconectar="btnDesconectarSimulador"
                                    id-csrf="csrf_token" />

                                <!-- Necesario siempre (no solo cuando se muestra CRUCERO): iniciarCaptador() lo lee para saber si es prueba de motos -->
                                <input type="hidden" id="tipovehiculo" value="{{ $tipovehiculo }}">

                                <!-- Datos del Captador -->
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-header">📡 Datos del Captador</div>
                                        <div class="card-body">
                                            <div class="row g-2 align-items-end">
                                                <div class="col-6 col-md-{{ $tipovehiculo === 2 ? '3' : '4' }}">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="temp_captador" placeholder="Temperatura" step="0.1" value="60">
                                                        <label for="temp_captador">Temperatura (°C)</label>
                                                    </div>
                                                </div>
                                                @if ($tipovehiculo === 2)
                                                <div class="col-6 col-md-3">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_rpm_crucero" placeholder="RPM" value="2500">
                                                        <label for="sim_rpm_crucero">RPM Crucero</label>
                                                    </div>
                                                </div>
                                                @endif
                                                <div class="col-12 col-md-{{ $tipovehiculo === 2 ? '6' : '8' }}">
                                                    <label class="fw-bold mb-1 small">RPM a enviar:</label>
                                                    <div class="btn-group w-100" role="group">
                                                        <input type="radio" class="btn-check" name="tipoRPM" id="rpmRalenti" autocomplete="off" checked>
                                                        <label class="btn btn-outline-warning" for="rpmRalenti" onclick="setTimeout(() => iniciarCaptador(), 10)">
                                                            <i class="bi bi-speedometer"></i> Usar RPM RALENTI
                                                        </label>
                                                        <input type="radio" class="btn-check" name="tipoRPM" id="rpmCrucero" autocomplete="off">
                                                        <label class="btn btn-outline-success" for="rpmCrucero" onclick="setTimeout(() => iniciarCaptador(), 10)">
                                                            <i class="bi bi-car-front"></i> Usar RPM CRUCERO
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                

                                <!-- Valores RALENTI -->
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-header">🚦 Valores RALENTI</div>
                                        <div class="card-body">
                                            <div class="row g-2 align-items-end">
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_hc_ralenti" placeholder="HC" value="300">
                                                        <label for="sim_hc_ralenti">HC (ppm)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_co_ralenti" placeholder="CO" step="0.01" value="1.0">
                                                        <label for="sim_co_ralenti">CO (%)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_co2_ralenti" placeholder="CO2" step="0.01" value="4.0">
                                                        <label for="sim_co2_ralenti">CO₂ (%)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_o2_ralenti" placeholder="O2" step="0.01" value="20.1">
                                                        <label for="sim_o2_ralenti">O₂ (%)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_rpm_ralenti" placeholder="RPM" value="850">
                                                        <label for="sim_rpm_ralenti">RPM</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <button id="btnEnviarRalenti" class="btn btn-warning w-100 btn-enviar" disabled>
                                                        <i class="bi bi-send"></i> Enviar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                @if ($tipovehiculo !== 2)
                                <!-- Valores CRUCERO -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">🚗 Valores CRUCERO</div>
                                        <div class="card-body">
                                            <div class="row g-2 align-items-end">
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_hc_crucero" placeholder="HC" value="150">
                                                        <label for="sim_hc_crucero">HC (ppm)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_co_crucero" placeholder="CO" step="0.01" value="0.5">
                                                        <label for="sim_co_crucero">CO (%)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_co2_crucero" placeholder="CO2" step="0.01" value="8.0">
                                                        <label for="sim_co2_crucero">CO₂ (%)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_o2_crucero" placeholder="O2" step="0.01" value="15.0">
                                                        <label for="sim_o2_crucero">O₂ (%)</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="sim_rpm_crucero" placeholder="RPM" value="2500">
                                                        <label for="sim_rpm_crucero">RPM</label>
                                                    </div>
                                                </div>
                                                <div class="col-6 col-md-4 col-lg-2">
                                                    <button id="btnEnviarCrucero" class="btn btn-success w-100 btn-enviar" disabled>

                                                        <i class="bi bi-send"></i> Enviar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-instrucciones-simulador prueba="gases" />
<script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="{{ asset('assets/data/gdataresponsegases.js') }}?v={{ time() }}"></script>