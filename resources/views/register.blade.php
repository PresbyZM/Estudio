<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="{{ asset('css/auth/registro.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
        x="0px" y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
        <defs>
            <linearGradient id="bg">
                <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
                <stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
                <stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>
            </linearGradient>
            <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
                s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
        </defs>
        <g>
            <use xlink:href='#wave' opacity=".3">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                    calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".6">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                    calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
            <use xlink:href='#wave' opacity=".9">
                <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                    calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                    keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
            </use>
        </g>
    </svg>

    <main class="form-container">
        <form id="registroForm" method="POST" action="{{ route('validar-registro') }}">
            @csrf
            <div class="card">
                <img src="{{ asset('images/logo.jpg') }}" alt="Logo" class="logo">
                <h2 class="card-title">Registro</h2>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="email" class="form-control" id="emailInput" name="email_usuario">
                </div>
                <div class="mb-3">
                    <label for="passwordInput" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordInput" name="password">
                </div>
                <div class="mb-3">
                    <label for="nombreInput" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombreInput" name="nombre_usuario">
                </div>
                <div class="mb-3">
                    <label for="apellidomInput" class="form-label">Apellido Materno</label>
                    <input type="text" class="form-control" id="apellidomInput" name="apellidom_usuario">
                </div>
                <div class="mb-3">
                    <label for="apellidopInput" class="form-label">Apellido Paterno</label>
                    <input type="text" class="form-control" id="apellidopInput" name="apellidop_usuario">
                </div>
                <button type="submit" id="registroBtn" class="btn btn-primary">Registrarse</button>
            </div>
        </form>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.getElementById('registroForm').addEventListener('submit', function(event) {
            event.preventDefault();
            let isValid = true;
            let email = document.getElementById('emailInput').value;
            let password = document.getElementById('passwordInput').value;
            let nombre = document.getElementById('nombreInput').value;
            let apellidoM = document.getElementById('apellidomInput').value;
            let apellidoP = document.getElementById('apellidopInput').value;

            if (!email) {
                isValid = false;
                Swal.fire('Error', 'Por favor, ingrese un correo electrónico válido.', 'error');
            } else if (!validateEmail(email)) {
                isValid = false;
                Swal.fire('Error', 'El formato del correo electrónico no es válido.', 'error');
            } else if (!password || password.length < 8) {
                isValid = false;
                Swal.fire('Error', 'La contraseña debe tener al menos 8 caracteres.', 'error');
            } else if (!nombre) {
                isValid = false;
                Swal.fire('Error', 'Por favor, ingrese su nombre.', 'error');
            } else if (!apellidoM) {
                isValid = false;
                Swal.fire('Error', 'Por favor, ingrese su apellido materno.', 'error');
            } else if (!apellidoP) {
                isValid = false;
                Swal.fire('Error', 'Por favor, ingrese su apellido paterno.', 'error');
            }

            if (isValid) {
                // Desactivar el botón de envío
                document.getElementById('registroBtn').disabled = true;
                
                // Mostrar el loader
                document.getElementById('loader').style.display = 'flex';

                // Crear un objeto FormData y enviar el formulario
                let formData = new FormData(this);
                fetch(this.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    // Manejar respuesta del servidor
                    if (data.errors && data.errors.email_usuario) {
                        Swal.fire('Error', data.errors.email_usuario[0], 'error');
                        // Reactivar el botón de envío
                        document.getElementById('registroBtn').disabled = false;
                    } else if (data.success) {
                        Swal.fire('Éxito', 'Registro exitoso', 'success').then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        Swal.fire('Error', 'Ocurrió un error al procesar el formulario.', 'error');
                        // Reactivar el botón de envío
                        document.getElementById('registroBtn').disabled = false;
                    }
                })
                .catch(error => {
                    Swal.fire('Error', 'Ocurrió un error al procesar el formulario.', 'error');
                    // Reactivar el botón de envío
                    document.getElementById('registroBtn').disabled = false;
                })
                .finally(() => {
                    // Ocultar el loader
                    document.getElementById('loader').style.display = 'none';
                });
            }
        });

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()\[\]\\.,;:\s@"]+\.)+[^<>()\[\]\\.,;:\s@"]{2,})$/i;
            return re.test(String(email).toLowerCase());
        }
    </script>
    <div id="loader" class="loader">
        <img src="{{ asset('images/camara.png') }}" alt="Cámara Fotográfica Girando">
    </div>
    

</body>
</html>
