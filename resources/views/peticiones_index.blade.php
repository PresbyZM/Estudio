@extends('layouts.base')

@section('content')
<br><br><br>
<div class="container">
    <h1 class="section-title">Lista de Peticiones</h1>

    @if($peticiones->isEmpty())
        <p class="text-muted text-center">No hay peticiones disponibles en este momento.</p>
    @else
        <div class="peticiones-container">
            @foreach($peticiones as $index => $peticion)
                <div class="peticion-card {{ $index % 2 == 0 ? 'peticion-card-blue' : 'peticion-card-gradient' }}">
                    <div class="peticion-header">
                        <h2>{{ $peticion->nombre_evento_peticion }}</h2>
                        <span class="peticion-status {{ strtolower($peticion->estatus_peticion ?? 'Pendiente') }}">
                            {{ $peticion->estatus_peticion ?? 'Pendiente' }}
                        </span>
                    </div>
                    <div class="peticion-details">
                        <div class="row">
                            <div class="col-md-4">
                                <p><strong>Fecha:</strong> {{ $peticion->dia_evento_peticion }}</p>
                                <p><strong>Descripción:</strong> <br>{{ $peticion->descripcion_evento_peticion }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Servicios:</strong></p>
                                <ul class="service-list">
                                    @foreach($peticion->servicios as $servicio)
                                        <li>{{ $servicio->nombre_servicio }}</li>
                                    @endforeach
                                </ul>
                                <p><strong>Usuario:</strong> {{ $peticion->usuarioCliente->nombre_usuacli }}</p>
                            </div>
                            <div class="col-md-4">
                                <p><strong>Correo:</strong> {{ $peticion->usuarioCliente->email_usuacli }}</p>
                                <p><strong>Teléfono:</strong> {{ $peticion->usuarioCliente->telefono_usuacli }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="btn-group">
                        @if($peticion->estatus_peticion === 'Aceptado')
                            <form action="{{ route('solicitudes.eliminar', ['peticion' => $peticion->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');" class="btn-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                            <a href="{{ route('peticiones.ticket', ['id' => $peticion->id]) }}" class="btn btn-success">Generar Ticket</a>
                        @elseif($peticion->estatus_peticion === 'Rechazado')
                            <form action="{{ route('solicitudes.eliminar', ['peticion' => $peticion->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');" class="btn-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        @else
                            <a href="{{ route('eventos.aprobar', ['peticion' => $peticion->id]) }}" class="btn btn-primary">Aprobar</a>
                            <form action="{{ route('solicitudes.rechazar', ['peticion' => $peticion->id]) }}" method="POST" class="btn-form">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-warning">Rechazar</button>
                            </form>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    body {
        background-color: #f5f7fa;
        font-family: 'Poppins', sans-serif;
    }

    .section-title {
        font-size: 2.5rem;
        font-weight: bold;
        text-align: center;
        margin-bottom: 40px;
        color: #333;
        text-transform: uppercase;
        position: relative;
    }

    .section-title:after {
        content: '';
        display: block;
        width: 80px;
        height: 4px;
        background-color: #007bff;
        margin: 10px auto;
    }

    .peticiones-container {
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .peticion-card {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
        padding: 20px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .peticion-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0, 0, 0, 0.15);
    }

    .peticion-card-blue {
        border-left: 8px solid #007bff;
    }

    .peticion-card-gradient {
        border-left: 8px solid #4262c1;
        background: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%);
    }

    .peticion-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .peticion-header h2 {
        font-size: 1.5rem;
        color: #333;
        margin: 0;
    }

    .peticion-status {
        font-size: 0.9rem;
        font-weight: bold;
        text-transform: capitalize;
        padding: 5px 10px;
        border-radius: 20px;
    }

    .peticion-status.pendiente {
        background-color: #ffc107;
        color: #fff;
    }

    .peticion-status.aceptado {
        background-color: #28a745;
        color: #fff;
    }

    .peticion-status.rechazado {
        background-color: #dc3545;
        color: #fff;
    }

    .peticion-details p {
        margin: 0 0 10px;
        line-height: 1.6;
        color: #555;
    }

    .service-list {
        padding-left: 20px;
        margin-bottom: 10px;
    }

    .btn-group {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
    }

    .btn-group .btn {
        border-radius: 8px;
        font-size: 0.9rem;
        padding: 10px 20px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success {
        background-color: #287ba7;
        color: #fff;
        border: none;
    }

    .btn-success:hover {
        background-color: #214088;
    }

    .btn-danger {
        background-color: #dc3545;
        color: #fff;
        border: none;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }

    .btn-warning {
        background-color: #ffc107;
        color: #212529;
        border: none;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }
</style>
@endsection
