@extends('layouts.base')

@section('content')
<br>
<br>
<br>
    <div class="container">
        <h1>Editar Usuario</h1>
        <div>
            <a href="{{route('perfiles_index')}}" class="btn btn-primary">Volver</a>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>No puede ser!!!</strong> Algo fue mal..<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('update_user', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nombre_usuacli">Nombre</label>
                <input type="text" name="nombre_usuacli" value="{{ old('nombre_usuacli', $user->nombre_usuacli) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellidop_usuacli">Apellido Paterno</label>
                <input type="text" name="apellidop_usuacli" value="{{ old('apellidop_usuacli', $user->apellidop_usuacli) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="apellidom_usuacli">Apellido Materno</label>
                <input type="text" name="apellidom_usuacli" value="{{ old('apellidom_usuacli', $user->apellidom_usuacli) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="email_usuacli">Email</label>
                <input type="email" name="email_usuacli" value="{{ old('email_usuacli', $user->email_usuacli) }}" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="password">Nueva Contraseña (dejar en blanco si no se desea cambiar)</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>

            <div class="form-group">
                <label for="password_confirmation">Confirmar Nueva Contraseña</label>
                <input type="password" name="password_confirmation" class="form-control">
            </div>

            <button type="submit" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
@endsection
