@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/clientes/clientes_create.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<br>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-body p-4">
                    <div class="text-center mb-3">
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Editar cliente</h2>
                    </div>
                    <div class="text-end mb-3">
                        <a href="{{ route('clientes.index') }}" class="btn btn-outline-secondary btn-sm animate__animated animate__fadeInLeft" onclick="showLoader()">Volver</a>
                    </div>

                    <form action="{{ route('clientes.update', $cliente) }}" method="POST" class="animate__animated animate__fadeInUp" onsubmit="showLoader()">
                        @csrf
                        @method('PUT')
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="nombre_cliente" class="form-control form-control-lg @error('nombre_cliente') is-invalid @enderror" placeholder=" " id="nombre_cliente" value="{{ $cliente->nombre_cliente }}">
                                    <label for="nombre_cliente" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="apellidop_cliente" class="form-control form-control-lg @error('apellidop_cliente') is-invalid @enderror" placeholder=" " id="apellidop_cliente" value="{{ $cliente->apellidop_cliente }}">
                                    <label for="apellidop_cliente" class="text-dark-blue"><strong>Apellido Paterno</strong></label>
                                    @error('apellidop_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input type="text" name="apellidom_cliente" class="form-control form-control-lg @error('apellidom_cliente') is-invalid @enderror" placeholder=" " id="apellidom_cliente" value="{{ $cliente->apellidom_cliente }}">
                                    <label for="apellidom_cliente" class="text-dark-blue"><strong>Apellido Materno</strong></label>
                                    @error('apellidom_cliente')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <textarea class="form-control form-control-lg @error('descripcion_cliente') is-invalid @enderror" style="height:100px" name="descripcion_cliente" placeholder=" " id="descripcion_cliente">{{ $cliente->descripcion_cliente }}</textarea>
                                <label for="descripcion_cliente" class="text-dark-blue"><strong>Descripción</strong></label>
                                @error('descripcion_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="form-floating">
                                <input type="text" name="telefono_cliente" class="form-control form-control-lg @error('telefono_cliente') is-invalid @enderror" placeholder=" " id="telefono_cliente" value="{{ $cliente->telefono_cliente }}" pattern="[0-9]*" inputmode="numeric">
                                <label for="telefono_cliente" class="text-dark-blue"><strong>Teléfono</strong></label>
                                @error('telefono_cliente')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Actualizar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('telefono_cliente').addEventListener('input', function (e) {
        this.value = this.value.replace(/[^0-9]/g, '');
    });
</script>
@endsection
