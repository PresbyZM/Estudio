@extends('../layouts.base_cliente')

@section('content')
<link rel="stylesheet" href="/css/clientes/servicios.css">

<div class="container animate__animated animate__fadeIn">

    <div class="banner d-flex align-items-center justify-content-end">
        <h1>PRODUCTOS Y SERVICIOS</h1>
    </div> 

    <!-- Filtro de categorías -->
    <div class="filter">
        <form method="GET" action="{{ route('servicios-cli.index') }}">
            <label for="categoria">Filtrar por categoría:</label>
            <select name="categoria" id="categoria" onchange="this.form.submit()">
                <option value="">Todas</option>
                <option value="Paquetes" {{ request('categoria') == 'Paquetes' ? 'selected' : '' }}>Paquetes</option>
                <option value="Cuadros" {{ request('categoria') == 'Cuadros' ? 'selected' : '' }}>Cuadros</option>
                <option value="Filmacion" {{ request('categoria') == 'Filmacion' ? 'selected' : '' }}>Filmación</option>
                <option value="Fotografias" {{ request('categoria') == 'Fotografias' ? 'selected' : '' }}>Fotografías</option>
                <option value="Edicion" {{ request('categoria') == 'Edicion' ? 'selected' : '' }}>Edición</option>
                <option value="Otros" {{ request('categoria') == 'Otros' ? 'selected' : '' }}>Otros</option>
            </select>
        </form>
    </div>

    <!-- Tarjetas de servicios -->
    <div class="cards-container">
    @foreach($servicios as $servicio)
        <div class="card shadow-sm">
            <!-- Imagen de la tarjeta -->
            @if($servicio->imagen)
                <img src="{{ asset('images/servicios/' . $servicio->imagen) }}" class="card-img-top" alt="{{ $servicio->nombre_servicio }}">
            @endif

            <!-- Contenido de la tarjeta -->
            <div class="card-body p-3" style="background-color: #f3e0d6;">
                <h5 class="card-title mb-1" style="font-weight: bold;">{{ $servicio->nombre_servicio }}</h5>
                <p class="text-muted mb-1">Categoría: <span style="color: #a90000;">{{ $servicio->categoria }}</span></p>
                <p class="card-text">{{ $servicio->descripcion_servicio }}</p>
            </div>

            <!-- Precio en la esquina inferior derecha -->
            <div class="precio-tag position-absolute bottom-0 end-0 m-2 px-2 py-1 text-white" style="background-color: #800000; border-radius: 5px;">
                ${{ number_format($servicio->precio_servicio, 2) }}
            </div>
        </div>
    @endforeach
    </div>
</div>

@endsection
