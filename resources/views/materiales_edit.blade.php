@extends('layouts.base')
<br>
<br>
@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/create.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6"> 
            <div class="card border-0 shadow-lg">
                <div class="card-body p-2"> 
                    <div class="text-center mb-2"> 
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Editar Material</h2>
                    </div>
                    <div class="text-end mb-2"> 
                        <a href="{{ route('materiales.index') }}" class="btn btn-outline-primary btn-sm animate__animated animate__fadeInLeft" onclick="showLoader()">Volver</a>
                    </div>

                    <form id="materialForm" action="{{ route('materiales.update', $material) }}" method="POST" class="animate__animated animate__fadeInUp" onsubmit="showLoader()">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="nombre_material" class="form-control form-control-lg @error('nombre_material') is-invalid @enderror" placeholder=" " id="nombre_material" value="{{ $material->nombre_material }}">
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
                                    <textarea class="form-control form-control-lg @error('descripcion_material') is-invalid @enderror" style="height:150px" name="descripcion_material" placeholder=" " id="descripcion_material">{{ $material->descripcion_material }}</textarea>
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
                                    <input type="number" name="cantidad_max" class="form-control form-control-lg @error('cantidad_max') is-invalid @enderror" placeholder=" " id="cantidad_max" value="{{ $material->cantidad_max }}" min="{{ $material->cantidad_actual }}">
                                    <label for="cantidad_max" class="text-dark-blue"><strong>Cantidad máxima en inventario</strong></label>
                                    @error('cantidad_max')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="cantidad_actual" class="form-control form-control-lg @error('cantidad_actual') is-invalid @enderror" placeholder=" " id="cantidad_actual" value="{{ $material->cantidad_actual }}" readonly>
                                    <label for="cantidad_actual" class="text-dark-blue"><strong>Cantidad actual</strong></label>
                                    @error('cantidad_actual')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <select name="accion" class="form-control form-control-lg" id="accion">
                                        <option value="agregar">Agregar</option>
                                        <option value="quitar">Quitar</option>
                                    </select>
                                    <label for="accion" class="text-dark-blue"><strong>Acción</strong></label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" name="cantidad_cambio" class="form-control form-control-lg @error('cantidad_cambio') is-invalid @enderror" placeholder=" " id="cantidad_cambio">
                                    <label for="cantidad_cambio" class="text-dark-blue"><strong>Cantidad</strong></label>
                                    @error('cantidad_cambio')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="number" id="cantidad_nueva" class="form-control form-control-lg" placeholder=" " readonly>
                                    <label for="cantidad_nueva" class="text-dark-blue"><strong>Cantidad Nueva</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Actualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>

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
    var cantidadCambioInput = document.getElementById('cantidad_cambio');
    var accionSelect = document.getElementById('accion');
    var cantidadActualInput = document.getElementById('cantidad_actual');
    var cantidadNuevaInput = document.getElementById('cantidad_nueva');
    var cantidadMaxInput = document.getElementById('cantidad_max');

    function calcularCantidadNueva() {
        var cantidadActual = parseFloat(cantidadActualInput.value) || 0;
        var cantidadCambio = parseFloat(cantidadCambioInput.value) || 0;
        var accion = accionSelect.value;
        var cantidadNueva = accion === 'agregar' ? cantidadActual + cantidadCambio : cantidadActual - cantidadCambio;
        cantidadNuevaInput.value = cantidadNueva;

        if (cantidadNueva > parseFloat(cantidadMaxInput.value)) {
            cantidadCambioInput.classList.add('flash');
            setTimeout(() => {
                cantidadCambioInput.classList.remove('flash');
                cantidadCambioInput.value = '';
                cantidadNuevaInput.value = cantidadActual;
            }, 2500);
        }
    }

    cantidadCambioInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
        calcularCantidadNueva();
        var valor = parseFloat(this.value) || 0;
        if (valor < 0) {
            this.value = '';
            this.classList.add('flash');
            setTimeout(() => {
                this.classList.remove('flash');
            }, 2500);
        }
    });

    accionSelect.addEventListener('change', calcularCantidadNueva);

    cantidadMaxInput.addEventListener('input', function() {
        this.value = this.value.replace(/[^0-9.]/g, '');
        var cantidadMax = parseFloat(this.value) || 0;
        var cantidadActual = parseFloat(cantidadActualInput.value) || 0;
        if (cantidadMax < cantidadActual) {
            this.value = cantidadActual;
        }
    });

    document.getElementById('materialForm').addEventListener('submit', function(event) {
        var cantidadNueva = parseFloat(cantidadNuevaInput.value) || 0;
        var cantidadMax = parseFloat(cantidadMaxInput.value) || 0;

        if (cantidadNueva > cantidadMax || cantidadNueva < 0) {
            event.preventDefault();
            cantidadCambioInput.classList.add('flash');
            setTimeout(() => {
                cantidadCambioInput.classList.remove('flash');
            }, 2500);
        }
    });
});
</script>
@endsection
