@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/create.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<br>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="card border-0 shadow-lg">
                <div class="card-body p-3"> 
                    <div class="text-center mb-2"> 
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Crear Material</h2>
                    </div>
                    <div class="text-end mb-2"> 
                        <a href="{{ route('materiales.index') }}" class="btn btn-outline-primary btn-sm animate__animated animate__fadeInLeft" onclick="showLoader()">Volver</a>
                    </div>

                    <form id="materialForm" action="{{ route('materiales.store') }}" method="POST" class="animate__animated animate__fadeInUp" onsubmit="showLoader()">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nombre_material" class="form-control form-control-lg @error('nombre_material') is-invalid @enderror" placeholder=" " id="nombre_material" value="{{ old('nombre_material') }}">
                                    <label for="nombre_material" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_material')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <textarea class="form-control form-control-lg @error('descripcion_material') is-invalid @enderror" style="height:150px" name="descripcion_material" placeholder=" " id="descripcion_material">{{ old('descripcion_material') }}</textarea>
                                    <label for="descripcion_material" class="text-dark-blue"><strong>Descripción</strong></label>
                                    @error('descripcion_material')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="cantidad_max" class="form-control form-control-lg @error('cantidad_max') is-invalid @enderror" placeholder=" " id="cantidad_max" value="{{ old('cantidad_max') }}">
                                    <label for="cantidad_max" class="text-dark-blue"><strong>Cantidad máxima en inventario</strong></label>
                                    @error('cantidad_max')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="cantidad_actual" class="form-control form-control-lg @error('cantidad_actual') is-invalid @enderror" placeholder=" " id="cantidad_actual" value="{{ old('cantidad_actual') }}">
                                    <label for="cantidad_actual" class="text-dark-blue"><strong>Cantidad actual</strong></label>
                                    @error('cantidad_actual')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Crear</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

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
document.addEventListener('DOMContentLoaded', function() {
    var cantidadMaxInput = document.querySelector('input[name="cantidad_max"]');
    var cantidadActualInput = document.querySelector('input[name="cantidad_actual"]');

    cantidadActualInput.addEventListener('input', function() {
        
        this.value = this.value.replace(/[^0-9.]/g, '');
        
        var cantidadActual = parseFloat(cantidadActualInput.value) || 0;
        var cantidadMax = parseFloat(cantidadMaxInput.value) || 0;

        if (cantidadActual > cantidadMax) {
            cantidadActualInput.value = cantidadMax;
            cantidadActualInput.classList.add('flash');
            setTimeout(() => {
                cantidadActualInput.classList.remove('flash');
            }, 2500); 
        }

        if (cantidadActual < 0) {
            cantidadActualInput.value = 0;
            cantidadActualInput.classList.add('flash');
            setTimeout(() => {
                cantidadActualInput.classList.remove('flash');
            }, 2500); 
        }
    });

    cantidadMaxInput.addEventListener('input', function() {
    
        this.value = this.value.replace(/[^0-9.]/g, '');
        
        var cantidadActual = parseFloat(cantidadActualInput.value) || 0;
        var cantidadMax = parseFloat(cantidadMaxInput.value) || 0;

        if (cantidadActual > cantidadMax) {
            cantidadActualInput.value = cantidadMax;
            cantidadActualInput.classList.add('flash');
            setTimeout(() => {
                cantidadActualInput.classList.remove('flash');
            }, 2500);
        }

        if (cantidadMax < 0) {
            cantidadMaxInput.value = 0;
            cantidadMaxInput.classList.add('flash');
            setTimeout(() => {
                cantidadMaxInput.classList.remove('flash');
            }, 2500); 
        }
    });
});
</script>

@endsection
