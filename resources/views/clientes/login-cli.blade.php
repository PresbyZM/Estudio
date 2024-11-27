<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/css/clientes/login_cli.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
</head>
<body>
    <div class="login-container row m-0">
        <!-- Sección de la imagen -->
        <div class="col-md-6 image-section d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/clientes/camera.jpg') }}" alt="Equipo de cámaras" class="image-content">
        </div>

        <!-- Sección del formulario -->
        <div class="col-md-6 form-section d-flex align-items-center justify-content-center">
            <div class="form-container p-4 rounded shadow-sm bg-white w-75">
                <div class="text-center mb-4">
                    <img src="{{ asset('images/clientes/logo_vino.png') }}" alt="Logo Calvario Photo Studio" class="logo img-fluid" style="width: 250px; height: 250px;">
                </div>
                <h3 class="text-center mb-4 text1">INICIA SESIÓN</h3>
                
                <!-- Alerta de errores -->
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

                <!-- Formulario de inicio de sesión -->
                <form id="login-form" method="POST" action="{{route('inicia-sesion-cli')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="emailInput" class="text2 form-label">Ingresa tu correo</label>
                        <input type="email" class="form-control" id="emailInput" name="email_usuacli" placeholder="user@gmail.com" required>
                    </div>
                    <div class="mb-3 position-relative">
                        <label for="passwordInput" class="text2 form-label">Ingresa tu contraseña</label>
                        <input type="password" class="form-control password-input" id="passwordInput" name="password" placeholder="" required>
                        <span class="toggle-password" onclick="togglePasswordVisibility()">
                            <i class="fas fa-eye" id="togglePasswordIcon" style="color: #AB3031;"></i>
                        </span>
                    </div>
                    
                    <div class="text-center">
                        <button type="submit" class="boton g-recaptcha" data-sitekey="6Ldn4w8qAAAAAEmlRMSxAwvBwuhwAR8VK5l68alF" data-callback='onSubmit' data-action='submit'>Ingresar</button>
                    </div>
                    <p class="text-center mt-3">¿No tienes una cuenta? <a href="{{route('registro-cli')}}">Regístrate</a></p>
                    <div class="mt-2">
                        <button type="button" class="volver-boton" onclick="volver()">Volver</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Script de reCAPTCHA -->
    <script>
        function onSubmit(token) {
            document.getElementById("login-form").submit();
        }
    </script>

    <!-- Script para mostrar/ocultar la contraseña -->
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("passwordInput");
            const togglePasswordIcon = document.getElementById("togglePasswordIcon");
            
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                togglePasswordIcon.classList.remove("fa-eye");
                togglePasswordIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                togglePasswordIcon.classList.remove("fa-eye-slash");
                togglePasswordIcon.classList.add("fa-eye");
            }
        }
    </script>
</body>
</html>