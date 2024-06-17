@extends('layouts.base')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar perfil</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('perfil.update') }}">
                            @csrf
                            @method('PUT')

                            <div class="mb-3">
                                <label for="nombre_usuario" class="form-label">Nombre</label>
                                <input id="nombre_usuario" type="text" class="form-control" name="nombre_usuario" value="{{ auth()->user()->nombre_usuario }}" required autofocus>
                            </div>

                            <div class="mb-3">
                                <label for="apellidop_usuario" class="form-label">Apellido Paterno</label>
                                <input id="apellidop_usuario" type="text" class="form-control" name="apellidop_usuario" value="{{ auth()->user()->apellidop_usuario }}">
                            </div>

                            <div class="mb-3">
                                <label for="apellidom_usuario" class="form-label">Apellido Materno</label>
                                <input id="apellidom_usuario" type="text" class="form-control" name="apellidom_usuario" value="{{ auth()->user()->apellidom_usuario }}">
                            </div>

                            <div class="mb-3">
                                <label for="email_usuario" class="form-label">Correo electrónico</label>
                                <input id="email_usuario" type="email" class="form-control" name="email_usuario" value="{{ auth()->user()->email_usuario }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input id="password" type="password" class="form-control" name="password">
                            </div>

                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Confirmar Contraseña</label>
                                <input id="password_confirmation" type="password" class="form-control" name="password_confirmation">
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Guardar cambios</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
