@extends('layouts.base')

@section('content')
<br><br><br>
<div class="container">
    <h1 class="section-title">Lista de Peticiones</h1>

    @if($peticiones->isEmpty())
        <p class="text-muted">No hay peticiones disponibles.</p>
    @else
        <div class="peticiones-container">
            @foreach($peticiones as $index => $peticion)
                <div class="peticion-card {{ $index % 2 == 0 ? 'peticion-card-blue' : 'peticion-card-gray' }}">
                    <div class="peticion-header">
                        {{ $peticion->nombre_evento_peticion }}
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <p class="field-label">Fecha:</p>
                            <p>{{ $peticion->dia_evento_peticion }}</p>
                            <div class="bottom-line"></div>
                            
                            <p class="field-label">Descripción:</p>
                            <p>{{ $peticion->descripcion_evento_peticion }}</p>
                            <div class="bottom-line"></div>
                        </div>
                        <div class="col-md-3">
                            <p class="field-label">Servicio:</p>
                            <ul>
                                @foreach($peticion->servicios as $servicio)
                                    <li>{{ $servicio->nombre_servicio }}</li>
                                @endforeach
                            </ul>
                            <div class="bottom-line"></div>
                            
                            <p class="field-label">Estatus:</p>
                            <p>{{ $peticion->estatus_peticion ?? 'Pendiente' }}</p>
                            <div class="bottom-line"></div>
                        </div>
                        <div class="col-md-3">
                            <p class="field-label">Usuario:</p>
                            <p>{{ $peticion->usuarioCliente->nombre_usuacli }}</p>
                            <div class="bottom-line"></div>
                            
                            <p class="field-label">Correo:</p>
                            <p>{{ $peticion->usuarioCliente->email_usuacli }}</p>
                            <div class="bottom-line"></div>
                        </div>
                        <div class="col-md-3">
                            <p class="field-label">Teléfono:</p>
                            <p>{{ $peticion->usuarioCliente->telefono_usuacli }}</p>
                            <div class="bottom-line"></div>

                            <div class="btn-group">
                                @if($peticion->estatus_peticion === 'Aceptado')
                                    <form action="{{ route('solicitudes.eliminar', ['peticion' => $peticion->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                    <a href="{{ route('peticiones.ticket', ['id' => $peticion->id]) }}" class="btn btn-success btn-sm">Ticket</a>
                                @elseif($peticion->estatus_peticion === 'Rechazado')
                                    <form action="{{ route('solicitudes.eliminar', ['peticion' => $peticion->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                @else
                                    <a href="{{ route('eventos.aprobar', ['peticion' => $peticion->id]) }}" class="btn btn-primary btn-sm">Aprobar</a>&nbsp; &nbsp; 
                                    <form action="{{ route('solicitudes.rechazar', ['peticion' => $peticion->id]) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-warning btn-sm">Rechazar</button>
                                    </form>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .section-title {
        color: #FFF;
        font-size: 30px;
        font-weight: bold;
        text-align: center;
        margin-bottom: 30px;
        border-bottom: 3px solid #FFF;
        padding-bottom: 10px;
    }
    
    .peticiones-container {
        display: flex;
        flex-direction: column;
        gap: 20px;
    }
    
    .peticion-card {
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .peticion-card-blue {
        background-color: #e1f0ff; 
    }

    .peticion-card-gray {
        background-color: #f2f2f2;
    }

    .peticion-header {
        font-size: 20px;
        font-weight: bold;
        color: #00509e;
        margin-bottom: 15px;
        text-align: center;
    }

    .field-label {
        font-weight: bold;
        color: #4a4a4a;
    }

    .bottom-line {
        border-bottom: 1px solid #d3d3d3;
        margin-bottom: 10px;
        padding-bottom: 5px;
    }

    .btn-primary {
        background-color: #00509e;
        border-color: #00509e;
    }

    .btn-danger {
        background-color: #d32f2f;
        border-color: #d32f2f;
    }

    .btn-success {
        background-color: #388e3c;
        border-color: #388e3c;
    }

    .btn-warning {
        background-color: #ffb300;
        border-color: #ffb300;
    }

    .btn-group .btn {
        font-size: 14px;
        padding: 5px 10px;
    }

    @media (max-width: 768px) {
        .peticion-card {
            padding: 15px;
        }
        .btn-group .btn {
            font-size: 12px;
            padding: 4px 8px;
        }
    }
</style>
@endsection
