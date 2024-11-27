@extends('layouts.base')

@section('content')
<br>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg" style="max-width: 700px; width: 100%; border-radius: 15px; overflow: hidden;">
        <div class="card-body">
            <h2 class="text-center mb-4" style="color: #2C3E50; font-weight: 600;">Editar Usuario</h2>
            <div class="text-center mb-3">
                
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

            <form action="{{ route('update_user', $user->id) }}" method="POST" onsubmit="showLoader()">
                @csrf
                @method('PUT')

                <a href="{{route('perfiles_index')}}" class="btn btn-link" onclick="showLoader()">Volver</a>

                
                <div class="row g-3 mb-4">
                    <div class="col">
                        <input type="text" name="nombre_usuacli" value="{{ old('nombre_usuacli', $user->nombre_usuacli) }}" class="form-control" placeholder="Nombre" required>
                    </div>
                    <div class="col">
                        <input type="text" name="apellidop_usuacli" value="{{ old('apellidop_usuacli', $user->apellidop_usuacli) }}" class="form-control" placeholder="Apellido Paterno" required>
                    </div>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col">
                        <input type="text" name="apellidom_usuacli" value="{{ old('apellidom_usuacli', $user->apellidom_usuacli) }}" class="form-control" placeholder="Apellido Materno" required>
                    </div>
                    <div class="col">
                        <input type="email" name="email_usuacli" value="{{ old('email_usuacli', $user->email_usuacli) }}" class="form-control" placeholder="Email" required>
                    </div>
                </div>

                <!-- Contraseña -->
                <div class="form-group mb-4">
                    <label for="password" style="color: #34495e;">Nueva Contraseña (dejar en blanco si no se desea cambiar)</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Nueva Contraseña">
                </div>

                <div class="form-group mb-4">
                    <label for="password_confirmation" style="color: #34495e;">Confirmar Nueva Contraseña</label>
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar Contraseña">
                </div>

                <!-- Botón de actualización -->
                <div class="d-grid">
                    <button type="submit" class="btn btn-primary btn-lg">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>

body {
    background-color: #f4f7fc; 
}


.card {
    background-color: #ffffff;
    border-radius: 15px;
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
}


.card h2 {
    font-size: 28px;
    color: #2C3E50;
}


.form-control {
    border-radius: 8px;
    border: 1px solid #BDC3C7;
    box-shadow: none;
}


.btn-primary {
    background-color: #3498db;
    border-color: #3498db;
    font-size: 16px;
    border-radius: 8px;
    padding: 12px;
}

.btn-primary:hover {
    background-color: #2980b9;
    border-color: #2980b9;
}


.alert-danger {
    background-color: #f8d7da;
    color: #721c24;
    border: 1px solid #f5c6cb;
    border-radius: 8px;
}
</style>
@endsection
