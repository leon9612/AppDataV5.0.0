@include('layout.heder')
<main id="main">
    

    <!-- ======= SECCIÓN 2: GASES MIXTA SIMULADOR DE PRUEBAS ======= -->
    <section id="visor-simulador" class="contact">
        <x-simulatorgases :nombreprueba="'Gases Mixta'" :tipovehiculo="1" />
    </section>

    @if(versionapp() == '1')
    <!-- ======= SECCIÓN 1: GASES MIXTA ORIGINAL ======= -->
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
                                    <form action="{{ url('/ga') }}" method="POST">
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
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="inputGroupSelect01">Catalizador</label>
                                                    <select class="form-select" id="inputGroupSelect01" name="selCatalizador">
                                                        <option value="0">NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                    @if ($errors->has('selCatalizador'))
                                                    <span class="error text-danger">{{ $errors->first('selCatalizador') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-3">
                                                <div class="input-group mb-3">
                                                    <label class="input-group-text" for="selMotocarro">Motocarro</label>
                                                    <select class="form-select" name="selMotocarro" id="selMotocarro">
                                                        <option value="0" selected>NO</option>
                                                        <option value="1">SI</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="tempAmbiente" id="tempAmbiente" placeholder="1" value="{{ old('tempAmbiente', $tempAmbiente ?? '') }}">
                                                    <label for="tempAmbiente">Temperatura Ambiente</label>
                                                    @if ($errors->has('tempAmbiente'))
                                                    <span class="error text-danger">{{ $errors->first('tempAmbiente') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" step="0.01" name="humedad" id="humedad" placeholder="1" value="{{ old('humedad', $humedad ?? '') }}">
                                                    <label for="humedad">Humedad</label>
                                                    @if ($errors->has('humedad'))
                                                    <span class="error text-danger">{{ $errors->first('humedad') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6 col-lg-4">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="tempMotor" id="tempMotor" placeholder="1" value="{{ $tempMotor }}">
                                                    <label for="tempMotor">TEMPERATURA MOTOR</label>
                                                    @if ($errors->has('tempMotor'))
                                                    <span class="error text-danger">{{ $errors->first('tempMotor') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="hc_ralenti" id="hc_ralenti" placeholder="1" value="{{ old('hc_ralenti') }}">
                                                    <label for="hc_ralenti">HC RALENTI</label>
                                                    @if ($errors->has('hc_ralenti'))
                                                    <span class="error text-danger">{{ $errors->first('hc_ralenti') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="co_ralenti" id="co_ralenti" placeholder="1" value="{{ old('co_ralenti') }}">
                                                    <label for="co_ralenti">CO RALENTI</label>
                                                    @if ($errors->has('co_ralenti'))
                                                    <span class="error text-danger">{{ $errors->first('co_ralenti') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="co2_ralenti" id="co2_ralenti" placeholder="1" value="{{ old('co2_ralenti') }}">
                                                    <label for="co2_ralenti">CO2 RALENTI</label>
                                                    @if ($errors->has('co2_ralenti'))
                                                    <span class="error text-danger">{{ $errors->first('co2_ralenti') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="o2_ralenti" id="o2_ralenti" placeholder="1" value="{{ old('o2_ralenti') }}">
                                                    <label for="o2_ralenti">O2 RALENTI</label>
                                                    @if ($errors->has('o2_ralenti'))
                                                    <span class="error text-danger">{{ $errors->first('o2_ralenti') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="rpm_ralenti" id="rpm_ralenti" placeholder="1" value="{{ old('rpm_ralenti') }}">
                                                    <label for="rpm_ralenti">RPM RALENTI</label>
                                                    @if ($errors->has('rpm_ralenti'))
                                                    <span class="error text-danger">{{ $errors->first('rpm_ralenti') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="text" class="form-control" name="hc_crucero" id="hc_crucero" placeholder="1" value="{{ old('hc_crucero') }}">
                                                    <label for="hc_crucero">HC CRUCERO</label>
                                                    @if ($errors->has('hc_crucero'))
                                                    <span class="error text-danger">{{ $errors->first('hc_crucero') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="co_crucero" id="co_crucero" placeholder="1" value="{{ old('co_crucero') }}">
                                                    <label for="co_crucero">CO CRUCERO</label>
                                                    @if ($errors->has('co_crucero'))
                                                    <span class="error text-danger">{{ $errors->first('co_crucero') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="co2_crucero" id="co2_crucero" placeholder="1" value="{{ old('co2_crucero') }}">
                                                    <label for="co2_crucero">CO2 CRUCERO</label>
                                                    @if ($errors->has('co2_crucero'))
                                                    <span class="error text-danger">{{ $errors->first('co2_crucero') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="o2_crucero" id="o2_crucero" placeholder="1" value="{{ old('o2_crucero') }}">
                                                    <label for="o2_crucero">O2 CRUCERO</label>
                                                    @if ($errors->has('o2_crucero'))
                                                    <span class="error text-danger">{{ $errors->first('o2_crucero') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4 col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input type="number" class="form-control" step="0.01" name="rpm_crucero" id="rpm_crucero" placeholder="1" value="{{ old('rpm_crucero') }}">
                                                    <label for="rpm_crucero">RPM CRUCERO</label>
                                                    @if ($errors->has('rpm_crucero'))
                                                    <span class="error text-danger">{{ $errors->first('rpm_crucero') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row justify-content-center">
                                            <div class="col-12 col-md-6 col-lg-4 text-center">
                                                <input type="hidden" name="tipoprueba" id="tipoprueba" value="3">
                                                <input type="hidden" name="tipopruebaCi2" id="tipopruebaCi2" value="1">
                                                <input type="hidden" name="prueba" id="prueba" value="Gases">
                                                <button style="height: 55px; width: 100%" id="btn-guardar" class="btn btn-outline-success" type="submit">
                                                    Guardar
                                                </button>
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

    document.addEventListener('DOMContentLoaded', function() {
        const tiempoInput = document.getElementById('tiempoPrueba');
        if (tiempoInput) {
            const tiempoGuardado = getTiempoPrueba();
            tiempoInput.value = tiempoGuardado;
        }
    });

    $(document).ready(function() {
        if (localStorage.getItem('motocarro') == '1') {
            $('#selMotocarro').val(localStorage.getItem('motocarro'));
            getMaquina();
        }
    });

    $(".selPlaca").change(function(e) {
        e.preventDefault();
        var placa = $('.selPlaca option:selected').attr('value');
        var placa2 = placa.split("-");
        $(".Vplaca").val(placa2[1]);
        $("#placa").val(placa2[1]);
        $("#idprueba").val(placa2[0]);
        $("#btn-buscar-placa").click();
    });

    $("#selMotocarro").change(function(e) {
        e.preventDefault();
        let motocarro = $('#selMotocarro option:selected').attr('value');
        localStorage.setItem('motocarro', motocarro);
        getMaquina();
    });

    $("#btn-buscar-placa").click(function(e) {
        e.preventDefault();
        let veh_anio = parseInt(document.getElementById("veh_anio").value);
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
                    idtipo_prueba: 3,
                    _token: $("input[name='_token']").val()
                },
                success: function(data, textStatus, jqXHR) {
                    if (data.length > 0) {
                        $.each(data, function(i, res) {
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
                            if (res.observacion == 'rpm_crucero') {
                                $("#rpm_crucero").val(res.valor);
                            }
                            if (res.observacion == 'hc_ralenti') {
                                $("#hc_ralenti").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'hc_ralenti');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'hc_ralenti');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'hc_ralenti');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'hc_ralenti');
                                }
                            }
                            if (res.observacion == 'co_crucero') {
                                $("#co_crucero").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'co_crucero');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'co_crucero');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'co_crucero');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'co_crucero');
                                }
                            }
                            if (res.observacion == 'co2_crucero') {
                                $("#co2_crucero").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'co2_crucero');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'co2_crucero');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'co2_crucero');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'co2_crucero');
                                }
                            }
                            if (res.observacion == 'o2_crucero') {
                                $("#o2_crucero").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'o2_crucero');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'o2_crucero');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'o2_crucero');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'o2_crucero');
                                }
                            }
                            if (res.observacion == 'rpm_ralenti') {
                                $("#rpm_ralenti").val(res.valor);
                            }
                            if (res.observacion == 'co_ralenti') {
                                $("#co_ralenti").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'co_ralenti');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'co_ralenti');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'co_ralenti');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'co_ralenti');
                                }
                            }
                            if (res.observacion == 'co2_ralenti') {
                                $("#co2_ralenti").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'co2_ralenti');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'co2_ralenti');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'co2_ralenti');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'co2_ralenti');
                                }
                            }
                            if (res.observacion == 'o2_ralenti') {
                                $("#o2_ralenti").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'o2_ralenti');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'o2_ralenti');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'o2_ralenti');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'o2_ralenti');
                                }
                            }
                            if (res.observacion == 'hc_crucero') {
                                $("#hc_crucero").val(res.valor);
                                if (veh_anio <= 1984) {
                                    validarRango(res.valor, 'gaseselivianomenor1984', 'hc_crucero');
                                } else if (veh_anio > 1984 && veh_anio <= 1997) {
                                    validarRango(res.valor, 'gaseselivianoentre1984y1997', 'hc_crucero');
                                } else if (veh_anio > 1997 && veh_anio <= 2009) {
                                    validarRango(res.valor, 'gaseselivianoentre1997y2009', 'hc_crucero');
                                } else if (veh_anio > 2009) {
                                    validarRango(res.valor, 'gaseseliviano2010', 'hc_crucero');
                                }
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
                    console.log('error');
                }
            });
        }
    });

    $(document).on('keyup', '#hc_ralenti, #hc_crucero, #co_crucero, #co2_crucero, #o2_crucero,#co_ralenti, #co2_ralenti, #o2_ralenti', function() {
        let veh_anio = parseInt(document.getElementById("veh_anio").value);
        const valor = $(this).val();
        const idCampo = $(this).attr('id');
        if (veh_anio <= 1984) {
            validarRango(valor, 'gaseselivianomenor1984', idCampo);
        } else if (veh_anio > 1984 && veh_anio <= 1997) {
            validarRango(valor, 'gaseselivianoentre1984y1997', idCampo);
        } else if (veh_anio > 1997 && veh_anio <= 2009) {
            validarRango(valor, 'gaseselivianoentre1997y2009', idCampo);
        } else if (veh_anio > 2009) {
            validarRango(valor, 'gaseseliviano2010', idCampo);
        }
    });

    var getMaquina = function() {
        $.ajax({
            url: 'getMaquina/',
            type: 'post',
            dataType: 'json',
            data: {
                desdemixta: 1,
                idtipo_prueba: 3,
                motocarro: $('#selMotocarro').val(),
                _token: $("input[name='_token']").val()
            },
            success: function(data, textStatus, jqXHR) {
                if (data.length > 0) {
                    $('#selMaquina').empty();
                    $.each(data, function(i, res) {
                        $('#selMaquina').append('<option value="' + res.idmaquina + '">' + res.maquina + '</option>');
                    });
                } else {
                    Toast.fire({
                        icon: "error",
                        title: "No se encontraron maquinas."
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log('error');
            }
        });
    }
</script>

