<div class="container">
    <div class="section-title">
        <h2>{{ $nombreprueba }}</h2>
    </div>
    <div class="row" data-aos="fade-in">
        <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">
            <div class="accordion w-100" id="accordionSimuladorSonometro">
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConexionSimuladorSonometro" aria-expanded="true">
                            🔌 Simulador De Pruebas
                        </button>
                    </h2>
                    <div id="collapseConexionSimuladorSonometro" class="accordion-collapse collapse show" data-bs-parent="#accordionSimuladorSonometro">
                        <div class="accordion-body">
                            <div class="row">
                                <x-conexion-simulador
                                    id-conectar="btnConectarSimuladorSonometro"
                                    id-desconectar="btnDesconectarSimuladorSonometro"
                                    id-csrf="csrf_tokenSonometro"
                                    :mostrar-buscar="false" />

                                <!-- Tipo de Prueba - Radio Buttons -->
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-header">🏍️ Tipo de Prueba</div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tipoPruebaSonometro" id="pruebaPistaMixta" value="1" checked>
                                                        <label class="form-check-label fw-bold" for="pruebaPistaMixta">
                                                            <i class="bi bi-car-front"></i> Prueba Pista Mixta
                                                        </label>
                                                        <div class="small text-muted mt-1">Vehículos livianos, camionetas, SUV</div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="tipoPruebaSonometro" id="pruebaPistaMotos" value="2">
                                                        <label class="form-check-label fw-bold" for="pruebaPistaMotos">
                                                            <i class="bi bi-bicycle"></i> Prueba Pista de Motos
                                                        </label>
                                                        <div class="small text-muted mt-1">Motocicletas y ciclomotores</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Valor de Ruido -->
                                <div class="col-12">
                                    <div class="card">
                                        <div class="card-header">🔊 Valor de Ruido</div>
                                        <div class="card-body">
                                            <div class="row g-2 align-items-end">
                                                <div class="col-12 col-md-6">
                                                    <div class="form-floating">
                                                        <input type="number" class="form-control" id="valor_ruidoSonometro" placeholder="Ruido" step="0.1" value="0">
                                                        <label for="valor_ruidoSonometro">Ruido (dB)</label>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <input type="hidden" id="tipovehiculo" value = "{{ $tipovehiculo }}">
                                                    <button id="btnEnviarRuidoSonometro" class="btn btn-primary w-100" disabled>
                                                        <i class="bi bi-send"></i> Enviar Ruido
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>