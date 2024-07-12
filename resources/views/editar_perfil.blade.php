@extends('layouts.base')

@section('content')
<link rel="stylesheet" href="{{ asset('css/formularios/create.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
<br>
<br>
<br>
<br>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg position-relative">
                <div class="profile-icon position-absolute top-0 start-50 translate-middle">
                    <img src="{{ asset('images/contacto.jpg') }}" class="rounded-circle img-fluid" alt="Cliente">
                </div>
                <div class="card-body p-4 mt-5">
                    <br>
                    <div class="text-center mb-3">
                        <h2 class="text-dark-blue animate__animated animate__fadeInDown">Editar perfil</h2>
                    </div>
                    <br>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif
                    
                    <form method="POST" action="{{ route('perfil.update') }}" class="animate__animated animate__fadeInUp" onsubmit="showLoader()">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input id="nombre_usuario" type="text" class="form-control form-control-lg @error('nombre_usuario') is-invalid @enderror" name="nombre_usuario" value="{{ auth()->user()->nombre_usuario }}" required autofocus>
                                    <label for="nombre_usuario" class="text-dark-blue"><strong>Nombre</strong></label>
                                    @error('nombre_usuario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input id="apellidop_usuario" type="text" class="form-control form-control-lg @error('apellidop_usuario') is-invalid @enderror" name="apellidop_usuario" value="{{ auth()->user()->apellidop_usuario }}">
                                    <label for="apellidop_usuario" class="text-dark-blue"><strong>Apellido Paterno</strong></label>
                                    @error('apellidop_usuario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating">
                                    <input id="apellidom_usuario" type="text" class="form-control form-control-lg @error('apellidom_usuario') is-invalid @enderror" name="apellidom_usuario" value="{{ auth()->user()->apellidom_usuario }}">
                                    <label for="apellidom_usuario" class="text-dark-blue"><strong>Apellido Materno</strong></label>
                                    @error('apellidom_usuario')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="email_usuario" type="email" class="form-control form-control-lg @error('email_usuario') is-invalid @enderror" name="email_usuario" value="{{ auth()->user()->email_usuario }}" required>
                                <label for="email_usuario" class="text-dark-blue"><strong>Correo electrónico</strong></label>
                                @error('email_usuario')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="current_password" type="password" class="form-control form-control-lg @error('current_password') is-invalid @enderror" name="current_password" required>
                                <label for="current_password" class="text-dark-blue"><strong>Contraseña Actual</strong></label>
                                <span class="input-group-text" onclick="togglePassword('current_password')"><i class="fa fa-eye"></i></span>
                                @error('current_password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password">
                                <label for="password" class="text-dark-blue"><strong>Contraseña Nueva</strong></label>
                                <span class="input-group-text" onclick="togglePassword('password')"><i class="fa fa-eye"></i></span>
                                @error('password')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-floating">
                                <input id="password_confirmation" type="password" class="form-control form-control-lg" name="password_confirmation">
                                <label for="password_confirmation" class="text-dark-blue"><strong>Confirmar Contraseña</strong></label>
                                <span class="input-group-text" onclick="togglePassword('password_confirmation')"><i class="fa fa-eye"></i></span>
                            </div>
                        </div>

                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-dark-blue btn-lg animate__animated animate__pulse animate__infinite">Guardar cambios</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function togglePassword(id) {
        var input = document.getElementById(id);
        var icon = input.nextElementSibling.firstChild;
        if (input.type === "password") {
            input.type = "text";
            icon.classList.remove("fa-eye");
            icon.classList.add("fa-eye-slash");
        } else {
            input.type = "password";
            icon.classList.remove("fa-eye-slash");
            icon.classList.add("fa-eye");
        }
    }
</script>
<br>

@endsection
