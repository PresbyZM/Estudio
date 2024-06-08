@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>CREAR MATERIAL</h2>
        </div>
        <div>
            <a href="{{route('materiales.index')}}" class="btn btn-primary">Volver</a>
        </div>
    </div>
    
    @if ($errors->any())
    <div class="alert alert-danger mt-4">
        <strong>Por las chancas de mi madre!</strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form id="materialForm" action="{{route('materiales.store')}}" method="POST">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_material" class="form-control" placeholder="Material">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:150px" name="descripcion_material" placeholder="Descripción..."></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <strong>Cantidad maxima en inventario:</strong>
                    <input type="text" name="cantidad_max" class="form-control" placeholder="Cantidad maxima">
                </div>
                <div class="form-group">
                    <strong>Cantidad:</strong>
                    <input type="text" name="cantidad_actual" class="form-control" placeholder="Cantidad actual">
                </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                <button type="submit" class="btn btn-primary">Crear</button>
            </div>
        </div>
    </form>
</div>
</div>

<style>
    .flash {
        border: 3px solid red; /* Cambiar el grosor del borde */
        animation: flash-animation 1s infinite;
    }

    @keyframes flash-animation {
        0%, 100% { border-color: red; }
        50% { border-color: white; }
    }
</style>

<script>
document.getElementById('materialForm').addEventListener('submit', function(event) {
    var cantidadActual = parseFloat(document.querySelector('input[name="cantidad_actual"]').value) || 0;
    var cantidadMax = parseFloat(document.querySelector('input[name="cantidad_max"]').value) || 0;

    if (cantidadActual > cantidadMax) {
        alert('La cantidad actual no puede ser mayor que la cantidad máxima.');
        document.querySelector('input[name="cantidad_actual"]').classList.add('flash');
        event.preventDefault();
        setTimeout(() => {
            document.querySelector('input[name="cantidad_actual"]').classList.remove('flash');
        }, 2500); // Remover la clase después de 2.5 segundos
    }
});
</script>

@endsection
