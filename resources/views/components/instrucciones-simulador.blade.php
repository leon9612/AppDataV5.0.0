{{--
    Modal "Instrucciones" compartido por todos los simuladores. Se abre con el
    botón .btn-instrucciones-modal que pinta <x-conexion-simulador>.
    Debe incluirse FUERA del contenedor con data-aos (el transform de AOS
    rompe el position:fixed del modal).

    Props:
    - prueba         Nombre de la prueba para el título (ej. "luces")
    - mostrarBuscar  Mostrar el paso de "Buscar Datos" (default: true)
--}}
@props([
    'prueba',
    'mostrarBuscar' => true,
])

<style>
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

<!-- ========== MODAL DE INSTRUCCIONES ========== -->
<div class="modal fade modal-instrucciones" id="instruccionesModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="modal-title">
                    <i class="bi bi-clipboard2-check"></i>
                    ¿Cómo realizar la prueba de {{ $prueba }}?
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
                        @if ($mostrarBuscar)
                        <strong><i class="bi bi-search me-1"></i> Buscar placa o llenar datos</strong>
                        <p>
                            Usa <span class="badge-search"><i class="bi bi-search"></i> Buscar Datos</span> para traer valores de una prueba anterior,
                            o completa manualmente las casillas con los valores que deseas enviar.
                        </p>
                        @else
                        <strong><i class="bi bi-pencil-square me-1"></i> Llenar datos</strong>
                        <p>
                            Completa las casillas con los valores que deseas enviar.
                        </p>
                        @endif
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
