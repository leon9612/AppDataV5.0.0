<style>
    /* Solo variables de acento y overrides de ancho: el resto de
       .panel-pruebas-pro vive en public/assets/css/panel-pruebas.css */
    .panel-pruebas-pro {
        --distancia: #4361EE;
        --distancia-bg: #EEF1FD;
        --eje-chip-width: 185px;
    }
</style>

<div class="container">
    <div class="section-title">
        <h2>{{ $nombreprueba }}</h2>
    </div>
    <div class="row" data-aos="fade-in">
        <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">
            <div class="accordion w-100" id="accordionSimuladorTaximetro">
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#collapseConexionSimuladorTaximetro"
                            aria-expanded="true">
                            🔌 Simulador De Pruebas
                        </button>
                    </h2>
                    <div id="collapseConexionSimuladorTaximetro"
                        class="accordion-collapse collapse show"
                        data-bs-parent="#accordionSimuladorTaximetro">
                        <div class="accordion-body">

                            <!-- ── Estado y botones de conexión ── -->
                            <div class="row">
                                <x-conexion-simulador
                                    id-conectar="btnConectarSimuladorTaximetro"
                                    id-desconectar="btnDesconectarSimuladorTaximetro"
                                    id-csrf="csrf_tokenTaximetro" />
                            </div>

                            <!-- ── Panel de datos ── -->
                            <div class="col-12 mb-4">
                                <div class="card panel-pruebas-pro border-0 shadow-sm rounded-4 overflow-hidden">

                                    <div class="card-header py-3 px-4 d-flex align-items-center gap-2">
                                        <i class="bi bi-database text-dark"></i>
                                        <h5 class="mb-0 fw-bold" style="font-size:1rem;">Datos de la prueba</h5>
                                    </div>

                                    <!-- ════ DISTANCIAS (4 tomas) ════ -->
                                    <div class="seccion"
                                        style="--accent: var(--distancia); --accent-bg: var(--distancia-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono">
                                                <i class="bi bi-rulers"></i>
                                            </span>
                                            <h6>Distancias</h6>
                                            <span class="seccion-sub">4 tomas</span>
                                        </div>
                                        <div class="fila-chips">

                                            <!-- Toma 1 -->
                                            <div class="eje-chip" data-grupo="distancia_toma_1">
                                                <span class="eje-num">1</span>
                                                <div class="eje-input">
                                                    <label for="taximetro_distanciatoma1">Valor</label>
                                                    <input type="number"
                                                        id="taximetro_distanciatoma1"
                                                        placeholder="0.00"
                                                        value="">
                                                </div>
                                                <button class="eje-send btn-enviar-taximetro"
                                                    data-grupo="distancia_toma_1"
                                                    title="Enviar toma 1">
                                                    <i class="bi bi-arrow-up-circle-fill"></i>
                                                </button>
                                            </div>

                                            <!-- Toma 2 -->
                                            <div class="eje-chip" data-grupo="distancia_toma_2">
                                                <span class="eje-num">2</span>
                                                <div class="eje-input">
                                                    <label for="taximetro_distanciatoma2">Valor</label>
                                                    <input type="number"
                                                        id="taximetro_distanciatoma2"
                                                        placeholder="0.00"
                                                        value="">
                                                </div>
                                                <button class="eje-send btn-enviar-taximetro"
                                                    data-grupo="distancia_toma_2"
                                                    title="Enviar toma 2">
                                                    <i class="bi bi-arrow-up-circle-fill"></i>
                                                </button>
                                            </div>

                                            <!-- Toma 3 -->
                                            <div class="eje-chip" data-grupo="distancia_toma_3">
                                                <span class="eje-num">3</span>
                                                <div class="eje-input">
                                                    <label for="taximetro_distanciatoma3">Valor</label>
                                                    <input type="number"
                                                        id="taximetro_distanciatoma3"
                                                        placeholder="0.00"
                                                        value="">
                                                </div>
                                                <button class="eje-send btn-enviar-taximetro"
                                                    data-grupo="distancia_toma_3"
                                                    title="Enviar toma 3">
                                                    <i class="bi bi-arrow-up-circle-fill"></i>
                                                </button>
                                            </div>

                                            <!-- Toma 4 -->
                                            <div class="eje-chip" data-grupo="distancia_toma_4">
                                                <span class="eje-num">4</span>
                                                <div class="eje-input">
                                                    <label for="taximetro_distanciatoma4">Valor</label>
                                                    <input type="number"
                                                        id="taximetro_distanciatoma4"
                                                        placeholder="0.00"
                                                        value="">
                                                </div>
                                                <button class="eje-send btn-enviar-taximetro"
                                                    data-grupo="distancia_toma_4"
                                                    title="Enviar toma 4">
                                                    <i class="bi bi-arrow-up-circle-fill"></i>
                                                </button>
                                            </div>

                                        </div>
                                    </div>
                                    <div style="text-align: center; margin: 20px 0;">
                                        <button class="btn-dato-tomado" style="
        background-color: #2563eb; 
        color: white; 
        border: none; 
        padding: 12px 24px; 
        font-size: 16px; 
        font-weight: 600; 
        border-radius: 8px; 
        cursor: pointer; 
        box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        transition: all 0.2s ease;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        font-family: system-ui, -apple-system, sans-serif;" onclick="freneSeco()">
                                            <i class="bi bi-check-circle"></i> Frene en seco
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ─── Estado global ─────────────────────────────────────────────────────────
    let simuladorConectadoTaximetro = false;

    // ─── Conectar ──────────────────────────────────────────────────────────────
    function conectarTaximetro() {
        enviarDatosConexionTaximetro();
    }

    async function enviarDatosConexionTaximetro() {
        Toast.fire({
            icon: "info",
            title: "Conectando...",
            text: "Iniciando comunicación, por favor espere.",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });
        try {
            const response = await fetch(`${URL_BASE}taximetro/iniciar-taximetro`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            });

            const resultado = await parsearRespuestaTablero(response);
            simuladorConectadoTaximetro = true;
            setEstadoBadge(true);
            setBotonesConectadoTaximetro(true);

            Toast.fire({
                icon: 'success',
                title: '✅ Conectado',
                text: resultado.escritos ?
                    `Registros escritos: ${resultado.escritos}` : 'Conexión establecida con el tablero'
            });

            return resultado;

        } catch (error) {
            console.error(error);
            if (error.tipo === 'modbus') {
                setDesconectadoTaximetro();
                Toast.fire({
                    icon: 'warning',
                    title: '⚠️ Conexión perdida',
                    text: 'Reconecte al tablero antes de continuar',
                    timer: 6000
                });
            }
            mostrarErrorTablero(error, 'enviarDatos');
            return null;
        }
    }

    // ─── Enviar dato de una toma individual ───────────────────────────────────
    function enviarDatoTaximetro(grupo, valor) {
        enviarDatosAlTableroTaximetro('recibir-data', {
            datosdistancia: valor * 10,
            velocidad: 40
        });
    }

    // ─── Petición HTTP al backend ──────────────────────────────────────────────
    async function enviarDatosAlTableroTaximetro(url, datos) {
        return enviarDatosAlTableroGenerico('taximetro', url, datos, {
            onExito: () => {
                simuladorConectadoTaximetro = true;
                setBotonesConectadoTaximetro(true);
            },
            onDesconectado: () => setDesconectadoTaximetro()
        });
    }

    // ─── Desconectar ──────────────────────────────────────────────────────────
    function desconectarSimuladorTaximetro() {
        Toast.fire({
            icon: 'info',
            title: 'Desconectando...',
            text: 'Deteniendo la comunicación del taxímetro',
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });

        fetch(`${URL_BASE}taximetro/detener-escritura`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('#csrf_tokenTaximetro').val()
                })
            })
            .catch(() => {
                /* el servidor puede no responder */
            })
            .finally(() => {
                setDesconectadoTaximetro();
                Toast.fire({
                    icon: 'info',
                    title: '🔌 Desconectado del tablero',
                    text: 'La conexión se ha cerrado'
                });
            });
    }

    //frene seco
    async function freneSeco(url, datos) {
        try {
            const response = await fetch(`${URL_BASE}taximetro/frene-seco`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                // body: JSON.stringify(datos)
            });

            const resultado = await parsearRespuestaTablero(response);
            simuladorConectadoTaximetro = true;


            Toast.fire({
                icon: 'success',
                title: '✅ Datos enviados',
                text: resultado.escritos ?
                    `Registros escritos: ${resultado.escritos}` : 'Los valores fueron enviados al tablero'
            });

            return resultado;

        } catch (error) {
            console.error(error);
            if (error.tipo === 'modbus') {
                setDesconectadoTaximetro();
                Toast.fire({
                    icon: 'warning',
                    title: '⚠️ Conexión perdida',
                    text: 'Reconecte al tablero antes de continuar',
                    timer: 6000
                });
            }
            mostrarErrorTablero(error, 'enviarDatos');
            return null;
        }
    }


    // ─── Helpers UI ───────────────────────────────────────────────────────────
    function setBotonesConectadoTaximetro(conectado) {
        $('#btnConectarSimuladorTaximetro').prop('disabled', conectado);
        $('.btn-enviar-taximetro').prop('disabled', !conectado);
        $('#btnDesconectarSimuladorTaximetro').prop('disabled', !conectado);
    }


    function setDesconectadoTaximetro() {
        simuladorConectadoTaximetro = false;
        setEstadoBadge(false);
        setBotonesConectadoTaximetro(false);
    }

    // ─── Event Listeners ──────────────────────────────────────────────────────
    $('#btnConectarSimuladorTaximetro').on('click', conectarTaximetro);
    $('#btnDesconectarSimuladorTaximetro').on('click', desconectarSimuladorTaximetro);

    $(document).ready(function() {
        setBotonesConectadoTaximetro(false);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {

        // ── Buscar Datos: trae de la última prueba de la placa (idtipo_prueba 6)
        //    los campos del formulario (referencia llanta y errores) ────────────
        inicializarBusquedaDatos(6, function(res) {
            const es = (nombre) => res.observacion == nombre || res.tiporesultado == nombre;

            if (es('Rllanta')) {
                $("#ref_llanta").val(res.valor);
            }
            if (es('error_tiempo_nuevo')) {
                $("#err_tiempo").val(res.valor);
                validarRango(res.valor, 'taximetro', 'err_tiempo');
            }
            if (es('error_distancia_nuevo')) {
                $("#err_distancia").val(res.valor);
                validarRango(res.valor, 'taximetro', 'err_distancia');
            }
        });

        // ── Botones "Enviar" por toma ────────────────────────────────────────
        document.querySelectorAll('.btn-enviar-taximetro').forEach(button => {
            button.addEventListener('click', function() {
                const grupo = this.dataset.grupo;
                const chip = this.closest('.eje-chip');

                if (!chip) {
                    console.warn(`No se encontró el chip para el grupo "${grupo}"`);
                    return;
                }

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

                enviarDatoTaximetro(grupo, parseFloat(valor));
                marcarEnviadoTaximetro(this);
            });
        });

        function marcarEnviadoTaximetro(btn) {
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
            btn.classList.add('enviado');
            // setTimeout(() => {
            //     btn.innerHTML = original;
            //     btn.classList.remove('enviado');
            // }, 1500);
        }
    });
</script>