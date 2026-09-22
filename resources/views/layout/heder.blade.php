<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>AppData</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/AppData.png') }}" rel="icon">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Fuente + estilos compartidos de los paneles de simulador -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/panel-pruebas.css') }}">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-color: #149ddd;
            --bg-dark: #040b14;
            --text-light: #f5f5f5;
            --text-gray: #a8a9b4;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            overflow-x: hidden;
        }

        /* Header/Menú */
        #header {
            position: fixed;
            top: 0;
            left: -300px;
            width: 300px;
            height: 100vh;
            background: var(--bg-dark);
            transition: left 0.3s ease;
            z-index: 9999;
            overflow-y: auto;
            box-shadow: 2px 0 10px rgba(0, 0, 0, 0.3);
        }

        #header.menu-abierto {
            left: 0;
        }

        /* Botón móvil */
        .mobile-nav-toggle {
            position: fixed;
            top: 15px;
            right: 15px;
            width: 45px;
            height: 45px;
            background: var(--primary-color);
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 24px;
            cursor: pointer;
            z-index: 10000;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.3);
        }

        .mobile-nav-toggle:hover {
            background: #1179b8;
        }

        /* Overlay cuando el menú está abierto */
        .menu-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9998;
        }

        .menu-overlay.active {
            display: block;
        }

        /* Perfil */
        .profile {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .profile img {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            border: 3px solid var(--primary-color);
        }

        .profile h1 {
            color: var(--text-light);
            font-size: 1.5rem;
            margin: 10px 0 5px;
        }

        .profile h1 a {
            color: var(--text-light);
            text-decoration: none;
        }

        .profile p {
            color: var(--text-gray);
            font-size: 0.9rem;
            margin: 0;
        }

        /* Menú de navegación */
        .nav-menu {
            padding: 15px 0;
        }

        .nav-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .nav-menu li {
            margin-bottom: 2px;
        }

        .nav-menu a {
            display: flex;
            align-items: center;
            padding: 12px 20px;
            color: var(--text-gray);
            text-decoration: none;
            font-size: 15px;
            transition: all 0.3s;
            cursor: pointer;
        }

        .nav-menu a i {
            font-size: 18px;
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .nav-menu a:hover {
            color: var(--text-light);
            background: var(--primary-color);
        }

        .nav-menu a:hover i {
            color: var(--text-light);
        }

        /* Submenús */
        .nav-item {
            position: relative;
        }

        .submenu-icon {
            margin-left: auto;
            transition: transform 0.3s;
        }

        .nav-item.abierto .submenu-icon {
            transform: rotate(180deg);
        }

        .nav-content {
            display: none;
            background: rgba(0, 0, 0, 0.2);
            padding: 5px 0;
        }

        .nav-item.abierto .nav-content {
            display: block;
        }

        .nav-content a {
            padding-left: 50px;
            font-size: 14px;
        }

        .menu-badge {
            margin-left: 10px;
            background: rgba(255, 255, 255, 0.1);
            color: white;
            font-size: 10px;
            padding: 2px 6px;
            border-radius: 10px;
        }

        /* Botón cerrar sesión */
        .mt-3 {
            margin-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 10px;
        }

        /* Ajuste para contenido principal */
        main {
            padding: 20px;
            transition: margin-left 0.3s;
        }

        @media (min-width: 992px) {
            #header {
                left: 0;
            }

            .mobile-nav-toggle {
                display: none;
            }

            main {
                margin-left: 300px;
            }
        }

        .hidden-menu-item {
            display: none !important;
        }

        /* Estilos para campos fuera de rango */
        .fuera-rango {
            background-color: #f8d7da !important;
            border: 2px solid #dc3545 !important;
            color: #721c24 !important;
            box-shadow: 0 0 0 0.2rem rgba(220, 53, 69, 0.25) !important;
        }

        /* Estilos para campos dentro de rango */
        .dentro-rango {
            background-color: #d4edda !important;
            border: 2px solid #28a745 !important;
            color: #155724 !important;
        }
    </style>

    <style>
        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .accordion-button:not(.collapsed)::after {
            filter: brightness(0) invert(1);
        }

        .accordion-button {
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .accordion-button {
                font-size: 14px;
                padding: 10px;
            }

            .form-floating label {
                font-size: 12px;
            }
        }
    </style>


    <!-- estilos de bootstrap para acordeon y formulario nuevo de simulacion de pruebas -->

    <style>
        @media (max-width: 768px) {
            .form-floating label {
                font-size: 12px;
            }

            .accordion-button {
                font-size: 14px;
                padding: 10px;
            }

            .btn {
                font-size: 14px;
            }

            .container {
                padding: 10px;
            }

            .accordion-body {
                padding: 10px;
            }

            .input-group-text {
                font-size: 12px;
                padding: 5px 8px;
            }
        }

        @media (max-width: 576px) {
            .section-title h2 {
                font-size: 18px;
            }

            .form-floating>.form-control {
                height: 50px;
                font-size: 14px;
            }

            .form-floating>label {
                font-size: 12px;
                padding: 0.5rem 0.75rem;
            }
        }

        .accordion-button:not(.collapsed) {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }

        .accordion-button:not(.collapsed)::after {
            filter: brightness(0) invert(1);
        }

        .accordion-item {
            border-radius: 10px;
            overflow: hidden;
            margin-bottom: 15px;
            border: 1px solid rgba(0, 0, 0, 0.125);
        }

        .btn-outline-success:hover {
            background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
            border: none;
            color: white;
        }
    </style>

    <!-- ======= SECCIÓN 2: GASES MIXTA SIMULADOR DE PRUEBAS ======= -->
    <style>
        /* Estilos compactos y sobrios para el simulador */
        #visor-simulador .card {
            border-radius: 8px;
            margin-bottom: 12px;
            border: 1px solid #e0e0e0;
            box-shadow: none;
        }

        #visor-simulador .card-header {
            padding: 8px 12px;
            background-color: #f5f5f5;
            border-bottom: 1px solid #e0e0e0;
            font-weight: 600;
            font-size: 13px;
            color: #333;
        }

        #visor-simulador .card-body {
            padding: 12px;
        }

        #visor-simulador .form-floating {
            margin-bottom: 0;
        }

        #visor-simulador .form-floating>.form-control {
            height: 42px;
            padding: 0.5rem 0.75rem;
            font-size: 13px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }

        #visor-simulador .form-floating>label {
            padding: 0.5rem 0.75rem;
            font-size: 11px;
            color: #666;
        }

        #visor-simulador .btn-group .btn {
            padding: 8px 12px;
            font-size: 13px;
            border-radius: 6px;
        }

        #visor-simulador .btn-outline-warning {
            color: #856404;
            border-color: #ffc107;
        }

        #visor-simulador .btn-outline-warning:hover,
        #visor-simulador .btn-check:checked+.btn-outline-warning {
            background-color: #ffc107;
            color: #333;
        }

        #visor-simulador .btn-outline-success {
            color: #2c5f2d;
            border-color: #28a745;
        }

        #visor-simulador .btn-outline-success:hover,
        #visor-simulador .btn-check:checked+.btn-outline-success {
            background-color: #28a745;
            color: white;
        }

        #visor-simulador .btn-success,
        #visor-simulador .btn-danger,
        #visor-simulador .btn-warning {
            padding: 8px 12px;
            font-size: 13px;
            border-radius: 6px;
        }

        #visor-simulador .btn-success {
            background-color: #2c5f2d;
            border-color: #2c5f2d;
        }

        #visor-simulador .btn-danger {
            background-color: #9e2a2a;
            border-color: #9e2a2a;
        }

        #visor-simulador .btn-warning {
            background-color: #e6a017;
            border-color: #e6a017;
            color: white;
        }

        #visor-simulador .badge {
            padding: 5px 12px;
            font-size: 12px;
            border-radius: 20px;
        }

        #visor-simulador .bg-danger {
            background-color: #9e2a2a !important;
        }

        #visor-simulador .bg-success {
            background-color: #2c5f2d !important;
        }

        #visor-simulador .p-2.rounded {
            background-color: #fafafa !important;
            border: 1px solid #e0e0e0;
            padding: 8px !important;
        }

        /* Alinear botones con inputs */
        #visor-simulador .btn-enviar {
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Compactar espaciado en móviles */
        @media (max-width: 768px) {
            #visor-simulador .card-body {
                padding: 8px;
            }

            #visor-simulador .form-floating>.form-control {
                height: 38px;
                font-size: 12px;
            }

            #visor-simulador .btn {
                font-size: 12px;
                padding: 6px 10px;
            }

            #visor-simulador .btn-enviar {
                height: 38px;
                margin-top: 0;
            }

            .row.g-2 {
                --bs-gutter-x: 0.5rem;
            }
        }

        /* Reducir márgenes generales */
        #visor-simulador .mb-2 {
            margin-bottom: 8px !important;
        }

        #visor-simulador .mb-3 {
            margin-bottom: 12px !important;
        }

        /* Accordion más compacto */
        #visor-simulador .accordion-button {
            padding: 10px 16px;
            font-size: 14px;
            background-color: #f8f8f8;
        }

        #visor-simulador .accordion-button:not(.collapsed) {
            background-color: #e8e8e8;
            color: #333;
        }

        #visor-simulador .accordion-body {
            padding: 12px;
        }

        #visor-simulador .accordion-item {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            overflow: hidden;
        }

        /* Asegurar misma altura en filas */
        .row.g-2>[class*="col-"] {
            margin-bottom: 8px;
        }
    </style>
</head>

<body>
    <!-- Botón móvil -->
    <button class="mobile-nav-toggle" id="menuToggle">
        <i class="bi bi-list"></i>
    </button>
    <!-- <meta name="csrf-token" content="{{ csrf_token() }}"> -->

    <!-- Overlay -->
    <div class="menu-overlay" id="menuOverlay"></div>

    <!-- Header -->
    <header id="header">
        <div class="profile">
            <img src="{{ asset('assets/img/datasim.png') }}" alt="Logo">
            <br><br>
            <p>Bienvenido al sistema</p>
        </div>

        <nav class="nav-menu">
            <ul>
                <!-- Dashboard -->
                <li class="nav-item">
                    <a href="{{ url('/cpr') }}" id="dashboard-link">
                        <i class="bi bi-house"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Frenos -->
                <li class="nav-item" id="frenosItem">
                    <a class="nav-link" onclick="toggleSubmenu('components-nav')">
                        <i class="bi bi-car-front-fill"></i>
                        <span>Frenos</span>
                        <i class="bi bi-chevron-down submenu-icon"></i>
                        <span class="menu-badge"></span>
                    </a>
                    <div class="nav-content" id="components-nav">
                        <ul>
                            <li><a href="{{ url('/al') }}" id="ali"><i class="bi bi-gear-fill"></i>Alineación</a></li>
                            <li><a href="{{ url('/fr') }}" id="fre"><i class="bi bi-gear-fill"></i>Freno mixto</a></li>
                            <li><a href="{{ url('/frm') }}" id="frem"><i class="bi bi-gear-fill"></i>Freno motos</a></li>
                            <li><a href="{{ url('/su') }}" id="sus"><i class="bi bi-gear-fill"></i>Suspensión</a></li>
                            <li><a href="{{ url('/frmotocarro') }}" id="fremc"><i class="bi bi-gear-fill"></i>Freno motocarro</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Gases -->
                <li class="nav-item" id="gasesItem">
                    <a class="nav-link" onclick="toggleSubmenu('components-nav1')">
                        <i class="bi bi-fuel-pump-diesel-fill"></i>
                        <span>Gases</span>
                        <i class="bi bi-chevron-down submenu-icon"></i>
                        <span class="menu-badge"></span>
                    </a>
                    <div class="nav-content" id="components-nav1">
                        <ul>
                            <li><a href="{{ url('/ga') }}" id="gase"><i class="bi bi-gear-fill"></i>Gases Mixto</a></li>
                            <li><a href="{{ url('/gam') }}" id="gasem"><i class="bi bi-gear-fill"></i>Gases Motos</a></li>
                            <li><a href="{{ url('/op') }}" id="opac"><i class="bi bi-gear-fill"></i>Opacidad</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Luces -->
                <li class="nav-item" id="lucesItem">
                    <a class="nav-link" onclick="toggleSubmenu('components-nav2')">
                        <i class="bi bi-lightbulb-fill"></i>
                        <span>Luces</span>
                        <i class="bi bi-chevron-down submenu-icon"></i>
                        <span class="menu-badge"></span>
                    </a>
                    <div class="nav-content" id="components-nav2">
                        <ul>
                            <li><a href="{{ url('/lu') }}" id="lux"><i class="bi bi-gear-fill"></i>Luces Mixto</a></li>
                            <li><a href="{{ url('/lum') }}" id="luxm"><i class="bi bi-gear-fill"></i>Luces Motos</a></li>
                        </ul>
                    </div>
                </li>

                <!-- Visual -->
                <li class="nav-item">
                    <a href="{{ url('/visual') }}" id="visual">
                        <i class="bi bi-eye"></i>
                        <span>Visual</span>
                    </a>
                </li>

                <!-- Sonómetro -->
                <li class="nav-item">
                    <a href="{{ url('/so') }}" id="son">
                        <i class="bi bi-mic-fill"></i>
                        <span>Sonómetro</span>
                    </a>
                </li>

                <!-- Taxímetro -->
                <li class="nav-item">
                    <a href="{{ url('/tax') }}" id="tax">
                        <i class="bi bi-speedometer2"></i>
                        <span>Taxímetro</span>
                    </a>
                </li>

                <!-- Fotos -->
                <li class="nav-item">
                    <a href="{{ url('/fot') }}" id="fot">
                        <i class="bi bi-camera"></i>
                        <span>Fotos</span>
                    </a>
                </li>

                <!-- Actualizar -->
                <li class="nav-item">
                    <a href="{{ url('/update') }}" id="actu">
                        <i class="bi bi-arrow-clockwise"></i>
                        <span>Actualizar</span>
                    </a>
                </li>

                <!-- Calibración -->
                <li class="nav-item">
                    <a href="{{ url('/cal') }}" id="cal">
                        <i class="bi bi-sliders"></i>
                        <span>Calibración</span>
                    </a>
                </li>

                <!-- Cerrar sesión -->
                <li class="nav-item mt-3">
                    <a href="{{ url('/close') }}" id="close">
                        <i class="bi bi-box-arrow-left"></i>
                        <span>Cerrar sesión</span>
                    </a>
                </li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Bootstrap JS (opcional, solo si necesitas otras funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Función para toggle del menú móvil
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('header');
            const menuToggle = document.getElementById('menuToggle');
            const menuOverlay = document.getElementById('menuOverlay');

            // Abrir/cerrar menú
            menuToggle.addEventListener('click', function() {
                header.classList.toggle('menu-abierto');
                menuOverlay.classList.toggle('active');

                // Cambiar ícono
                const icon = this.querySelector('i');
                if (header.classList.contains('menu-abierto')) {
                    icon.className = 'bi bi-x';
                } else {
                    icon.className = 'bi bi-list';
                }
            });

            // Cerrar menú al hacer clic en overlay
            menuOverlay.addEventListener('click', function() {
                header.classList.remove('menu-abierto');
                menuOverlay.classList.remove('active');
                menuToggle.querySelector('i').className = 'bi bi-list';
            });

            // Cerrar menú al hacer clic en enlaces (solo en móvil)
            const navLinks = document.querySelectorAll('.nav-menu a[href]');
            navLinks.forEach(link => {
                link.addEventListener('click', function() {
                    if (window.innerWidth < 992) {
                        header.classList.remove('menu-abierto');
                        menuOverlay.classList.remove('active');
                        menuToggle.querySelector('i').className = 'bi bi-list';
                    }
                });
            });

            // Manejar submenús en todos los tamaños de pantalla
            window.toggleSubmenu = function(id) {
                const submenu = document.getElementById(id);
                const parentItem = submenu.closest('.nav-item');

                if (submenu.style.display === 'block') {
                    submenu.style.display = 'none';
                    parentItem.classList.remove('abierto');
                } else {
                    submenu.style.display = 'block';
                    parentItem.classList.add('abierto');
                }
            };

            // Si hay un submenú abierto al cargar la página
            const activeSubmenus = document.querySelectorAll('.nav-content[style="display: block;"]');
            activeSubmenus.forEach(submenu => {
                const parentItem = submenu.closest('.nav-item');
                if (parentItem) {
                    parentItem.classList.add('abierto');
                }
            });
        });
    </script>
</body>

</html>