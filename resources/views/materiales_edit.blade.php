@extends('layouts.base')

@section('content')
<div class="row">
    <div class="col-12">
        <div>
            <h2>Editar Material</h2>
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

    <form action="{{route('materiales.update', $material)}}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre_material" class="form-control" placeholder="Material" value="{{$material->nombre_material  }}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Descripción:</strong>
                        <textarea class="form-control" style="height:150px" name="descripcion_material" placeholder="Descripción...">{{$material->descripcion_material}}</textarea>
                    </div>
                </div>
                <div class="form-group">
                    <strong>Cantidad maxima en inventario:</strong>
                    <input type="text" name="cantidad_max" class="form-control" placeholder="Cantidad maxima" value="{{$material->cantidad_max}}">
                </div>
                <div class="form-group">
                    <strong>Cantidad Actual:</strong>
                    <input type="number" name="cantidad_actual" class="form-control" value="{{ $material->cantidad_actual }}" readonly>
                </div>
                <div class="form-group">
                    <strong>Cantidad a Agregar:</strong>
                    <input type="number" name="cantidad_agregar" class="form-control" id="cantidad_agregar">
                </div>
                <div class="form-group">
                    <strong>Cantidad Nueva:</strong>
                    <input type="number" class="form-control" id="cantidad_nueva" readonly>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary">Actualizar cantidad en inventario</button>
                </div>  
            </div>
        </div>
    </form>

    <style>
        .flash {
            border: 3px solid red;
            animation: flash-animation 1s infinite;
        }
    
        @keyframes flash-animation {
            0%, 100% { border-color: red; }
            50% { border-color: white; }
        }
    </style>
    

    <script>
        document.getElementById('cantidad_agregar').addEventListener('input', function() {
            var cantidadActual = parseFloat(document.querySelector('input[name="cantidad_actual"]').value) || 0;
            var cantidadAgregar = parseFloat(this.value) || 0;
            var cantidadMax = parseFloat(document.querySelector('input[name="cantidad_max"]').value) || 0;
            var cantidadNueva = cantidadActual + cantidadAgregar;
        
            var cantidadNuevaInput = document.getElementById('cantidad_nueva');
            cantidadNuevaInput.value = cantidadNueva;
        
            if (cantidadNueva > cantidadMax) {
                alert('La cantidad nueva no puede sobrepasar la cantidad máxima.');
                this.classList.add('flash');
                setTimeout(() => {
                    this.classList.remove('flash');
                    this.value = '';
                    cantidadNuevaInput.value = cantidadActual;
                }, 2500); // Remover la clase después de 2.5 segundos
            }
        });
        
        document.getElementById('materialForm').addEventListener('submit', function(event) {
            var cantidadNueva = parseFloat(document.getElementById('cantidad_nueva').value) || 0;
            var cantidadMax = parseFloat(document.querySelector('input[name="cantidad_max"]').value) || 0;
        
            if (cantidadNueva > cantidadMax) {
                alert('La cantidad nueva no puede sobrepasar la cantidad máxima.');
                document.getElementById('cantidad_agregar').classList.add('flash');
                event.preventDefault();
                setTimeout(() => {
                    document.getElementById('cantidad_agregar').classList.remove('flash');
                }, 2500); // Remover la clase después de 2.5 segundos
            }
        });
        </script>

</div>
@endsection