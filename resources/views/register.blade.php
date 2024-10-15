<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="{{ asset('css/auth/registro.css') }}" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" rel="stylesheet">
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

    <main class="form-container animate__animated animate__fadeIn"">
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
                <div class="custom-checkbox">
                    <input type="checkbox" id="privacyCheckbox">
                    <label for="privacyCheckbox" class="checkbox-icon"></label>
                    <label for="privacyCheckbox" class="checkbox-label">Acepto el aviso de privacidad</label>
                </div>                
                <a href="#" id="showModal" class="privacy-link">Aviso de Privacidad</a>
                <br>
                <button type="submit" id="registroBtn" class="btn btn-primary">Registrarse</button>
            </div>
        </form>
    </main>

    <div id="loader" class="loader">
        <img src="{{ asset('images/camara.png') }}" alt="Cámara Fotográfica Girando">
    </div>

    <div id="privacyModal" class="modal animate__animated animate__fadeIn"">
        <div class="modal-content">
            <span class="close-btn">&times;</span>
            <h2>Aviso de Privacidad</h2>
            <p>La empresa responsable de tratar tus datos personales es el estudio fotografico "Foto y video Calvario", con domicilio en calle Constitucion #16, el Calvario, Ixmiquilpan, Hidalgo con codigo postal 42303. Puedes contactarnos al correo electrónico photocalvario@gmail.com o al número telefónico 7721047611.</p>
            <p>Recopilamos los siguientes datos personales: nombre completo y dirección de correo electrónico, tus datos personales serán utilizados para las siguientes finalidades:</p>
            <ul>
                <li>Gestionar tu cuenta de usuario y proporcionarte acceso a nuestros servicios.</li>
                <li>Notificaciones sobre nuestros productos y servicios.</li>
                <li>Mejorar nuestra plataforma y personalizar la experiencia de usuario.</li>
                <li>Cumplir con las obligaciones legales y regulatorias aplicables.</li>
            </ul>
            <p>Tienes el derecho a oponerte al uso de tus datos personales para fines específicos. Para ejercer este derecho, puedes ponerte en contacto con nosotros a través de photocalvario@gmail.com, indicando claramente los fines para los que deseas que no se utilicen tus datos.</p>
            <p>No compartiremos tus datos personales con terceros sin tu consentimiento, excepto en los casos en que sea necesario para cumplir con obligaciones legales, para proporcionarte nuestros servicios, o en casos específicos que te serán informados oportunamente.</p>
            <p>Tienes el derecho a acceder, rectificar, cancelar u oponerte al tratamiento de tus datos personales (derechos ARCO). Para ejercer estos derechos, por favor envíanos una solicitud a photocalvario@gmail.com, especificando el derecho que deseas ejercer y proporcionando la información necesaria para procesar tu solicitud.</p>
            <p>Puedes solicitar la limitación del uso de tus datos personales. Para ello, contacta con nosotros a través de photocalvario@gmail.com indicando claramente qué datos deseas limitar y las razones para hacerlo.</p>
            <p>Recogemos tus datos personales a través de los formularios que llenas en nuestra plataforma. También podemos utilizar cookies para mejorar tu experiencia en nuestro sitio web, tales como recordar tus preferencias y ofrecerte contenido personalizado. Puedes configurar tu navegador para rechazar las cookies, pero ten en cuenta que esto podría afectar la funcionalidad de nuestro sitio web.</p>
            <p>Nos reservamos el derecho de realizar modificaciones al presente Aviso de Privacidad. Cualquier cambio será publicado en nuestra plataforma y te informaremos de manera oportuna. Te recomendamos revisar periódicamente este aviso para estar al tanto de cualquier actualización.</p>
            <p>Fecha de última actualización: 14 de julio del 2024</p>
        </div>
    </div>

    <script>
        document.getElementById('registroForm').addEventListener('submit', function(event) {
            event.preventDefault();

            
            if (!document.getElementById('privacyCheckbox').checked) {
                Swal.fire('Error', 'Debes aceptar el aviso de privacidad para registrarte.', 'error');
                return;
            }

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
            } else if (!isValidPassword(password)) {
                isValid = false;
                Swal.fire('Error', 'La contraseña debe cumplir con los siguientes criterios:\n' +
                                    'Contener letras mayúsculas y minúsculas,\n' +
                                    'Contener números y signos especiales,\n' +
                                    'Tener al menos 8 caracteres de longitud.', 'error');
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
                
                document.getElementById('registroBtn').disabled = true;
                
                
                document.getElementById('loader').style.display = 'flex';

               
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
                    
                    if (data.errors && data.errors.email_usuario) {
                        Swal.fire('Error', data.errors.email_usuario[0], 'error');
                        
                        document.getElementById('registroBtn').disabled = false;
                    } else if (data.success) {
                        Swal.fire('Éxito', 'Registro exitoso', 'success').then(() => {
                            window.location.href = data.redirect;
                        });
                    } else {
                        Swal.fire('Error', 'Ocurrió un error al procesar el formulario.', 'error');
                        
                        document.getElementById('registroBtn').disabled = false;
                    }
                })
                .catch(error => {
                    Swal.fire('Error', 'Ocurrió un error al procesar el formulario.', 'error');
                    
                    document.getElementById('registroBtn').disabled = false;
                })
                .finally(() => {
                   
                    document.getElementById('loader').style.display = 'none';
                });
            }
        });

        function validateEmail(email) {
            const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@(([^<>()\[\]\\.,;:\s@"]+\.)+[^<>()\[\]\\.,;:\s@"]{2,})$/i;
            return re.test(String(email).toLowerCase());
        }

        function isValidPassword(password) {
            return /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/.test(password);
        }
    </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var modal = document.getElementById('privacyModal');
        var showModalButton = document.getElementById('showModal');
        var closeModalButton = document.querySelector('.modal .close-btn');
    
        
        showModalButton.addEventListener('click', function(event) {
            event.preventDefault(); 
            modal.style.display = 'flex';
        });
    
        
        closeModalButton.addEventListener('click', function() {
            modal.style.display = 'none';
        });
    
        
        window.addEventListener('click', function(event) {
            if (event.target == modal) {
                modal.style.display = 'none'; 
            }
        });
    });
</script>
    
</body>
</html>
