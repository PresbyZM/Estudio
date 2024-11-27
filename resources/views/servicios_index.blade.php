@extends('layouts.base')

@section('content')
<br><br>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="container">
    <div class="row align-items-center my-4">
        <div class="col-md-6">
            <h2 class="text-white mb-0">SERVICIOS</h2>
        </div>
        <div class="col-md-6 text-end">
            <a href="{{ route('servicios.create') }}" class="btn btn-primary" onclick="showLoader()">
                Registrar servicio
            </a>
        </div>
    </div>

    <div class="row mt-5">
        <form action="{{ route('servicios.index') }}" method="GET" class="d-flex justify-content-center mb-4">
            <select name="categoria" class="form-select me-2" onchange="this.form.submit()" style="max-width: 300px;">
                <option value="">-- Filtrar por Categoría --</option>
                <option value="Paquetes" {{ request('categoria') == 'Paquetes' ? 'selected' : '' }}>Paquetes</option>
                <option value="Cuadros" {{ request('categoria') == 'Cuadros' ? 'selected' : '' }}>Cuadros</option>
                <option value="Filmacion" {{ request('categoria') == 'Filmacion' ? 'selected' : '' }}>Filmación</option>
                <option value="Fotografias" {{ request('categoria') == 'Fotografias' ? 'selected' : '' }}>Fotografías</option>
                <option value="Edicion" {{ request('categoria') == 'Edicion' ? 'selected' : '' }}>Edición</option>
                <option value="Otros" {{ request('categoria') == 'Otros' ? 'selected' : '' }}>Otros</option>
            </select>
            <a href="{{ route('servicios.index') }}" class="btn btn-secondary" onclick="showLoader()">Quitar Filtro</a>
        </form>
    </div>

    <div class="row">
        @foreach ($servicios as $servicio)
        <div class="col-md-3 mb-4">
            <div class="card h-100 shadow pedestal-effect" 
                 style="border-radius: 15px; background-color: rgba(255, 255, 255, 0.9); backdrop-filter: blur(8px); border: none; overflow: hidden; transition: transform 0.3s, box-shadow 0.3s;">
                <div class="pedestal">
                    <div class="position-relative">
                        @if($servicio->imagen)
                        <img src="{{ asset('images/servicios/'.$servicio->imagen) }}" 
                             alt="{{ $servicio->nombre_servicio }}" 
                             class="img-fluid w-100" 
                             style="height: 150px; object-fit: cover;">
                        @else
                        <img src="{{ asset('images/default.jpg') }}" 
                             alt="Imagen predeterminada" 
                             class="img-fluid w-100" 
                             style="height: 150px; object-fit: cover;">
                        @endif
                        <div class="position-absolute top-0 end-0 px-3 py-1 text-white fw-bold shadow" 
                             style="background-color: #0e4166; border-radius: 0 10px 0 10px; font-size: 1rem; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.3);">
                            {{ $servicio->categoria }}
                        </div>
                    </div>
                </div>
                <div class="card-body text-center d-flex flex-column justify-content-between">
                    <h5 class="card-title text-dark fw-bold">{{ $servicio->nombre_servicio }}</h5>
                    <p class="text-muted" style="min-height: 50px;">{{ Str::limit($servicio->descripcion_servicio, 100) }}</p>
                    <h6 class="fw-bold" style="color: red;">${{ $servicio->precio_servicio }}</h6>
                </div>
                <div class="card-footer bg-transparent border-0 d-flex justify-content-around">
                    <a href="{{ route('servicios.edit', $servicio) }}" class="btn btn-outline-primary btn-sm" onclick="showLoader()">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form id="delete-form-{{ $servicio->id }}" action="{{ route('servicios.destroy', $servicio) }}" method="POST" style="display: none;">
                        @csrf
                        @method('DELETE')
                    </form>
                    <button type="button" class="btn btn-outline-danger btn-sm" onclick="document.getElementById('delete-form-{{ $servicio->id }}').submit();">
                        <i class="fas fa-trash"></i> Eliminar
                    </button>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
