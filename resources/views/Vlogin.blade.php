<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>DataSim - Login</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Segoe UI', system-ui, sans-serif;
            background: #0a0e1a;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .bg-grid {
            position: fixed;
            inset: 0;
            z-index: 0;
            background-image:
                linear-gradient(rgba(99, 179, 237, 0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(99, 179, 237, 0.04) 1px, transparent 1px);
            background-size: 48px 48px;
        }

        .bg-glow {
            position: fixed;
            z-index: 0;
            border-radius: 50%;
            filter: blur(80px);
            pointer-events: none;
        }

        .bg-glow-1 {
            width: 500px;
            height: 500px;
            background: rgba(56, 189, 248, 0.08);
            top: -100px;
            right: -100px;
        }

        .bg-glow-2 {
            width: 400px;
            height: 400px;
            background: rgba(139, 92, 246, 0.07);
            bottom: -80px;
            left: -80px;
        }

        .bg-glow-3 {
            width: 300px;
            height: 300px;
            background: rgba(34, 211, 238, 0.05);
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        .login-wrapper {
            position: relative;
            z-index: 10;
            width: 100%;
            max-width: 440px;
            padding: 1.5rem;
        }

        .card-glass {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.09);
            border-radius: 20px;
            padding: 2.5rem 2rem;
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
        }

        /* Brand */
        .brand {
            text-align: center;
            margin-bottom: 2rem;
        }

        /* Logo: ocupa el ancho de la tarjeta hasta 340px y mantiene la proporción original (340x140) */
        .brand-logo {
            display: block;
            width: 100%;
            max-width: 340px;
            height: auto;
            aspect-ratio: 340 / 140;
            object-fit: contain;
            margin: 0 auto;
            cursor: pointer;
        }

        @media (max-width: 400px) {
            .login-wrapper {
                padding: 1rem;
            }

            .card-glass {
                padding: 2rem 1.25rem;
            }

            .brand {
                margin-bottom: 1.5rem;
            }
        }

        .brand-icon {
            width: 56px;
            height: 56px;
            border-radius: 16px;
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1rem;
            font-size: 1.4rem;
            color: white;
            cursor: pointer;
        }

        .brand-name {
            font-size: 1.7rem;
            font-weight: 700;
            color: #f1f5f9;
            letter-spacing: -0.5px;
        }

        .brand-name span {
            background: linear-gradient(90deg, #38bdf8, #818cf8);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .brand-sub {
            font-size: 0.75rem;
            color: rgba(148, 163, 184, 0.6);
            margin-top: 0.3rem;
            letter-spacing: 1.8px;
            text-transform: uppercase;
        }

        .section-title {
            font-size: 0.875rem;
            color: rgba(148, 163, 184, 0.8);
            margin-bottom: 1.5rem;
            text-align: center;
        }

        /* Form */
        .form-group-custom {
            margin-bottom: 1.1rem;
        }

        .form-label-custom {
            display: block;
            font-size: 0.72rem;
            color: rgba(148, 163, 184, 0.75);
            margin-bottom: 0.4rem;
            letter-spacing: 0.5px;
            font-weight: 500;
        }

        .input-wrap {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 13px;
            top: 50%;
            transform: translateY(-50%);
            color: rgba(148, 163, 184, 0.45);
            font-size: 0.85rem;
            pointer-events: none;
        }

        .form-control-custom {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: #f1f5f9;
            font-size: 0.875rem;
            padding: 0.7rem 0.9rem 0.7rem 2.4rem;
            outline: none;
            transition: border-color 0.2s, background 0.2s;
        }

        .form-control-custom::placeholder {
            color: rgba(148, 163, 184, 0.35);
        }

        .form-control-custom:focus {
            border-color: rgba(56, 189, 248, 0.5);
            background: rgba(56, 189, 248, 0.05);
        }

        .form-control-custom.is-invalid {
            border-color: rgba(239, 68, 68, 0.6);
            background: rgba(239, 68, 68, 0.04);
        }

        .password-toggle {
            position: absolute;
            right: 11px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: rgba(148, 163, 184, 0.45);
            cursor: pointer;
            padding: 0;
            font-size: 0.82rem;
            transition: color 0.2s;
        }

        .password-toggle:hover {
            color: #94a3b8;
        }

        /* Errores Laravel */
        .invalid-feedback-custom {
            font-size: 0.72rem;
            color: #f87171;
            margin-top: 0.35rem;
            display: flex;
            align-items: center;
            gap: 4px;
        }

        /* Alert de sesión */
        .alert-custom {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.25);
            border-radius: 10px;
            color: #fca5a5;
            font-size: 0.8rem;
            padding: 0.65rem 0.9rem;
            margin-bottom: 1.25rem;
            display: flex;
            align-items: flex-start;
            gap: 8px;
        }

        .alert-dismiss {
            background: none;
            border: none;
            color: rgba(252, 165, 165, 0.6);
            cursor: pointer;
            margin-left: auto;
            font-size: 0.9rem;
            padding: 0;
            line-height: 1;
            transition: color 0.2s;
        }

        .alert-dismiss:hover {
            color: #fca5a5;
        }

        /* Botón login */
        .btn-login-custom {
            width: 100%;
            padding: 0.78rem;
            border-radius: 10px;
            border: none;
            background: linear-gradient(135deg, #38bdf8, #818cf8);
            color: white;
            font-size: 0.9rem;
            font-weight: 600;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.15s;
            margin-top: 0.75rem;
            letter-spacing: 0.3px;
        }

        .btn-login-custom:hover {
            opacity: 0.9;
            transform: translateY(-1px);
        }

        .btn-login-custom:active {
            transform: translateY(0);
            opacity: 1;
        }

        .btn-login-custom:disabled {
            opacity: 0.65;
            cursor: not-allowed;
            transform: none;
        }

        /* Mientras se valida el login (restric.js) */
        .btn-login-custom.cargando {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            cursor: wait;
        }

        .btn-login-spinner {
            width: 1rem;
            height: 1rem;
            border: 2px solid rgba(255, 255, 255, 0.35);
            border-top-color: #fff;
            border-radius: 50%;
            animation: girar-login 0.7s linear infinite;
        }

        @keyframes girar-login {
            to {
                transform: rotate(360deg);
            }
        }

        /* Badge versión */
        .version-info {
            position: fixed;
            bottom: 14px;
            right: 16px;
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            padding: 4px 10px;
            font-size: 0.72rem;
            color: rgba(148, 163, 184, 0.55);
            z-index: 20;
            cursor: default;
            user-select: none;
            transition: background 0.2s;
        }

        .version-info:hover {
            background: rgba(255, 255, 255, 0.07);
        }

        /* === MODAL LOCALSTORAGE === */
        .ls-overlay {
            display: none;
            position: fixed;
            inset: 0;
            z-index: 1000;
            background: rgba(0, 0, 0, 0.72);
            align-items: center;
            justify-content: center;
            backdrop-filter: blur(6px);
        }

        .ls-overlay.open {
            display: flex;
        }

        .ls-modal {
            background: #0f172a;
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 18px;
            padding: 1.75rem;
            width: 92%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
        }

        .ls-modal::-webkit-scrollbar {
            width: 4px;
        }

        .ls-modal::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 4px;
        }

        .ls-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 1.25rem;
        }

        .ls-title {
            font-size: 1rem;
            font-weight: 600;
            color: #f1f5f9;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .ls-close {
            background: none;
            border: none;
            color: rgba(148, 163, 184, 0.6);
            font-size: 1.1rem;
            cursor: pointer;
            padding: 5px 7px;
            border-radius: 6px;
            transition: color 0.2s, background 0.2s;
        }

        .ls-close:hover {
            color: #f1f5f9;
            background: rgba(255, 255, 255, 0.08);
        }

        .ls-search {
            width: 100%;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 8px;
            color: #f1f5f9;
            font-size: 0.8rem;
            padding: 0.5rem 0.75rem;
            outline: none;
            margin-bottom: 0.85rem;
        }

        .ls-search::placeholder {
            color: rgba(148, 163, 184, 0.4);
        }

        .ls-search:focus {
            border-color: rgba(56, 189, 248, 0.4);
        }

        .ls-empty {
            text-align: center;
            color: rgba(148, 163, 184, 0.5);
            font-size: 0.82rem;
            padding: 2rem 0;
        }

        .ls-count {
            font-size: 0.72rem;
            color: rgba(148, 163, 184, 0.5);
            text-align: center;
            margin-bottom: 0.75rem;
        }

        .ls-item {
            display: flex;
            align-items: center;
            gap: 10px;
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.07);
            border-radius: 8px;
            padding: 0.65rem 0.85rem;
            margin-bottom: 0.5rem;
        }

        .ls-item-check {
            cursor: pointer;
            accent-color: #38bdf8;
            width: 15px;
            height: 15px;
            flex-shrink: 0;
        }

        .ls-item-info {
            flex: 1;
            min-width: 0;
        }

        .ls-item-key {
            font-size: 0.78rem;
            color: #94a3b8;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ls-item-val {
            font-size: 0.7rem;
            color: rgba(148, 163, 184, 0.4);
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .ls-item-del {
            background: none;
            border: none;
            color: rgba(239, 68, 68, 0.5);
            cursor: pointer;
            font-size: 0.85rem;
            padding: 4px 6px;
            border-radius: 5px;
            transition: color 0.2s, background 0.2s;
            flex-shrink: 0;
        }

        .ls-item-del:hover {
            color: #ef4444;
            background: rgba(239, 68, 68, 0.1);
        }

        .ls-section-title {
            font-size: 0.72rem;
            font-weight: 600;
            color: #38bdf8;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            margin: 0.25rem 0 0.6rem;
        }

        #cfgServerList {
            margin-bottom: 1.25rem;
        }

        .ls-item-edit {
            background: none;
            border: none;
            color: rgba(56, 189, 248, 0.6);
            cursor: pointer;
            font-size: 0.85rem;
            padding: 4px 6px;
            border-radius: 5px;
            transition: color 0.2s, background 0.2s;
            flex-shrink: 0;
        }

        .ls-item-edit:hover {
            color: #38bdf8;
            background: rgba(56, 189, 248, 0.1);
        }

        .ls-actions {
            display: flex;
            gap: 8px;
            margin-top: 1rem;
            flex-wrap: wrap;
        }

        .ls-btn {
            flex: 1;
            min-width: 120px;
            padding: 0.5rem 0.75rem;
            border-radius: 8px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 0.78rem;
            cursor: pointer;
            transition: all 0.2s;
            font-weight: 500;
        }

        .ls-btn-select {
            background: rgba(56, 189, 248, 0.08);
            color: #38bdf8;
        }

        .ls-btn-select:hover {
            background: rgba(56, 189, 248, 0.15);
        }

        .ls-btn-delete {
            background: rgba(239, 68, 68, 0.08);
            color: #ef4444;
        }

        .ls-btn-delete:hover {
            background: rgba(239, 68, 68, 0.15);
            border-color: rgba(239, 68, 68, 0.3);
        }

        .ls-btn-clear {
            background: rgba(168, 85, 247, 0.08);
            color: #a855f7;
        }

        .ls-btn-clear:hover {
            background: rgba(168, 85, 247, 0.15);
        }

        /* ── Pantalla de carga: se ve mientras se configura la conexión y se valida licencia/dispositivo ── */
        .carga-overlay {
            position: fixed;
            inset: 0;
            z-index: 1050; /* debajo de SweetAlert (1060) para que los prompts de dominio/url se vean encima */
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0a0e1a;
            transition: opacity .45s ease, visibility .45s ease;
        }

        .carga-overlay.oculta {
            opacity: 0;
            visibility: hidden;
        }

        .carga-box {
            width: min(360px, calc(100vw - 32px));
            text-align: center;
            color: #e2e8f0;
        }

        .carga-logo {
            width: 100%;
            max-width: 220px;
            margin-bottom: 28px;
            animation: carga-pulso 2s ease-in-out infinite;
        }

        @keyframes carga-pulso {
            50% {
                opacity: .55;
            }
        }

        .carga-barra {
            height: 4px;
            border-radius: 4px;
            background: rgba(148, 163, 184, 0.15);
            overflow: hidden;
            margin-bottom: 22px;
        }

        .carga-barra-fill {
            height: 100%;
            width: 0;
            border-radius: 4px;
            background: linear-gradient(90deg, #38bdf8, #8b5cf6);
            transition: width .5s ease;
        }

        .carga-pasos {
            list-style: none;
            text-align: left;
            font-size: .9rem;
        }

        .carga-pasos li {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 6px 0;
            color: #475569;
            transition: color .3s;
        }

        .carga-pasos .carga-icono {
            width: 1.1rem;
            height: 1.1rem;
            flex-shrink: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 2px solid currentColor;
            font-size: .7rem;
        }

        .carga-pasos li.activo {
            color: #e2e8f0;
        }

        .carga-pasos li.activo .carga-icono {
            border-color: rgba(56, 189, 248, 0.25);
            border-top-color: #38bdf8;
            animation: girar-login .8s linear infinite;
        }

        .carga-pasos li.hecho {
            color: #94a3b8;
        }

        .carga-pasos li.hecho .carga-icono {
            border-color: #22c55e;
            background: #22c55e;
            color: #0a0e1a;
        }

        .carga-pasos li.hecho .carga-icono::before {
            content: "¹3";
            font-weight: 700;
        }

        .carga-pasos li.fallo {
            color: #f87171;
        }

        .carga-pasos li.fallo .carga-icono::before {
            content: "¹5";
            font-weight: 700;
        }

        @media (prefers-reduced-motion: reduce) {
            .carga-logo,
            .carga-pasos li.activo .carga-icono {
                animation: none;
            }
        }
    </style>
</head>

<body>

    <!-- Pantalla de carga (restric.js la avanza con cargaLogin.paso / cargaLogin.fin) -->
    <div class="carga-overlay" id="cargaLogin" role="status" aria-live="polite">
        <div class="carga-box">
            <img src="{{ asset('assets/img/datasim.png') }}" alt="DataSim" class="carga-logo">
            <div class="carga-barra"><div class="carga-barra-fill" id="cargaBarra"></div></div>
            <ul class="carga-pasos">
                <li data-paso="recursos" class="activo"><span class="carga-icono"></span>Cargando recursos</li>
                <li data-paso="conexion"><span class="carga-icono"></span>Configurando conexión con el servidor</li>
                <li data-paso="licencia"><span class="carga-icono"></span>Validando licencia y dispositivo</li>
            </ul>
        </div>
    </div>

    <!-- Fondo -->
    <div class="bg-grid"></div>
    <div class="bg-glow bg-glow-1"></div>
    <div class="bg-glow bg-glow-2"></div>
    <div class="bg-glow bg-glow-3"></div>

    <!-- Badge versión (5 clicks activa el panel LS) -->
    <div class="version-info" id="versionBadge" title="v4.0.0">
        <i class="bi bi-tag-fill me-1"></i> V4.0.0
    </div>

    <!-- Modal LocalStorage (función oculta) -->
    <div class="ls-overlay" id="lsOverlay">
        <div class="ls-modal">
            <div class="ls-header">
                <div class="ls-title">
                    <i class="bi bi-database-gear" style="color:#38bdf8"></i>
                    Gestión de localStorage
                </div>
                <button class="ls-close" onclick="closeLsModal()"><i class="bi bi-x-lg"></i></button>
            </div>
            <!-- Configuración compartida guardada en el servidor (se pide una sola vez para todos los dispositivos) -->
            <div class="ls-section-title"><i class="bi bi-hdd-network me-1"></i>Configuración del servidor</div>
            <div id="cfgServerList"></div>

            <div class="ls-section-title"><i class="bi bi-laptop me-1"></i>localStorage de este equipo</div>
            <input class="ls-search" type="text" id="lsSearch" placeholder="Buscar clave..." oninput="renderKeys()">
            <div class="ls-count" id="lsCount"></div>
            <div id="lsKeyList"></div>
            <div class="ls-actions">
                <button class="ls-btn ls-btn-select" onclick="selectAll()"><i class="bi bi-check-all me-1"></i>Seleccionar todo</button>
                <button class="ls-btn ls-btn-delete" onclick="deleteSelected()"><i class="bi bi-trash me-1"></i>Eliminar selección</button>
                <button class="ls-btn ls-btn-clear" onclick="clearAll()"><i class="bi bi-lightning me-1"></i>Limpiar todo</button>
            </div>
        </div>
    </div>

    <!-- Login -->
    <div class="login-wrapper">
        <div class="card-glass">
            <div class="brand">
                <div onclick="bajarLineas()">
                    <img src="{{ asset('assets/img/datasim.png') }}" alt="Logo" class="brand-logo">
                </div>
                <!-- <div class="brand-name">Data<span>Sim</span></div> -->
                <!-- <div class="brand-sub">Sistema de gestión de información</div> -->
            </div>

            <form id="formLogin">
                @csrf

                @if ($message = Session::get('error'))
                <div class="alert-custom" id="alertError">
                    <i class="bi bi-exclamation-triangle-fill" style="flex-shrink:0;margin-top:1px"></i>
                    <span><strong>Error:</strong> {{ $message }}</span>
                    <button type="button" class="alert-dismiss" onclick="this.closest('#alertError').remove()">
                        <i class="bi bi-x-lg"></i>
                    </button>
                </div>
                @endif

                <p class="section-title">Ingrese sus credenciales para acceder</p>

                <div class="form-group-custom">
                    <label class="form-label-custom" for="typeEmailX">
                        <i class="bi bi-envelope-fill me-1"></i>Correo Electrónico
                    </label>
                    <div class="input-wrap">
                        <i class="bi bi-envelope input-icon"></i>
                        <input type="email"
                            id="typeEmailX"
                            name="email"
                            class="form-control-custom {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            placeholder="nombre@ejemplo.com"
                            value="{{ old('email') }}"
                            required>
                    </div>
                    @if ($errors->has('email'))
                    <div class="invalid-feedback-custom">
                        <i class="bi bi-exclamation-circle-fill"></i>{{ $errors->first('email') }}
                    </div>
                    @endif
                </div>

                <div class="form-group-custom">
                    <label class="form-label-custom" for="typePasswordX">
                        <i class="bi bi-lock-fill me-1"></i>Contraseña
                    </label>
                    <div class="input-wrap">
                        <i class="bi bi-lock input-icon"></i>
                        <input type="password"
                            id="typePasswordX"
                            name="password"
                            class="form-control-custom {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            placeholder="••••••••"
                            required>
                        <button type="button" class="password-toggle" onclick="togglePass()">
                            <i class="bi bi-eye" id="passIcon"></i>
                        </button>
                    </div>
                    @if ($errors->has('password'))
                    <div class="invalid-feedback-custom">
                        <i class="bi bi-exclamation-circle-fill"></i>{{ $errors->first('password') }}
                    </div>
                    @endif
                </div>

                <button class="btn-login-custom" type="submit" id="btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Ingresar
                </button>
            </form>
        </div>
    </div>

    <!-- Bootstrap Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Custom JS (tuyo, sin cambios) -->
    <script>window.DOMINIO_APP = @json(config('app.dominio'));</script>
    <script src="{{ asset('assets/data/restric.js') }}?v={{ time() }}"></script>

    <script>
        // ── Pantalla de carga: restric.js marca el paso en curso; los anteriores quedan como hechos ──
        const cargaLogin = (function() {
            const overlay = document.getElementById('cargaLogin');
            const pasos = Array.from(overlay.querySelectorAll('[data-paso]'));
            const barra = document.getElementById('cargaBarra');

            function marcar(nombre, estadoActual) {
                const idx = pasos.findIndex(li => li.dataset.paso === nombre);
                pasos.forEach((li, i) => {
                    li.className = i < idx ? 'hecho' : (i === idx ? estadoActual : '');
                });
                barra.style.width = Math.round((idx + (estadoActual === 'hecho' ? 1 : 0.5)) / pasos.length * 100) + '%';
            }

            return {
                paso: (nombre) => marcar(nombre, 'activo'),
                // ok=false: se marca el paso como fallido y se quita la pantalla para mostrar el aviso de bloqueo
                fin: (ok = true) => {
                    const actual = pasos.find(li => li.classList.contains('activo')) || pasos[pasos.length - 1];
                    marcar(actual.dataset.paso, ok ? 'hecho' : 'fallo');
                    setTimeout(() => overlay.classList.add('oculta'), ok ? 450 : 0);
                }
            };
        })();
        cargaLogin.paso('recursos');
    </script>

    <script>
        // ── Toggle contraseña ──
        function togglePass() {
            const input = document.getElementById('typePasswordX');
            const icon = document.getElementById('passIcon');
            if (input.type === 'password') {
                input.type = 'text';
                icon.className = 'bi bi-eye-slash';
            } else {
                input.type = 'password';
                icon.className = 'bi bi-eye';
            }
        }

        // ── Easter egg: 5 clicks en badge de versión ──
        let vClicks = 0,
            vTimer;
        document.getElementById('versionBadge').addEventListener('click', () => {
            vClicks++;
            clearTimeout(vTimer);
            vTimer = setTimeout(() => vClicks = 0, 2000);
            if (vClicks >= 5) {
                vClicks = 0;
                openLsModal();
            }
        });

        // ── Modal LocalStorage ──
        function openLsModal() {
            document.getElementById('lsOverlay').classList.add('open');
            renderConfigServidor();
            renderKeys();
        }

        // ── Configuración del servidor (urlserver e ips_<linea>, ver Clogin::saveConfigApp) ──
        // Campos de cada pista: los mismos que pide getdatamachine.js (TIPOS_POR_LINEA)
        const CONFIG_SERVIDOR = {
            urlserver: { titulo: 'URL del servidor' },
            ips_motos: { titulo: 'Pista motos', campos: ['freno', 'datareles'] },
            ips_livianos: { titulo: 'Pista livianos', campos: ['freno', 'alineador', 'suspension', 'dataalineador', 'datareles', 'tipopista'] },
            ips_mixta: { titulo: 'Pista mixta', campos: ['freno', 'alineador', 'suspension', 'dataalineador', 'datareles', 'tipopista'] },
            ips_taximetro: { titulo: 'Taxímetro', campos: ['taximetro'] }
        };
        const ETIQUETAS_CAMPO = { dataalineador: 'Data alineador', datareles: 'Data reles', tipopista: 'Tipo de pista' };
        const SWAL_OSCURO = { background: '#0f172a', color: '#f1f5f9', confirmButtonColor: '#38bdf8', cancelButtonColor: '#334155' };
        let configServidor = {};

        function etiquetaCampo(campo) {
            return ETIQUETAS_CAMPO[campo] || 'IP – ' + campo.charAt(0).toUpperCase() + campo.slice(1);
        }

        function renderConfigServidor() {
            const list = document.getElementById('cfgServerList');
            list.innerHTML = '<div class="ls-empty" style="padding:1rem 0">Cargando...</div>';
            leerConfigApp().then(data => {
                configServidor = data || {};
                list.innerHTML = Object.keys(CONFIG_SERVIDOR).map(clave => {
                    const valor = configServidor[clave];
                    const texto = !valor ? '' : typeof valor === 'object' ?
                        Object.entries(valor).map(([k, v]) => `${k}: ${v}`).join(' · ') : valor;
                    return `<div class="ls-item">
                        <div class="ls-item-info">
                            <div class="ls-item-key">${escHtml(CONFIG_SERVIDOR[clave].titulo)}</div>
                            <div class="ls-item-val" title="${escHtml(texto)}">${escHtml(texto) || '<em style="opacity:0.5">sin configurar (se pedirá al usarse)</em>'}</div>
                        </div>
                        <button class="ls-item-edit" onclick="editarConfigServidor('${clave}')" title="Editar"><i class="bi bi-pencil"></i></button>
                        ${valor ? `<button class="ls-item-del" onclick="borrarConfigServidor('${clave}')" title="Borrar (se volverá a pedir)"><i class="bi bi-trash3"></i></button>` : ''}
                    </div>`;
                }).join('');
            }).catch(() => {
                list.innerHTML = '<div class="ls-empty" style="padding:1rem 0">No se pudo leer la configuración del servidor</div>';
            });
        }

        // Tras guardar en el servidor se actualiza también la copia local de este equipo
        function aplicarConfigLocal(clave, valor) {
            if (!valor) {
                localStorage.removeItem(clave);
            } else {
                localStorage.setItem(clave, typeof valor === 'object' ? JSON.stringify(valor) : valor);
            }
            renderConfigServidor();
            renderKeys();
        }

        function editarConfigServidor(clave) {
            const def = CONFIG_SERVIDOR[clave];
            const actual = configServidor[clave] || (def.campos ? {} : '');
            const opciones = {
                ...SWAL_OSCURO,
                title: def.titulo,
                showCancelButton: true,
                confirmButtonText: 'Guardar',
                cancelButtonText: 'Cancelar',
                showLoaderOnConfirm: true
            };

            if (def.campos) {
                opciones.html = def.campos.map(campo => `
                    <div style="text-align:left;margin-bottom:10px">
                        <label style="display:block;font-size:13px;color:#94a3b8;margin-bottom:4px">${escHtml(etiquetaCampo(campo))}</label>
                        <input id="cfg-${campo}" class="swal2-input" style="margin:0;width:100%;box-sizing:border-box" value="${escHtml(actual[campo] || '')}">
                    </div>`).join('');
                opciones.preConfirm = () => {
                    const valores = {};
                    def.campos.forEach(campo => {
                        const val = document.getElementById(`cfg-${campo}`).value.trim();
                        if (val) valores[campo] = val;
                    });
                    return guardarConfigApp(clave, JSON.stringify(valores)).then(
                        data => data,
                        () => Swal.showValidationMessage('No se pudo guardar en el servidor')
                    );
                };
            } else {
                opciones.input = 'text';
                opciones.inputValue = actual;
                opciones.inputPlaceholder = 'http://localhost:3000/';
                opciones.preConfirm = (value) => {
                    value = (value || '').trim();
                    if (!/^https?:\/\//i.test(value)) {
                        Swal.showValidationMessage('La url debe comenzar con http:// o https://');
                        return false;
                    }
                    return guardarConfigApp(clave, value).then(
                        data => data,
                        () => Swal.showValidationMessage('No se pudo guardar en el servidor')
                    );
                };
            }

            Swal.fire(opciones).then(r => {
                if (r.isConfirmed && r.value) {
                    aplicarConfigLocal(clave, r.value.valor);
                    Swal.fire({ ...SWAL_OSCURO, icon: 'success', title: 'Guardado', timer: 1500, showConfirmButton: false });
                }
            });
        }

        function borrarConfigServidor(clave) {
            Swal.fire({
                ...SWAL_OSCURO,
                title: 'Borrar ' + CONFIG_SERVIDOR[clave].titulo,
                text: 'Se borrará del servidor y se volverá a pedir en todos los dispositivos.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Borrar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#ef4444'
            }).then(r => {
                if (!r.isConfirmed) return;
                guardarConfigApp(clave, '').then(
                    () => aplicarConfigLocal(clave, null),
                    () => Swal.fire({ ...SWAL_OSCURO, icon: 'error', title: 'No se pudo borrar en el servidor' })
                );
            });
        }

        function closeLsModal() {
            document.getElementById('lsOverlay').classList.remove('open');
        }
        document.getElementById('lsOverlay').addEventListener('click', function(e) {
            if (e.target === this) closeLsModal();
        });

        function renderKeys() {
            const search = document.getElementById('lsSearch').value.toLowerCase();
            const list = document.getElementById('lsKeyList');
            const count = document.getElementById('lsCount');
            const keys = Object.keys(localStorage).filter(k => k.toLowerCase().includes(search));

            count.textContent = keys.length === 0 ? '' : keys.length + ' entrada' + (keys.length !== 1 ? 's' : '');

            if (keys.length === 0) {
                list.innerHTML = '<div class="ls-empty"><i class="bi bi-inbox" style="font-size:1.8rem;display:block;margin-bottom:8px;opacity:0.4"></i>No hay entradas en localStorage</div>';
                return;
            }
            list.innerHTML = keys.map(k => {
                const val = localStorage.getItem(k) || '';
                const preview = val.length > 40 ? val.substring(0, 40) + '…' : val;
                return `<div class="ls-item">
                    <input type="checkbox" class="ls-item-check ls-chk" data-key="${escHtml(k)}">
                    <div class="ls-item-info">
                        <div class="ls-item-key">${escHtml(k)}</div>
                        <div class="ls-item-val">${escHtml(preview) || '<em style="opacity:0.5">vacío</em>'}</div>
                    </div>
                    <button class="ls-item-del" onclick="deleteSingle('${escHtml(k)}')" title="Eliminar"><i class="bi bi-trash3"></i></button>
                </div>`;
            }).join('');
        }

        function escHtml(str) {
            return String(str)
                .replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;')
                .replace(/"/g, '&quot;').replace(/'/g, '&#39;');
        }

        function selectAll() {
            document.querySelectorAll('.ls-chk').forEach(c => c.checked = true);
        }

        function deleteSelected() {
            const checked = [...document.querySelectorAll('.ls-chk:checked')].map(c => c.dataset.key);
            if (checked.length === 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Sin selección',
                    text: 'Seleccioná al menos una clave.',
                    background: '#0f172a',
                    color: '#f1f5f9',
                    confirmButtonColor: '#38bdf8'
                });
                return;
            }
            Swal.fire({
                title: '¿Eliminar selección?',
                text: `Se eliminarán ${checked.length} clave(s).`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminar',
                cancelButtonText: 'Cancelar',
                background: '#0f172a',
                color: '#f1f5f9',
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#334155'
            }).then(r => {
                if (r.isConfirmed) {
                    checked.forEach(k => localStorage.removeItem(k));
                    renderKeys();
                    Swal.fire({
                        icon: 'success',
                        title: 'Eliminadas',
                        timer: 1500,
                        showConfirmButton: false,
                        background: '#0f172a',
                        color: '#f1f5f9'
                    });
                }
            });
        }

        function deleteSingle(key) {
            Swal.fire({
                title: 'Eliminar clave',
                html: `<code style="color:#38bdf8;background:rgba(56,189,248,0.1);padding:2px 8px;border-radius:5px;font-size:0.85rem">${escHtml(key)}</code>`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                background: '#0f172a',
                color: '#f1f5f9',
                confirmButtonColor: '#ef4444',
                cancelButtonColor: '#334155'
            }).then(r => {
                if (r.isConfirmed) {
                    localStorage.removeItem(key);
                    renderKeys();
                }
            });
        }

        function clearAll() {
            if (Object.keys(localStorage).length === 0) {
                Swal.fire({
                    icon: 'info',
                    title: 'Ya está vacío',
                    text: 'El localStorage no tiene entradas.',
                    background: '#0f172a',
                    color: '#f1f5f9',
                    confirmButtonColor: '#38bdf8'
                });
                return;
            }
            Swal.fire({
                title: '¿Limpiar todo?',
                text: 'Se eliminarán TODAS las claves. Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, limpiar todo',
                cancelButtonText: 'Cancelar',
                background: '#0f172a',
                color: '#f1f5f9',
                confirmButtonColor: '#a855f7',
                cancelButtonColor: '#334155'
            }).then(r => {
                if (r.isConfirmed) {
                    localStorage.clear();
                    renderKeys();
                    Swal.fire({
                        icon: 'success',
                        title: 'localStorage limpiado',
                        timer: 1800,
                        showConfirmButton: false,
                        background: '#0f172a',
                        color: '#f1f5f9'
                    });
                }
            });
        }

        // ── jQuery: validación + tu lógica original intacta ──
        $(document).ready(function() {

            // Validación del formulario (igual que el original)
            $('#formLogin').on('submit', function(e) {
                let isValid = true;

                if ($('#typeEmailX').val() === '') {
                    $('#typeEmailX').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#typeEmailX').removeClass('is-invalid');
                }

                if ($('#typePasswordX').val() === '') {
                    $('#typePasswordX').addClass('is-invalid');
                    isValid = false;
                } else {
                    $('#typePasswordX').removeClass('is-invalid');
                }

                if (!isValid) {
                    e.preventDefault();
                    Swal.fire({
                        icon: 'error',
                        title: 'Campos requeridos',
                        text: 'Por favor complete todos los campos obligatorios',
                        background: '#0f172a',
                        color: '#f1f5f9',
                        confirmButtonColor: '#38bdf8'
                    });
                }
            });

            // Resetear validación al escribir
            $('.form-control-custom').on('input', function() {
                if ($(this).val() !== '') {
                    $(this).removeClass('is-invalid');
                }
            });
        });

        // ── Tu función original bajarLineas (sin cambios) ──
        let bajarLineas = () => {
            $.ajax({
                 url: 'https://' + (window.DOMINIO_APP || localStorage.getItem('dominio')) + '/cda/index.php/Cservicio/getLineas',
                //url: 'https://cdatecmmas.tecmmas.com/cda/index.php/Cservicio/getLineas',
                method: 'GET',
                success: function(data) {
                    if (data.length > 0) {
                        escribirLIneas(data);
                    } else {
                        console.warn('No se obtuvieron líneas o la respuesta está vacía');
                    }
                },
                error: function(error) {
                    Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    }).fire({
                        icon: "error",
                        title: "Error al actualizar líneas"
                    });
                }
            });
        }

        // ── Tu función original escribirLIneas (sin cambios) ──
        let escribirLIneas = (linea) => {
            $.ajax({
                url: 'index.php/getlineas/',
                type: 'post',
                dataType: 'json',
                data: {
                    linea: linea,
                    _token: $("input[name='_token']").val()
                },
                success: function(data, textStatus, jqXHR) {
                    Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    }).fire({
                        icon: "success",
                        title: "Líneas actualizadas correctamente"
                    });
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    Swal.mixin({
                        toast: true,
                        position: "top-end",
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.onmouseenter = Swal.stopTimer;
                            toast.onmouseleave = Swal.resumeTimer;
                        }
                    }).fire({
                        icon: "error",
                        title: "Error al actualizar líneas"
                    });
                    console.log('error');
                    console.log(jqXHR.responseText);
                    console.log(textStatus);
                    console.log(errorThrown);
                }
            });
        }
    </script>
</body>

</html>