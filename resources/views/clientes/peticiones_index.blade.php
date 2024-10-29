@extends('../layouts.base_cliente')

@section('content')
<div class="container">
    <h1>Mis Peticiones</h1>
    <div class="row">
        @foreach($peticiones as $peticion)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $peticion->nombre_evento_peticion }}</h5>
                    <p class="card-text"><strong>Fecha del Evento:</strong> {{ $peticion->dia_evento_peticion }}</p>
                    <p class="card-text"><strong>Descripción:</strong> {{ $peticion->descripcion_evento_peticion }}</p>
                    <p class="card-text"><strong>Cotización de evento:</strong> ${{ $peticion->precio_evento_peticion ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Estatus de la petición:</strong> {{ $peticion->estatus_peticion ?? 'Pendiente' }}</p>

                    <p class="card-text"><strong>Servicios:</strong>
                        <ul>
                            @foreach($peticion->servicios as $servicio)
                                <li>{{ $servicio->nombre_servicio }}</li>
                            @endforeach
                        </ul>
                    </p>

                    @if($peticion->estatus_peticion == 'Aceptado')
                        <a href="{{ route('peticiones.ticket', $peticion->id) }}" class="btn btn-primary">Descargar Ticket</a>
                    @elseif($peticion->estatus_peticion == 'Pendiente')
                        <a href="{{ route('peticiones.pagar', $peticion->id) }}" class="btn btn-success">Contactar al Estudio y Pagar</a>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
