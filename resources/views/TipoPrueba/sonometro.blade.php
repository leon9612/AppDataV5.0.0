@include('layout.heder')
<style>
    #btn-buscar-placa {
        display: none;
    }
</style>
<main id="main">
    <section id="visor-simulador" class="contact">
        <x-simulatorsonometro :nombreprueba="'Prueba Sonometro'" :tipovehiculo="1" />
    </section>


    @if(versionapp() == '1')
    <section id="visor" class="contact">
        <div class="container">
            <div class="row" data-aos="fade-in">
                <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">

                    <!-- ACORDEÓN PARA SONÓMETRO -->
                    <div class="accordion w-100" id="accordionSonometro">

                        <!-- Acordeón: Prueba de Sonometro -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSonometro">
                                    🔊 Prueba de Sonometro
                                </button>
                            </h2>
                            <div id="collapseSonometro" class="accordion-collapse collapse" data-bs-parent="#accordionSonometro">
                                <div class="accordion-body">
                                    <form action="{{ url('/so') }}" method="POST">
                                        @csrf
                                        @if ($message = Session::get('success'))
                                        <div class="alert alert-success" role="alert">
                                            <h4 class="alert-heading">Exitoso</h4>
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif
                                        @if ($message = Session::get('error'))
                                        <div class="alert alert-danger" role="alert">
                                            <h4 class="alert-heading">Error</h4>
                                            <p>{{ $message }}</p>
                                        </div>
                                        @endif

                                        <x-vehicle-selector :placas="$placas" :usuarios="$usuarios" :maquinas="$maquinas" />

                                        <div class="row">
                                            <div class="col-sm-12 col-md-4 col-lg-4" style="align-content: center">
                                                <div class="input-group mb-3" style="align-content: center">
                                                    <div class="form-floating mb-3">
                                                        <input type="number" class="form-control" step="0.01"
                                                            name="valson" id="valson" placeholder="1" value="{{ old('valson') }}">
                                                        <label for="valson">Valor de Ruido (dB)</label>
                                                        @if ($errors->has('valson'))
                                                        <span class="error text-danger">{{ $errors->first('valson') }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-4 col-lg-4">
                                                <input type="hidden" name="tipoprueba" id="tipoprueba" value="4">
                                                <input type="hidden" name="tipopruebaCi2" id="tipopruebaCi2" value="12">
                                                <input type="hidden" name="prueba" id="prueba" value="Sonometro">
                                                <button style="width: 100%; height: 55px;" id="btn-guardar"
                                                    class="btn btn-outline-success" type="submit">Guardar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif
    <!-- ======= Contact Section ======= -->
</main>

@include('layout.footer')
<script type="text/javascript">
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 5000,
        timerProgressBar: true,
        didOpen: (toast) => {
            toast.onmouseenter = Swal.stopTimer;
            toast.onmouseleave = Swal.resumeTimer;
        }
    });

    // $(document).ready(function() {
    //     document.getElementById("btn-guardar").disabled = true; // Deshabilitar el botón al cargar la página
    // });

    document.addEventListener('DOMContentLoaded', function() {
        // Cargar el tiempo guardado en el input
        const tiempoInput = document.getElementById('tiempoPrueba');
        if (tiempoInput) {
            const tiempoGuardado = getTiempoPrueba();
            tiempoInput.value = tiempoGuardado;
            // console.log(`📌 Vista: ${document.querySelector('.section-title h2')?.textContent}, Tiempo cargado: ${tiempoGuardado} minutos`);
        }
    });

    $(".selPlaca").change(function(e) {
        e.preventDefault();
        var placa = $('.selPlaca option:selected').attr('value');
        var placa2 = placa.split("-");
        $(".Vplaca").val(placa2[1]);
        $("#placa").val(placa2[1]);
        $("#idprueba").val(placa2[0]);
        console.log(placa2);

    });


    $(document).on('keyup', '#valson', function() {
        const valor = $(this).val();
        const idCampo = $(this).attr('id');
        validarRango(valor, 'sonometro', idCampo);
    });
</script>

<script>
    let simuladorConectadoSonometro = false;

    let tipoprueba = "sonometro";
    let tipovehiculoSonometro;

    // Inicializar valores
    $(document).ready(function() {
        tipovehiculoSonometro = parseInt(document.getElementById('tipovehiculo').value);

        // Inicializar botones
        $('#valor_ruidoSonometro').val(60);
        $('#btnDesconectarSimuladorSonometro').prop('disabled', true);
        $('#btnEnviarRuidoSonometro').prop('disabled', true);
    });

    // Función para actualizar tipovehiculo según radio button seleccionado
    function actualizarTipoVehiculo() {
        if ($('#pruebaPistaMixta').is(':checked')) {
            tipovehiculoSonometro = 1;
            console.log('Prueba seleccionada: Pista Mixta (Vehículo:', tipovehiculoSonometro + ')');
        } else if ($('#pruebaPistaMotos').is(':checked')) {
            tipovehiculoSonometro = 2;
            console.log('Prueba seleccionada: Pista de Motos (Vehículo:', tipovehiculoSonometro + ')');
        }
    }

    // Escuchar cambios en los radio buttons
    $('#pruebaPistaMixta, #pruebaPistaMotos').on('change', function() {
        actualizarTipoVehiculo();
    });

    // Función para conectar captador
    async function iniciarCaptadorSonometro() {
        const datos = {
            tipoprueba: tipoprueba,
            tipovehiculo: tipovehiculoSonometro,
            estado: 2,
            valson: parseFloat($('#valor_ruidoSonometro').val()) || 0,
            _token: $("#csrf_tokenSonometro").val()
        };

        try {
            const response = await fetch(`${URL_BASE}sonometro/iniciar-captador`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(datos)
            });
            await parsearRespuestaTablero(response);
            simuladorConectadoSonometro = true;
            setEstadoBadge(true);
            setBotonesConectado(true);
            return true;
        } catch (error) {
            mostrarErrorTablero(error, 'iniciarCaptador');
            // En reconexión silenciosa no cambiamos el estado: ya estaba conectado
            if (!silencioso) setDesconectado();
            return false;
        }
    }


    // Función para enviar valor de ruido
    async function enviarValorRuidoSonometro() {
        if (!simuladorConectadoSonometro) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ No conectado",
                text: "Primero conecte al tablero"
            });
            return;
        }

        const ruido = $('#valor_ruidoSonometro').val();

        if (!ruido) {
            Toast.fire({
                icon: "warning",
                title: "⚠️ Campo incompleto",
                text: "Ingrese un valor de ruido"
            });
            return;
        }

        const datos = {
            estado: 2,
            tipoprueba: tipoprueba,
            tipovehiculo: tipovehiculoSonometro,
            valson: parseFloat($('#valor_ruidoSonometro').val()) || 0,
            _token: $("#csrf_tokenSonometro").val()
        };

        try {
            const response = await fetch(`${URL_BASE}sonometro/escribir-datos`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(datos)
            });
             const resultado = await parsearRespuestaTablero(response);

             Toast.fire({
                icon: "success",
                title: "✅ Datos enviados",
                text: resultado.escritos
                    ? `Registros escritos: ${resultado.escritos}`
                    : "Los valores fueron enviados al tablero"
            });
            // pruebainiciadaOpacimetro = true;
            return resultado;
        } catch (error) {
            mostrarErrorTablero(error, 'enviarDatos');
            // Un error Modbus implica que el dispositivo perdió conexión
            if (error.tipo === 'modbus') {
                setDesconectado();
                Toast.fire({
                    icon: "warning",
                    title: "⚠️ Conexión perdida",
                    text: "Reconecte al tablero antes de continuar",
                    timer: 6000
                });
            }
            return null;
        }
    }


    // Función para desconectar
      function desconectarSimuladorSonometro() {
        Toast.fire({
            icon: "info",
            title: "Desconectando...",
            text: "Deteniendo la comunicación con el opacímetro",
            timer: false,
            showConfirmButton: false,
            didOpen: () => Swal.showLoading()
        });

        fetch(`${URL_BASE}sonometro/detener-escritura`, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ _token: $('#csrf_token').val() })
        })
        .catch(() => { /* el servidor puede no responder al cerrar */ })
        .finally(() => {
            setDesconectado();
            Toast.fire({
                icon: "info",
                title: "🔌 Desconectado del tablero",
                text: "La conexión se ha cerrado"
            });
        });
    }

    function setBotonesConectado(conectado) {
        $('#btnConectarSimuladorSonometro').prop('disabled', conectado);
        $('#btnDesconectarSimuladorSonometro').prop('disabled', !conectado);
        $('#btnEnviarRuidoSonometro').prop('disabled', !conectado);
    }

    
    function setDesconectado() {
        simuladorConectadoSonometro = false;
        setEstadoBadge(false);
        setBotonesConectado(false);
    }

    // Event Listeners
    $('#btnConectarSimuladorSonometro').on('click', iniciarCaptadorSonometro);
    $('#btnDesconectarSimuladorSonometro').on('click', desconectarSimuladorSonometro);
    $('#btnEnviarRuidoSonometro').on('click', enviarValorRuidoSonometro);
</script>