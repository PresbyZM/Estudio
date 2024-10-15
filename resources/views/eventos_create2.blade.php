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
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Crear Evento</h2>
                    </div>
                    <div class="text-end mb-2"> 
                        <a href="{{ route('peticiones.index.empleado') }}" class="btn btn-outline-primary btn-sm animate__animated animate__fadeInLeft" onclick="showLoader()">Volver</a>
                    </div>

                    <form action="{{ route('aprobaciones.store') }}" method="POST" class="animate__animated animate__fadeInUp" id="crearEventoForm">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nombre_evento" class="form-control form-control-lg @error('nombre_evento') is-invalid @enderror" placeholder=" " id="nombre_evento" value="{{ old('nombre_evento', $nombre_evento ?? '') }}">
                                    <label for="nombre_evento" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_evento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="dia_evento" class="form-control form-control-lg @error('dia_evento') is-invalid @enderror" placeholder=" " id="dia_evento" value="{{ old('dia_evento', $dia_evento ?? '') }}">
                                    <label for="dia_evento" class="text-dark-blue"><strong>Día del evento</strong></label>
                                    @error('dia_evento')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-2"> 
                            <div class="form-floating">
                                <textarea class="form-control form-control-lg @error('descripcion_evento') is-invalid @enderror" style="height:100px" name="descripcion_evento" placeholder=" " id="descripcion_evento">{{ old('descripcion_evento', $descripcion_evento ?? '') }}</textarea>
                                <label for="descripcion_evento" class="text-dark-blue"><strong>Descripción</strong></label>
                                @error('descripcion_evento')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <!-- Campo de Precio del Evento -->
                        <div class="col-md-6 mb-2">
                            <div class="form-floating">
                                <input type="number" step="0.01" name="precio_evento" class="form-control form-control-lg" placeholder=" " id="cotizacion" value="{{ old('precio_evento', $precio_evento ?? 0.00) }}" oninput="calcularResto()">
                                <label for="cotizacion" class="text-dark-blue"><strong>Cotizacion</strong></label>
                                @error('precio_evento')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo de Anticipo -->
                        <div class="col-md-6 mb-2">
                            <div class="form-floating">
                                <input type="number" step="0.01" name="anticipo" class="form-control form-control-lg" placeholder=" " id="anticipo" value="{{ old('anticipo', $anticipo ?? 0.00) }}" oninput="calcularResto()">
                                <label for="anticipo" class="text-dark-blue"><strong>Anticipo</strong></label>
                                @error('anticipo')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Campo de Resto -->
                        <div class="col-md-6 mb-2">
                            <div class="form-floating">
                                <input type="number" step="0.01" name="resto" class="form-control form-control-lg" placeholder=" " id="resto" value="{{ old('resto', $resto ?? 0.00) }}" readonly>
                                <label for="resto" class="text-dark-blue"><strong>Resto</strong></label>
                            </div>
                        </div>

                        <!-- Campo de Estatus -->
                        <div class="mb-2">
                            <div class="form-floating">
                                <input type="text" name="estatus" class="form-control form-control-lg" placeholder=" " id="estatus" value="{{ old('estatus', $estatus ?? 'En Curso') }}">
                                <label for="estatus" class="text-dark-blue"><strong>Estatus</strong></label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="cliente_id" class="text-dark-blue"><strong>Cliente</strong></label>
                            <select name="cliente_id" id="cliente_id" class="form-select form-select-lg small-text @error('cliente_id') is-invalid @enderror">
                                <option value="">Selecciona un cliente</option>
                                @foreach($usuariosClientes as $usuario)
                                    <option value="{{ $usuario->id }}" {{ old('cliente_id', $usuarioActual->id ?? '') == $usuario->id ? 'selected' : '' }}>
                                        {{ $usuario->nombre_usuacli }} {{ $usuario->apellidop_usuacli }} - {{ $usuario->email_usuacli }} - {{ $usuario->telefono_usuacli }}
                                    </option>
                                @endforeach
                            </select>                                                    
                            @error('cliente_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <!-- Campo oculto para el ID de la petición -->
                        <input type="hidden" name="peticion_id" value="{{ $peticion->id }}">
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Crear</button>
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
        
        if (anticipo > cotizacion) {
            anticipo = cotizacion;
            document.getElementById('anticipo').value = anticipo.toFixed(2);
            document.getElementById('anticipo').classList.add('flash');
            setTimeout(() => {
                document.getElementById('anticipo').classList.remove('flash');
            }, 2500);
        }

        var resto = cotizacion - anticipo;
        document.getElementById('resto').value = resto.toFixed(2);
    }

    document.getElementById('cotizacion').addEventListener('input', function() {

        this.value = Math.abs(this.value);
        

        var anticipoField = document.getElementById('anticipo');
        anticipoField.disabled = this.value == '0';
        if (this.value == '0') {
            anticipoField.value = '';
            document.getElementById('resto').value = '';
        }

        calcularResto(); 
    });

    document.getElementById('anticipo').addEventListener('input', function() {
       
        this.value = Math.abs(this.value);

        calcularResto(); 
    });

    document.addEventListener('DOMContentLoaded', function() {
        var diaEventoField = document.getElementById('dia_evento');
        diaEventoField.setAttribute('min', new Date().toISOString().split('T')[0]);
        calcularResto();
    });

    document.addEventListener('DOMContentLoaded', function() {
        document.getElementById('estatus').value = 'En Curso';
    });
</script>

@endsection
