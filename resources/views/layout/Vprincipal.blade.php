@include('layout.heder')

<main id="main">
    <section id="visor" class="contact py-3 py-lg-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-11">
                    <!-- Encabezado principal -->
                    <div class="section-title text-center mb-4 mb-lg-5">
                        <h1 class="fw-bold display-5 text-primary">Módulo Principal</h1>
                        <div class="border-top border-primary w-25 mx-auto my-3"></div>
                        <p class="lead text-muted">Software <strong>DataSim</strong></p>
                    </div>

                    <!-- Tarjeta de descripción del sistema -->
                    <div class="card shadow-lg border-0 mb-5 rounded-4 overflow-hidden">
                        <div class="card-header bg-gradient-primary text-white py-3">
                            <h5 class="card-title mb-0"><i class="bi bi-cpu-fill me-2"></i>Descripción del Sistema</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-4">
                                    <div class="alert alert-info h-100 border-0 shadow-sm rounded-3">
                                        <h6 class="alert-heading fw-bold">
                                            <i class="bi bi-info-circle-fill me-2"></i>Funcionalidad Principal
                                        </h6>
                                        <p class="mb-0 small">
                                            Solución especializada con encriptación de datos avanzada para evitar generación de alertas en sistemas <strong>TECMMAS</strong> y <strong>SICOV</strong>.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-warning h-100 border-0 shadow-sm rounded-3">
                                        <h6 class="alert-heading fw-bold">
                                            <i class="bi bi-exclamation-triangle-fill me-2"></i>Consideraciones de Pruebas
                                        </h6>
                                        <p class="mb-0 small">
                                            Es crítico monitorear el tiempo de duración de la prueba posterior a la creación del evento inicial.
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="alert alert-danger h-100 border-0 shadow-sm rounded-3">
                                        <h6 class="alert-heading fw-bold">
                                            <i class="bi bi-shield-lock-fill me-2"></i>Confidencialidad
                                        </h6>
                                        <p class="mb-0 small">
                                            Software de uso estrictamente restringido. Requiere discreción absoluta durante su operación y manejo.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Cumplimiento normativo -->
                    <!-- <div class="card shadow-lg border-0 mb-5 rounded-4 overflow-hidden">
                        <div class="card-header bg-gradient-success text-white py-3">
                            <h5 class="card-title mb-0"><i class="bi bi-patch-check-fill me-2"></i>Cumplimiento Normativo</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4 align-items-center">
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="flex-shrink-0">
                                            <div class="bg-primary bg-opacity-10 rounded-circle p-3">
                                                <i class="bi bi-file-earmark-check-fill text-primary fs-4"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fw-bold mb-1">Resolución 2878 de 2026</h6>
                                            <p class="text-muted small mb-0">
                                                Cumplimiento total con los estándares de seguridad, trazabilidad y protección de datos establecidos en la normativa vigente.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-start mb-3">
                                        <div class="flex-shrink-0">
                                            <div class="bg-success bg-opacity-10 rounded-circle p-3">
                                                <i class="bi bi-file-earmark-check-fill text-success fs-4"></i>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="fw-bold mb-1">Resolución 9981 de 2026</h6>
                                            <p class="text-muted small mb-0">
                                                Conformidad con los lineamientos técnicos, operativos y de auditoría exigidos para sistemas de simulación y encriptación.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-success border-0 shadow-sm rounded-3 mt-4 mb-0">
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-check-circle-fill fs-4 me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Sistema Certificado</h6>
                                        <p class="mb-0 small">
                                            DataSim da pleno cumplimiento a las Resoluciones <strong>2878</strong> y <strong>9981 de 2026</strong>, garantizando operación segura y regulada.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    <!-- Cobertura y Soporte -->
                    <div class="row g-4 mb-5">
                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <div class="card-header bg-gradient-success text-white py-3">
                                    <h5 class="card-title mb-0"><i class="bi bi-award-fill me-2"></i>Cobertura de Licencia</h5>
                                </div>
                                <div class="card-body p-4">
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                            <span>Actualizaciones periódicas de llaves de encriptación</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                            <span>Soporte continuo del servicio</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-check-circle-fill text-success me-3 fs-5"></i>
                                            <span>Mejoras y actualizaciones funcionales</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-calendar-check-fill text-primary me-3 fs-5"></i>
                                            <span>Vigencia: <strong>1 año</strong> a partir de la fecha de instalación</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="card h-100 shadow-sm border-0 rounded-4 overflow-hidden">
                                <div class="card-header bg-gradient-info text-white py-3">
                                    <h5 class="card-title mb-0"><i class="bi bi-headset me-2"></i>Soporte Técnico</h5>
                                </div>
                                <div class="card-body p-4">
                                    <p class="mb-4">
                                        <i class="bi bi-life-preserver text-info me-2"></i>
                                        Asistencia continua para resolución de fallas o ajustes requeridos.
                                    </p>
                                    <h6 class="fw-bold mb-3"><i class="bi bi-gear-fill me-2"></i>Requisitos de Instalación</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-start">
                                            <i class="bi bi-pc-display text-primary me-3 fs-5"></i>
                                            <span>Equipo dedicado (PC) sin acceso a personal no autorizado</span>
                                        </li>
                                        <li class="list-group-item d-flex align-items-start">
                                            <i class="bi bi-download text-primary me-3 fs-5"></i>
                                            <span>
                                                Instalación obligatoria de
                                                <a href="https://rustdesk.com/es/" target="_blank" class="fw-bold text-decoration-none">RustDesk</a>
                                                para gestión remota de soporte
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Proceso de Implementación -->
                    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                        <div class="card-header bg-gradient-secondary text-white py-3">
                            <h5 class="card-title mb-0"><i class="bi bi-diagram-3-fill me-2"></i>Proceso de Implementación</h5>
                        </div>
                        <div class="card-body p-4">
                            <div class="row g-4">
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-3"><i class="bi bi-send-fill text-primary me-2"></i>Enviar:</h6>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-chevron-right text-primary me-2"></i>
                                            Nombre del sistema SICOV
                                        </li>
                                        <li class="list-group-item d-flex align-items-center">
                                            <i class="bi bi-chevron-right text-primary me-2"></i>
                                            Software de operación utilizado (incluyendo versión)
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-md-6">
                                    <h6 class="fw-bold mb-3"><i class="bi bi-person-lines-fill text-primary me-2"></i>Contacto:</h6>
                                    <div class="list-group">
                                        <a href="mailto:ingenierodesoftware0507@gmail.com" class="list-group-item list-group-item-action d-flex align-items-center border-0 shadow-sm mb-2 rounded-3">
                                            <i class="bi bi-envelope-fill text-danger me-3 fs-5"></i>
                                            <span class="text-break">ingenierodesoftware0507@gmail.com</span>
                                        </a>
                                        <a href="https://wa.me/573229065874" class="list-group-item list-group-item-action d-flex align-items-center border-0 shadow-sm rounded-3">
                                            <i class="bi bi-whatsapp text-success me-3 fs-5"></i>
                                            <span>+57 322 9065874 (WhatsApp/Telegram)</span>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="alert alert-warning border-0 shadow-sm rounded-3 mt-4 mb-0">
                                <div class="d-flex align-items-start">
                                    <i class="bi bi-exclamation-diamond-fill fs-4 me-3"></i>
                                    <div>
                                        <h6 class="fw-bold mb-1">Nota Importante</h6>
                                        <p class="mb-0 small">
                                            En caso de detección o bloqueo del software por mal manejo operativo, el reprocesamiento de llaves de encriptación y reprogramación de formularios generará costos adicionales.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
</main>

@include('layout.footer')

<!-- Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Bootstrap Icons -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

<style>
    :root {
        --primary-gradient: linear-gradient(135deg, #0d6efd 0%, #0a58ca 100%);
        --success-gradient: linear-gradient(135deg, #198754 0%, #146c43 100%);
        --info-gradient: linear-gradient(135deg, #0dcaf0 0%, #0aa2c0 100%);
        --secondary-gradient: linear-gradient(135deg, #6c757d 0%, #565e64 100%);
    }

    body {
        font-family: 'Segoe UI', system-ui, -apple-system, sans-serif;
        background-color: #f8f9fa;
    }

    .bg-gradient-primary {
        background: var(--primary-gradient) !important;
    }

    .bg-gradient-success {
        background: var(--success-gradient) !important;
    }

    .bg-gradient-info {
        background: var(--info-gradient) !important;
    }

    .bg-gradient-secondary {
        background: var(--secondary-gradient) !important;
    }

    .card {
        border-radius: 16px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.15) !important;
    }

    .card-header {
        border-bottom: none;
        letter-spacing: 0.3px;
    }

    .list-group-item {
        padding: 0.9rem 1rem;
        border: none;
        border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        transition: background-color 0.2s ease;
    }

    .list-group-item:last-child {
        border-bottom: none;
    }

    .list-group-item:hover {
        background-color: rgba(13, 110, 253, 0.04);
    }

    .alert {
        border-left: 5px solid;
        border-radius: 12px;
    }

    .alert-info {
        border-left-color: #0dcaf0;
    }

    .alert-warning {
        border-left-color: #ffc107;
    }

    .alert-danger {
        border-left-color: #dc3545;
    }

    .alert-success {
        border-left-color: #198754;
    }

    .section-title h1 {
        background: var(--primary-gradient);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .rounded-4 {
        border-radius: 16px !important;
    }

    a.list-group-item-action {
        transition: all 0.2s ease;
    }

    a.list-group-item-action:hover {
        background-color: rgba(13, 110, 253, 0.08);
        transform: translateX(4px);
    }

    .display-5 {
        font-weight: 700;
        letter-spacing: -0.5px;
    }
</style>