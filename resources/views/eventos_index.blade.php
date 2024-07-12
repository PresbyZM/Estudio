@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
<br>
<br>
<br>
<div class="container animate__animated animate__fadeIn">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2 class="text-white">EVENTOS</h2>
            <div>
                <a href="{{ route('eventos.create') }}" class="btn btn-primary btn-hover" onclick="showLoader()">Crear evento</a>
                <a href="{{ route('calendario') }}" class="btn btn-success btn-hover" onclick="showLoader()">Ver calendario</a>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <form id="search-form" action="{{ route('eventos.index') }}" method="GET" onsubmit="showLoader()">
                <div class="input-group">
                    <input type="date" name="fecha_evento" id="fecha-evento" class="form-control form-control-lg" value="{{ request('fecha_evento') }}" aria-label="Fecha del evento">
                    <button type="submit" class="btn btn-primary btn-lg search-btn"><i class="bi bi-search"></i></button>
                </div>
            </form>            
        </div>
    </div>

    <div class="row">
        @foreach ($eventos as $evento)
        <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden card-hover" style="height: 100%;">
                <div class="card-img-top position-relative">
                    <img src="{{ asset('images/evento.jpg') }}" class="w-100" alt="Evento">
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-primary text-white">Evento</span>
                    </div>
                    <div class="position-absolute top-0 start-0 p-2">
                        <span class="badge bg-info text-white">{{ $evento->estatus }}</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-dark">{{ $evento->nombre_evento }}</h5>
                    <p class="card-text text-secondary">{{ $evento->descripcion_evento }}</p>
                    <p class="card-text">
                        <strong class="d-block text-muted">Fecha:</strong>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($evento->dia_evento)->locale('es')->isoFormat('LL') }}</small>
                    </p>
                    <div class="d-flex justify-content-between">
                        <p class="card-text">
                            <strong class="d-block text-muted">Cotización:</strong>
                            <span>{{ $evento->precio_evento }}</span>
                        </p>
                        <p class="card-text">
                            <strong class="d-block text-muted">Anticipo:</strong>
                            <span>{{ $evento->anticipo }}</span>
                        </p>
                        <p class="card-text">
                            <strong class="d-block text-muted">Resta pagar:</strong>
                            <span>{{ $evento->resto }}</span>
                        </p>
                    </div>
                    <div class="d-flex justify-content-between">
                        <p class="card-text">
                            <strong class="d-block text-muted">Cliente:</strong>
                            <span>{{ $evento->cliente ? $evento->cliente->nombre_cliente : 'N/A' }}</span>
                        </p>
                        <p class="card-text">
                            <strong class="d-block text-muted">Teléfono:</strong>
                            <span>{{ $evento->cliente ? $evento->cliente->telefono_cliente : 'N/A' }}</span>
                        </p>
                    </div>
                    <p class="card-text">
                        <strong class="d-block text-muted">Descripción del Cliente:</strong>
                        <span>{{ $evento->cliente ? $evento->cliente->descripcion_cliente : 'N/A' }}</span>
                    </p>
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('eventos.edit', $evento) }}" class="btn btn-info text-white btn-hover" onclick="showLoader()"><i class="bi bi-pencil-square"></i> Editar</a>
                        <form action="{{ route('eventos.destroy', $evento) }}" method="POST" class="d-inline" onsubmit="showLoader()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white btn-hover"><i class="bi bi-trash"></i> Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
