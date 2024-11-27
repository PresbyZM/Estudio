<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/clientes/registro_cli.css">
    <link rel="stylesheet" href="/css/clientes/estilos.css">

</head>
<body>
    <div class="registro-container row m-0">
        <div class="col-md-6 image-section d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/clientes/camera.jpg') }}" alt="Equipo de cámaras" class="image-content">
        </div>

        <div class="col-md-6 form-section d-flex align-items-center justify-content-center">
            <div class="form-container p-3 rounded shadow-sm bg-white w-75">
                <div class="text-center mb-3">
                    <img src="{{ asset('images/clientes/small_logo.png') }}" alt="Logo Calvario Photo Studio" class="logo img-fluid">
                </div>
                <h3 class="text-center mb-3 text1">REGISTRO</h3>

                <!-- Formulario de Registro -->
                <form method="POST" action="{{route('validar-registro-cli')}}" novalidate>
                    @csrf
                    <div class="mb-2">
                        <label for="emailInput" class="text2 form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-envelope"></i></span>
                            <input type="email" class="form-control @error('email_usuacli') is-invalid @enderror" id="emailInput" name="email_usuacli" placeholder="user@gmail.com" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="passwordInput" class="text2 form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-key"></i></span>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" name="password" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="passwordConfirmationInput" class="text2 form-label">Confirmar Password</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-key"></i></span>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="passwordConfirmationInput" name="password_confirmation" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="nombreInput" class="text2 form-label">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control @error('nombre_usuacli') is-invalid @enderror" id="nombreInput" name="nombre_usuacli" placeholder="" required>

                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="apellidoPInput" class="text2 form-label">Apellido Paterno</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control @error('apellidop_usuacli') is-invalid @enderror" id="apellidoPInput" name="apellidop_usuacli" placeholder="" required>

                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="apellidoMInput" class="text2 form-label">Apellido Materno</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-person"></i></span>
                            <input type="text" class="form-control @error('apellidom_usuacli') is-invalid @enderror" id="apellidoMInput" name="apellidom_usuacli" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="telefonoInput" class="text2 form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon"><i class="bi bi-telephone"></i></span>
                            <input type="tel" class="form-control @error('telefono_usuacli') is-invalid @enderror" id="telefonoInput" name="telefono_usuacli" placeholder="" required>
                        </div>
                    </div>

                    <div class="center mt-3">
                        <button type="submit" class="boton">Registrarse</button>
                    </div>
                </form>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const telefonoInput = document.getElementById('telefonoInput');

                        telefonoInput.addEventListener('input', function() {
                            const value = telefonoInput.value;

                            if (!/^\d*$/.test(value)) {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Entrada no válida',
                                    text: 'Por favor, ingresa solo números en el campo de teléfono.',
                                    confirmButtonColor: '#AB3031'
                                });

                                telefonoInput.value = value.replace(/\D/g, '');
                            }
                        });

                        @if ($errors->any())
                            Swal.fire({
                                icon: 'error',
                                title: 'Error en el formulario',
                                html: `
                                    <ul style="text-align: left; font-size: 0.9rem;">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                `,
                                confirmButtonColor: '#AB3031'
                            });
                        @endif
                    });
                </script>

            </div>
        </div>
    </div>
</body>
</html>