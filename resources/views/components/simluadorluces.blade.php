<style>
    /* Solo variables de acento de Luces. El resto de .panel-pruebas-pro vive en
       public/assets/css/panel-pruebas.css */
    .panel-pruebas-pro {
        --bajas: #4361EE;
        --bajas-bg: #EEF1FD;
        --altas: #F2542D;
        --altas-bg: #FDEEEA;
        --niebla: #0E9AA7;
        --niebla-bg: #E6F6F7;
    }
</style>

<div class="container">
    <div class="section-title">
        <h2>{{ $nombreprueba }}</h2>
    </div>
    <div class="row" data-aos="fade-in">
        <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">
            <div class="accordion w-100" id="accordionSimuladorLuces">
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseConexionSimuladorLuces" aria-expanded="true">
                            🔌 Simulador De Pruebas
                        </button>
                    </h2>
                    <div id="collapseConexionSimuladorLuces" class="accordion-collapse collapse show" data-bs-parent="#accordionSimuladorLuces">
                        <div class="accordion-body">
                            <div class="row">
                                <x-conexion-simulador
                                    id-conectar="btnConectarSimuladorLuces"
                                    id-desconectar="btnDesconectarSimuladorLuces"
                                    id-csrf="csrf_tokenLuces" />
                            </div>

                            <div class="col-12 mb-4">
                                <div class="card panel-pruebas-pro border-0 shadow-sm rounded-4 overflow-hidden">
                                    <div class="card-header py-3 px-4 d-flex flex-wrap align-items-center gap-2">
                                        <i class="bi bi-database text-dark"></i>
                                        <h5 class="mb-0 fw-bold" style="font-size:1rem;">Datos de la prueba</h5>
                                        <div class="ms-auto d-flex flex-wrap align-items-center gap-2">
                                            <!-- Modo de trama del luxómetro (debe coincidir con la configuración de la app) -->
                                            <label for="modoLuxometro" class="mb-0 small fw-semibold text-nowrap">Modo</label>
                                            <select id="modoLuxometro" class="form-select form-select-sm" style="width:auto;">
                                                <option value="default">Por defecto</option>
                                                <option value="combi2">Combi 2</option>
                                                <option value="tecmmas">Tecmmas</option>
                                                <option value="moon">Moon</option>
                                                <option value="capelec2serial">Capelec 2 serial</option>
                                                <option value="capelec2">Capelec 2 (ticket)</option>
                                                <option value="capelec">Capelec (archivo RES)</option>
                                            </select>
                                            <!-- Inclinación de las bajas: aleatoria o ingresada por toma -->
                                            <label for="modoInclinacion" class="mb-0 small fw-semibold text-nowrap">Inclinación</label>
                                            <select id="modoInclinacion" class="form-select form-select-sm" style="width:auto;">
                                                <option value="aleatoria">Aleatoria</option>
                                                <option value="manual">Manual</option>
                                            </select>
                                        </div>
                                    </div>

                                    <!-- ════════════ LUCES BAJAS ════════════ -->
                                    <div class="seccion" style="--accent: var(--bajas); --accent-bg: var(--bajas-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-brightness-low"></i></span>
                                            <h6>Luces Bajas</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip" data-tipo="baja" data-lado="derecha">
                                                <span class="eje-num">D</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input">
                                                        <label>Toma 1</label>
                                                        <input type="text" class="form-control form-control-sm" name="baja_derecha"
                                                            id="baja_derecha" placeholder="1" value="{{ old('baja_derecha') }}">
                                                        <input type="number" step="0.01" class="form-control form-control-sm input-inclinacion" id="baja_derecha_inc"
                                                            placeholder="Inc %" title="Inclinación (%)" style="display:none;">
                                                        @if ($errors->has('baja_derecha'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_derecha') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="text" class="form-control form-control-sm" name="baja_derecha_1"
                                                            id="baja_derecha_1" placeholder="1" value="{{ old('baja_derecha_1') }}">
                                                        <input type="number" step="0.01" class="form-control form-control-sm input-inclinacion" id="baja_derecha_1_inc"
                                                            placeholder="Inc %" title="Inclinación (%)" style="display:none;">
                                                        @if ($errors->has('baja_derecha_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_derecha_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="text" class="form-control form-control-sm" name="baja_derecha_2"
                                                            id="baja_derecha_2" placeholder="1" value="{{ old('baja_derecha_2') }}">
                                                        <input type="number" step="0.01" class="form-control form-control-sm input-inclinacion" id="baja_derecha_2_inc"
                                                            placeholder="Inc %" title="Inclinación (%)" style="display:none;">
                                                        @if ($errors->has('baja_derecha_2'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_derecha_2') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="baja_derecha" data-input="baja_derecha" title="Enviar Baja Derecha, toma 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-tipo="baja" data-lado="izquierda">
                                                <span class="eje-num">I</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input">
                                                        <label>Toma 1</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="baja_izquierda"
                                                            id="baja_izquierda" placeholder="1" value="{{ old('baja_izquierda') }}">
                                                        <input type="number" step="0.01" class="form-control form-control-sm input-inclinacion" id="baja_izquierda_inc"
                                                            placeholder="Inc %" title="Inclinación (%)" style="display:none;">
                                                        @if ($errors->has('baja_izquierda'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_izquierda') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="baja_izquierda_1"
                                                            id="baja_izquierda_1" placeholder="1" value="{{ old('baja_izquierda_1') }}">
                                                        <input type="number" step="0.01" class="form-control form-control-sm input-inclinacion" id="baja_izquierda_1_inc"
                                                            placeholder="Inc %" title="Inclinación (%)" style="display:none;">
                                                        @if ($errors->has('baja_izquierda_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_izquierda_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="baja_izquierda_2"
                                                            id="baja_izquierda_2" placeholder="1" value="{{ old('baja_izquierda_2') }}">
                                                        <input type="number" step="0.01" class="form-control form-control-sm input-inclinacion" id="baja_izquierda_2_inc"
                                                            placeholder="Inc %" title="Inclinación (%)" style="display:none;">
                                                        @if ($errors->has('baja_izquierda_2'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_izquierda_2') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="baja_izquierda" data-input="baja_izquierda" title="Enviar Baja Izquierda, toma 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                                <input type="hidden" id="tipovehiculo" value="{{ $tipovehiculo }}">
                                            </div>
                                        </div>
                                    </div>
                                    @if ($tipovehiculo !== 2)
                                    <!-- ════════════ LUCES ALTAS ════════════ -->
                                    <div class="seccion" style="--accent: var(--altas); --accent-bg: var(--altas-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-brightness-high"></i></span>
                                            <h6>Luces Altas</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip" data-tipo="alta" data-lado="derecha">
                                                <span class="eje-num">D</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input">
                                                        <label>Toma 1</label>
                                                        <input type="text" class="form-control form-control-sm" name="alta_derecha"
                                                            id="alta_derecha" placeholder="1" value="{{ old('alta_derecha') }}">
                                                        @if ($errors->has('alta_derecha'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('alta_derecha') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="text" class="form-control form-control-sm" name="alta_derecha_1"
                                                            id="alta_derecha_1" placeholder="1" value="{{ old('alta_derecha_1') }}">
                                                        @if ($errors->has('alta_derecha_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('alta_derecha_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="text" class="form-control form-control-sm" name="alta_derecha_2"
                                                            id="alta_derecha_2" placeholder="1" value="{{ old('alta_derecha_2') }}">
                                                        @if ($errors->has('alta_derecha_2'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('alta_derecha_2') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="alta_derecha" data-input="alta_derecha" title="Enviar Alta Derecha, toma 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-tipo="alta" data-lado="izquierda">
                                                <span class="eje-num">I</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input">
                                                        <label>Toma 1</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="alta_izquierda"
                                                            id="alta_izquierda" placeholder="1" value="{{ old('alta_izquierda') }}">
                                                        @if ($errors->has('alta_izquierda'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('alta_izquierda') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="alta_izquierda_1"
                                                            id="alta_izquierda_1" placeholder="1" value="{{ old('alta_izquierda_1') }}">
                                                        @if ($errors->has('alta_izquierda_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('alta_izquierda_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="alta_izquierda_2"
                                                            id="alta_izquierda_2" placeholder="1" value="{{ old('alta_izquierda_2') }}">
                                                        @if ($errors->has('alta_izquierda_2'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('alta_izquierda_2') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="alta_izquierda" data-input="alta_izquierda" title="Enviar Alta Izquierda, toma 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ════════════ ANTINIEBLAS ════════════ -->
                                    <div class="seccion" style="--accent: var(--niebla); --accent-bg: var(--niebla-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-cloud-fog2"></i></span>
                                            <h6>Antiniebla</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="eje-chip" data-tipo="anti" data-lado="derecha">
                                                <span class="eje-num">D</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input">
                                                        <label>Toma 1</label>
                                                        <input type="text" class="form-control form-control-sm" name="anti_derecha"
                                                            id="anti_derecha" placeholder="1" value="{{ old('anti_derecha') }}">
                                                        @if ($errors->has('anti_derecha'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('anti_derecha') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="text" class="form-control form-control-sm" name="anti_derecha_1"
                                                            id="anti_derecha_1" placeholder="1" value="{{ old('anti_derecha_1') }}">
                                                        @if ($errors->has('anti_derecha_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('anti_derecha_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="text" class="form-control form-control-sm" name="anti_derecha_2"
                                                            id="anti_derecha_2" placeholder="1" value="{{ old('anti_derecha_2') }}">
                                                        @if ($errors->has('anti_derecha_2'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('anti_derecha_2') }}</span>
                                                        @endif
                                                    </div>

                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="anti_derecha" data-input="anti_derecha" title="Enviar Antiniebla Derecha, toma 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <div class="eje-chip" data-tipo="anti" data-lado="izquierda">
                                                <span class="eje-num">I</span>
                                                <div class="eje-inputs">
                                                    <div class="eje-input">
                                                        <label>Toma 1</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="anti_izquierda"
                                                            id="anti_izquierda" placeholder="1" value="{{ old('anti_izquierda') }}">
                                                        @if ($errors->has('anti_izquierda'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('anti_izquierda') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="anti_izquierda_1"
                                                            id="anti_izquierda_1" placeholder="1" value="{{ old('anti_izquierda_1') }}">
                                                        @if ($errors->has('anti_izquierda_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('anti_izquierda_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="anti_izquierda_2"
                                                            id="anti_izquierda_2" placeholder="1" value="{{ old('anti_izquierda_2') }}">
                                                        @if ($errors->has('anti_izquierda_2'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('anti_izquierda_2') }}</span>
                                                        @endif
                                                    </div>

                                                </div>

                                                <button class="eje-send btn-enviar" data-grupo="anti_izquierda" data-input="anti_izquierda" title="Enviar Antiniebla Izquierda, toma 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    @endif

                                    <!-- ════════════ ACCIÓN: DATO TOMADO (solo Capelec / Capelec 2) ════════════ -->
                                    <div class="accion-dato-tomado" id="accionDatoTomadoLuces" style="display:none;">
                                        <div class="accion-dato-tomado-info">
                                            <i class="bi bi-info-circle"></i>
                                            <span>Entrega a la app todas las luces enviadas en un solo resultado</span>
                                        </div>
                                        <button class="btn-dato-tomado" id="btnDatoTomadoGeneralLuces">
                                            <i class="bi bi-check-circle"></i> Dato tomado
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

<x-instrucciones-simulador prueba="luces" />

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        inicializarBusquedaDatos(1, function(res) {
            res.valor = res.valor.replace(",", ".");

            if (res.observacion == 'baja_izquierda') {
                $("#baja_izquierda").val(res.valor);
                validarRango(res.valor, 'luces', 'baja_izquierda');
            }
            if (res.observacion == 'alta_izquierda') {
                $("#alta_izquierda").val(res.valor);
                validarRango(res.valor, 'luces', 'alta_izquierda');
            }
            if (res.observacion == 'baja_derecha') {
                $("#baja_derecha").val(res.valor);
                validarRango(res.valor, 'luces', 'baja_derecha');
            }
            if (res.observacion == 'alta_derecha') {
                $("#alta_derecha").val(res.valor);
                validarRango(res.valor, 'luces', 'alta_derecha');
            }
            if (res.observacion == 'antis_derecha') {
                $("#anti_derecha").val(res.valor);
                validarRango(res.valor, 'luces', 'anti_derecha');
            }
            if (res.observacion == 'antis_izquierda') {
                $("#anti_izquierda").val(res.valor);
                validarRango(res.valor, 'luces', 'anti_izquierda');
            }
        });
    });
</script>

<script>
    // ─── Estado global ──────────────────────────────────────────────────────
    let simuladorConectadoLuces = false;
    let tipoprueba = "luces";

    // ─── Conectar (arranca el tablero de luces en el backend) ─────────────
    function conectarluces() {
        console.log("tipovehiculo:", document.getElementById('tipovehiculo').value);
        Toast.fire({
            icon: "info",
            title: "Conectando...",
            text: "Iniciando comunicación, por favor espere.",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });
        enviarDatosConexionLuces();
    }

    // ─── Iniciar comunicación con el tablero ───────────────────────────────
    async function enviarDatosConexionLuces() {
        const tipovehiculo = document.getElementById('tipovehiculo').value;
        // let dataluces = ""
        // if (parseInt(tipovehiculo) == 2) {
        //     dataluces =  localStorage.getItem('motos_luces');
        // } else {
        //    dataluces =  localStorage.getItem('livianos_luces');
        // }

        // const data = JSON.parse(dataluces);
        // console.log(data)
        var datos = {
            tipovehiculo: parseInt(tipovehiculo),
            modo: document.getElementById('modoLuxometro').value,
        };


        try {
            const response = await fetch(`${URL_BASE}lucesmixta/iniciar-servidor`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datos)
            });

            const resultado = await parsearRespuestaTablero(response);


            simuladorConectadoLuces = true;
            setEstadoBadge(true);
            setBotonesConectadoLuces(true);

            Toast.fire({
                icon: "success",
                title: "✅ Conectado",
                text: resultado.escritos ?
                    `Registros escritos: ${resultado.escritos}` : "Conexión establecida con el tablero"
            });

            return resultado;

        } catch (error) {
            console.log(error);
            if (error.tipo === 'modbus') {
                setDesconectadoLuces();
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

    // ─── Enviar un solo haz de luz al tablero ──────────────────────────────
    function enviarDatoluces(grupo, valor, inclinacion) {
        // const datoluces = localStorage.getItem('livianos_luces');
        // // const data = JSON.parse(datoluces);

        // if (!datoluces) {
        //     Toast.fire({
        //         icon: "warning",
        //         title: "⚠️ SIN INFORMACIÓN",
        //         text: "No se encontraron datos en livianos_luces, comuniquese con el administrador del sistema.",
        //         timer: 6000
        //     });
        //     return;
        // }

        // const configLuces = JSON.parse(datoluces)[0];
        const partes = grupo.split('_'); // ej: ["baja", "derecha"]
        const tipo = partes[0];
        const lado = partes[1];

        const valorNumerico = Number.parseFloat(valor);
        if (!Number.isFinite(valorNumerico)) {
            Toast.fire({
                icon: 'warning',
                title: 'Valor no válido',
                text: 'Ingrese un valor numérico para este haz de luz'
            });
            return;
        }

        enviarDatosAlTableroLuces('enviar-dato', {
            tipovehiculo: parseInt(document.getElementById('tipovehiculo').value),
            modo: document.getElementById('modoLuxometro').value,
            tipoLuz: tipo === 'anti' ? 'antiniebla' : tipo,
            ladoLuz: lado,
            inclinacion: inclinacion,
            valorLuz: valorNumerico,
            "sup": false
        });
    }

    // ─── Llamada genérica al tablero de luces ──────────────────────────────
    async function enviarDatosAlTableroLuces(url, datos) {
        return enviarDatosAlTableroGenerico('lucesmixta', url, datos, {
            onExito: () => {
                simuladorConectadoLuces = true;
                setBotonesConectadoLuces(true);
            },
            onDesconectado: () => setDesconectadoLuces()
        });
    }

    // ─── "Dato tomado": envía todas las luces juntas ───────────────────────


    // ─── Desconectar ────────────────────────────────────────────────────────
    function desconectarSimuladorLuces() {

        var datos = {

            _token: $('#csrf_tokenLuces').val()
        };

        Toast.fire({
            icon: "info",
            title: "Desconectando...",
            text: "Deteniendo la comunicación del tablero de luces",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });


        fetch(`${URL_BASE}lucesmixta/detener-servidor`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datos)
            })
            .catch(() => {})
            .finally(() => {
                setDesconectadoLuces();
                Toast.fire({
                    icon: "info",
                    title: "🔌 Desconectado del tablero",
                    text: "La conexión se ha cerrado"
                });
            });
    }

    function setDesconectadoLuces() {
        simuladorConectadoLuces = false;
        setEstadoBadge(false);
        setBotonesConectadoLuces(false);
    }

    function setBotonesConectadoLuces(conectado) {
        $('#btnConectarSimuladorLuces').prop('disabled', conectado);
        $('.btn-enviar').prop('disabled', !conectado);
        $('#btnDatoTomadoGeneralLuces').prop('disabled', !conectado);
        $('#btnDesconectarSimuladorLuces').prop('disabled', !conectado);
    }

    // ─── Event Listeners ────────────────────────────────────────────────────
    $('#btnConectarSimuladorLuces').on('click', conectarluces);
    $('#btnDesconectarSimuladorLuces').on('click', desconectarSimuladorLuces);

    // ─── Modo del luxómetro (recordado en localStorage) ────────────────────
    // Valores válidos según EnviarDatoLuxometroDto en appdatamachine.
    // Se guarda por tipo de vehículo porque mixta y motos pueden usar equipos distintos.
    const MODOS_LUXOMETRO = ['default', 'combi2', 'tecmmas', 'moon', 'capelec2serial', 'capelec2', 'capelec'];
    // Modos que entregan todas las luces juntas con el botón "Dato tomado".
    const MODOS_DATO_TOMADO = ['capelec2', 'capelec'];
    const claveModoLuxometro = () => `modo_luxometro_${document.getElementById('tipovehiculo').value}`;

    function cargarModoLuxometro() {
        const guardado = localStorage.getItem(claveModoLuxometro());
        document.getElementById('modoLuxometro').value =
            MODOS_LUXOMETRO.includes(guardado) ? guardado : 'default';
        mostrarDatoTomadoLuces();
    }

    function mostrarDatoTomadoLuces() {
        const visible = MODOS_DATO_TOMADO.includes(document.getElementById('modoLuxometro').value);
        document.getElementById('accionDatoTomadoLuces').style.display = visible ? '' : 'none';
    }

    $('#modoLuxometro').on('change', function() {
        localStorage.setItem(claveModoLuxometro(), this.value);
        mostrarDatoTomadoLuces();
    });

    // ─── Inclinación de las bajas: aleatoria o manual (recordada en localStorage) ─
    // Solo las luces bajas llevan inclinación en las tramas del luxómetro.
    const INCLINACION_MIN = 1.3;
    const INCLINACION_MAX = 2.0;
    const CLAVE_MODO_INCLINACION = 'modo_inclinacion_luces';

    const esInclinacionManual = () => document.getElementById('modoInclinacion').value === 'manual';

    function cargarModoInclinacion() {
        const guardado = localStorage.getItem(CLAVE_MODO_INCLINACION);
        document.getElementById('modoInclinacion').value = guardado === 'manual' ? 'manual' : 'aleatoria';
        mostrarInputsInclinacion();
    }

    function mostrarInputsInclinacion() {
        const visible = esInclinacionManual();
        document.querySelectorAll('.input-inclinacion').forEach(input => {
            input.style.display = visible ? '' : 'none';
        });
    }

    // Devuelve la inclinación a enviar para la toma, null si es manual y no es válida,
    // o undefined si la luz no es baja.
    function obtenerInclinacion(grupo, inputValor) {
        if (!grupo.startsWith('baja_')) return undefined;

        if (!esInclinacionManual()) {
            return Number((Math.random() * (INCLINACION_MAX - INCLINACION_MIN) + INCLINACION_MIN).toFixed(2));
        }

        const inputInclinacion = document.getElementById(`${inputValor.id}_inc`);
        const inclinacion = Number.parseFloat(String(inputInclinacion?.value ?? '').replace(',', '.'));
        return Number.isFinite(inclinacion) ? inclinacion : null;
    }

    $('#modoInclinacion').on('change', function() {
        localStorage.setItem(CLAVE_MODO_INCLINACION, this.value);
        mostrarInputsInclinacion();
    });

    // ─── "Dato tomado": entrega juntas todas las luces enviadas ────────────
    $('#btnDatoTomadoGeneralLuces').on('click', function() {
        enviarDatosAlTableroLuces('dato-tomado', {
            tipovehiculo: parseInt(document.getElementById('tipovehiculo').value),
            modo: document.getElementById('modoLuxometro').value,
        });

        const btn = this;
        btn.innerHTML = '<i class="bi bi-check-circle-fill"></i> ¡Tomado!';
        btn.classList.add('confirmado');
        setTimeout(() => {
            btn.innerHTML = '<i class="bi bi-check-circle"></i> Dato tomado';
            btn.classList.remove('confirmado');
        }, 2000);
    });

    $(document).ready(function() {
        cargarModoLuxometro();
        cargarModoInclinacion();

        // Cada toma tiene su propio botón: nunca se envía el par completo.
        document.querySelectorAll('.eje-chip').forEach(chip => {
            const grupo = `${chip.dataset.tipo === 'anti' ? 'anti' : chip.dataset.tipo}_${chip.dataset.lado}`;
            const botonGrupal = chip.querySelector('.eje-send');
            if (botonGrupal) botonGrupal.remove();

            chip.querySelectorAll('.eje-input').forEach(campo => {
                const input = campo.querySelector('input');
                if (!input) return;

                const boton = document.createElement('button');
                boton.type = 'button';
                boton.className = 'eje-send btn-enviar';
                boton.dataset.grupo = grupo;
                boton.dataset.input = input.id;
                boton.title = `Enviar ${grupo}, ${campo.querySelector('label')?.textContent || 'toma'}`;
                boton.innerHTML = '<i class="bi bi-arrow-up-circle-fill"></i>';
                campo.appendChild(boton);
            });
        });
        setBotonesConectadoLuces(false);

        document.querySelectorAll('.btn-enviar').forEach(button => {
            button.addEventListener('click', function() {
                const grupo = this.dataset.grupo; // ej: "baja_derecha"
                const input = document.getElementById(this.dataset.input);
                if (!input) {
                    console.warn(`No se encontró la toma para el grupo "${grupo}"`);
                    return;
                }

                if (input.value.trim() === '') {
                    Toast.fire({
                        icon: 'warning',
                        title: '⚠️ Campos incompletos',
                        text: 'Complete esta toma antes de enviarla'
                    });
                    return;
                }

                const inclinacion = obtenerInclinacion(grupo, input);
                if (inclinacion === null) {
                    Toast.fire({
                        icon: 'warning',
                        title: '⚠️ Inclinación requerida',
                        text: 'Ingrese la inclinación de esta toma o cambie a inclinación aleatoria'
                    });
                    return;
                }

                enviarDatoluces(grupo, input.value, inclinacion);
                marcarEnviado(this);
            });
        });

        function marcarEnviado(btn) {
            const original = btn.innerHTML;
            btn.innerHTML = '<i class="bi bi-check-circle-fill"></i>';
            btn.classList.add('enviado');
            setTimeout(() => {
                btn.innerHTML = original;
                btn.classList.remove('enviado');
            }, 1500);
        }


    });
</script>