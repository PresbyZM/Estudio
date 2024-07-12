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
            <h2 class="text-white">CLIENTES FRECUENTES</h2>
            <a href="{{ route('clientes.create') }}" class="btn btn-primary btn-hover" onclick="showLoader()">Registrar cliente</a>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <form id="search-form" action="{{ route('clientes.index') }}" method="GET" onsubmit="showLoader()">
                <div class="input-group">
                    <input type="text" name="query" id="search-input" class="form-control form-control-lg" placeholder="Buscar por nombre..." value="{{ request('query') }}" aria-label="Buscar por nombre">
                    <button type="submit" class="btn btn-primary btn-lg"><i class="bi bi-search"></i></button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        @foreach ($clientes as $cliente)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden card-hover" style="height: 100%;">
                <div class="card-img-top position-relative">
                    <img src="{{ asset('images/contacto.jpg') }}" class="w-100" alt="Cliente">
                    <div class="position-absolute top-0 end-0 p-2">
                        <span class="badge bg-primary text-white">Cliente</span>
                    </div>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-dark">{{ $cliente->nombre_cliente }} {{ $cliente->apellidop_cliente }} {{ $cliente->apellidom_cliente }}</h5>
                    <p class="card-text text-secondary">{{ $cliente->descripcion_cliente }}</p>
                    <p class="card-text">
                        <strong class="d-block text-muted">Fecha de agregado:</strong>
                        <small class="text-muted">{{ \Carbon\Carbon::parse($cliente->created_at)->locale('es')->isoFormat('LL') }}</small>
                    </p>
                    <p class="card-text">
                        <strong class="d-block text-muted">Número telefónico:</strong>
                        <span>{{ $cliente->telefono_cliente }}</span>
                    </p>
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-info text-white btn-hover" onclick="showLoader()"><i class="bi bi-pencil-square"></i> Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" class="d-inline" onsubmit="showLoader()">
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




