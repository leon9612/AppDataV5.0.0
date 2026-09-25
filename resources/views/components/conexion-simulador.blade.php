{{--
    Bloque "Estado + Conectar/Desconectar/Buscar Datos" compartido por todos
    los paneles de simulador. Los IDs se reciben explícitos (no se derivan de
    un sufijo) para no alterar ningún ID que el JS de cada módulo ya espera.

    Props:
    - idConectar     ID del botón Conectar (requerido)
    - idDesconectar  ID del botón Desconectar (requerido)
    - idCsrf         ID del input hidden de csrf_token (requerido)
    - mostrarBuscar  Mostrar botón "Buscar Datos" (default: true)
    - small          Botones tamaño btn-sm (default: false)
--}}
@props([
    'idConectar',
    'idDesconectar',
    'idCsrf',
    'mostrarBuscar' => true,
    'small' => false,
])
@php $claseTamano = $small ? ' btn-sm' : ''; @endphp

<input type="hidden" name="_token" value="{{ csrf_token() }}" id="{{ $idCsrf }}">
<div class="col-12 mb-3">
    <div class="row g-2">
        <div class="col-12 col-md-5">
            <div class="p-2 rounded d-flex flex-wrap align-items-center gap-2" style="background: #fafafa; border: 1px solid #ddd;">
                <span class="fw-bold">Estado:</span>
                <span id="estadoConexionSimulador" class="badge bg-danger">
                    <i class="bi bi-plug"></i> Desconectado
                </span>
                {{-- Abre el modal de <x-instrucciones-simulador> --}}
                <button type="button" class="btn-instrucciones-modal" data-bs-toggle="modal" data-bs-target="#instruccionesModal">
                    <i class="bi bi-question-circle-fill"></i> Instrucciones
                </button>
            </div>
        </div>
        <div class="col-12 col-md-7">
            <div class="d-flex gap-2">
                <button id="{{ $idConectar }}" class="btn btn-success{{ $claseTamano }} flex-fill">
                    <i class="bi bi-bluetooth"></i> Conectar
                </button>
                <button id="{{ $idDesconectar }}" class="btn btn-danger{{ $claseTamano }} flex-fill" disabled>
                    <i class="bi bi-bluetooth-off"></i> Desconectar
                </button>
                @if ($mostrarBuscar)
                <button id="btnBuscarDatos" class="btn btn-info flex-fill">
                    <i class="bi bi-search"></i> Buscar Datos
                </button>
                @endif
            </div>
        </div>
    </div>
</div>
