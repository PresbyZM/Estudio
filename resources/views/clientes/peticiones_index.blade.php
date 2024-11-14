@extends('../layouts.base_cliente')

@section('content')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/css/clientes/mis_eventos.css">


<div class="container animate__animated animate__fadeIn">
    <div class="banner_eve">
        <h1>MIS EVENTOS</h1>
    </div>

    <!-- Botón para crear evento sin seleccionar fecha -->
    <div class="floating-button-container">
        <button class="floating-button">
            <span class="button-text">Nueva Solicitud</span>
            <span class="icon-circle">
                <i class="fas fa-plus"></i>
            </span>
        </button>
    </div>

    <script>
        document.querySelector('.floating-button').addEventListener('click', () => {
            window.location.href = '/peticiones/create';
        });
    </script>

    <div class="row">
        @foreach($peticiones as $peticion)
        <div class="col-md-4">
            
            <div class="card card-custom mb-4">
                <div class="card-body card-body-custom">
                    <h5 class="card-title">{{ $peticion->nombre_evento_peticion }}</h5>
                    <p class="card-text"><strong>Fecha del Evento:</strong> {{ $peticion->dia_evento_peticion }}</p>
                    <p class="card-text"><strong>Descripción:</strong> {{ $peticion->descripcion_evento_peticion }}</p>
                    <p class="card-text"><strong>Cotización de evento:</strong> ${{ $peticion->precio_evento_peticion ?? 'N/A' }}</p>
                    <p class="card-text"><strong>Estatus de la petición:</strong> {{ $peticion->estatus_peticion ?? 'Pendiente' }}</p>

                    @if($peticion->estatus_peticion == 'Aceptado')
                    <a href="{{ route('peticiones.ticket', $peticion->id) }}" class="btn btn-primary-custom btn-custom">
                        <i class="fas fa-print"></i> Descargar Ticket
                    </a> 
                    @elseif($peticion->estatus_peticion == 'Pendiente')
                    <a href="{{ route('peticiones.pagar', $peticion->id) }}" class="btn btn-secondary-custom btn-custom">
                        <i class="fas fa-handshake"></i> Contactar al Estudio y Pagar
                    </a>
                    @else
                    <button class="btn btn-secondary btn-custom" disabled>
                        <i class="fas fa-clock"></i> En Espera
                    </button>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
