<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto y Video Calvario</title>
    <link rel="stylesheet" href="{{ asset('css/clientes/index.css') }}">
    <link rel="stylesheet" href="/css/clientes/servicios.css">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="position: fixed; width: 100%; z-index: 10; padding: 0.5rem 1rem;">
        <div class="container-lg">
            <a class="navbar-brand fw-bold" href="#">
                <img src="{{ asset('images/clientes/logo_v2.png') }}" alt="Logo" style="height: 40px;">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/informacion_estudio">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#Servicios">Servicios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#¿Quienes Somos?">¿Quiénes Somos?</a>
                    </li>
                </ul>
                <a class="btn btn-outline-light" onclick="location.href='{{route('login-cli')}}'">Iniciar Sesión</a>
            </div>
        </div>
   </nav>


   <div id="carouselExampleCaptions" class="carousel slide carousel-fade" style="margin-top: 60px;">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ asset('images/clientes/bn_0.png') }}" class="d-block w-100" alt="..." style="height: 600px; object-fit: cover;">
            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                <div class="text-center">
                    <img src="{{ asset('images/clientes/white_logo.png') }}" alt="Logo" class="img-fluid mb-3" style="max-height: 250px; width: auto;">
                    <button class="btn mt-3" style="background: #67191F; color: white; max-width: 200px; width: 100%;" onclick="location.href='{{ route('registro-cli') }}'">REGÍSTRATE</button>
                </div>
            </div>
        </div>


        <div class="carousel-item">
            <img src="{{ asset('images/clientes/bn_1.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center"></div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/clientes/bn_2.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center"></div>
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/clientes/bn_3.png') }}" class="d-block w-100" alt="...">
            <div class="carousel-caption d-flex flex-column h-100 align-items-center justify-content-center"></div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

    <div class="why-us text-center position-relative pt-5">
        <div class="container">
            <h2 class="fw-bold" style="color:black" id="Servicios">SERVICIOS</h2>
            <h5 class="text-uppercase text-secondary p-3">
                <span class="p-3">Eficiente</span> | 
                <span class="p-3">Profesional</span> | 
                <span class="p-3">Confiable</span>
            </h5>
            <div class="why-sub-section">
                <div class="row g-4">
                    <div class="col-sm-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('images/clientes/card_1.jpg') }}" class="img-fluid" style="width: 100%; max-height: 200px; object-fit: cover;" alt="">
                        <h5 class="p-2">FILMACIÓN Y FOTOGRAFÍA</h5>
                        <button class="btn btn-custom-primary" data-bs-toggle="modal" data-bs-target="#modalFilmacion">Ver más</button>
                    </div>
                    <div class="col-sm-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('images/clientes/card_2.png') }}" class="img-fluid" style="width: 100%; max-height: 200px; object-fit: cover;" alt="">
                        <h5 class="p-2">ENMARCADO DE FOTOGRAFÍAS</h5>
                        <button class="btn btn-custom-primary" data-bs-toggle="modal" data-bs-target="#modalEnmarcado">Ver más</button>
                    </div>
                    <div class="col-sm-4 d-flex flex-column align-items-center">
                        <img src="{{ asset('images/clientes/card_3.png') }}" class="img-fluid" style="width: 100%; max-height: 200px; object-fit: cover;" alt="">
                        <h5 class="p-2">EDICIÓN DE VIDEO Y FOTOS</h5>
                        <button class="btn btn-custom-primary" data-bs-toggle="modal" data-bs-target="#modalEdicion">Ver más</button>
                    </div>
                </div>
            </div>
            <div class="quote pt-3 text-center">
                <p class="fs-5">"La fotografía es el arte de congelar el tiempo."</p>
                <p class="text-uppercase"> — Ansel Adams</p>
            </div>
            <div class="quote-bg py-5 position-absolute bottom-0 start-0 end-0 z-n1 d-none d-lg-block"></div>
        </div>
        <!-- Modal de Filmación y Fotografía -->
        <div class="modal fade" id="modalFilmacion" tabindex="-1" aria-labelledby="modalFilmacionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title custom-modal-title" id="modalFilmacionLabel">Filmación y Fotografía</h5>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body custom-modal-body" style="text-align: justify;">
                        Ofrecemos servicios profesionales de filmación y fotografía para capturar los momentos más importantes de tu vida. Nuestro equipo cuenta con la experiencia y el equipo necesario para documentar cada detalle de tu evento, ya sea una boda, un XV años o un bautizo. Realizamos sesiones personalizadas, garantizando que cada imagen y cada clip de video refleje la emoción y la belleza del momento. Utilizamos técnicas avanzadas y creatividad para crear recuerdos visuales que atesorarás por siempre.
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Enmarcado de Fotografías -->
        <div class="modal fade" id="modalEnmarcado" tabindex="-1" aria-labelledby="modalEnmarcadoLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title custom-modal-title" id="modalEnmarcadoLabel">Enmarcado de Fotografías</h5>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body custom-modal-body" style="text-align: justify;">
                        Transformamos tus recuerdos en obras de arte con nuestro servicio de enmarcado de fotografías. Ofrecemos una amplia variedad de marcos que se adaptan a diferentes estilos y preferencias, asegurando que cada fotografía luzca espectacular. Utilizamos materiales de alta calidad para garantizar la durabilidad y protección de tus fotos, manteniéndolas en perfecto estado durante años.
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Edición de Video y Fotos -->
        <div class="modal fade" id="modalEdicion" tabindex="-1" aria-labelledby="modalEdicionLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content custom-modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title custom-modal-title" id="modalEdicionLabel">Edición de Video y Fotos</h5>
                        <button type="button" class="btn-close custom-btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                    </div>
                    <div class="modal-body custom-modal-body" style="text-align: justify;">
                        Nuestro servicio de edición de video y fotos está diseñado para dar un toque profesional a tus imágenes y grabaciones. Contamos con un equipo de editores expertos que utilizan software avanzado para mejorar la calidad visual y sonora de tus materiales. Ofrecemos una variedad de opciones de edición, desde retoques sutiles hasta montajes creativos, asegurando que cada recuerdo se presente de la mejor manera posible.
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="about position-relative py-5">
        <div class="container">
            <h2 class="fw-bold py-3 px-4" id="¿Quienes Somos?">¿Quiénes Somos?</h2>
            <div class="row align-items-end">
                <div class="col-xl-6 col-lg-7">
                   <img src="{{ asset('images/clientes/team.jpg') }}" class="img-fluid" alt="">

                </div>
                <div class="col-xl-6 col-lg-5">
                    <p class="py-2 text-justify justify-content-">En Foto y Video El Calvario, somos un equipo apasionado de profesionales dedicados a capturar los momentos más especiales de tu vida. Con años de experiencia en la cobertura de eventos como XV años, bodas y bautizos, nuestro objetivo es ofrecerte un servicio rápido, eficiente y de alta calidad.

                    Nos especializamos en filmación y fotografía, creando imágenes que cuentan historias únicas y memorables. Además, ofrecemos servicios de edición profesional y opciones de impresión para que tus recuerdos sean eternos. En El Calvario, tu satisfacción es nuestra prioridad, y estamos aquí para hacer de tu evento un momento inolvidable. ¡Déjanos ser parte de tus recuerdos!
                    </p>
                    <button class="btn">REGISTRATE</button>
                </div>
            </div>
        </div>
    </div>
    

    
    <div class="text-center">
        <h2 class="fw-bold py-3 px-4">
            Encuéntranos Aquí
        </h2>
        <div class="w-100 overflow-hidden" style="max-width: 100%; margin: 0 auto; position: relative; height: 0; padding-bottom: 20%;">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3737.764905502601!2d-99.21953542541429!3d20.474846906574225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d3e1e359882cef%3A0x369305470ae9a4ce!2sFoto%20y%20Video%20Calvario!5e0!3m2!1ses-419!2smx!4v1728356771553!5m2!1ses-419!2smx" 
                    width="100%" 
                    height="100%" 
                    allowfullscreen="" 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade" 
                    class="border-0" 
                    style="position: absolute; top: 0; left: 0; height: 100%; border-radius: 15px; border: 5px solid #fff;">
            </iframe>
        </div>
    </div>

    <br><br>




    <footer class="text-light pt-5">
        <div class="container-lg">
            <div class="row">
                <div class="col-6 col-lg-4">
                    <a class="navbar-brand fw-bold" href="#">
                        <img src="{{ asset('images/clientes/logo_v2.png') }}"class="img-fluid" alt="Logo" style="height: 80px;">
                    </a>

                </div>
                <div class="col">
                    <h6 class="fw-bold">
                        <i class="fas fa-map-marker-alt me-2"></i> Dirección:
                    </h6>
                    <p class="mb-0">Constitución número 16, El Calvario</p>
                </div>
                <div class="col">
                    <h6 class="fw-bold">
                        <i class="fas fa-phone me-2"></i> Teléfono:
                    </h6>
                    <p class="mb-0">(052) 772-104-7611</p>
                </div>

                <!-- <div class="col-6 col-lg-3 text-lg-end">
                    <h4>Redes Sociales</h4>
                    <div class="social-media pt-2">
                        <a href="#" class="text-light fs-2 me-3"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-light fs-2 me-3"><i class="fab fa-pinterest"></i></a>
                        <a href="#" class="text-light fs-2 me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-light fs-2"><i class="fab fa-linkedin"></i></a>

                    </div>
                </div> -->
            </div>
            <hr>
            <div class="d-sm-flex justify-content-between py-1">
                <p>2024 © Foto y Video el Calvario. </p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-...integrity-hash..." crossorigin="anonymous"></script>

</body>
</html>