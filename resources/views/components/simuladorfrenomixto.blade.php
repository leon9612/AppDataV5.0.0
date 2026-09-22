<style>
    /* Solo variables de acento y overrides de ancho: el resto de
       .panel-pruebas-pro vive en public/assets/css/panel-pruebas.css */
    .panel-pruebas-pro {
        --pesaje: #4361EE;
        --pesaje-bg: #EEF1FD;
        --fuerza: #F2542D;
        --fuerza-bg: #FDEEEA;
        --alineacion: #0E9AA7;
        --alineacion-bg: #E6F6F7;
        --aux: #8B5CF6;
        --aux-bg: #F3EEFE;
        --eje-chip-solo-width: 150px;
    }
</style>
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
                                    id-conectar="btnConectarSimuladorFrenoMotos"
                                    id-desconectar="btnDesconectarSimuladorFrenoMotos"
                                    id-csrf="csrf_tokenSonometro" />

                                <!-- Tipo de Prueba - Radio Buttons -->
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-header">Configuracion de prueba</div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-12 col-md-6 col-lg-6">
                                                    <div class="input-group mb-3" style="align-content: center;">
                                                        <label class="input-group-text" for="inputGroupSelect01">Vehiculo pesado</label>
                                                        <select class="form-select vehiculopesado" id="inputGroupSelect01" name="selPlaca">
                                                            <option value="SI">SI</option>
                                                            <option value="NO" selected>NO</option>

                                                        </select>
                                                    </div>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-12 mb-4">
                                <div class="card panel-pruebas-pro border-0 shadow-sm rounded-4 overflow-hidden">
                                    <div class="card-header py-3 px-4 d-flex align-items-center gap-2">
                                        <i class="bi bi-database text-dark"></i>
                                        <h5 class="mb-0 fw-bold" style="font-size:1rem;">Datos de la prueba</h5>
                                    </div>
                                    <div style="text-align: center;">

                                        <label style="font-size: 0.875rem; color: #6c757d;">
                                            Todos los datos deben ingresarse en kilogramos (kg).
                                        </label>
                                    </div>
                                    <!-- ════════════ ALINEACIÓN (sin lado, sin backend todavía) ════════════ -->
                                    <div class="seccion" style="--accent: var(--alineacion); --accent-bg: var(--alineacion-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-rulers"></i></span>
                                            <h6>Alineación</h6>
                                            <span class="seccion-sub">5 ejes</span>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip solo" data-grupo="alineacion_eje_1">
                                                <span class="eje-num">1</span>
                                                <div class="eje-input"><label>Valor</label><input type="number" id="sim_alineacion_eje_1" value="5.2"></div>
                                                <button class="eje-send btn-enviar" data-grupo="alineacion_eje_1" title="Enviar eje 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip solo" data-grupo="alineacion_eje_2">
                                                <span class="eje-num">2</span>
                                                <div class="eje-input"><label>Valor</label><input type="number" id="sim_alineacion_eje_2" value="5.9"></div>
                                                <button class="eje-send btn-enviar" data-grupo="alineacion_eje_2" title="Enviar eje 2"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip solo" data-grupo="alineacion_eje_3">
                                                <span class="eje-num">3</span>
                                                <div class="eje-input"><label>Valor</label><input type="number" id="sim_alineacion_eje_3"></div>
                                                <button class="eje-send btn-enviar" data-grupo="alineacion_eje_3" title="Enviar eje 3"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip solo" data-grupo="alineacion_eje_4">
                                                <span class="eje-num">4</span>
                                                <div class="eje-input"><label>Valor</label><input type="number" id="sim_alineacion_eje_4"></div>
                                                <button class="eje-send btn-enviar" data-grupo="alineacion_eje_4" title="Enviar eje 4"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip solo" data-grupo="alineacion_eje_5">
                                                <span class="eje-num">5</span>
                                                <div class="eje-input"><label>Valor</label><input type="number" id="sim_alineacion_eje_5"></div>
                                                <button class="eje-send btn-enviar" data-grupo="alineacion_eje_5" title="Enviar eje 5"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ════════════ PESAJES ════════════ -->
                                    <div class="seccion" style="--accent: var(--pesaje); --accent-bg: var(--pesaje-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-speedometer2"></i></span>
                                            <h6>Pesajes</h6>
                                            <span class="seccion-sub">5 ejes</span>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip" data-grupo="pesaje_eje_1">
                                                <span class="eje-num">1</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_pesaje_eje_1_izq" value="258"></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_pesaje_eje_1_der" value="257"></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_1" title="Enviar eje 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="pesaje_eje_2">
                                                <span class="eje-num">2</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_pesaje_eje_2_izq" value="197"></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_pesaje_eje_2_der" value="194"></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_2" title="Enviar eje 2"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="pesaje_eje_3">
                                                <span class="eje-num">3</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_pesaje_eje_3_izq" value=""></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_pesaje_eje_3_der" value=""></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_3" title="Enviar eje 3"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="pesaje_eje_4">
                                                <span class="eje-num">4</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_pesaje_eje_4_izq" value=""></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_pesaje_eje_4_der" value=""></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_4" title="Enviar eje 4"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="pesaje_eje_5">
                                                <span class="eje-num">5</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_pesaje_eje_5_izq" value=""></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_pesaje_eje_5_der" value=""></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_5" title="Enviar eje 5"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ════════════ FUERZAS ════════════ -->
                                    <div class="seccion" style="--accent: var(--fuerza); --accent-bg: var(--fuerza-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-disc-fill"></i></span>
                                            <h6>Fuerzas</h6>
                                            <span class="seccion-sub">5 ejes</span>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip" data-grupo="freno_eje_1">
                                                <span class="eje-num">1</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_freno_eje_1_izq" value="157"></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_freno_eje_1_der" value="176"></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_1" title="Enviar eje 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="freno_eje_2">
                                                <span class="eje-num">2</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_freno_eje_2_izq" value="147"></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_freno_eje_2_der" value="137"></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_2" title="Enviar eje 2"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="freno_eje_3">
                                                <span class="eje-num">3</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_freno_eje_3_izq" value=""></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_freno_eje_3_der" value=""></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_3" title="Enviar eje 3"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="freno_eje_4">
                                                <span class="eje-num">4</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_freno_eje_4_izq" value=""></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_freno_eje_4_der" value=""></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_4" title="Enviar eje 4"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-grupo="freno_eje_5">
                                                <span class="eje-num">5</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_freno_eje_5_izq" value=""></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_freno_eje_5_der" value=""></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_5" title="Enviar eje 5"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ════════════ ACCIÓN: DATO TOMADO (combina Peso + Fuerza, un solo botón) ════════════ -->
                                    <div class="accion-dato-tomado">
                                        <div class="accion-dato-tomado-info">
                                            <i class="bi bi-info-circle"></i>
                                            <span>Envía Peso y Fuerza juntos al tablero</span>
                                        </div>
                                        <button class="btn-dato-tomado" id="btnDatoTomadoGeneral">
                                            <i class="bi bi-check-circle"></i> Dato tomado
                                        </button>
                                    </div>

                                    <!-- ════════════ FUERZAS AUXILIARES (sin backend todavía) ════════════ -->
                                    <div class="seccion" style="--accent: var(--aux); --accent-bg: var(--aux-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-lightning-charge-fill"></i></span>
                                            <h6>Fuerzas auxiliares</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip" data-grupo="fuerza_aux">
                                                <span class="eje-num"><i class="bi bi-plus-lg" style="font-size:.65rem;"></i></span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input"><label>Iz</label><input type="number" id="sim_fuerza_aux_izq" value="145"></div>
                                                    <div class="eje-input"><label>Dr</label><input type="number" id="sim_fuerza_aux_der" value="146"></div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="fuerza_aux" title="Enviar"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>



                                    <!-- ════════════ DESEQUILIBRIOS (solo lectura, sin backend todavía) ════════════ -->
                                    <div class="seccion">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono" style="background-color:#F3F4F6; color:#6B7280;"><i class="bi bi-exclamation-diamond"></i></span>
                                            <h6>Desequilibrios</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="stat-chip"><label>Eje 1</label><input type="number" id="sim_desequilibrio_eje_1" disabled></div>
                                            <div class="stat-chip"><label>Eje 2</label><input type="number" id="sim_desequilibrio_eje_2" disabled></div>
                                            <div class="stat-chip"><label>Eje 3</label><input type="number" id="sim_desequilibrio_eje_3" disabled></div>
                                            <div class="stat-chip"><label>Eje 4</label><input type="number" id="sim_desequilibrio_eje_4" disabled></div>
                                            <div class="stat-chip"><label>Eje 5</label><input type="number" id="sim_desequilibrio_eje_5" disabled></div>
                                        </div>
                                    </div>

                                    <!-- ════════════ EFICACIAS ════════════ -->
                                    <div class="seccion">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono" style="background-color:#F3F4F6; color:#6B7280;"><i class="bi bi-graph-up-arrow"></i></span>
                                            <h6>Eficacias</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="stat-chip"><label>Efic. auxiliar</label><input type="number" id="sim_eficaciaauxiliar" disabled></div>
                                            <div class="stat-chip"><label>Efic. total</label><input type="number" id="sim_eficaciatotal" disabled></div>
                                        </div>
                                    </div>

                                    <!-- Barra de acciones -->
                                    <div class="barra-acciones d-flex flex-wrap gap-2 justify-content-center">

                                        <button class="btn btn-outline-secondary rounded-pill px-4" id="btnCalcularDataSim">
                                            <i class="bi bi-calculator me-1"></i> Calcular datos
                                        </button>
                                        <!-- <button class="btn btn-outline-warning rounded-pill px-4" id="btnCorregirPlaca">
                                            <i class="bi bi-wrench-adjustable me-1"></i> Corregir placa
                                        </button>
                                    </div> -->

                                    </div>
                                </div>



                                <!-- Valor de Ruido -->

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
    document.addEventListener('DOMContentLoaded', function() {
    inicializarBusquedaDatos(7, function(res) {
        if (res.observacion.trim() == 'Frenos eje 1 izquierdo' || res.observacion.trim() == 'Frenos eje 1 Izquierdo')
            $("#sim_freno_eje_1_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 1 derecho' || res.observacion.trim() == 'Frenos eje 1 Derecho')
            $("#sim_freno_eje_1_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 2 izquierdo' || res.observacion.trim() == 'Frenos eje 2 Izquierdo')
            $("#sim_freno_eje_2_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 2 derecho' || res.observacion.trim() == 'Frenos eje 2 Derecho')
            $("#sim_freno_eje_2_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 3 izquierdo' || res.observacion.trim() == 'Frenos eje 3 Izquierdo')
            $("#sim_freno_eje_3_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 3 derecho' || res.observacion.trim() == 'Frenos eje 3 Derecho')
            $("#sim_freno_eje_3_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 4 izquierdo' || res.observacion.trim() == 'Frenos eje 4 Izquierdo')
            $("#sim_freno_eje_4_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 4 derecho' || res.observacion.trim() == 'Frenos eje 4 Derecho')
            $("#sim_freno_eje_4_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 5 izquierdo' || res.observacion.trim() == 'Frenos eje 5 Izquierdo')
            $("#sim_freno_eje_5_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'Frenos eje 5 derecho' || res.observacion.trim() == 'Frenos eje 5 Derecho')
            $("#sim_freno_eje_5_der").val(Math.floor(res.valor / 9.81));

        if (res.observacion == 'Pesaje eje 1 izquierdo' || res.observacion == 'Pesaje eje 1 Izquierdo')
            $("#sim_pesaje_eje_1_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 1 derecho' || res.observacion == 'Pesaje eje 1 Derecho')
            $("#sim_pesaje_eje_1_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 2 izquierdo' || res.observacion == 'Pesaje eje 2 Izquierdo')
            $("#sim_pesaje_eje_2_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 2 derecho' || res.observacion == 'Pesaje eje 2 Derecho')
            $("#sim_pesaje_eje_2_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 3 izquierdo' || res.observacion == 'Pesaje eje 3 Izquierdo')
            $("#sim_pesaje_eje_3_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 3 derecho' || res.observacion == 'Pesaje eje 3 Derecho')
            $("#sim_pesaje_eje_3_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 4 izquierdo' || res.observacion == 'Pesaje eje 4 Izquierdo')
            $("#sim_pesaje_eje_4_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 4 derecho' || res.observacion == 'Pesaje eje 4 Derecho')
            $("#sim_pesaje_eje_4_der").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 5 izquierdo' || res.observacion == 'Pesaje eje 5 Izquierdo')
            $("#sim_pesaje_eje_5_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion == 'Pesaje eje 5 derecho' || res.observacion == 'Pesaje eje 5 Derecho')
            $("#sim_pesaje_eje_5_der").val(Math.floor(res.valor / 9.81));

        if (res.observacion.trim() == 'FrenoAuxs eje 2 izquierdo' || res.observacion.trim() == 'FrenoAuxs eje 2 Izquierdo' || res.observacion.trim() == 'FrenoAuxs eje 7 izquierdo')
            $("#sim_fuerza_aux_izq").val(Math.floor(res.valor / 9.81));
        if (res.observacion.trim() == 'FrenoAuxs eje 2 derecho' || res.observacion.trim() == 'FrenoAuxs eje 2 Derecho' || res.observacion.trim() == 'FrenoAuxs eje 7 derecho')
            $("#sim_fuerza_aux_der").val(Math.floor(res.valor / 9.81));

        $("#btnCalcularDataSim").trigger("click");
    });
    });
</script>

<script>
    // ─── Estado global ────────────────────────────────────────────────────────────
    let simuladorConectadoFrenoMotos = false;
    let estadoPruebaFrenometro = 2;
    let tipoprueba = "frenomotos";
    let pruebainiciadaFrenoMotos = false;

    // ─── Conectar Frenometro ─────────────────────────────────
    // NOTA: la versión original validaba contra ids como "#sim_pesaje_eje_1" y
    // "#sim_freno_eje_1", que no existen en el HTML (los reales llevan sufijo
    // _izq / _der). Se corrigió para validar contra el lado derecho del eje 1
    // de pesaje y los lados derechos de freno eje 1 y 2, que es lo más cercano
    // a la intención original. Ajusta esta validación si necesitas otra regla.
    function conectarfrenometro() {
        Toast.fire({
            icon: "info",
            title: "Conectando...",
            text: "Iniciando comunicación, por favor espere.",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });
        const sim_pesaje_eje_1_der = parseFloat($('#sim_pesaje_eje_1_der').val());
        const sim_freno_eje_1_der = parseFloat($('#sim_freno_eje_1_der').val());
        const sim_freno_eje_2_der = parseFloat($('#sim_freno_eje_2_der').val());

        if (isNaN(sim_pesaje_eje_1_der) || isNaN(sim_freno_eje_1_der) || isNaN(sim_freno_eje_2_der)) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ Campos incompletos",
                text: "Complete los datos de fuerza y peso"
            });
            return;
        }

        enviarDatosConexionFrenoMotos({
            _token: $('#csrf_tokenSonometro').val()
        });

    }


    // ─── Enviar datos al tablero ──────────────────────────────────────────────────
    async function enviarDatosConexionFrenoMotos() {
        const data = obtenerIPsLinea('livianos');
        // "Data reles" es obligatorio para iniciar el freno: si falta se avisa y se vuelve a pedir al recargar
        if (data.datareles === undefined || data.datareles === '') {
            avisarFaltaConfigPista('livianos', 'Data reles');
            return null;
        }
        var datos = {
            datareles: data.datareles
        }

        return enviarDatosAlTableroGenerico('frenomixto', 'iniciar-freno', datos, {
            onExito: () => {
                conectarfrenometro = true;
                setBotonesConectadoFrenoMotos(true);
            },
            onDesconectado: () => setDesconectadoFrenoMotos()
        });
    }


    // ─── Enviar el valor de un eje individual al tablero ─────────────────────────
    // "valores" llega como { der, izq } para chips dobles (Pesaje/Fuerza/Aux)
    // o { valor } para chips de un solo valor (Alineación).
    function enviarDatofrenometro(eje, valores) {
        const configBascula = obtenerPrimeraConfig('livianos', 'bascula');
        const configFreno = obtenerPrimeraConfig('livianos', 'freno');
        const configAlineacion = obtenerPrimeraConfig('livianos', 'alineador'); // solo se usa en alineación
        const configSuspension = obtenerPrimeraConfig('livianos', 'suspension'); // solo pesa vehículos livianos

        // console.log(eje, valores)

        // Validamos que exista la configuración de báscula y frenómetro
        if (!configBascula || !configFreno) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ SIN INFORMACIÓN",
                text: "No se encontró la configuración de livianos_bascula / livianos_freno, comuniquese con el administrador del sistema.",
                timer: 6000
            });
            return;
        }

        // Pesado solo si el usuario lo marcó. Sin nada guardado (primer uso) es liviano, igual que el select.
        const vehiculoPesado = localStorage.getItem("vehiculopesado") == "SI";

        // dato de informacion de bascula
        let canalbasculaDER = "";
        let divisorbasculaDER = "";
        let canalbasculaIZQ = "";
        let divisorbasculaIZQ = "";
        if (!vehiculoPesado) {
            // El vehículo liviano se pesa en la suspensión; si no hay configuración queda vacío y el pesaje avisa
            if (configSuspension) {
                canalbasculaDER = configSuspension.canalEntradaAnalogicaDERSus;
                divisorbasculaDER = configSuspension.divisorDERSus;
                canalbasculaIZQ = configSuspension.canalEntradaAnalogicaIZQSus;
                divisorbasculaIZQ = configSuspension.divisorIZQSus;
            }
        } else {
            canalbasculaDER = configBascula.canalEntradaAnalogicaDER0Bas;
            divisorbasculaDER = configBascula.divisorDER0Bas;
            canalbasculaIZQ = configBascula.canalEntradaAnalogicaIZQ0Bas;
            divisorbasculaIZQ = configBascula.divisorIZQ0Bas;
        }




        // configuracion de frenos
        const canalfrenoDER = configFreno.canalEntradaAnalogicaDER0;
        let divisorfrenoDER = "";
        const canalfrenoIZQ = configFreno.canalEntradaAnalogicaIZQ0;
        let divisorfrenoIZQ = "";

        if (!vehiculoPesado) {
            divisorfrenoDER = configFreno.divisorEntradaLivianoDER0;
            divisorfrenoIZQ = configFreno.divisorEntradaLivianoIZQ0;
        } else {
            divisorfrenoDER = configFreno.divisorEntradaPesadoDER0;
            divisorfrenoIZQ = configFreno.divisorEntradaPesadoIZQ0;
        }

        switch (eje) {
            case 'pesaje_eje_1':
            case 'pesaje_eje_2':
            case 'pesaje_eje_3':
            case 'pesaje_eje_4':
            case 'pesaje_eje_5': {
                // El tablero solo tiene configurado un canal (DER) por ahora,
                // así que usamos el valor derecho del chip como referencia.

                if (!canalbasculaDER || !canalbasculaIZQ) {
                    Toast.fire({
                        icon: "warning",
                        title: "⚠️ SIN INFORMACIÓN",
                        text: `No se encontró la configuración de ${vehiculoPesado ? 'báscula' : 'suspensión'} para pesar, comuniquese con el administrador del sistema.`,
                        timer: 6000
                    });
                    break;
                }

                let valorpesoderecho = "";
                if (divisorbasculaDER === "0" || divisorbasculaIZQ === "0") {
                    valorpesoderecho = valores.der;
                } else {
                    valorpesoderecho = valores.der / divisorbasculaDER;
                }
                let valorpesoizquiero = "";
                if (divisorbasculaIZQ === "0") {
                    valorpesoizquiero = valores.izq;
                } else {
                    valorpesoizquiero = valores.izq / divisorbasculaIZQ;
                }
                enviarDatosAlTableroFrenoMotos('recibir-peso', {
                    celdapesoizquierda: canalbasculaIZQ,
                    celdapesoderecha: canalbasculaDER,
                    valpesoizquiero: valorpesoizquiero,
                    valpesoderecho: valorpesoderecho
                });
                break;
            }

            case 'freno_eje_1':
            case 'freno_eje_2':
            case 'freno_eje_3':
            case 'freno_eje_4':
            case 'freno_eje_5':
            case 'fuerza_aux': {
                let valorfrenoderecho = ""
                if (divisorfrenoDER === "0" || divisorfrenoIZQ === "0") {
                    valorfrenoderecho = valores.der;
                } else {
                    valorfrenoderecho = valores.der / divisorfrenoDER;
                }

                let valorfrenoizquierdo = "";
                if (divisorfrenoDER === "0" || divisorfrenoIZQ === "0") {
                    valorfrenoizquierdo = valores.izq;
                } else {
                    valorfrenoizquierdo = valores.izq / divisorfrenoIZQ;
                }
                enviarDatosAlTableroFrenoMotos('recibir-fuerza', {
                    celdafuerzaizquierda: canalfrenoIZQ,
                    celdafuerzaderecha: canalfrenoDER,
                    valfuerzaderecha: valorfrenoderecho,
                    valfuerzaizquierda: valorfrenoizquierdo
                });
                break;
            }
            case 'alineacion_eje_1':
            case 'alineacion_eje_2':
            case 'alineacion_eje_3':
            case 'alineacion_eje_4':
            case 'alineacion_eje_5':
                if (!configAlineacion) {
                    Toast.fire({
                        icon: "warning",
                        title: "⚠️ SIN INFORMACIÓN",
                        text: "No se encontró la configuración del alineador (livianos_alineador), comuniquese con el administrador del sistema.",
                        timer: 6000
                    });
                    break;
                }
                const valorDeseado = valores.valor; // ← era valores.der, debe ser valores.valor
                const puntoCero = parseFloat(configAlineacion.puntoCeroCalibracion);
                const divisor = parseFloat(configAlineacion.divisorEntrada);
                const gananciaNeg = parseFloat(configAlineacion.gananciaValoresNegativos);
                const gananciaPos = parseFloat(configAlineacion.gananciaValoresPositivos);
                const ganancia = parseFloat(valorDeseado) < 0 ? gananciaNeg : gananciaPos;
                const valorAEnviar = (parseFloat(valorDeseado) / ganancia) * divisor + puntoCero;

                // Convertir a complemento a dos si es negativo (para Modbus uint16)
                const valorModbus = valorAEnviar < 0 ?
                    (65536 + Math.round(valorAEnviar)) // complemento a dos
                    :
                    Math.round(valorAEnviar);



                enviarDatosAlTableroFrenoMotos('recibir-alineacion', {
                    datoalineacion: valorAEnviar,
                });
                break;

            default:
                console.warn(`Grupo desconocido en enviarDatofrenometro: ${eje}`);
                break;
        }
    }


    // ─── Enviar datos al tablero de frenos ──────────────────────────────────────────────────
    async function enviarDatosAlTableroFrenoMotos(url, datos) {
        return enviarDatosAlTableroGenerico('frenomixto', url, datos, {
            onExito: () => {
                conectarfrenometro = true;
                setBotonesConectadoFrenoMotos(true);
            },
            onDesconectado: () => setDesconectadoFrenoMotos()
        });
    }


    // ─── DatoTomado (combina Peso + Fuerza, un único envío) ──────────────────────
    async function datocapturado() {
        const configBascula = obtenerPrimeraConfig('livianos', 'bascula');
        const configFreno = obtenerPrimeraConfig('livianos', 'freno');

        if (!configBascula || !configFreno) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ SIN INFORMACIÓN",
                text: "No se encontró la configuración de livianos_bascula / livianos_freno, comuniquese con el administrador del sistema.",
                timer: 6000
            });
            return;
        }

        // dato de informacion de bascula
        const canalbasculaDER = configBascula.canalEntradaAnalogicaDER0Bas;
        const canalbasculaIZQ = configBascula.canalEntradaAnalogicaIZQ0Bas;



        // configuracion de frenos
        const canalfrenoDER = configFreno.canalEntradaAnalogicaDER0;
        const canalfrenoIZQ = configFreno.canalEntradaAnalogicaIZQ0;

        try {
            const response = await fetch(`${URL_BASE}frenomixto/dato-tomado`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('#csrf_tokenSonometro').val(),
                    celdapesoizquierda: canalbasculaIZQ,
                    celdapesoderecha: canalbasculaDER,
                    celdafuerzaizquierda: canalfrenoIZQ,
                    celdafuerzaderecha: canalfrenoDER
                })
            });

            const resultado = await parsearRespuestaTablero(response);
            conectarfrenometro = true;
            setEstadoBadge(true);
            setBotonesConectadoFrenoMotos(true);

            Toast.fire({
                icon: "success",
                title: "✅ Datos enviados",
                text: resultado.escritos ?
                    `Registros escritos: ${resultado.escritos}` : "Los valores fueron enviados al tablero"
            });

            return resultado;

        } catch (error) {
            console.log(error)
            if (error.tipo === 'modbus') {
                setDesconectadoFrenoMotos();
                Toast.fire({
                    icon: "warning",
                    title: "⚠️ Conexión perdida",
                    text: "Reconecte al tablero antes de continuar",
                    timer: 6000
                });
            }
            mostrarErrorTablero(error, 'enviarDatos');
            return null;
        }
    }


    // ─── Desconectar ──────────────────────────────────────────────────────────────
    function desconectarSimuladorFrenoMotos() {
        const data = obtenerIPsLinea('livianos');
        
        // console.log(data.datareles)
        var datos = {
            datareles: data.datareles,
            dataalineador: data.dataalineador,
            tipopista: data.tipopista,
            _token: $('#csrf_tokenSonometro').val()
        }
        Toast.fire({
            icon: "info",
            title: "Desconectando...",
            text: "Deteniendo la comunicacióndel frenometro",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });

        fetch(`${URL_BASE}frenomixto/detener-escritura`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datos)
            })
            .catch(() => {
                /* el servidor puede no responder al cerrar */
            })
            .finally(() => {
                setDesconectadoFrenoMotos();
                Toast.fire({
                    icon: "info",
                    title: "🔌 Desconectado del tablero",
                    text: "La conexión se ha cerrado"
                });
            });
    }




    ///calcular datos

    $("#btnCalcularDataSim").click(function(ev) {
        ev.preventDefault()
        document.getElementById("btn-guardar").disabled = false;
        var sumFuerza = parseFloat($("#sim_freno_eje_1_der").val()) + parseFloat($("#sim_freno_eje_1_izq").val()) + parseFloat($(
            "#sim_freno_eje_2_der").val()) + parseFloat($("#sim_freno_eje_2_izq").val())
        var peso = parseFloat($("#sim_pesaje_eje_1_der").val()) + parseFloat($("#sim_pesaje_eje_1_izq").val()) + parseFloat($(
            "#sim_pesaje_eje_2_der").val()) + parseFloat($("#sim_pesaje_eje_2_izq").val())
        if ($("#sim_pesaje_eje_3_der").val() !== "" || $("#sim_pesaje_eje_3_izq").val() !== "") {
            peso = peso + (parseFloat($("#sim_pesaje_eje_3_der").val()) + parseFloat($("#sim_pesaje_eje_3_izq").val()))
        }
        if ($("#sim_pesaje_eje_4_der").val() !== "" || $("#sim_pesaje_eje_4_izq").val() !== "") {
            peso = peso + (parseFloat($("#sim_pesaje_eje_4_der").val()) + parseFloat($("#sim_pesaje_eje_4_izq").val()))
        }
        if ($("#sim_pesaje_eje_5_der").val() !== "" || $("#sim_pesaje_eje_5_izq").val() !== "") {
            peso = peso + (parseFloat($("#sim_pesaje_eje_5_der").val()) + parseFloat($("#sim_pesaje_eje_5_izq").val()))
        }
        var auxiliar = parseFloat($("#sim_fuerza_aux_der").val()) + parseFloat($("#sim_fuerza_aux_izq").val())
        if (parseFloat($("#sim_freno_eje_1_der").val()) > parseFloat($("#sim_freno_eje_1_izq").val())) {
            var des1f = parseFloat($("#sim_freno_eje_1_der").val()) - parseFloat($("#sim_freno_eje_1_izq").val())
            des1f = ((des1f / parseFloat($("#sim_freno_eje_1_der").val())) * 100)
            $("#sim_desequilibrio_eje_1").val(des1f.toFixed(2))
            $("#sim_desequilibrio_eje_1_").val(des1f.toFixed(2))
            validarRango(des1f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_1')
        } else {
            var des1f = parseFloat($("#sim_freno_eje_1_izq").val()) - parseFloat($("#sim_freno_eje_1_der").val())
            des1f = ((des1f / parseFloat($("#sim_freno_eje_1_izq").val())) * 100)
            $("#sim_desequilibrio_eje_1").val(des1f.toFixed(2))
            $("#sim_desequilibrio_eje_1_").val(des1f.toFixed(2))
            validarRango(des1f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_1')
        }

        if (parseFloat($("#sim_freno_eje_2_der").val()) > parseFloat($("#sim_freno_eje_2_izq").val())) {
            var des2f = parseFloat($("#sim_freno_eje_2_der").val()) - parseFloat($("#sim_freno_eje_2_izq").val())
            des2f = ((des2f / parseFloat($("#sim_freno_eje_2_der").val())) * 100);
            $("#sim_desequilibrio_eje_2").val(des2f.toFixed(2))
            $("#sim_desequilibrio_eje_2_").val(des2f.toFixed(2))
            validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_2')
        } else {
            var des2f = parseFloat($("#sim_freno_eje_2_izq").val()) - parseFloat($("#sim_freno_eje_2_der").val())
            des2f = ((des2f / parseFloat($("#sim_freno_eje_2_izq").val())) * 100);
            $("#sim_desequilibrio_eje_2").val(des2f.toFixed(2))
            $("#sim_desequilibrio_eje_2_").val(des2f.toFixed(2))
            validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_2')
        }
        if ($("#sim_freno_eje_3_der").val() !== "" || $("#sim_freno_eje_3_izq").val() !== "") {
            sumFuerza = sumFuerza + (parseFloat($("#sim_freno_eje_3_der").val()) + parseFloat($("#sim_freno_eje_3_izq").val()));
            if (parseFloat($("#sim_freno_eje_3_der").val()) > parseFloat($("#sim_freno_eje_3_izq").val())) {
                var des2f = parseFloat($("#sim_freno_eje_3_der").val()) - parseFloat($("#sim_freno_eje_3_izq").val())
                des2f = ((des2f / parseFloat($("#sim_freno_eje_3_der").val())) * 100);
                $("#sim_desequilibrio_eje_3").val(des2f.toFixed(2))
                $("#sim_desequilibrio_eje_3_").val(des2f.toFixed(2))
                validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_3')
            } else {
                var des2f = parseFloat($("#sim_freno_eje_3_izq").val()) - parseFloat($("#sim_freno_eje_3_der").val())
                des2f = ((des2f / parseFloat($("#sim_freno_eje_3_izq").val())) * 100);
                $("#sim_desequilibrio_eje_3").val(des2f.toFixed(2))
                $("#sim_desequilibrio_eje_3_").val(des2f.toFixed(2))
                validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_3')
            }
        }
        if ($("#sim_freno_eje_4_der").val() !== "" || $("#sim_freno_eje_4_izq").val() !== "") {
            sumFuerza = sumFuerza + (parseFloat($("#sim_freno_eje_4_der").val()) + parseFloat($("#sim_freno_eje_4_izq").val()));
            if (parseFloat($("#sim_freno_eje_4_der").val()) > parseFloat($("#sim_freno_eje_4_izq").val())) {
                var des2f = parseFloat($("#sim_freno_eje_4_der").val()) - parseFloat($("#sim_freno_eje_4_izq").val())
                des2f = ((des2f / parseFloat($("#sim_freno_eje_4_der").val())) * 100)
                $("#sim_desequilibrio_eje_4").val(des2f.toFixed(2))
                $("#sim_desequilibrio_eje_4_").val(des2f.toFixed(2))
                validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_4')
            } else {
                var des2f = parseFloat($("#sim_freno_eje_4_izq").val()) - parseFloat($("#sim_freno_eje_4_der").val())
                des2f = ((des2f / parseFloat($("#sim_freno_eje_4_izq").val())) * 100)
                $("#sim_desequilibrio_eje_4").val(des2f.toFixed(2))
                $("#sim_desequilibrio_eje_4_").val(des2f.toFixed(2))
                validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_4')
            }
        }

        if ($("#sim_freno_eje_5_der").val() !== "" || $("#sim_freno_eje_5_izq").val() !== "") {
            sumFuerza = sumFuerza + (parseFloat($("#sim_freno_eje_5_der").val()) + parseFloat($("#sim_freno_eje_5_izq").val()));
            if (parseFloat($("#sim_freno_eje_5_der").val()) > parseFloat($("#sim_freno_eje_5_izq").val())) {
                var des2f = parseFloat($("#sim_freno_eje_5_der").val()) - parseFloat($("#sim_freno_eje_5_izq").val())
                des2f = ((des2f / parseFloat($("#sim_freno_eje_5_der").val())) * 100)
                $("#sim_desequilibrio_eje_5").val(des2f.toFixed(2))
                $("#sim_desequilibrio_eje_5_").val(des2f.toFixed(2))
                validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_5')
            } else {
                var des2f = parseFloat($("#sim_freno_eje_5_izq").val()) - parseFloat($("#sim_freno_eje_5_der").val())
                des2f = ((des2f / parseFloat($("#sim_freno_eje_5_izq").val())) * 100)
                $("#sim_desequilibrio_eje_5").val(des2f.toFixed(2))
                $("#sim_desequilibrio_eje_5_").val(des2f.toFixed(2))
                validarRango(des2f.toFixed(2), 'frenos', 'sim_desequilibrio_eje_5')
            }
        }

        var eficatotal = ((sumFuerza / peso) * 100)
        eficatotal = ((eficatotal * 100) / 100);
        $("#sim_eficaciatotal").val(eficatotal.toFixed(2));
        $("#sim_eficaciatotal_").val(eficatotal.toFixed(2));
        validarRango(eficatotal.toFixed(2), 'frenos', 'sim_eficaciatotal')
        var sim_eficaciaauxiliar = ((auxiliar / peso) * 100)
        sim_eficaciaauxiliar = ((sim_eficaciaauxiliar * 100) / 100);
        $("#sim_eficaciaauxiliar").val(sim_eficaciaauxiliar.toFixed(2));
        $("#sim_eficaciaauxiliar_").val(sim_eficaciaauxiliar.toFixed(2));
        validarRango(sim_eficaciaauxiliar.toFixed(2), 'frenos', 'sim_eficaciaauxiliar')
        Toast.fire({
            icon: "info",
            text: "Este valor representa un promedio calculado, debido a que durante el transcurso de la prueba se aplican variaciones dinámicas para simular un comportamiento en tiempo real.",
            timer: 6500
        });

    })




    function setBotonesConectadoFrenoMotos(conectado) {
        $('#btnConectarSimuladorFrenoMotos').prop('disabled', conectado);
        $('.btn-enviar').prop('disabled', !conectado);
        $('#btnDatoTomadoGeneral').prop('disabled', !conectado);
        $('#btnDesconectarSimuladorFrenoMotos').prop('disabled', !conectado);

    }

    // ─── Event Listeners ──────────────────────────────────────────────────────────
    $('#btnConectarSimuladorFrenoMotos').on('click', conectarfrenometro);
    $('#btnDesconectarSimuladorFrenoMotos').on('click', desconectarSimuladorFrenoMotos);

    // ─── Init ─────────────────────────────────────────────────────────────────────
    $(document).ready(function() {
        setBotonesConectadoFrenoMotos(false);
    });



    function setDesconectadoFrenoMotos() {
        simuladorConectadoFrenoMotos = false;
        setEstadoBadge(false);
        setBotonesConectadoFrenoMotos(false);
    }
</script>


<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ─── Botones "Enviar" por eje ──────────────────────────────────────────
        // Antes buscaba `.closest('.row')` + `.form-control`, que no existen en
        // esta estructura (es `.eje-chip` con inputs sin clase). Ahora lee
        // directamente del chip correcto según su tipo: chip "solo" (un valor,
        // Alineación) o chip con `.eje-inputs` (Izq/Der: Pesaje, Fuerza, Aux).
        document.querySelectorAll('.btn-enviar').forEach(button => {
            button.addEventListener('click', function() {
                const grupo = this.dataset.grupo;
                const chip = this.closest('.eje-chip');
                console.log("chip", chip)

                if (!chip) {
                    console.warn(`No se encontró el chip para el grupo "${grupo}"`);
                    return;
                }

                // Chip de un solo valor (Alineación)
                if (chip.classList.contains('solo')) {
                    const input = chip.querySelector('input[type="number"]');
                    const valor = input ? input.value : '';



                    if (valor === '') {
                        Toast.fire({
                            icon: 'warning',
                            title: '⚠️ Campo vacío',
                            text: 'Ingrese un valor antes de enviar'
                        });
                        return;
                    }

                    enviarDatofrenometro(grupo, {
                        valor: parseFloat(valor)
                    });
                    marcarEnviado(this);
                    return;
                }

                // Chip de doble valor (Pesaje / Fuerzas / Aux)
                const inputIzq = chip.querySelector('input[id$="_izq"]');
                const inputDer = chip.querySelector('input[id$="_der"]');
                const izq = inputIzq ? inputIzq.value : '';
                const der = inputDer ? inputDer.value : '';

                if (izq === '' || der === '') {
                    Toast.fire({
                        icon: 'warning',
                        title: '⚠️ Campos incompletos',
                        text: 'Complete Izquierda y Derecha antes de enviar'
                    });
                    return;
                }

                enviarDatofrenometro(grupo, {
                    izq: parseFloat(izq),
                    der: parseFloat(der)
                });
                marcarEnviado(this);
            });
        });

        // Pequeña confirmación visual en el botón de eje sin perder su clase base
        function marcarEnviado(btn) {
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
            btn.classList.add('enviado');

            setTimeout(() => {
                btn.innerHTML = original;
                btn.classList.remove('enviado');
            }, 1500);
        }

        // ─── Botón "Dato tomado" (combina Peso + Fuerza) ───────────────────────
        document.getElementById('btnDatoTomadoGeneral').addEventListener('click', function() {

            datocapturado();

            const btn = this;
            btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> ¡Tomado!';
            btn.classList.add('confirmado');

            setTimeout(() => {
                btn.innerHTML = '<i class="bi bi-check-circle"></i> Dato tomado';
                btn.classList.remove('confirmado');
            }, 2000);
        });


    });
</script>
