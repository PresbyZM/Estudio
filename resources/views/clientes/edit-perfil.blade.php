@extends('../layouts.base_cliente')

@section('content')
<div class="container">
    <h1>Editar Perfil</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
    <div class="alert alert-danger mt-2">
        <strong>No pueder ser!!! </strong> Algo fue mal..<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('perfil-cli.update') }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="nombre_usuacli">Nombre</label>
            <input type="text" name="nombre_usuacli" class="form-control" value="{{ old('nombre_usuacli', $usuario->nombre_usuacli) }}" required>
        </div>

        <div class="form-group">
            <label for="apellidop_usuacli">Apellido Paterno</label>
            <input type="text" name="apellidop_usuacli" class="form-control" value="{{ old('apellidop_usuacli', $usuario->apellidop_usuacli) }}" required>
        </div>

        <div class="form-group">
            <label for="apellidom_usuacli">Apellido Materno</label>
            <input type="text" name="apellidom_usuacli" class="form-control" value="{{ old('apellidom_usuacli', $usuario->apellidom_usuacli) }}" required>
        </div>

        <div class="form-group">
            <label for="telefono_usuacli">Telefono</label>
            <input type="text" name="telefono_usuacli" class="form-control" value="{{ old('telefono_usuacli', $usuario->telefono_usuacli) }}" required>
        </div>

        <div class="form-group">
            <label for="email_usuacli">Correo Electrónico</label>
            <input type="email" name="email_usuacli" class="form-control" value="{{ old('email_usuacli', $usuario->email_usuacli) }}" required>
        </div>

        <!-- Campo para contraseña actual -->
        <div class="form-group">
            <label for="current_password">Contraseña Actual</label>
            <input type="password" name="current_password" class="form-control" placeholder="Ingresa tu contraseña actual para confirmar">
        </div>

        <!-- Campo para nueva contraseña -->
        <div class="form-group">
            <label for="password">Nueva Contraseña</label>
            <input type="password" name="password" class="form-control" placeholder="Dejar en blanco para no cambiar">
        </div>

        <!-- Campo para confirmar la nueva contraseña -->
        <div class="form-group">
            <label for="password_confirmation">Confirmar Nueva Contraseña</label>
            <input type="password" name="password_confirmation" class="form-control">
        </div>


        <button type="submit" class="btn btn-primary">Actualizar Perfil</button>
    </form>
</div>
@endsection