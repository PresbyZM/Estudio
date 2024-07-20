@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/create.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<br>
<br>

<div class="container mt-5 animate__animated animate__fadeIn">
    <div class="row justify-content-center">
        <div class="col-md-7"> <!-- Ajuste de tamaño de la columna -->
            <div class="card border-0 shadow-lg position-relative ">
                <div class="profile-icon position-absolute top-0 start-50 translate-middle">
                    <img src="{{ asset('images/contacto.jpg') }}" class="rounded-circle img-fluid" alt="Cliente">
                </div>
                <div class="card-body p-2 mt-6 "> <!-- Ajuste del padding -->
                    <br>
                    <div class="text-center mb-1">
                        <h3 class="text-dark-blue  mt-4">Editar perfil</h3> <!-- Añadido margen superior -->
                    </div>
                    <br>
                    @if(session('success'))
                        <div class="alert alert-success ">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger ">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('perfil.update') }}" class="" onsubmit="showLoader()">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input id="nombre_usuario" type="text" class="form-control form-control-sm @error('nombre_usuario') is-invalid @enderror" name="nombre_usuario" value="{{ auth()->user()->nombre_usuario }}" required autofocus>
                                    <label for="nombre_usuario" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_usuario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input id="apellidop_usuario" type="text" class="form-control form-control-sm @error('apellidop_usuario') is-invalid @enderror" name="apellidop_usuario" value="{{ auth()->user()->apellidop_usuario }}">
                                    <label for="apellidop_usuario" class="text-dark-blue"><strong>Apellido Paterno</strong></label>
                                    @error('apellidop_usuario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input id="apellidom_usuario" type="text" class="form-control form-control-sm @error('apellidom_usuario') is-invalid @enderror" name="apellidom_usuario" value="{{ auth()->user()->apellidom_usuario }}">
                                    <label for="apellidom_usuario" class="text-dark-blue"><strong>Apellido Materno</strong></label>
                                    @error('apellidom_usuario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="email_usuario" type="email" class="form-control form-control-sm @error('email_usuario') is-invalid @enderror" name="email_usuario" value="{{ auth()->user()->email_usuario }}" required>
                                <label for="email_usuario" class="text-dark-blue"><strong>Correo electrónico</strong></label>
                                @error('email_usuario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="current_password" type="password" class="form-control form-control-sm @error('current_password') is-invalid @enderror" name="current_password" required>
                                <label for="current_password" class="text-dark-blue"><strong>Contraseña Actual</strong></label>
            
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" name="password">
                                <label for="password" class="text-dark-blue"><strong>Contraseña Nueva</strong></label>
                                
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="password_confirmation" type="password" class="form-control form-control-sm" name="password_confirmation">
                                <label for="password_confirmation" class="text-dark-blue"><strong>Confirmar Contraseña</strong></label>
                            
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-dark-blue btn-sm animate__animated animate__pulse animate__infinite">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<br>

@endsection
