@extends('../layouts.base_cliente')

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
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Enviar Peticion</h2>
                    </div>

                    <div class="text-end mb-2"> 
                        <a href="{{ route('calendario.cliente') }}" class="btn btn-outline-primary btn-sm animate__animated animate__fadeInLeft" onclick="showLoader()">Volver</a>
                    </div>

                    <form action="{{ route('peticiones.store') }}" method="POST" class="animate__animated animate__fadeInUp" onsubmit="showLoader()" id="crearPeticionForm">
                        @csrf
                        <div class="row mb-2">
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="text" name="nombre_evento_peticion" class="form-control form-control-lg @error('nombre_evento_peticion') is-invalid @enderror" placeholder=" " id="nombre_evento_peticion" value="{{ old('nombre_evento_peticion') }}">
                                    <label for="nombre_evento_peticion" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_evento_peticion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input type="date" name="dia_evento_peticion" class="form-control form-control-lg @error('dia_evento_peticion') is-invalid @enderror" placeholder=" " id="dia_evento_peticion" value="{{ old('dia_evento_peticion', $fechaSeleccionada) }}">
                                    <label for="dia_evento_peticion" class="text-dark-blue"><strong>Día del evento</strong></label>
                                    @error('dia_evento_peticion')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="servicio_id" class="text-dark-blue"><strong>Servicio</strong></label>
                            <select name="servicio_id" id="servicio_id" class="form-select form-select-lg small-text @error('peticion_id') is-invalid @enderror" onchange="actualizarPrecio()">
                                <option value="">Selecciona el servicio o producto</option>
                                @foreach($servicios as $servicio)
                                    <option value="{{ $servicio->id }}" {{ old('servicio_id') == $servicio->id ? 'selected' : '' }}>{{ $servicio->nombre_servicio }}</option>
                                @endforeach
                            </select>
                            @error('servicio_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-2"> 
                            <div class="form-floating">
                                <textarea class="form-control form-control-lg @error('descripcion_evento_peticion') is-invalid @enderror" style="height:100px" name="descripcion_evento_peticion" placeholder=" " id="descripcion_evento_peticion">{{ old('descripcion_evento_peticion') }}</textarea>
                                <label for="descripcion_evento_peticion" class="text-dark-blue"><strong>Descripción</strong></label>
                                @error('descripcion_evento_peticion')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="precio_evento_peticion" class="form-label">Cotizacion con los productos del evento</label>
                            <input type="text" name="precio_evento_peticion" id="precio_evento_peticion" class="form-control" readonly>
                        </div>
                            <input type="hidden" name="estatus_peticion" value="Pendiente">
                        <br>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Mandar solicitud</button>
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
    function actualizarPrecio() {
        var servicioId = document.getElementById('servicio_id').value;

        if (servicioId) {
            // Realiza una solicitud AJAX para obtener el precio del servicio seleccionado
            fetch(`/servicios/${servicioId}/precio`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error en la respuesta');
                    }
                    return response.json();
                })
                .then(data => {
                    // Actualiza el campo de precio con el valor obtenido
                    document.getElementById('precio_evento_peticion').value = data.precio;
                })
                .catch(error => {
                    console.error('Error al obtener el precio del servicio:', error);
                });
        } else {
            // Si no hay servicio seleccionado, limpia el campo de precio
            document.getElementById('precio_evento_peticion').value = '';
        }
    }
</script>




@endsection
