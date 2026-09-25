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

        /* ================= MENÚ LATERAL =================
           PC (>= 992px): barra lateral fija.
           Celular/tablet: barra superior + menú deslizable con fondo difuminado. */
        :root {
            --sb-width: 272px;
            --sb-bg: #0b1220;
            --sb-bg-2: #111b2e;
            --sb-text: #9aa6bd;
            --sb-text-hover: #e8edf6;
            --sb-accent: #3b82f6;
            --sb-accent-soft: rgba(59, 130, 246, 0.16);
            --sb-border: rgba(255, 255, 255, 0.06);
            --topbar-h: 58px;
        }

        #header {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sb-width);
            max-width: 86vw;
            height: 100vh;
            height: 100dvh;
            display: flex;
            flex-direction: column;
            background: linear-gradient(180deg, var(--sb-bg) 0%, var(--sb-bg-2) 100%);
            border-right: 1px solid var(--sb-border);
            z-index: 1045;
            transform: translateX(-100%);
            transition: transform 0.28s cubic-bezier(.4, 0, .2, 1), box-shadow 0.28s;
            font-family: 'Inter', 'Open Sans', sans-serif;
        }

        #header.menu-abierto {
            transform: translateX(0);
            box-shadow: 12px 0 40px rgba(0, 0, 0, 0.35);
        }

        /* Marca */
        .sb-brand {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 20px 16px 18px 18px;
            border-bottom: 1px solid var(--sb-border);
        }

        .sb-brand img {
            width: 44px;
            height: 44px;
            border-radius: 12px;
            /* datasim.png es horizontal (ícono + texto): solo se muestra el ícono */
            object-fit: cover;
            object-position: 2% center;
            box-shadow: 0 0 0 2px rgba(59, 130, 246, 0.35);
        }

        .sb-brand-text strong {
            display: block;
            color: #fff;
            font-size: 1.05rem;
            font-weight: 700;
            letter-spacing: 0.3px;
            line-height: 1.2;
        }

        .sb-brand-text small {
            color: var(--sb-text);
            font-size: 0.75rem;
        }

        .sb-close {
            margin-left: auto;
            width: 34px;
            height: 34px;
            flex-shrink: 0;
            border: none;
            border-radius: 10px;
            background: rgba(255, 255, 255, 0.06);
            color: var(--sb-text-hover);
            font-size: 1.1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Navegación */
        .nav-menu {
            flex: 1;
            overflow-y: auto;
            padding: 4px 12px 16px;
            scrollbar-width: thin;
            scrollbar-color: rgba(255, 255, 255, 0.12) transparent;
        }

        .nav-menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .sb-section {
            color: #5d6b85;
            font-size: 0.68rem;
            font-weight: 700;
            letter-spacing: 1.2px;
            text-transform: uppercase;
            padding: 16px 12px 6px;
        }

        .sb-link {
            display: flex;
            align-items: center;
            gap: 12px;
            width: 100%;
            padding: 8px 10px;
            margin-bottom: 2px;
            border: none;
            border-radius: 10px;
            background: transparent;
            color: var(--sb-text);
            font-size: 0.9rem;
            font-weight: 500;
            text-align: left;
            text-decoration: none;
            cursor: pointer;
            transition: background 0.18s, color 0.18s;
        }

        .sb-link .sb-icon {
            width: 32px;
            height: 32px;
            flex-shrink: 0;
            border-radius: 9px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.04);
            font-size: 1rem;
            transition: background 0.18s, color 0.18s;
        }

        .sb-link:hover,
        .sb-link:focus-visible {
            background: rgba(255, 255, 255, 0.05);
            color: var(--sb-text-hover);
            outline: none;
        }

        .sb-link.activo {
            background: var(--sb-accent-soft);
            color: #fff;
        }

        .sb-link.activo .sb-icon {
            background: var(--sb-accent);
            color: #fff;
            box-shadow: 0 6px 14px rgba(59, 130, 246, 0.35);
        }

        .sb-chevron {
            margin-left: auto;
            font-size: 0.75rem;
            transition: transform 0.25s;
        }

        .nav-item.abierto > .sb-link {
            color: var(--sb-text-hover);
        }

        .nav-item.abierto > .sb-link .sb-chevron {
            transform: rotate(180deg);
        }

        /* Submenú con animación de altura (grid 0fr -> 1fr) */
        .nav-content {
            display: grid;
            grid-template-rows: 0fr;
            transition: grid-template-rows 0.25s ease;
        }

        .nav-item.abierto > .nav-content {
            grid-template-rows: 1fr;
        }

        .nav-content > ul {
            min-height: 0;
            overflow: hidden;
            margin-left: 26px !important;
            border-left: 1px solid rgba(255, 255, 255, 0.08);
        }

        .nav-content a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 7px 12px;
            margin: 2px 0 2px 8px;
            border-radius: 8px;
            color: var(--sb-text);
            font-size: 0.85rem;
            text-decoration: none;
            transition: background 0.18s, color 0.18s;
        }

        .nav-content a::before {
            content: "";
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
            opacity: 0.45;
            flex-shrink: 0;
        }

        .nav-content a:hover {
            background: rgba(255, 255, 255, 0.05);
            color: var(--sb-text-hover);
        }

        .nav-content a.activo {
            color: #fff;
            background: var(--sb-accent-soft);
        }

        .nav-content a.activo::before {
            background: var(--sb-accent);
            opacity: 1;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.25);
        }

        /* Pie del menú: cerrar sesión */
        .sb-footer {
            padding: 12px;
            border-top: 1px solid var(--sb-border);
        }

        .sb-logout {
            margin-bottom: 0;
            color: #f3a5a5;
        }

        .sb-logout .sb-icon {
            background: rgba(239, 68, 68, 0.12);
            color: #f87171;
        }

        .sb-logout:hover,
        .sb-logout:focus-visible {
            background: rgba(239, 68, 68, 0.12);
            color: #fecaca;
        }

        /* Barra superior (solo celular/tablet) */
        .app-topbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: var(--topbar-h);
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 12px;
            background: rgba(11, 18, 32, 0.94);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--sb-border);
            z-index: 1030;
            font-family: 'Inter', 'Open Sans', sans-serif;
        }

        .app-topbar img {
            width: 32px;
            height: 32px;
            border-radius: 9px;
            object-fit: cover;
            object-position: 2% center;
        }

        .app-topbar-title {
            min-width: 0;
            color: #fff;
            font-weight: 700;
            font-size: 1rem;
            line-height: 1.15;
        }

        .app-topbar-title small {
            display: block;
            color: var(--sb-text);
            font-weight: 500;
            font-size: 0.72rem;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .menu-toggle {
            width: 42px;
            height: 42px;
            flex-shrink: 0;
            border: none;
            border-radius: 12px;
            background: var(--sb-accent);
            color: #fff;
            font-size: 1.4rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 6px 16px rgba(59, 130, 246, 0.35);
        }

        .menu-overlay {
            position: fixed;
            inset: 0;
            background: rgba(4, 8, 16, 0.55);
            backdrop-filter: blur(3px);
            -webkit-backdrop-filter: blur(3px);
            z-index: 1040;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.28s, visibility 0.28s;
        }

        .menu-overlay.active {
            opacity: 1;
            visibility: visible;
        }

        body.menu-bloqueado {
            overflow: hidden;
        }

        /* Ajuste para contenido principal */
        main {
            padding: 20px;
        }

        /* Móvil/tablet. Hay dos <main>: el del layout (.contenido-app, con el aviso
           de licencia) y el de cada vista (#main). Solo el primero reserva espacio
           para la barra superior; si ambos lo hacían, el hueco se duplicaba. */
        @media (max-width: 991.98px) {
            main {
                padding: 0 12px 20px;
            }

            main.contenido-app {
                padding: calc(var(--topbar-h) + 12px) 12px 0;
            }

            .aviso-licencia {
                margin-bottom: 0.5rem;
            }
        }

        /* Filas de casillas armadas con display:flex en línea (luces, frenos, gases...):
           en pantallas pequeñas pasan a 2 por fila en vez de comprimirse */
        @media (max-width: 767.98px) {
            .fila-campos {
                flex-wrap: wrap;
            }

            .fila-campos > [class*="col-"] {
                flex: 0 0 50%;
                max-width: 50%;
                padding: 0 4px;
            }

            .fila-campos > br {
                display: none;
            }
        }

        @media (min-width: 992px) {
            #header {
                max-width: none;
                transform: none;
            }

            .app-topbar,
            .menu-overlay,
            .sb-close {
                display: none;
            }

            main,
            #footer {
                margin-left: var(--sb-width);
            }
        }

        @media (prefers-reduced-motion: reduce) {
            #header,
            .nav-content,
            .menu-overlay {
                transition: none;
            }
        }

        .hidden-menu-item {
            display: none !important;
        }

        .aviso-licencia {
            display: flex;
            align-items: center;
            gap: 0.6rem;
            margin-bottom: 1rem;
            padding: 0.75rem 1rem;
            border-radius: 12px;
            border: 1px solid #FFE082;
            border-left: 5px solid #E6A800;
            background: #FFF9E6;
            color: #7A5D00;
            font-weight: 600;
        }

        .aviso-licencia.urgente {
            border-color: #F5C2C7;
            border-left-color: #DC2626;
            background: #FDECEC;
            color: #8A1C1C;
        }

        .aviso-licencia[hidden] {
            display: none;
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
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- Módulos habilitados por la licencia (los valida el servidor, ver App\Services\Licencia).
         Los id de cada enlace los usa restric.js para ocultar/mostrar sin recargar. --}}
    @php
        $modulosLicencia = session('licencia.modulos', []);
        $habilitado = fn($id) => ($modulosLicencia[$id] ?? '0') === '1';
        $esActual = fn($ruta) => request()->is($ruta) || request()->is($ruta . '/*');

        // [ruta, id de módulo, texto]
        $gruposMenu = [
            ['id' => 'frenosItem', 'nav' => 'components-nav', 'icono' => 'bi-car-front-fill', 'texto' => 'Frenos', 'items' => [
                ['al', 'ali', 'Alineación'],
                ['fr', 'fre', 'Freno mixto'],
                ['frm', 'frem', 'Freno motos'],
                ['su', 'sus', 'Suspensión'],
                ['frmotocarro', 'fremc', 'Freno motocarro'],
            ]],
            ['id' => 'gasesItem', 'nav' => 'components-nav1', 'icono' => 'bi-fuel-pump-diesel-fill', 'texto' => 'Gases', 'items' => [
                ['ga', 'gase', 'Gases Mixto'],
                ['gam', 'gasem', 'Gases Motos'],
                ['op', 'opac', 'Opacidad'],
            ]],
            ['id' => 'lucesItem', 'nav' => 'components-nav2', 'icono' => 'bi-lightbulb-fill', 'texto' => 'Luces', 'items' => [
                ['lu', 'lux', 'Luces Mixto'],
                ['lum', 'luxm', 'Luces Motos'],
            ]],
        ];

        // [ruta, id de módulo, icono, texto]
        $pruebasSueltas = [
            ['visual', 'visual', 'bi-eye', 'Visual'],
            ['so', 'son', 'bi-mic-fill', 'Sonómetro'],
            ['tax', 'tax', 'bi-speedometer2', 'Taxímetro'],
        ];
        $herramientas = [
            ['fot', 'fot', 'bi-camera', 'Fotos'],
            ['update', 'actu', 'bi-arrow-clockwise', 'Actualizar'],
            ['cal', 'cal', 'bi-sliders', 'Calibración'],
        ];

        // Nombre de la pantalla actual para la barra superior en celular/tablet
        $pantallaActual = $esActual('cpr') ? 'Dashboard' : null;
        foreach ($gruposMenu as $g) {
            foreach ($g['items'] as [$ruta, , $texto]) {
                if ($esActual($ruta)) $pantallaActual = $texto;
            }
        }
        foreach (array_merge($pruebasSueltas, $herramientas) as [$ruta, , , $texto]) {
            if ($esActual($ruta)) $pantallaActual = $texto;
        }
    @endphp

    <!-- Barra superior (celular/tablet) -->
    <div class="app-topbar">
        <button class="menu-toggle" id="menuToggle" type="button" aria-label="Abrir menú" aria-controls="header" aria-expanded="false">
            <i class="bi bi-list"></i>
        </button>
        <img src="{{ asset('assets/img/datasim.png') }}" alt="">
        <div class="app-topbar-title">
            DataSim
            <small>{{ $pantallaActual ?? 'Bienvenido al sistema' }}</small>
        </div>
    </div>

    <!-- Overlay -->
    <div class="menu-overlay" id="menuOverlay"></div>

    <!-- Menú lateral -->
    <header id="header" aria-label="Menú principal">
        <div class="sb-brand">
            <img src="{{ asset('assets/img/datasim.png') }}" alt="Logo">
            <div class="sb-brand-text">
                <strong>DataSim</strong>
                <small>Bienvenido al sistema</small>
            </div>
            <button class="sb-close" id="menuClose" type="button" aria-label="Cerrar menú">
                <i class="bi bi-x-lg"></i>
            </button>
        </div>

        <nav class="nav-menu">
            <ul>
                <li class="nav-item">
                    <a href="{{ url('/cpr') }}" id="dashboard-link" @class(['sb-link', 'activo' => $esActual('cpr')])>
                        <span class="sb-icon"><i class="bi bi-grid-1x2-fill"></i></span>
                        <span>Dashboard</span>
                    </a>
                </li>
            </ul>

            <div class="sb-section">Pruebas</div>
            <ul>
                @foreach ($gruposMenu as $grupo)
                @php
                    $grupoActivo = collect($grupo['items'])->contains(fn($i) => $esActual($i[0]));
                    $grupoVisible = collect($grupo['items'])->contains(fn($i) => $habilitado($i[1]));
                @endphp
                <li id="{{ $grupo['id'] }}" @class(['nav-item', 'abierto' => $grupoActivo, 'hidden-menu-item' => !$grupoVisible])>
                    <button type="button" class="sb-link" onclick="toggleSubmenu('{{ $grupo['nav'] }}')"
                        aria-expanded="{{ $grupoActivo ? 'true' : 'false' }}" aria-controls="{{ $grupo['nav'] }}">
                        <span class="sb-icon"><i class="bi {{ $grupo['icono'] }}"></i></span>
                        <span>{{ $grupo['texto'] }}</span>
                        <i class="bi bi-chevron-down sb-chevron"></i>
                    </button>
                    <div class="nav-content" id="{{ $grupo['nav'] }}">
                        <ul>
                            @foreach ($grupo['items'] as [$ruta, $modulo, $texto])
                            <li><a href="{{ url('/' . $ruta) }}" id="{{ $modulo }}" @class(['activo' => $esActual($ruta), 'hidden-menu-item' => !$habilitado($modulo)])>{{ $texto }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
                @endforeach

                @foreach ($pruebasSueltas as [$ruta, $modulo, $icono, $texto])
                <li class="nav-item">
                    <a href="{{ url('/' . $ruta) }}" id="{{ $modulo }}" @class(['sb-link', 'activo' => $esActual($ruta), 'hidden-menu-item' => !$habilitado($modulo)])>
                        <span class="sb-icon"><i class="bi {{ $icono }}"></i></span>
                        <span>{{ $texto }}</span>
                    </a>
                </li>
                @endforeach
            </ul>

            <div class="sb-section">Herramientas</div>
            <ul>
                @foreach ($herramientas as [$ruta, $modulo, $icono, $texto])
                <li class="nav-item">
                    <a href="{{ url('/' . $ruta) }}" id="{{ $modulo }}" @class(['sb-link', 'activo' => $esActual($ruta), 'hidden-menu-item' => !$habilitado($modulo)])>
                        <span class="sb-icon"><i class="bi {{ $icono }}"></i></span>
                        <span>{{ $texto }}</span>
                    </a>
                </li>
                @endforeach
            </ul>
        </nav>

        <div class="sb-footer">
            <a href="{{ url('/close') }}" id="close" class="sb-link sb-logout">
                <span class="sb-icon"><i class="bi bi-box-arrow-left"></i></span>
                <span>Cerrar sesión</span>
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="contenido-app">
        {{-- Aviso de vencimiento: visible cuando faltan pocos días (lo actualiza restric.js al validar la licencia) --}}
        @php($diasLicencia = session('licencia.diasRestantes'))
        <div id="avisoVencimientoLicencia" @class(['aviso-licencia', 'urgente' => is_int($diasLicencia) && $diasLicencia <= 3]) role="alert"
            @if (!is_int($diasLicencia) || $diasLicencia < 1 || $diasLicencia > 7) hidden @endif>
            <i class="bi bi-exclamation-triangle-fill"></i>
            <span id="avisoVencimientoLicenciaTexto">
                @if (is_int($diasLicencia))
                {{ $diasLicencia === 1 ? 'Su licencia expira MAÑANA' : "Su licencia expira en {$diasLicencia} días" }}
                ({{ session('licencia.fechavigencia') }}). Comuníquese con el administrador para renovarla.
                @endif
            </span>
        </div>
        @yield('content')
    </main>

    <!-- Bootstrap JS (opcional, solo si necesitas otras funcionalidades) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const header = document.getElementById('header');
            const menuToggle = document.getElementById('menuToggle');
            const menuClose = document.getElementById('menuClose');
            const menuOverlay = document.getElementById('menuOverlay');
            const esMovil = () => window.innerWidth < 992;

            function abrirMenu(abrir) {
                header.classList.toggle('menu-abierto', abrir);
                menuOverlay.classList.toggle('active', abrir);
                document.body.classList.toggle('menu-bloqueado', abrir);
                menuToggle.setAttribute('aria-expanded', abrir ? 'true' : 'false');
                menuToggle.querySelector('i').className = abrir ? 'bi bi-x-lg' : 'bi bi-list';
            }

            menuToggle.addEventListener('click', () => abrirMenu(!header.classList.contains('menu-abierto')));
            menuClose.addEventListener('click', () => abrirMenu(false));
            menuOverlay.addEventListener('click', () => abrirMenu(false));
            document.addEventListener('keydown', e => {
                if (e.key === 'Escape' && header.classList.contains('menu-abierto')) abrirMenu(false);
            });
            // Al pasar a PC (girar tablet, redimensionar) no dejar el scroll bloqueado
            window.addEventListener('resize', () => {
                if (!esMovil() && header.classList.contains('menu-abierto')) abrirMenu(false);
            });

            // Cerrar menú al elegir una opción (solo celular/tablet)
            header.querySelectorAll('a[href]').forEach(link => {
                link.addEventListener('click', () => { if (esMovil()) abrirMenu(false); });
            });

            window.toggleSubmenu = function(id) {
                const item = document.getElementById(id).closest('.nav-item');
                const abierto = item.classList.toggle('abierto');
                item.querySelector(':scope > .sb-link').setAttribute('aria-expanded', abierto ? 'true' : 'false');
            };

            // Un grupo (Frenos, Gases, Luces) se oculta si ninguno de sus módulos está
            // habilitado; restric.js puede cambiarlos sin recargar, así que se recalcula.
            const grupos = Array.from(header.querySelectorAll('.nav-content'), n => n.closest('.nav-item'));
            const actualizarGrupos = () => grupos.forEach(grupo => {
                const visibles = grupo.querySelectorAll('.nav-content a:not(.hidden-menu-item)').length;
                grupo.classList.toggle('hidden-menu-item', visibles === 0);
            });
            new MutationObserver(actualizarGrupos).observe(header.querySelector('.nav-menu'), {
                subtree: true,
                attributes: true,
                attributeFilter: ['class'],
            });
        });
    </script>
</body>

</html>