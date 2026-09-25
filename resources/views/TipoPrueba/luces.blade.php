@include('layout.heder')

<main id="main">
    <section id="visor-simulador" class="contact">
        <x-simluadorluces :nombreprueba="'Luces Mixta'" :tipovehiculo="1" />
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
                                    <form action="{{ url('/lu') }}" method="POST" class="form-control">
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
                                        <div style="margin-top: 15px">
                                            <x-vehicle-selector :placas="$placas" :usuarios="$usuarios" :maquinas="$maquinas" />
                                            <div class="col-sm-12 col-md-3 col-lg-3" style="align-content: center">
                                                <div class="input-group mb-3" style="align-content: center">
                                                    <label class="input-group-text" for="inputGroupSelect01">Simultaneas</label>
                                                    <select class="form-select" id="inputGroupSelect01" name="selSimultanea"
                                                        id="selSimultanea">
                                                        <option value="0">No</option>
                                                        <option value="1">Si</option>
                                                    </select>
                                                </div>
                                            </div>


                                            <div class="container" style=" margin-top: 2%; justify-content: center; display: flex ">
                                                <div class="row">
                                                    <label
                                                        style="color: rgb(0, 4, 255); font-size: 18px; text-align: center; width: 100%; background-color: lightgoldenrodyellow">LUCES
                                                        BAJAS</label>
                                                    <div class="fila-campos" style="justify-content: center; display: flex; margin-top: 15px">

                                                        <br>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="mix_baja_derecha"
                                                                        id="mix_baja_derecha" placeholder="1"
                                                                        value="{{ old('mix_baja_derecha') }}">
                                                                    <label for="floatingInput">BAJA D</label>
                                                                    @if ($errors->has('mix_baja_derecha'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_baja_derecha') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control" step="0.01"
                                                                        name="mix_baja_izquierda" id="mix_baja_izquierda" placeholder="1"
                                                                        value="{{ old('mix_baja_izquierda') }}">
                                                                    <label for="floatingInput">BAJA I</label>
                                                                    @if ($errors->has('mix_baja_izquierda'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_baja_izquierda') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="mix_baja_derecha_1"
                                                                        id="mix_baja_derecha_1" placeholder="1"
                                                                        value="{{ old('mix_baja_derecha_1') }}">
                                                                    <label for="floatingInput">BAJA D-1</label>
                                                                    @if ($errors->has('mix_baja_derecha_1'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_baja_derecha_1') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control" step="0.01"
                                                                        name="mix_baja_izquierda_1" id="mix_baja_izquierda_1" placeholder="1"
                                                                        value="{{ old('mix_baja_izquierda_1') }}">
                                                                    <label for="floatingInput">BAJA I-1</label>
                                                                    @if ($errors->has('mix_baja_izquierda_1'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_baja_izquierda_1') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value=""
                                                                        id="sum_bajas">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Sumar
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>



                                                    </div>
                                                    <label
                                                        style="color: rgb(0, 4, 255); font-size: 18px; text-align: center; width: 100%; background-color: lightgoldenrodyellow">LUCES
                                                        ALTAS</label>
                                                    <div class="fila-campos" style="justify-content: center; display: flex; margin-top: 15px">
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="mix_alta_derecha"
                                                                        id="mix_alta_derecha" placeholder="1"
                                                                        value="{{ old('mix_alta_derecha') }}">
                                                                    <label for="floatingInput">ALTA D</label>
                                                                    @if ($errors->has('mix_alta_derecha'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_alta_derecha') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control" step="0.01"
                                                                        name="mix_alta_izquierda" id="mix_alta_izquierda" placeholder="1"
                                                                        value="{{ old('mix_alta_izquierda') }}">
                                                                    <label for="floatingInput">ALTA I</label>
                                                                    @if ($errors->has('mix_alta_izquierda'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_alta_izquierda') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="text" class="form-control" name="mix_alta_derecha_1"
                                                                        id="mix_alta_derecha_1" placeholder="1"
                                                                        value="{{ old('mix_alta_derecha_1') }}">
                                                                    <label for="floatingInput">ALTA D-1</label>
                                                                    @if ($errors->has('mix_alta_derecha_1'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_alta_derecha_1') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-floating mb-3">
                                                                    <input type="number" class="form-control" step="0.01"
                                                                        name="mix_alta_izquierda_1" id="mix_alta_izquierda_1" placeholder="1"
                                                                        value="{{ old('mix_alta_izquierda_1') }}">
                                                                    <label for="floatingInput">ALTA I-1</label>
                                                                    @if ($errors->has('mix_alta_izquierda_1'))
                                                                    <span
                                                                        class="error text-danger">{{ $errors->first('mix_alta_izquierda_1') }}</span>
                                                                    @endif
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                            <div class="input-group mb-3" style="align-content: center">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" value=""
                                                                        id="sum_altas">
                                                                    <label class="form-check-label" for="flexCheckDefault">
                                                                        Sumar
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="container" style=" margin-top: 2px; justify-content: center; display: flex ">
                                            <div class="row">
                                                <label
                                                    style="color: rgb(0, 4, 255); font-size: 18px; text-align: center; width: 100%; background-color: lightgoldenrodyellow">ANTINIEBLAS</label>
                                                <div class="fila-campos" style="justify-content: center; display: flex; margin-top: 15px">
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="mix_anti_derecha"
                                                                    id="mix_anti_derecha" placeholder="1" value="{{ old('mix_anti_derecha') }}">
                                                                <label for="floatingInput">ANTI D</label>
                                                                @if ($errors->has('mix_anti_derecha'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_derecha') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" step="0.01"
                                                                    name="mix_anti_izquierda" id="mix_anti_izquierda" placeholder="1"
                                                                    value="{{ old('mix_anti_izquierda') }}">
                                                                <label for="floatingInput">ANTI I</label>
                                                                @if ($errors->has('mix_anti_izquierda'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_izquierda') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="mix_anti_derecha_1"
                                                                    id="mix_anti_derecha_1" placeholder="1"
                                                                    value="{{ old('mix_anti_derecha_1') }}">
                                                                <label for="floatingInput">ANTI D-1</label>
                                                                @if ($errors->has('mix_anti_derecha_1'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_derecha_1') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" step="0.01"
                                                                    name="mix_anti_izquierda_1" id="mix_anti_izquierda_1" placeholder="1"
                                                                    value="{{ old('mix_anti_izquierda_1') }}">
                                                                <label for="floatingInput">ANTI I-1</label>
                                                                @if ($errors->has('mix_anti_izquierda_1'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_izquierda_1') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox" value="" id="sum-anti">
                                                                <label class="form-check-label" for="flexCheckDefault">
                                                                    Sumar
                                                                </label>
                                                            </div>

                                                        </div>
                                                    </div>



                                                </div>
                                                <div class="fila-campos" style="justify-content: center; display: flex; margin-top: 15px">
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="mix_anti_derecha_2"
                                                                    id="mix_anti_derecha_2" placeholder="1"
                                                                    value="{{ old('mix_anti_derecha_2') }}">
                                                                <label for="floatingInput">ANTI D-2</label>
                                                                @if ($errors->has('mix_anti_derecha_2'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_derecha_2') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" step="0.01"
                                                                    name="mix_anti_izquierda_2" id="mix_anti_izquierda_2" placeholder="1"
                                                                    value="{{ old('mix_anti_izquierda_2') }}">
                                                                <label for="floatingInput">ANTI I-2</label>
                                                                @if ($errors->has('mix_anti_izquierda_2'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_izquierda_2') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="mix_anti_derecha_3"
                                                                    id="mix_anti_derecha_3" placeholder="1"
                                                                    value="{{ old('mix_anti_derecha_3') }}">
                                                                <label for="floatingInput">ANTI D-3</label>
                                                                @if ($errors->has('mix_anti_derecha_3'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_derecha_3') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" step="0.01"
                                                                    name="mix_anti_izquierda_3" id="mix_anti_izquierda_3" placeholder="1"
                                                                    value="{{ old('mix_anti_izquierda_3') }}">
                                                                <label for="floatingInput">ANTI I-3</label>
                                                                @if ($errors->has('mix_anti_izquierda_3'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_anti_izquierda_3') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">


                                                        </div>
                                                    </div>



                                                </div>
                                                <label
                                                    style="color: rgb(0, 4, 255); font-size: 18px; text-align: center; width: 100%; background-color: lightgoldenrodyellow">INCLINACIONES</label>
                                                <div class="fila-campos" style="justify-content: center; display: flex; margin-top: 15px">

                                                    <br>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="mix_incli_derecha"
                                                                    id="mix_incli_derecha" placeholder="1"
                                                                    value="{{ old('mix_incli_derecha') }}">
                                                                <label for="floatingInput">INCLI D</label>
                                                                @if ($errors->has('mix_incli_derecha'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_incli_derecha') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" step="0.01"
                                                                    name="mix_incli_izquierda" id="mix_incli_izquierda" placeholder="1"
                                                                    value="{{ old('mix_incli_izquierda') }}">
                                                                <label for="floatingInput">INCLI I</label>
                                                                @if ($errors->has('mix_incli_izquierda'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_incli_izquierda') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="text" class="form-control" name="mix_incli_derecha_1"
                                                                    id="mix_incli_derecha_1" placeholder="1"
                                                                    value="{{ old('mix_incli_derecha_1') }}">
                                                                <label for="floatingInput">INCLI D-1</label>
                                                                @if ($errors->has('mix_incli_derecha_1'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_incli_derecha_1') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="number" class="form-control" step="0.01"
                                                                    name="mix_incli_izquierda_1" id="mix_incli_izquierda_1" placeholder="1"
                                                                    value="{{ old('mix_incli_izquierda_1') }}">
                                                                <label for="floatingInput">INCLI I-1</label>
                                                                @if ($errors->has('mix_incli_izquierda_1'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('mix_incli_izquierda_1') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12 col-md-2 col-lg-2" style="align-content: center">
                                                        <div class="input-group mb-3" style="align-content: center">
                                                            <div class="form-floating mb-3">
                                                                <input type="hidden" class="form-control" step="0.01"
                                                                    name="intensidad_total" id="intensidad_total">
                                                                <input type="hidden" class="form-control" step="0.01" name="optLUx"
                                                                    id="optLUx">

                                                                <label for="floatingInput" id="int_total" style="height: 60px"></label>
                                                                @if ($errors->has('intensidad_total'))
                                                                <span
                                                                    class="error text-danger">{{ $errors->first('intensidad_total') }}</span>
                                                                @endif
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="row">
                                            <div style="text-align: center">
                                                <input type="hidden" name="tipoprueba" id="tipoprueba" value="1">
                                                <input type="hidden" name="tipopruebaCi2" id="tipopruebaCi2" value="9">
                                                <input type="hidden" name="prueba" id="prueba" value="Luces">
                                                <button style="height: 55px; width: 150px" id="btn-guardar"
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
    </section>
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
    //     // document.getElementById("btn-guardar").disabled = true; // Deshabilitar el botón al cargar la página
    // });

    document.addEventListener('DOMContentLoaded', function() {
        // Cargar el tiempo guardado en el input
        const tiempoInput = document.getElementById('tiempoPrueba');
        if (tiempoInput) {
            const tiempoGuardado = getTiempoPrueba();
            tiempoInput.value = tiempoGuardado;
            // console.log(`📌 Vista: ${document.querySelector('.section-title h2')?.textContent}, Tiempo cargado: ${tiempoGuardado} minutos`);
        }

        //  obtenerArchivoDesencriptado('livianos', 'luces');
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
    var optLuxV = [0, 0, 0];
    var optLux = "0";
    $('#sum_bajas').change(function() {
        document.getElementById("btn-guardar").disabled = false;
        var sumBajas = document.getElementById('sum_bajas').checked;
        if (sumBajas) {
            optLuxV[0] = 1;
            var totalBajas = 0;
            var bajad = $("#mix_baja_derecha").val() ? $("#mix_baja_derecha").val() : 0;
            var baja1d = $("#mix_baja_derecha_1").val() ? $("#mix_baja_derecha_1").val() : 0;
            var bajai = $("#mix_baja_izquierda").val() ? $("#mix_baja_izquierda").val() : 0;
            var baja1i = $("#mix_baja_izquierda_1").val() ? $("#mix_baja_izquierda_1").val() : 0;
            var totalBajas = (parseFloat(bajad) + parseFloat(bajai) + parseFloat(baja1d) + parseFloat(baja1i));
            var total = $("#intensidad_total").val() ? $("#intensidad_total").val() : 0;
            var n = parseFloat(total) + parseFloat(totalBajas);
            $("#intensidad_total").val(parseFloat(total) + parseFloat(totalBajas));
            $("#int_total").html("Intensidad total: " + n);
            var arr = optLuxV.toString();
            var finalArray = arr.replace(",", "");
            finalArray = finalArray.replace(",", "");
            $("#optLUx").val(finalArray);
            console.log($("#optLUx").val())
        } else {
            optLuxV = [0, 0, 0];
            $("#int_total").html("");
            $("#intensidad_total").val("");
            document.getElementById('sum_altas').checked = false;
            document.getElementById('sum-anti').checked = false;
        }
    });

    $('#sum_altas').change(function() {
        document.getElementById("btn-guardar").disabled = false;
        var sumAltas = document.getElementById('sum_altas').checked;
        if (sumAltas) {
            optLuxV[1] = 1;
            var arr = optLuxV.toString();
            var finalArray = arr.replace(",", "");
            finalArray = finalArray.replace(",", "");
            $("#optLUx").val(finalArray);
            console.log($("#optLUx").val())
            var totalALtas = 0;
            var altad = $("#mix_alta_derecha").val() ? $("#mix_alta_derecha").val() : 0;
            var alta1d = $("#mix_alta_derecha_1").val() ? $("#mix_alta_derecha_1").val() : 0;
            var altai = $("#mix_alta_izquierda").val() ? $("#mix_alta_izquierda").val() : 0;
            var alta1i = $("#mix_alta_izquierda_1").val() ? $("#mix_alta_izquierda_1").val() : 0;
            var totalalta = (parseFloat(altad) + parseFloat(altai) + parseFloat(alta1d) + parseFloat(alta1i));
            var total = $("#intensidad_total").val() ? $("#intensidad_total").val() : 0;
            var n = parseFloat(total) + parseFloat(totalalta);
            $("#intensidad_total").val(parseFloat(total) + parseFloat(totalalta));
            $("#int_total").html("Intensidad total: " + n);
        } else {
            optLuxV = [0, 0, 0];
            //optLux = "";
            $("#int_total").html("");
            $("#intensidad_total").val("");
            document.getElementById('sum_bajas').checked = false;
            document.getElementById('sum-anti').checked = false;
        }
    });

    $('#sum-anti').change(function() {
        document.getElementById("btn-guardar").disabled = false;
        var sumAnti = document.getElementById('sum-anti').checked;
        if (sumAnti) {
            optLuxV[2] = 1;
            var arr = optLuxV.toString();
            var finalArray = arr.replace(",", "");
            finalArray = finalArray.replace(",", "");
            $("#optLUx").val(finalArray);
            console.log($("#optLUx").val())
            //            optLux = (optLux + 1);
            //            console.log(optLux)
            //            convertToBinary1(optLux);
            var totalanti = 0;
            var antid = $("#mix_anti_derecha").val() ? $("#mix_anti_derecha").val() : 0;
            var anti1d = $("#mix_anti_derecha_1").val() ? $("#mix_anti_derecha_1").val() : 0;
            var anti2d = $("#mix_anti_derecha_2").val() ? $("#mix_anti_derecha_2").val() : 0;
            var anti3d = $("#mix_anti_derecha_3").val() ? $("#mix_anti_derecha_3").val() : 0;
            var antii = $("#mix_anti_izquierda").val() ? $("#mix_anti_izquierda").val() : 0;
            var anti1i = $("#mix_anti_izquierda_1").val() ? $("#mix_anti_izquierda_1").val() : 0;
            var anti2i = $("#mix_anti_izquierda_2").val() ? $("#mix_anti_izquierda_2").val() : 0;
            var anti3i = $("#mix_anti_izquierda_3").val() ? $("#mix_anti_izquierda_3").val() : 0;
            console.log(antid + " " + anti1d + " " + anti2d + " " + anti3d)
            console.log(antii + " " + anti1i + " " + anti2i + " " + anti3i)
            var totalanti = (parseFloat(antid) + parseFloat(antii) + parseFloat(anti1d) + parseFloat(anti1i) +
                parseFloat(anti2i) + parseFloat(anti2d) + parseFloat(anti3i) + parseFloat(anti3d));
            var total = $("#intensidad_total").val() ? $("#intensidad_total").val() : 0;
            var n = parseFloat(total) + parseFloat(totalanti);
            $("#intensidad_total").val(parseFloat(total) + parseFloat(totalanti));
            $("#int_total").html("Intensidad total: " + n.toFixed(2));
        } else {
            optLuxV = [0, 0, 0];
            $("#int_total").html("");
            $("#intensidad_total").val("");
            document.getElementById('sum_bajas').checked = false;
            document.getElementById('sum_altas').checked = false;

        }
    });

    function convertToBinary1(number) {
        let num = number;
        let binary = (num % 2).toString();
        for (; num > 1;) {
            num = parseInt(num / 2);
            binary = (num % 2) + (binary);
        }
        console.log(binary);
    }





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
                    idtipo_prueba: 1,
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
                            res.valor = res.valor.replace(",", ".");
                            // console.log(res.observacion + " " + res.valor)
                            if (res.observacion == 'baja_izquierda') {
                                $("#mix_baja_izquierda").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_baja_izquierda');
                            }
                            if (res.observacion == 'inclinacion_izquierda') {
                                $("#mix_incli_izquierda").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_incli_izquierda');
                            }
                            if (res.observacion == 'alta_izquierda') {
                                $("#mix_alta_izquierda").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_alta_izquierda');
                            }
                            if (res.observacion == 'baja_derecha') {
                                $("#mix_baja_derecha").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_baja_derecha');
                            }

                            if (res.observacion == 'inclinacion_derecha') {
                                $("#mix_incli_derecha").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_incli_derecha');
                            }
                            if (res.observacion == 'alta_derecha') {
                                $("#mix_alta_derecha").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_alta_derecha');
                            }
                            if (res.observacion == 'antis_derecha') {
                                $("#mix_anti_derecha").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_anti_derecha');
                            }
                            if (res.observacion == 'antis_izquierda') {
                                $("#mix_anti_izquierda").val(res.valor);
                                validarRango(res.valor, 'luces', 'mix_anti_izquierda');
                            }



                        });
                    } else {
                        Toast.fire({
                            icon: "success",
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

    $(document).on('keyup', '#mix_baja_izquierda, #mix_baja_derecha, #mix_incli_izquierda, #mix_incli_derecha, #mix_baja_izquierda_1, #mix_baja_derecha_1, #mix_incli_derecha_1, #mix_incli_izquierda_1', function() {
        const valor = $(this).val();
        const idCampo = $(this).attr('id');
        validarRango(valor, 'luces', idCampo);
    });
</script>
