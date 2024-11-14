@extends('../layouts.base_cliente')

@section('content')
<link rel="stylesheet" href="/css/clientes/edit-perfil_cli.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<div class="container perfil-container">
    <div class="text-center">
        <img src="{{ asset('images/profile.png') }}" alt="Profile" class="text-center profile">
        <h1 class="text-center text-vino">Edita tu perfil</h1>
    </div>

    @if(session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '¡Éxito!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#AB3031'
            });
        </script>
    @endif

    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'No puede ser!!!',
                html: `
                    <p>Algo fue mal...</p>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                `,
                confirmButtonColor: '#AB3031'
            });
        </script>
    @endif

    <form action="{{ route('perfil-cli.update') }}" method="POST" class="form-container">
        @csrf
        @method('PUT')

        <div class="row mb-3">
            <div class="col">
                <label for="nombreInput" class="form-label text-vino">Nombre</label>
                <div class="input-group">
                    <span class="input-group-text custom-addon"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control @error('nombre_usuacli') is-invalid @enderror" id="nombreInput" name="nombre_usuacli" value="{{ old('nombre_usuacli', $usuario->nombre_usuacli) }}" required>
                </div>
            </div>
            <div class="col">
                <label for="apellidoPInput" class="form-label text-vino">Apellido Paterno</label>
                <div class="input-group">
                    <span class="input-group-text custom-addon"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control @error('apellidop_usuacli') is-invalid @enderror" id="apellidoPInput" name="apellidop_usuacli" value="{{ old('apellidop_usuacli', $usuario->apellidop_usuacli) }}" required>
                </div>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col">
                <label for="apellidoMInput" class="form-label text-vino">Apellido Materno</label>
                <div class="input-group">
                    <span class="input-group-text custom-addon"><i class="bi bi-person"></i></span>
                    <input type="text" class="form-control @error('apellidom_usuacli') is-invalid @enderror" id="apellidoMInput" name="apellidom_usuacli" value="{{ old('apellidom_usuacli', $usuario->apellidom_usuacli) }}" required>
                </div>
            </div>
            <div class="col">
                <label for="telefonoInput" class="form-label text-vino">Teléfono</label>
                <div class="input-group">
                    <span class="input-group-text custom-addon"><i class="bi bi-telephone"></i></span>
                    <input type="text" class="form-control @error('telefono_usuacli') is-invalid @enderror" id="telefonoInput" name="telefono_usuacli" value="{{ old('telefono_usuacli', $usuario->telefono_usuacli) }}" required>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="emailInput" class="form-label text-vino">Correo Electrónico</label>
            <div class="input-group">
                <span class="input-group-text custom-addon"><i class="bi bi-envelope"></i></span>
                <input type="email" class="form-control @error('email_usuacli') is-invalid @enderror" id="emailInput" name="email_usuacli" value="{{ old('email_usuacli', $usuario->email_usuacli) }}" required>
            </div>
        </div>

        <div class="mb-3">
            <label for="currentPasswordInput" class="form-label text-vino">Contraseña Actual</label>
            <div class="input-group">
                <span class="input-group-text custom-addon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="currentPasswordInput" name="current_password" placeholder="Ingresa tu contraseña actual para confirmar">
                <button type="button" class="btn-toggle-password" onclick="togglePasswordVisibility('currentPasswordInput')">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <div class="mb-3">
            <label for="newPasswordInput" class="form-label text-vino">Nueva Contraseña</label>
            <div class="input-group">
                <span class="input-group-text custom-addon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="newPasswordInput" name="password" placeholder="Dejar en blanco para no cambiar">
                <button type="button" class="btn-toggle-password" onclick="togglePasswordVisibility('newPasswordInput')">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <div class="mb-3">
            <label for="confirmPasswordInput" class="form-label text-vino">Confirmar Nueva Contraseña</label>
            <div class="input-group">
                <span class="input-group-text custom-addon"><i class="bi bi-lock"></i></span>
                <input type="password" class="form-control" id="confirmPasswordInput" name="password_confirmation">
                <button type="button" class="btn-toggle-password" onclick="togglePasswordVisibility('confirmPasswordInput')">
                    <i class="bi bi-eye"></i>
                </button>
            </div>
        </div>

        <button type="submit" class="btn btn-vino mt-3">Actualizar Perfil</button>
    </form>
</div>

<script>
    function togglePasswordVisibility(inputId) {
        const passwordInput = document.getElementById(inputId);
        const icon = passwordInput.nextElementSibling.querySelector('i');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            icon.classList.remove('bi-eye');
            icon.classList.add('bi-eye-slash');
        } else {
            passwordInput.type = 'password';
            icon.classList.remove('bi-eye-slash');
            icon.classList.add('bi-eye');
        }
    }
</script>
@endsection
