@extends('../layouts.base_cliente')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/create.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

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
                            <label for="servicios" class="text-dark-blue"><strong>Servicios</strong></label>
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#serviciosModal">
                                Seleccionar servicios
                            </button>
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

                        <input type="hidden" name="servicios" id="serviciosInput">

                        <div class="form-group">
                            <label for="precio_evento_peticion" class="form-label">Cotización con los productos del evento</label>
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

<!-- Modal para seleccionar servicios -->
<div class="modal fade" id="serviciosModal" tabindex="-1" aria-labelledby="serviciosModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="serviciosModalLabel">Seleccionar Servicios</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    @foreach($servicios as $categoria => $servicios)
                        <div class="col-12">
                            <h4>{{ $categoria }}</h4>
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Filtrar servicios..." onkeyup="filtrarServicios('{{ $categoria }}', this.value)">
                            </div>
                            <div class="row" id="categoria-{{ $categoria }}">
                                @foreach($servicios as $servicio)
                                    <div class="col-md-4 mb-3">
                                        <div class="card">
                                            <img src="{{ asset('images/servicios/'.$servicio->imagen) }}" class="card-img-top" alt="{{ $servicio->nombre_servicio }}">
                                            <div class="card-body">
                                                <h5 class="card-title">{{ $servicio->nombre_servicio }}</h5>
                                                <p class="card-text">{{ $servicio->descripcion_servicio }}</p>
                                                <p><strong>Precio:</strong> ${{ $servicio->precio_servicio }}</p>
                                                <div class="form-check">
                                                    <input class="form-check-input servicio-checkbox" type="checkbox" name="servicios[]" value="{{ $servicio->id }}">
                                                    <label class="form-check-label">Seleccionar</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal" onclick="guardarSeleccion()">Guardar selección</button>
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
        const checkboxes = document.querySelectorAll('.servicio-checkbox');

        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', actualizarCotizacion);
        });

        function actualizarCotizacion() {
            const selectedServices = Array.from(checkboxes)
                .filter(checkbox => checkbox.checked)
                .map(checkbox => checkbox.value);

            fetch('{{ route("peticiones.calcular-cotizacion") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                body: JSON.stringify({ servicios: selectedServices })
            })
            .then(response => response.json())
            .then(data => {
                document.getElementById('precio_evento_peticion').value = data.total;
            })
            .catch(error => {
                console.error('Error al calcular la cotización:', error);
            });
        }
    });
</script>

<script>
    function filtrarServicios(categoria, filtro) {
        const servicios = document.querySelectorAll(`#categoria-${categoria} .card`);
        servicios.forEach(servicio => {
            const nombre = servicio.querySelector('.card-title').textContent.toLowerCase();
            servicio.style.display = nombre.includes(filtro.toLowerCase()) ? '' : 'none';
        });
    }

    function guardarSeleccion() {
        const selectedServices = Array.from(document.querySelectorAll('.servicio-checkbox:checked'))
            .map(checkbox => checkbox.value);

        document.getElementById('serviciosInput').value = selectedServices.join(',');

        console.log(selectedServices); 
    }


</script>

@endsection
