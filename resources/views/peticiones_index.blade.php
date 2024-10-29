@extends('layouts.base')

@section('content')
<br>
<br>
<br>
<div class="container">
    <h1>Lista de Peticiones</h1>

    @if($peticiones->isEmpty())
        <p>No hay peticiones disponibles.</p>
    @else
        <div class="row">
            @foreach($peticiones as $peticion)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <div class="card-header">
                            {{ $peticion->nombre_evento_peticion }}
                        </div>
                        <div class="card-body">
                            <p><strong>Día del Evento:</strong> {{ $peticion->dia_evento_peticion }}</p>
                            <p><strong>Descripción:</strong> {{ $peticion->descripcion_evento_peticion }}</p>
                            <p><strong>Cotización de evento:</strong> ${{ $peticion->precio_evento_peticion ?? 'N/A' }}</p>
                            <p><strong>Estatus:</strong> {{ $peticion->estatus_peticion ?? 'Pendiente' }}</p>

                            <p><strong>Servicios:</strong>
                                <ul>
                                    @foreach($peticion->servicios as $servicio)
                                        <li>{{ $servicio->nombre_servicio }}</li>
                                    @endforeach
                                </ul>
                            </p>

                            <p><strong>Usuario:</strong> {{ $peticion->usuarioCliente->nombre_usuacli }}</p> 
                            <p><strong>Correo del usuario:</strong> {{ $peticion->usuarioCliente->email_usuacli }}</p> 
                            <p><strong>Teléfono del cliente:</strong> {{ $peticion->usuarioCliente->telefono_usuacli }}</p> 
                            
                            @if($peticion->estatus_peticion === 'Aceptado')
                                <form action="{{ route('solicitudes.eliminar', ['peticion' => $peticion->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar solicitud</button>
                                </form>

                                <a href="{{ route('peticiones.ticket', ['id' => $peticion->id]) }}" class="btn btn-success">Descargar Ticket</a>
                            @elseif($peticion->estatus_peticion === 'Rechazado')
                                <form action="{{ route('solicitudes.eliminar', ['peticion' => $peticion->id]) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar esta solicitud?');" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Eliminar solicitud</button>
                                </form>
                            @else
                                <a href="{{ route('eventos.aprobar', ['peticion' => $peticion->id]) }}" class="btn btn-primary">Aprobar solicitud</a>
                                
                                <form action="{{ route('solicitudes.rechazar', ['peticion' => $peticion->id]) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-warning">Rechazar solicitud</button>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
