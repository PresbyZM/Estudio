@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/index.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

<br>
<br>
<br>
<div class="container animate__animated animate__fadeIn">
    <div class="row mb-4">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h2 class="text-white">INVENTARIO</h2>
            <a href="{{ route('materiales.create') }}" class="btn btn-primary btn-hover" onclick="showLoader()">AGREGAR MATERIAL</a>
        </div>
    </div>

    <div class="row">
        @foreach ($materiales as $material)
        <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
            <div class="card border-0 rounded-4 overflow-hidden card-hover" style="height: 100%;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-dark">{{ $material->nombre_material }}</h5>
                    <p class="card-text text-secondary">{{ $material->descripcion_material }}</p>
                    <canvas id="gaugeChart{{ $material->id }}" width="200" height="100"></canvas>
                    <p class="card-text">
                        <strong class="d-block text-muted">Cantidad total:</strong>
                        <span>{{ $material->cantidad_actual }}</span>
                    </p>
                    <div class="mt-auto d-flex justify-content-between">
                        <a href="{{ route('materiales.edit', $material) }}" class="btn btn-info text-white btn-hover" onclick="showLoader()">Agregar cantidad</a>
                        <form action="{{ route('materiales.destroy', $material) }}" method="POST" class="d-inline" onsubmit="showLoader()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger text-white btn-hover ms-2">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $materiales->links() }}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @foreach ($materiales as $material)
        var ctx = document.getElementById('gaugeChart{{ $material->id }}').getContext('2d');
        
        var cantidadActual = {{ $material->cantidad_actual }};
        var cantidadMax = {{ $material->cantidad_max }};
        
        var primerTercio = cantidadMax / 3;
        var segundoTercio = 2 * primerTercio;
        
        var color;
        if (cantidadActual <= primerTercio) {
            color = '#ff0000';
        } else if (cantidadActual <= segundoTercio) {
            color = '#ffcc00'; 
        } else {
            color = '#00cc00'; 
        }

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [cantidadActual, cantidadMax - cantidadActual],
                    backgroundColor: [color, '#e0e0e0']
                }]
            },
            options: {
                circumference: Math.PI,
                rotation: Math.PI,
                cutoutPercentage: 55,
                tooltips: { enabled: false },
                legend: { display: false },
                title: {
                    display: true,
                    text: 'Total en inventario'
                }
            }
        });
        @endforeach
    });
</script>
@endsection

