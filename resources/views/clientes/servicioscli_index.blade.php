@extends('../layouts.base_cliente')

@section('content')

<style>
    .container {
        max-width: 1200px;
        margin: auto;
        padding: 20px;
    }
    .filter {
        margin-bottom: 20px;
        text-align: center;
    }
    .cards-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
    }
    .card {
        background: #f9f9f9;
        border-radius: 8px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        padding: 20px;
        margin: 10px;
        display: flex; 
        align-items: center; 
        text-align: center; 
        width: 300px; 
    }
    .card img {
        max-width: 150px;
        height: auto; 
        border-radius: 4px; 
        margin-right: 20px;
    }
    .card h3 {
        margin-bottom: 10px;
    }
    .card p {
        color: #666;
    }
</style>

<div class="container">
    <h1 style="text-align: center;">Servicios Disponibles</h1> 


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

 
    <div class="cards-container">
        @foreach($servicios as $servicio)
            <div class="card">
                @if($servicio->imagen) 
                    <img src="{{ asset('images/servicios/' . $servicio->imagen) }}" alt="{{ $servicio->nombre_servicio }}">
                @endif
                <div>
                    <h3>{{ $servicio->nombre_servicio }}</h3>
                    <p>{{ $servicio->descripcion_servicio }}</p>
                    <p><strong>Precio:</strong> ${{ $servicio->precio_servicio }}</p>
                    <p><strong>Categoría:</strong> {{ $servicio->categoria }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
