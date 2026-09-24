<style>
    /* Solo variables de acento + estilos exclusivos de Luces (modal de
       instrucciones). El resto de .panel-pruebas-pro vive en
       public/assets/css/panel-pruebas.css */
    .panel-pruebas-pro {
        --bajas: #4361EE;
        --bajas-bg: #EEF1FD;
        --altas: #F2542D;
        --altas-bg: #FDEEEA;
        --niebla: #0E9AA7;
        --niebla-bg: #E6F6F7;
    }

    /* ===== ESTILOS DEL MODAL DE INSTRUCCIONES ===== */
    .modal-instrucciones .modal-content {
        border: none;
        border-radius: 28px;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        overflow: hidden;
    }

    .modal-instrucciones .modal-header {
        border-bottom: 1px solid rgba(0, 0, 0, 0.04);
        padding: 1.5rem 2rem;
        background: #F8FAFE;
    }

    .modal-instrucciones .modal-header .modal-title {
        font-weight: 700;
        font-size: 1.5rem;
        color: #1F2937;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .modal-instrucciones .modal-header .modal-title i {
        color: #4361EE;
        font-size: 1.8rem;
    }

    .modal-instrucciones .modal-body {
        padding: 2rem 2rem 1.5rem;
        background: #ffffff;
    }

    .modal-instrucciones .modal-footer {
        border-top: 1px solid #f0f2f5;
        padding: 1.25rem 2rem;
        background: #fafcff;
    }

    .modal-instrucciones .step-card {
        background: #F7F9FC;
        border-radius: 18px;
        padding: 1.2rem 1.5rem;
        margin-bottom: 1rem;
        border-left: 5px solid #4361EE;
        transition: 0.15s;
        display: flex;
        align-items: flex-start;
        gap: 1rem;
    }

    .modal-instrucciones .step-card:hover {
        background: #EEF2FA;
    }

    .modal-instrucciones .step-number {
        background: #4361EE;
        color: white;
        width: 34px;
        height: 34px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 1.1rem;
        flex-shrink: 0;
        margin-top: 2px;
    }

    .modal-instrucciones .step-content {
        flex: 1;
    }

    .modal-instrucciones .step-content strong {
        color: #1F2937;
        font-size: 1rem;
        display: block;
        margin-bottom: 0.2rem;
    }

    .modal-instrucciones .step-content p {
        margin: 0;
        color: #4B5563;
        font-size: 0.95rem;
        line-height: 1.5;
    }

    .modal-instrucciones .badge-connect {
        background: #16A34A;
        color: white;
        font-weight: 600;
        padding: 0.3rem 0.8rem;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .modal-instrucciones .badge-disconnect {
        background: #DC2626;
        color: white;
        font-weight: 600;
        padding: 0.3rem 0.8rem;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .modal-instrucciones .badge-search {
        background: #0E9AA7;
        color: white;
        font-weight: 600;
        padding: 0.3rem 0.8rem;
        border-radius: 30px;
        font-size: 0.8rem;
    }

    .modal-instrucciones .warning-box {
        background: #FFF9E6;
        border-radius: 18px;
        padding: 1rem 1.5rem;
        border: 1px solid #FFE082;
        display: flex;
        align-items: center;
        gap: 1rem;
        margin-top: 1.2rem;
    }

    .modal-instrucciones .warning-box i {
        color: #E6A800;
        font-size: 2rem;
    }

    .modal-instrucciones .warning-box small {
        color: #7A5D00;
        font-weight: 500;
    }

    .modal-instrucciones .icon-chip {
        display: inline-flex;
        align-items: center;
        gap: 0.3rem;
        background: white;
        padding: 0.2rem 0.8rem;
        border-radius: 40px;
        border: 1px solid #E5E7EB;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .modal-backdrop {
        backdrop-filter: blur(4px);
    }

    @media (max-width: 480px) {
        .modal-instrucciones .step-card {
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .modal-instrucciones .modal-body {
            padding: 1.25rem;
        }
    }

    .btn-instrucciones-modal {
        background: #4361EE;
        color: white;
        border: none;
        padding: 0.35rem 1.2rem;
        border-radius: 60px;
        font-weight: 600;
        font-size: 0.85rem;
        display: inline-flex;
        align-items: center;
        gap: 0.4rem;
        transition: 0.2s;
        cursor: pointer;
        margin-left: auto;
    }

    .btn-instrucciones-modal:hover {
        background: #3651d4;
        transform: scale(1.02);
        color: white;
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
                                    <div class="card-header py-3 px-4 d-flex align-items-center gap-2">
                                        <i class="bi bi-database text-dark"></i>
                                        <h5 class="mb-0 fw-bold" style="font-size:1rem;">Datos de la prueba</h5>
                                        <div class="ms-auto d-flex align-items-center gap-2">
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
                                            <!-- Botón para abrir el modal de instrucciones -->
                                            <button class="btn-instrucciones-modal" data-bs-toggle="modal" data-bs-target="#instruccionesModal">
                                                <i class="bi bi-question-circle-fill"></i> Instrucciones
                                            </button>
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
                                                        @if ($errors->has('baja_derecha'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_derecha') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="text" class="form-control form-control-sm" name="baja_derecha_1"
                                                            id="baja_derecha_1" placeholder="1" value="{{ old('baja_derecha_1') }}">
                                                        @if ($errors->has('baja_derecha_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_derecha_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="text" class="form-control form-control-sm" name="baja_derecha_2"
                                                            id="baja_derecha_2" placeholder="1" value="{{ old('baja_derecha_2') }}">
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
                                                        @if ($errors->has('baja_izquierda'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_izquierda') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 2</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="baja_izquierda_1"
                                                            id="baja_izquierda_1" placeholder="1" value="{{ old('baja_izquierda_1') }}">
                                                        @if ($errors->has('baja_izquierda_1'))
                                                        <span class="error text-danger campo-error">{{ $errors->first('baja_izquierda_1') }}</span>
                                                        @endif
                                                    </div>
                                                    <div class="eje-input">
                                                        <label>Toma 3</label>
                                                        <input type="number" step="0.01" class="form-control form-control-sm" name="baja_izquierda_2"
                                                            id="baja_izquierda_2" placeholder="1" value="{{ old('baja_izquierda_2') }}">
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

                                    @endif;

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

<!-- ========== MODAL DE INSTRUCCIONES ========== -->
<div class="modal fade modal-instrucciones" id="instruccionesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="bi bi-clipboard2-check"></i>
                    ¿Cómo realizar la prueba de luces?
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                <!-- Paso 1 -->
                <div class="step-card">
                    <div class="step-number">1</div>
                    <div class="step-content">
                        <strong><i class="bi bi-bluetooth me-1"></i> Conectar antes de iniciar</strong>
                        <p>
                            Presiona el botón <span class="badge-connect"><i class="bi bi-plug"></i> Conectar</span>
                            en el software <strong>antes</strong> de empezar la prueba en el celular.
                            <br><span class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Si no lo haces, la comunicación fallará.</span>
                        </p>
                    </div>
                </div>

                <!-- Paso 2 -->
                <div class="step-card">
                    <div class="step-number">2</div>
                    <div class="step-content">
                        <strong><i class="bi bi-search me-1"></i> Buscar placa o llenar datos</strong>
                        <p>
                            Usa <span class="badge-search"><i class="bi bi-search"></i> Buscar Datos</span> para traer valores de una prueba anterior,
                            o completa manualmente las casillas con los valores que deseas enviar.
                        </p>
                    </div>
                </div>

                <!-- Paso 3 -->
                <div class="step-card">
                    <div class="step-number">3</div>
                    <div class="step-content">
                        <strong><i class="bi bi-power me-1"></i> Desconectar al finalizar</strong>
                        <p>
                            <strong>Siempre</strong> presiona <span class="badge-disconnect"><i class="bi bi-bluetooth-off"></i> Desconectar</span>
                            cuando termines la prueba.
                            <br><span class="text-danger"><i class="bi bi-exclamation-triangle-fill"></i> Si no lo haces, el puerto queda ocupado y no podrás usar el equipo real.</span>
                        </p>
                    </div>
                </div>

                <!-- Mensaje de advertencia / consejo extra -->
                <div class="warning-box">
                    <i class="bi bi-lightbulb-fill"></i>
                    <div>
                        <small>
                            <strong>Consejo importante:</strong> Verifica que el estado cambie a
                            <span class="badge bg-success" style="font-weight:600;">Conectado</span>
                            antes de enviar cualquier valor. Si ves algún error, reconecta.
                        </small>
                    </div>
                </div>

                <!-- Mini recordatorio visual -->
                <div class="d-flex flex-wrap gap-2 mt-3 justify-content-center">
                    <span class="icon-chip"><i class="bi bi-check-circle-fill text-success"></i> Conectar primero</span>
                    <span class="icon-chip"><i class="bi bi-pencil-square text-info"></i> Llenar datos</span>
                    <span class="icon-chip"><i class="bi bi-x-circle-fill text-danger"></i> Desconectar al final</span>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary rounded-pill px-4" data-bs-dismiss="modal">
                    <i class="bi bi-x-lg me-1"></i> Cerrar
                </button>
                <button type="button" class="btn btn-primary rounded-pill px-4" data-bs-dismiss="modal">
                    <i class="bi bi-check-lg me-1"></i> Entendido
                </button>
            </div>
        </div>
    </div>
</div>

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
    function enviarDatoluces(grupo, valor) {
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
            inclinacion: Number((Math.random() * (2.0 - 1.3) + 1.3).toFixed(2)),
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

                enviarDatoluces(grupo, input.value);
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