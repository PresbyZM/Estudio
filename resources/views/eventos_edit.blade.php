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
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Editar Evento</h2>
                    </div>
                    <div class="text-end mb-2"> 
                        <a href="{{ route('eventos.index') }}" class="btn btn-outline-primary btn-sm animate__animated animate__fadeInLeft" onclick="showLoader()">Volver</a>
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

                    <form action="{{ route('eventos.update', $evento) }}" method="POST" class="animate__animated animate__fadeInUp" onsubmit="showLoader()" id="editarEventoForm">
                        @csrf
                        @method('PUT')
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nombre_evento" class="form-control form-control-lg @error('nombre_evento') is-invalid @enderror" placeholder=" " id="nombre_evento" value="{{ $evento->nombre_evento }}">
                                    <label for="nombre_evento" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_evento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="dia_evento" class="form-control form-control-lg @error('dia_evento') is-invalid @enderror" placeholder=" " id="dia_evento" value="{{ $evento->dia_evento }}">
                                    <label for="dia_evento" class="text-dark-blue"><strong>Día del evento</strong></label>
                                    @error('dia_evento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" id="cotizacion" name="precio_evento" class="form-control form-control-lg @error('precio_evento') is-invalid @enderror" placeholder=" " value="{{ $evento->precio_evento }}" oninput="calcularResto()" min="0" inputmode="numeric" readonly>
                                    <label for="cotizacion" class="text-dark-blue"><strong>Cotización</strong></label>
                                    @error('precio_evento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" id="anticipo" name="anticipo" class="form-control form-control-lg @error('anticipo') is-invalid @enderror" placeholder=" " value="{{ $evento->anticipo }}" oninput="calcularResto()" min="0" inputmode="numeric" readonly>
                                    <label for="anticipo" class="text-dark-blue"><strong>Anticipo</strong></label>
                                    @error('anticipo')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" id="descuento" name="descuento" class="form-control form-control-lg @error('descuento') is-invalid @enderror" placeholder=" " value="{{ $evento->descuento }}" oninput="calcularResto()" min="0" inputmode="numeric">
                                    <label for="descuento" class="text-dark-blue"><strong>Liquidar</strong></label>
                                    @error('descuento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="number" id="resto" name="resto" class="form-control form-control-lg" placeholder=" " value="{{ $evento->resto }}" readonly>
                                    <label for="resto" class="text-dark-blue"><strong>Resto por pagar</strong></label>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2"> 
                            <div class="form-floating">
                                <textarea class="form-control form-control-lg @error('descripcion_evento') is-invalid @enderror" style="height:100px" name="descripcion_evento" placeholder=" " id="descripcion_evento">{{ $evento->descripcion_evento }}</textarea>
                                <label for="descripcion_evento" class="text-dark-blue"><strong>Descripción</strong></label>
                                @error('descripcion_evento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-2"> 
                            <div class="form-floating">
                                <select name="estatus" class="form-select form-select-lg small-text @error('estatus') is-invalid @enderror" id="estatus">
                                    <option value="Concluido" {{ $evento->estatus == 'Concluido' ? 'selected' : '' }}>Concluido</option>
                                    <option value="En Curso" {{ $evento->estatus == 'En Curso' ? 'selected' : '' }}>En Curso</option>
                                </select>
                                <label for="estatus" class="text-dark-blue"><strong>Estatus del evento</strong></label>
                                @error('estatus')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cliente_id" class="text-dark-blue"><strong>Cliente</strong></label>
                            <select name="cliente_id" id="cliente_id" class="form-select form-select-lg small-text @error('cliente_id') is-invalid @enderror">
                                @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id }}" {{ $evento->cliente_id == $cliente->id ? 'selected' : '' }}>{{ $cliente->nombre_cliente }} - {{ $cliente->telefono_cliente }} - {{ $cliente->descripcion_cliente }}</option>
                                @endforeach
                            </select>
                            @error('cliente_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Actualizar</button>
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
    function calcularResto() {
        var cotizacion = parseFloat(document.getElementById('cotizacion').value) || 0;
        var anticipo = parseFloat(document.getElementById('anticipo').value) || 0;
        var descuento = parseFloat(document.getElementById('descuento').value) || 0;

        if (anticipo > cotizacion) {
            anticipo = cotizacion;
            document.getElementById('anticipo').value = anticipo.toFixed(2);
        }

        var resto = cotizacion - anticipo - descuento;
        

        // Actualizar el campo "Resto por pagar"
        document.getElementById('resto').value = resto.toFixed(2);

        // Si el resto es negativo, borrar el campo "Liquidar"
        if (resto < 0) {
            document.getElementById('descuento').value = '';
            document.getElementById('descuento').classList.add('flash');
            setTimeout(() => {
                document.getElementById('descuento').classList.remove('flash');
            }, 2500);
        }
    }

    document.getElementById('cotizacion').addEventListener('input', function() {
        this.value = Math.abs(this.value);
        
        var anticipoField = document.getElementById('anticipo');
        anticipoField.disabled = this.value == '0';
        if (this.value == '0') {
            anticipoField.value = '';
            document.getElementById('resto').value = '';
            document.getElementById('descuento').value = '';
        }

        calcularResto(); 
    });

    document.getElementById('anticipo').addEventListener('input', function() {
        this.value = Math.abs(this.value);
        calcularResto(); 
    });

    document.getElementById('descuento').addEventListener('input', function() {
        this.value = Math.abs(this.value);
        calcularResto(); 
    });


</script>
@endsection
