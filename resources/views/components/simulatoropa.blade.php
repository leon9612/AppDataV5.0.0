<div class="container">
    <div class="section-title">
        <h2>{{ $nombreprueba }}</h2>
    </div>
    <div class="row" data-aos="fade-in">
        <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">
            <div class="accordion w-100" id="accordionSimulador">
                <div class="accordion-item mb-2">
                    <h2 class="accordion-header">
                        <button class="accordion-button" type="button" data-bs-toggle="collapse"
                            data-bs-target="#collapseConexionSimulador" aria-expanded="true">
                            🔌 Simulador De Pruebas - Opacímetro
                        </button>
                    </h2>
                    <div id="collapseConexionSimulador" class="accordion-collapse collapse show"
                        data-bs-parent="#accordionSimulador">
                        <div class="accordion-body">
                            <div class="row">

                                <x-conexion-simulador
                                    id-conectar="btnConectarSimuladorOpacimetro"
                                    id-desconectar="btnDesconectarSimuladorOpacimetro"
                                    id-csrf="csrf_token"
                                    :small="true" />

                                <!-- Datos del Captador -->
                                <div class="col-12 mb-2">
                                    <div class="card">
                                        <div class="card-header py-1">📡 Datos del Captador</div>
                                        <div class="card-body py-2">
                                            <div class="row g-2 align-items-end">
                                                <div class="col-6 col-md-3">
                                                    <label for="temp_captadorOpacimetro" class="form-label small mb-1">Temperatura (°C)</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="temp_captadorOpacimetro" placeholder="Temperatura"
                                                        step="0.1" value="60">
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="sim_rpm_cruceroOpacimetro" class="form-label small mb-1">RPM CRUCERO</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="sim_rpm_cruceroOpacimetro" placeholder="RPM" value="2500">
                                                </div>
                                                <div class="col-6 col-md-3">
                                                    <label for="sim_rpm_ralentiOpacimetro" class="form-label small mb-1">RPM RALENTI</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="sim_rpm_ralentiOpacimetro" placeholder="RPM" value="850">
                                                </div>
                                                <div class="col-6 col-md-3 text-center">
                                                    <label class="fw-bold mb-1 small d-block">RPM a enviar</label>
                                                    <div class="btn-group w-100 btn-group-sm" role="group">
                                                        <input type="radio" class="btn-check"
                                                            name="tipoRPMOpacimetro" id="rpmRalentiOpacimetro"
                                                            autocomplete="off" checked>
                                                        <label class="btn btn-outline-warning" for="rpmRalentiOpacimetro">
                                                            <i class="bi bi-speedometer"></i> Ralentí
                                                        </label>
                                                        <input type="radio" class="btn-check"
                                                            name="tipoRPMOpacimetro" id="rpmCruceroOpacimetro"
                                                            autocomplete="off">
                                                        <label class="btn btn-outline-success" for="rpmCruceroOpacimetro">
                                                            <i class="bi bi-car-front"></i> Crucero
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Valores Opacidad -->
                                <div class="col-12 mb-2">
                                    <div class="card">
                                        <div class="card-header py-1">🚦 Valor de opacidad</div>
                                        <div class="card-body py-2">
                                            <div class="row g-2 align-items-end">
                                                <div class="col-6 col-md-3">
                                                    <label for="inputGroupSelect01" class="form-label small mb-1">Ltoe equipo</label>
                                                    <select class="form-select form-select-sm selLtoeEquipoSimulador"
                                                        id="inputGroupSelect01" name="selLtoeEquipoSimulador">
                                                        <option value="0.215" selected>Capelec - 215</option>
                                                        <option value="0.430">Motorscarn - 430</option>
                                                        <option value="0.364">Sensor - 364</option>
                                                        <option value="0.200">Brainbee - 200</option>
                                                    </select>
                                                </div>
                                                <div class="col-6 col-md-2">
                                                    <label for="sim_opacidad1_ralentiOpacimetro" class="form-label small mb-1">Opacidad 1 (%)</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="sim_opacidad1_ralentiOpacimetro"
                                                        placeholder="Opacidad Cruda 1" value="30" step="0.1">
                                                </div>
                                                <div class="col-6 col-md-2">
                                                    <label for="valorOpacidadRalentiOpacimetro" class="form-label small mb-1">Opac. ralentí</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="valorOpacidadRalentiOpacimetro"
                                                        placeholder="Opacidad ralentí" value="0" step="0.01">
                                                </div>
                                                <div class="col-6 col-md-2">
                                                    <label for="opa1k_ralentiOpacimetro" class="form-label small mb-1">Opacidad 1 (m⁻¹)</label>
                                                    <input type="number" class="form-control form-control-sm"
                                                        id="opa1k_ralentiOpacimetro"
                                                        placeholder="Opacidad M elevado 1" readonly step="0.01">
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <button id="btnCalcularRalentiOpacimetro"
                                                        class="btn btn-primary btn-sm w-100">
                                                        <i class="bi bi-calculator"></i> Calcular
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row mt-2 g-2">
                                                <div class="col-12 col-md-4">
                                                    <button id="btnEscalizacion"
                                                        class="btn btn-success btn-sm w-100 btn-enviar" disabled>
                                                        <i class="bi bi-send"></i> Realizar escalización
                                                    </button>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <button id="btnCero"
                                                        class="btn btn-info btn-sm w-100 btn-enviar" disabled>
                                                        <i class="bi bi-send"></i> Realizar cero
                                                    </button>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <button id="btnEnviarCruceroOpacimetro"
                                                        class="btn btn-warning btn-sm w-100 btn-enviar" disabled>
                                                        <i class="bi bi-send"></i> Enviar Datos Opacidad
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

<script src="https://code.jquery.com/jquery-3.6.4.min.js"
    integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    // ─── ToastOpacimetro ────────────────────────────────────────────────────────────────────
    const ToastOpacimetroOpacimetro = Swal.mixin({
        ToastOpacimetro: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
        didOpen: (ToastOpacimetro) => {
            ToastOpacimetro.onmouseenter = Swal.stopTimer;
            ToastOpacimetro.onmouseleave = Swal.resumeTimer;
        }
    });
    document.addEventListener('DOMContentLoaded', function() {
        inicializarBusquedaDatos(2, function(res) {
            localStorage.setItem('cilindraje', res.cilindraje);

            if (res.observacion == 'rpm_gobernada') {
                $("#sim_rpm_cruceroOpacimetro").val(res.valor);
            }
            if (res.observacion == 'rpm_ralenti') {
                $("#sim_rpm_ralentiOpacimetro").val(res.valor);
            }
            if (res.observacion == 'op_ciclo1') {
                $("#sim_opacidad1_ralentiOpacimetro").val(res.valor);
            }

            $("#btnCalcularRalentiOpacimetro").trigger('click');
        });
    });




    function procesarValidacionOpacidad($elemento) {
        let veh_anio = parseInt(localStorage.getItem('veh_anio'));
        let cilindraje = parseInt(localStorage.getItem('veh_cilindraje'));

        const valor = $elemento.val();
        const idCampo = $elemento.attr('id');

        if (cilindraje < 5000) {
            if (veh_anio >= 2016) {
                validarRango(valor, 'opacidadmenor5000mayor2016', idCampo);
            } else if (veh_anio > 2001 && veh_anio <= 2015) {
                validarRango(valor, 'opacidadmenor5000entre2001y2015', idCampo);
            } else {
                validarRango(valor, 'opacidadmenor5000', idCampo);
            }
        } else {
            if (veh_anio <= 2016) {
                validarRango(valor, 'opacidadmayor5000mayor2016', idCampo);
            } else if (veh_anio > 2001 && veh_anio <= 2015) {
                validarRango(valor, 'opacidadmayor5000entre2001y2015', idCampo);
            } else {
                validarRango(valor, 'opacidadmayor5000', idCampo);
            }
        }
    }
</script>

<script>
    // ─── Estado global ────────────────────────────────────────────────────────────
    let simuladorConectadoOpacimetro = false;
    let estadoPruebaOpacimetro = 2;
    let tipopruebaOpacimetro = "opacimetro";
    let pruebainiciadaOpacimetro = false;



    // ─── Helpers UI ───────────────────────────────────────────────────────────────
    function getRpmSeleccionado() {
        return $('#rpmRalentiOpacimetro').is(':checked') ?
            parseInt($('#sim_rpm_ralentiOpacimetro').val()) :
            parseInt($('#sim_rpm_cruceroOpacimetro').val());
    }

    // ─── Valor de opacidad a enviar según RPM seleccionado ───────────────────────
    function getValorOpacidadAEnviar() {
        // Si la prueba no ha iniciado, siempre 0 (comportamiento previo)
        if (!pruebainiciadaOpacimetro) return 0;

        const esCrucero = $('#rpmCruceroOpacimetro').is(':checked');

        if (esCrucero) {
            // Crucero → se envía la opacidad calculada
            return parseFloat($('#sim_opacidad1_ralentiOpacimetro').val()) || 0;
        }

        // Ralentí → se envía el valor configurable (por defecto 0)
        return parseFloat($('#valorOpacidadRalentiOpacimetro').val()) || 0;
    }

    function setBotonesConectado(conectado) {
        $('#btnConectarSimuladorOpacimetro').prop('disabled', conectado);
        $('#btnDesconectarSimuladorOpacimetro').prop('disabled', !conectado);
        $('#btnEnviarCruceroOpacimetro').prop('disabled', !conectado);
        $('#btnEscalizacion').prop('disabled', !conectado);
        $('#btnCero').prop('disabled', !conectado);
    }

    function setDesconectado() {
        simuladorConectadoOpacimetro = false;
        pruebainiciadaOpacimetro = false;
        setEstadoBadge(false);
        setBotonesConectado(false);
    }

    // ─── Calcular opacidad (m⁻¹) ─────────────────────────────────────────────────
    $("#btnCalcularRalentiOpacimetro").on('click', function(ev) {
        ev.preventDefault();

        const ln = parseFloat($(".selLtoeEquipoSimulador").val());
        const opa1 = parseFloat($("#sim_opacidad1_ralentiOpacimetro").val());

        if (isNaN(opa1) || isNaN(ln) || ln <= 0) {
            ToastOpacimetroOpacimetro.fire({
                icon: "error",
                title: "Complete todos los campos correctamente"
            });
            return;
        }

        // k = -(1/Ltoe) * ln(1 - N/100)
        const opa1k = -(1 / ln) * Math.log(1 - (opa1 / 100));
        $("#opa1k_ralentiOpacimetro").val(opa1k.toFixed(2));
         procesarValidacionOpacidad($("#opa1k_ralentiOpacimetro"));
    });

    // ─── Conectar ─────────────────────────────────────────────────────────────────
    // silencioso=true → sin ToastOpacimetros (reconexión automática por cambio de RPM)
    let silencioso = false;
    async function iniciarCaptadorOpacimetro() {
        const temperatura = parseFloat($('#temp_captadorOpacimetro').val());
        const rpm = getRpmSeleccionado();

        if (isNaN(temperatura) || isNaN(rpm)) {
            ToastOpacimetroOpacimetro.fire({
                icon: "warning",
                title: "⚠️ Campos incompletos",
                text: "Complete temperatura y RPM antes de conectar"
            });
            return false;
        }

        console.warn("silecioso", silencioso)

        if (!silencioso) {
            ToastOpacimetroOpacimetro.fire({
                icon: "info",
                title: "Conectando...",
                text: "Iniciando comunicación, por favor espere.",
                timer: false,
                showConfirmButton: false,
                didOpen: () => Swal.showLoading()
            });
        }

        const datos = {
            estado: estadoPruebaOpacimetro,
            rpm_ralenti: rpm,
            valopa: getValorOpacidadAEnviar(),
            temperatura,
            tipoprueba: tipopruebaOpacimetro,
            _token: $('#csrf_token').val()
        };

        try {
            const response = await fetch(`${URL_BASE}opacimetro/iniciar-captador`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datos)
            });

            await parsearRespuestaTablero(response);

            simuladorConectadoOpacimetro = true;
            setEstadoBadge(true);
            setBotonesConectado(true);

            if (!silencioso) {
                ToastOpacimetroOpacimetro.fire({
                    icon: "success",
                    title: "✅ Conectado al tablero"
                });
            }
            return true;

        } catch (error) {
            mostrarErrorTablero(error, 'iniciarCaptador');
            // En reconexión silenciosa no cambiamos el estado: ya estaba conectado
            if (!silencioso) setDesconectado();
            return false;
        }
    }

    // ─── Enviar datos al tablero ──────────────────────────────────────────────────
    async function enviarDatosAlTableroOpacimetro(datos) {
        if (!simuladorConectadoOpacimetro) {
            ToastOpacimetroOpacimetro.fire({
                icon: "warning",
                title: "⚠️ No conectado",
                text: "Primero conecte al tablero"
            });
            return null;
        }

        return enviarDatosAlTableroGenerico('opacimetro', 'escribir-datos', datos, {
            toast: ToastOpacimetroOpacimetro,
            onExito: () => { pruebainiciadaOpacimetro = true; },
            onDesconectado: () => setDesconectado()
        });
    }

    // ─── Enviar opacidad (wrapper con validación) ─────────────────────────────────
    function enviarValoresCruceroOpacimetro() {
        const temperatura = parseFloat($('#temp_captadorOpacimetro').val());
        const opa1k = parseFloat($('#sim_opacidad1_ralentiOpacimetro').val());
        const rpm = getRpmSeleccionado();

        if (isNaN(temperatura) || isNaN(opa1k) || isNaN(rpm)) {
            ToastOpacimetroOpacimetro.fire({
                icon: "warning",
                title: "⚠️ Campos incompletos",
                text: "Complete todos los campos y calcule los valores primero"
            });
            return;
        }

        enviarDatosAlTableroOpacimetro({
            estado: estadoPruebaOpacimetro,
            valopa: opa1k,
            rpm_ralenti: rpm,
            temperatura,
            _token: $('#csrf_token').val()
        });
    }

    // ─── Desconectar ──────────────────────────────────────────────────────────────
    function desconectarSimuladorOpacimetro() {
        ToastOpacimetroOpacimetro.fire({
            icon: "info",
            title: "Desconectando...",
            text: "Deteniendo la comunicación con el opacímetro",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });

        fetch(`${URL_BASE}opacimetro/detener-escritura`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('#csrf_token').val()
                })
            })
            .catch(() => {
                /* el servidor puede no responder al cerrar */
            })
            .finally(() => {
                setDesconectado();
                ToastOpacimetroOpacimetro.fire({
                    icon: "info",
                    title: "🔌 Desconectado del tablero",
                    text: "La conexión se ha cerrado"
                });
            });
    }

    // ─── Escalización ─────────────────────────────────────────────────────────────
    async function realizarEscalizacionOpacimetro() {
        $('#btnEscalizacion')
            .prop('disabled', true)
            .html('<i class="bi bi-hourglass-split"></i> Escalando...');

        try {
            const response = await fetch(`${URL_BASE}opacimetro/realizar-escalizacion`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('#csrf_token').val()
                })
            });

            await parsearRespuestaTablero(response);

            ToastOpacimetroOpacimetro.fire({
                icon: "success",
                title: "✅ Escalización completada",
                text: "Ya puede enviar datos de opacidad"
            });

        } catch (error) {
            mostrarErrorTablero(error, 'escalizacion');
        } finally {
            // La escalización NO desconecta: restaurar botón siempre
            $('#btnEscalizacion')
                .prop('disabled', false)
                .html('<i class="bi bi-send"></i> Realizar escalización');
        }
    }

    // ─── Cero ─────────────────────────────────────────────────────────────────────
    async function realizarCero() {
        $('#btnCero')
            .prop('disabled', true)
            .html('<i class="bi bi-hourglass-split"></i> Realizando Cero');

        try {
            const response = await fetch(`${URL_BASE}opacimetro/realizar-cero`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('#csrf_token').val()
                })
            });

            await parsearRespuestaTablero(response);

            ToastOpacimetroOpacimetro.fire({
                icon: "success",
                title: "✅ Cero completado",
                text: "Ya puede enviar datos de opacidad"
            });

        } catch (error) {
            mostrarErrorTablero(error, 'escalizacion');
        } finally {
            // La escalización NO desconecta: restaurar botón siempre
            $('#btnCero')
                .prop('disabled', false)
                .html('<i class="bi bi-send"></i> Realizar cero');
        }
    }

    // ─── Event Listeners ──────────────────────────────────────────────────────────
    $('#btnConectarSimuladorOpacimetro').on('click', iniciarCaptadorOpacimetro);
    $('#btnDesconectarSimuladorOpacimetro').on('click', desconectarSimuladorOpacimetro);
    $('#btnEnviarCruceroOpacimetro').on('click', enviarValoresCruceroOpacimetro);
    $('#btnEscalizacion').on('click', realizarEscalizacionOpacimetro);
    $('#btnCero').on('click', realizarCero);

    // Cambio de RPM → reconectar silenciosamente solo si ya había conexión activa
    $('input[name="tipoRPMOpacimetro"]').on('change', function() {
        silencioso = true;
        if (simuladorConectadoOpacimetro) iniciarCaptadorOpacimetro();
    });

    // ─── Init ─────────────────────────────────────────────────────────────────────
    $(document).ready(function() {
        setBotonesConectado(false);
    });
</script>