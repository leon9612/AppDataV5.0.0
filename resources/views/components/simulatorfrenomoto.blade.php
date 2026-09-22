<style>
    /* Solo variables de acento: el resto de .panel-pruebas-pro vive en
       public/assets/css/panel-pruebas.css */
    .panel-pruebas-pro {
        --pesaje: #4361EE;
        --pesaje-bg: #EEF1FD;
        --fuerza: #F2542D;
        --fuerza-bg: #FDEEEA;
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

                                <!-- Tipo de Prueba -->
                                <div class="col-12 mb-3">
                                    <div class="card">
                                        <div class="card-header">Configuracion de prueba</div>
                                        <div class="card-body">
                                            <div class="row g-3">
                                                <div class="col-sm-12 col-md-4 col-lg-4">
                                                    <div class="input-group mb-3" style="align-content: center;">
                                                        <label class="input-group-text" for="inputGroupSelect01">Doble Peso Motos</label>
                                                        <select class="form-select doblePeso" id="inputGroupSelect01" name="selPlaca">
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

                                    <!-- ════════════ PESAJES ════════════ -->
                                    <div class="seccion" style="--accent: var(--pesaje); --accent-bg: var(--pesaje-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-speedometer2"></i></span>
                                            <h6>Pesajes</h6>
                                            <span class="seccion-sub">2 ejes</span>
                                        </div>
                                        <div class="fila-chips">
                                            <!-- Pesaje Eje 1 -->
                                            <div class="eje-chip solo" data-grupo="pesaje_eje_1">
                                                <span class="eje-num">1</span>
                                                <div class="eje-input">
                                                    <label>Valor</label>
                                                    <input type="number" class="form-control form-control-sm" id="sim_pesaje_eje_1" placeholder="Pesaje eje 1" value="254">
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_1" title="Enviar eje 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <!-- Pesaje Eje 2 -->
                                            <div class="eje-chip solo" data-grupo="pesaje_eje_2" id="grupo_pesaje_eje_2">
                                                <span class="eje-num">2</span>
                                                <div class="eje-input">
                                                    <label>Valor</label>
                                                    <input type="number" class="form-control form-control-sm" id="sim_pesaje_eje_2" placeholder="Pesaje eje 2" value="0">
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="pesaje_eje_2" title="Enviar eje 2"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ════════════ FUERZAS ════════════ -->
                                    <div class="seccion" style="--accent: var(--fuerza); --accent-bg: var(--fuerza-bg);">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono"><i class="bi bi-disc-fill"></i></span>
                                            <h6>Frenos</h6>
                                            <span class="seccion-sub">2 ejes</span>
                                        </div>
                                        <div class="fila-chips">
                                            <!-- Freno Eje 1 -->
                                            <div class="eje-chip solo" data-grupo="freno_eje_1">
                                                <span class="eje-num">1</span>
                                                <div class="eje-input">
                                                    <label>Valor</label>
                                                    <input type="number" class="form-control form-control-sm" id="sim_freno_eje_1" placeholder="Freno eje 1" value="98">
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_1" title="Enviar eje 1"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                            <!-- Freno Eje 2 -->
                                            <div class="eje-chip solo" data-grupo="freno_eje_2">
                                                <span class="eje-num">2</span>
                                                <div class="eje-input">
                                                    <label>Valor</label>
                                                    <input type="number" class="form-control form-control-sm" id="sim_freno_eje_2" placeholder="Freno eje 2" value="104">
                                                </div>
                                                <button class="eje-send btn-enviar" data-grupo="freno_eje_2" title="Enviar eje 2"><i class="bi bi-arrow-up-circle-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- ════════════ ACCIÓN: DATO TOMADO ════════════ -->
                                    <div class="accion-dato-tomado">
                                        <div class="accion-dato-tomado-info">
                                            <i class="bi bi-info-circle"></i>
                                            <span>Envía Peso y Fuerza juntos al tablero</span>
                                        </div>
                                        <button class="btn-dato-tomado" id="btnDatoTomadoGeneral">
                                            <i class="bi bi-check-circle"></i> Dato tomado
                                        </button>
                                    </div>

                                    <!-- ════════════ EFICACIA ════════════ -->
                                    <div class="seccion">
                                        <div class="seccion-titulo">
                                            <span class="seccion-icono" style="background-color:#F3F4F6; color:#6B7280;"><i class="bi bi-graph-up-arrow"></i></span>
                                            <h6>Eficacia</h6>
                                        </div>
                                        <div class="fila-chips">
                                            <div class="stat-chip">
                                                <label>Efic. total</label>
                                                <input type="number" id="sim_eficaciatotal" disabled>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Barra de acciones -->
                                    <div class="barra-acciones d-flex flex-wrap gap-2 justify-content-center">
                                        <button class="btn btn-outline-secondary rounded-pill px-4" id="btnCalcularDataSim">
                                            <i class="bi bi-calculator me-1"></i> Calcular datos
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
    document.addEventListener('DOMContentLoaded', function() {
        inicializarBusquedaDatos(7, function(res) {
            if (res.observacion.trim() == 'Frenos eje 1 derecho' || res.observacion.trim() == 'Frenos eje 1 Derecho')
                $("#sim_freno_eje_1").val(Math.floor(res.valor / 9.81));
            if (res.observacion.trim() == 'Frenos eje 2 derecho' || res.observacion.trim() == 'Frenos eje 2 Derecho')
                $("#sim_freno_eje_2").val(Math.floor(res.valor / 9.81));

            if (res.observacion == 'Pesaje eje 1 derecho' || res.observacion == 'Pesaje eje 1 Derecho')
                $("#sim_pesaje_eje_1").val(Math.floor(res.valor / 9.81));
            if (res.observacion == 'Pesaje eje 2 derecho' || res.observacion == 'Pesaje eje 2 Derecho')
                $("#sim_pesaje_eje_2").val(Math.floor(res.valor / 9.81));

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
    function conectarfrenometro() {
        Toast.fire({
            icon: "info",
            title: "Conectando...",
            text: "Iniciando comunicación, por favor espere.",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });
        const sim_pesaje_eje_1 = parseFloat($('#sim_pesaje_eje_1').val());
        const sim_pesaje_eje_2 = parseFloat($('#sim_pesaje_eje_2').val());
        const sim_freno_eje_1 = parseFloat($('#sim_freno_eje_1').val());
        const sim_freno_eje_2 = parseFloat($('#sim_freno_eje_2').val());


        if (isNaN(sim_pesaje_eje_1) || isNaN(sim_freno_eje_1) || isNaN(sim_freno_eje_2)) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ Campos incompletos",
                text: "Complete los datos de fuerza y peso"
            });
            return;
        }

        enviarDatosConexionFrenoMotos({

            _token: $('#csrf_token').val()
        });

    }


    // ─── Enviar datos al tablero ──────────────────────────────────────────────────
    async function enviarDatosConexionFrenoMotos() {
        const data = obtenerIPsLinea('motos');
        // "Data reles" es obligatorio para iniciar el freno: si falta se avisa y se vuelve a pedir al recargar
        if (data.datareles === undefined || data.datareles === '') {
            avisarFaltaConfigPista('motos', 'Data reles');
            return null;
        }
        var datos = {
            datareles: data.datareles
        }

        return enviarDatosAlTableroGenerico('frenomotos', 'iniciar-freno', datos, {
            onExito: () => {
                conectarfrenometro = true;
                setBotonesConectadoFrenoMotos(true);
            },
            onDesconectado: () => setDesconectadoFrenoMotos()
        });
    }


    // ─── Conectar Frenometro ─────────────────────────────────
    function enviarDatofrenometro(eje, valor) {
        console.log('Enviando dato al freno:', eje, valor);
        const configBascula = obtenerPrimeraConfig('motos', 'bascula');
        const configFreno = obtenerPrimeraConfig('motos', 'freno');

        if (!configBascula || !configFreno) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ SIN INFORMACIÓN",
                text: "No se encontró la configuración de motos_bascula / motos_freno, comuniquese con el administrador del sistema.",
                timer: 6000
            });
            return;
        }

        const canalbasculaDER = configBascula.canalEntradaAnalogicaDER0Bas;
        const divisorbasculaDER = configBascula.divisorDER0Bas;
        // console.log('canalbasculaDER:', canalbasculaDER);

        const canalfrenoDER = configFreno.canalEntradaAnalogicaDER0
        const divisorfrenoDER = configFreno.divisorEntradaLivianoDER0
        console.log('valor', valor);
        console.log('divisorbasculaDER', divisorbasculaDER);
        switch (eje) {
            case 'pesaje_eje_1':
            case 'pesaje_eje_2':
                let valorpesoenviar = valor / divisorbasculaDER;
                enviarDatosAlTableroFrenoMotos('recibir-peso', {
                    celdapesomoto: canalbasculaDER,
                    valpeso: valorpesoenviar
                });
                break;

            case 'freno_eje_1':
            case 'freno_eje_2':
                console.log('Enviando valor de freno:', valor);
                console.log('divisorfrenoDER:', divisorfrenoDER);
                let valorfrenoenviar = valor / divisorfrenoDER;
                console.log(valorfrenoenviar)
                enviarDatosAlTableroFrenoMotos('recibir-fuerza', {
                    celdafreno: canalfrenoDER,
                    valfreno: valorfrenoenviar
                });
                break;

            default:
                break;
        }
    }


    // ─── Enviar datos al tablero de frenos ──────────────────────────────────────────────────
    async function enviarDatosAlTableroFrenoMotos(url, datos) {
        return enviarDatosAlTableroGenerico('frenomotos', url, datos, {
            onExito: () => {
                conectarfrenometro = true;
                setBotonesConectadoFrenoMotos(true);
            },
            onDesconectado: () => setDesconectadoFrenoMotos()
        });
    }


    // ─── DatoTomado ──────────────────────────────────────────────────────────────
    async function datocapturado() {
        const configBascula = obtenerPrimeraConfig('motos', 'bascula');
        const configFreno = obtenerPrimeraConfig('motos', 'freno');

        if (!configBascula || !configFreno) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ SIN INFORMACIÓN",
                text: "No se encontró la configuración de motos_bascula / motos_freno, comuniquese con el administrador del sistema.",
                timer: 6000
            });
            return;
        }

        const canalbasculaDER = configBascula.canalEntradaAnalogicaDER0Bas;
        const canalfrenoDER = configFreno.canalEntradaAnalogicaDER0

        try {
            const response = await fetch(`${URL_BASE}frenomotos/dato-tomado`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    _token: $('#csrf_token').val(),
                    celdapesomoto: canalbasculaDER,
                    celdafreno: canalfrenoDER
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
        const data = obtenerIPsLinea('motos');
        var datos = {
            datareles: data.datareles,
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

        fetch(`${URL_BASE}frenomotos/detener-escritura`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(datos)
            })
            .catch(() => {})
            .finally(() => {
                setDesconectadoFrenoMotos();
                Toast.fire({
                    icon: "info",
                    title: "🔌 Desconectado del tablero",
                    text: "La conexión se ha cerrado"
                });
            });
    }


    // ─── Calcular datos ───────────────────────────────────────────────────────────
    $("#btnCalcularDataSim").click(function(ev) {
        ev.preventDefault()

        var sumFuerzaSim = parseFloat($("#sim_freno_eje_1").val()) + parseFloat($("#sim_freno_eje_2").val());
        var pesoSim = parseFloat($("#sim_pesaje_eje_1").val());

        if ($("#sim_pesaje_eje_2").val() !== "") {
            pesoSim = pesoSim + parseFloat($("#sim_pesaje_eje_2").val());
        }

        var eficatotalSim = ((sumFuerzaSim / pesoSim) * 100)
        eficatotalSim = ((eficatotalSim * 100) / 100);
        $("#sim_eficaciatotal").val(eficatotalSim.toFixed(2));
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
    document.querySelectorAll('.btn-enviar').forEach(button => {
        button.addEventListener('click', function() {
            const grupo = this.dataset.grupo;
            const chip = this.closest('.eje-chip');
            const input = chip ? chip.querySelector('input[type="number"]') : null;
            const valor = input ? input.value : 'No encontrado';

            console.log(`Enviando dato del grupo: ${grupo}, valor: ${valor}`);

            enviarDatofrenometro(grupo, valor);

            this.innerHTML = '<i class="bi bi-check-circle"></i>';
            this.className = 'btn btn-success btn-sm w-10';
        });
    });
</script>