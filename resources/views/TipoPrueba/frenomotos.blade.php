@include('layout.heder')
<style>

</style>
<main id="main">

    <section id="visor-simulador" class="contact">
        <x-simulatorfrenomoto :nombreprueba="'Frenometro Motos'" :tipovehiculo="2" />
    </section>
    <section id="visor" class="contact">
        <div class="container">



            <div class="row" data-aos="fade-in">
                <div class="col-lg-12 mt-12 mt-lg-12 d-flex align-items-stretch">
                    <!-- ACORDEÓN PARA GASES MIXTA ORIGINAL -->
                    <div class="accordion w-100" id="accordionGasesOriginal">

                        <!-- Acordeón: Correcion y realizacion de prueba -->
                        <div class="accordion-item mb-2">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseVehiculoOriginal">
                                    🚘 Correcion y realizacion de prueba
                                </button>
                            </h2>
                            <div id="collapseVehiculoOriginal" class="accordion-collapse collapse" data-bs-parent="#accordionGasesOriginal">
                                <div class="accordion-body">
                                    <form action="{{ url('/frm') }}" method="POST" class="form-control">
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

                                        <br>
                                        <div class="container" style=" margin-top: 2%; justify-content: center; display: flex ">
                                            <div class="row">
                                                <label
                                                    style="color: rgb(0, 4, 255); font-size: 18px; text-align: center; background-color: lemonchiffon; width: 100%">DATOS
                                                    MOTOS</label>
                                                <div style="justify-content: center; display: flex; margin-top: 15px">
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="mb-1">
                                                            <input type="text" class="form-control" id="pesaje1d"
                                                                placeholder="Pesaje eje 1" name="pesaje1d"
                                                                value="{{ old('pesaje1d') }}">
                                                            @if ($errors->has('pesaje1d'))
                                                            <span class="error text-danger">{{ $errors->first('pesaje1d') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3" id="divDoblePeso" style="display: none;">
                                                        <div class="mb-1">
                                                            <input type="text" class="form-control" id="pesaje2d"
                                                                placeholder="Pesaje eje 2" name="pesaje2d"
                                                                value="{{ old('pesaje2d') }}">
                                                            {{-- @if ($errors->has('pesaje2d'))
                                                    <span
                                                        class="error text-danger">{{ $errors->first('pesaje2d') }}</span>
                                                            @endif --}}
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="mb-1">
                                                            <input type="text" class="form-control" name="fuerza1d" id="fuerza1d"
                                                                placeholder="Freno eje 1" value="{{ old('fuerza1d') }}">
                                                            @if ($errors->has('fuerza1d'))
                                                            <span class="error text-danger">{{ $errors->first('fuerza1d') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-3 col-lg-3">
                                                        <div class="mb-1">
                                                            <input type="number" class="form-control" step="0.01" name="fuerza1i"
                                                                id="fuerza1i" placeholder="Freno eje 1" value="{{ old('fuerza1i') }}">
                                                            @if ($errors->has('fuerza1i'))
                                                            <span class="error text-danger">{{ $errors->first('fuerza1i') }}</span>
                                                            @endif
                                                        </div>

                                                    </div>


                                                </div>
                                                <div style="justify-content: center; display: flex; margin-top: 15px">
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="mb-1">
                                                            <input type="number" class="form-control" placeholder="Eficacia total"
                                                                name="efitotal" id="efitotal" value="{{ old('efitotal') }}" disabled>
                                                            <input type="hidden" class="form-control" name="efitotal_" id="efitotal_">
                                                            @if ($errors->has('efitotal'))
                                                            <span class="error text-danger">{{ $errors->first('efitotal') }}</span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="justify-content: center; display: flex; margin-top: 15px">
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <button style="width: 100%; height: 55px;" class="btn btn-outline-secondary"
                                                            id="btn-calcular">Calcular
                                                            datos</button>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <input type="hidden" name="tipoprueba" id="tipoprueba" value="7">
                                                        <input type="hidden" name="tipopruebaCi2" id="tipopruebaCi2" value="7">
                                                        <input type="hidden" name="prueba" id="prueba" value="Frenos">
                                                        <button style="width: 100%; height: 55px;" class="btn btn-outline-success"
                                                            id="btn-guardar" disabled type="submit">Guardar</button>
                                                    </div>
                                                </div>
                                            </div>
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
    <!-- ======= Contact Section ======= -->
</main>

@include('layout.footer')
<script type="text/javascript">
    $(".doblePeso").change(function() {
        const grupoPesaje2 = document.getElementById('grupo_pesaje_eje_2');
        if ($(".doblePeso").val() == "SI") {
            localStorage.setItem("doblePeso", "SI");
            $("#divDoblePeso").show();
            grupoPesaje2.style.display = 'flex';
        } else {
            localStorage.setItem("doblePeso", "NO");
            $("#divDoblePeso").hide();
            grupoPesaje2.style.display = 'none';
        }
    });

    $(document).ready( async function() {
        const grupoPesaje2 = document.getElementById('grupo_pesaje_eje_2');
        if (localStorage.getItem("doblePeso") == "SI") {
            $(".doblePeso").val("SI");
            $("#divDoblePeso").show();
            grupoPesaje2.style.display = 'flex';
        } else {
            $(".doblePeso").val("NO");
            $("#divDoblePeso").hide();
            grupoPesaje2.style.display = 'none';
        }
        if (localStorage.getItem("ips_motos") == "" || localStorage.getItem("ips_motos") == null || localStorage.getItem("ips_motos") == undefined) {
            await pedirYGuardarIPs('motos');
            obtenerArchivoDesencriptado('motos', 'freno');
            obtenerArchivoDesencriptado('motos', 'bascula');
            

        }
        // document.getElementById("btn-guardar").disabled = true;
    });

    // Función para obtener archivos desencriptados






    document.addEventListener('DOMContentLoaded', async function() {
        // Cargar el tiempo guardado en el input
        const tiempoInput = document.getElementById('tiempoPrueba');
        if (tiempoInput) {
            const tiempoGuardado = getTiempoPrueba();
            tiempoInput.value = tiempoGuardado;
            // console.log(`📌 Vista: ${document.querySelector('.section-title h2')?.textContent}, Tiempo cargado: ${tiempoGuardado} minutos`);
        }
        
        
    });

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
    $(".selPlaca").change(function(e) {
        e.preventDefault();
        var placa = $('.selPlaca option:selected').attr('value');
        var placa2 = placa.split("-");
        $(".Vplaca").val(placa2[1]);
        $("#idprueba").val(placa2[0]);
        $("#placa").val(placa2[1]);
        $("#btn-buscar-placa").click();

    });

    $("#btn-calcular").click(function(ev) {
        ev.preventDefault()
        document.getElementById("btn-guardar").disabled = false;
        var sumFuerza = parseFloat($("#fuerza1d").val()) + parseFloat($("#fuerza1i").val());
        var peso = parseFloat($("#pesaje1d").val());

        if ($("#pesaje2d").val() !== "") {

            peso = peso + parseFloat($("#pesaje2d").val());
        }

        console.log("fuerza" + sumFuerza)
        console.log("peso" + peso)

        var eficatotal = ((sumFuerza / peso) * 100)
        eficatotal = ((eficatotal * 100) / 100);
        $("#efitotal").val(eficatotal.toFixed(2));
        $("#efitotal_").val(eficatotal.toFixed(2));
        validarRango(eficatotal.toFixed(2), 'frenosmotos', 'efitotal')

    })

    // $("#btn-evento").click(function(ev) {
    //     ev.preventDefault();
    //     document.getElementById("btn-evento").disabled = true;
    //     if ($(".Vplaca").val() == null || $(".Vplaca").val() == "") {
    //         Toast.fire({
    //             icon: "error",
    //             title: "Seleccione una placa",
    //             position: "bottom-end"
    //         });
    //         document.getElementById("btn-evento").disabled = false;
    //     } else {
    //         Toast.fire({
    //             icon: "info",
    //             title: "Creando evento...",
    //             timeout: 1000,
    //             position: "bottom-end"
    //         });
    //         $.ajax({
    //             url: 'getevento/',
    //             type: 'post',
    //             dataType: 'json',
    //             data: {
    //                 placa: $(".Vplaca").val(),
    //                 prueba: 'Frenos',
    //                 tipoprueba: '7',
    //                 tipovehiculo: '3',
    //                 tipoevento: '1',
    //                 _token: $("input[name='_token']").val()
    //             },
    //             success: function(data, textStatus, jqXHR) {
    //                 document.getElementById("btn-evento").disabled = false;
    //                 document.getElementById("btn-guardar").disabled = false;
    //                 Swal.close();
    //                 Toast.fire({
    //                     icon: "success",
    //                     title: "Evento creado, tenga en cuenta el tiempo de duracion de la prueba, para enviar los datos.",
    //                     timeout: 1000,
    //                     position: "bottom-end"
    //                 });

    //                 // Luego mostrar el toast con un pequeño delay
    //                 iniciarContadorRegresivo();

    //             },
    //             error: function(jqXHR, textStatus, errorThrown) {
    //                 console.log('error')
    //                 console.log(jqXHR.responseText)
    //                 console.log(textStatus)
    //                 console.log(errorThrown)
    //             }
    //         });
    //     }

    // });



    $("#btn-buscar-placa").click(function(e) {
        e.preventDefault();

        if ($(".Vplaca").val() == "" || $(".Vplaca").val() == null) {
            Swal.fire({
                icon: "info",
                title: 'Buscar placa',
                allowOutsideClick: false,
                html: '<div style= "font-size: 18px">Seleccione una placa primero<div>',
                showConfirmButton: true,
            });
        } else {
            $.ajax({
                url: 'buscarvehiculo/',
                type: 'post',
                dataType: 'json',
                data: {
                    placa: $(".Vplaca").val(),
                    idtipo_prueba: 7,
                    _token: $("input[name='_token']").val()
                },
                success: function(data, textStatus, jqXHR) {

                    if (data.length > 0) {
                        $.each(data, function(i, res) {
                            console.log(data);
                            if (res.estado == 1) {
                                Toast.fire({
                                    icon: "info",
                                    title: "La prueba que se trajo esta en estado <span style='color: #dc3545; font-weight: bold;'>RECHAZADA</span>, por favor verifique bien los datos antes de enviarla nuevamente.",
                                    timeout: 100000
                                });
                            }
                            if (res.estado == 9) {
                                Toast.fire({
                                    icon: "info",
                                    title: "La prueba que se trajo esta en estado <span style='color: #dc3545; font-weight: bold;'>REASIGNADA</span>, por favor verifique bien los datos antes de enviarla nuevamente.",
                                    timeout: 100000
                                });
                            }
                            if (res.observacion.trim() == 'Frenos eje 1 derecho' || res
                                .observacion.trim() == 'Frenos eje 1 Derecho')
                                $("#fuerza1d").val(res.valor);
                            if (res.observacion.trim() == 'Frenos eje 2 derecho' || res
                                .observacion.trim() == 'Frenos eje 2 Derecho')
                                $("#fuerza1i").val(res.valor);
                            if (res.observacion == 'Pesaje eje 1 derecho' || res.observacion ==
                                'Pesaje eje 1 Derecho')
                                $("#pesaje1d").val(res.valor);

                            if (res.observacion == 'Pesaje eje 2 derecho' || res.observacion ==
                                'Pesaje eje 2 Derecho') {
                                $("#pesaje2d").val(res.valor);
                                $("#divDoblePeso").show();
                                $(".doblePeso").val("SI");
                            }



                        });
                    } else {
                        Toast.fire({
                            icon: "error",
                            title: "No se encontraron registros."
                        });
                    }



                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log('error')
                    console.log(jqXHR.responseText)
                    console.log(textStatus)
                    console.log(errorThrown)
                }
            });
        }
    })
</script>