<!DOCTYPE html>
<html lang="es">
<head>
    <link rel="icon" href="{{ asset('images/camara.png') }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">

    <title>Estudio</title>

    <link rel="stylesheet" href="{{ asset('css/inicio/inicio.css') }}">
</head>
<body>

    <div class="animated-background">
        <div class="animated-square square1"></div>
        <div class="animated-square border-only square2"></div>
        <div class="animated-square square3"></div>
        <div class="animated-square border-only square4"></div>
        <div class="animated-square square5"></div>
        <div class="animated-square square6"></div>
        <div class="animated-square border-only square7"></div>
        <div class="animated-square square8"></div>
        <div class="animated-square border-only square9"></div>
        <div class="animated-square square10"></div>
        <div class="animated-square border-only square11"></div>
        <div class="animated-square square12"></div>
    </div>


    <nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="logo-name">Estudio</span>
        </div>
        
        <div class="user-profile">
            <a href="{{ route('perfil.edit') }}" class="nav-link">
                <i class="bx bx-user-circle icon"></i>
                <span class="user-name">
                    @auth 
                        {{ Auth::user()->nombre_usuario }} {{ Auth::user()->apellidom_usuario }} {{ Auth::user()->apellidop_usuario }} 
                    @endauth
                </span>
            </a>
        </div>

        <div class="sidebar">
            <div class="logo">
                <i class="bx bx-menu menu-icon"></i>
                <span class="logo-name">Estudio</span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <a href="{{ route('inicio') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-home-alt icon"></i>
                            <span class="link">Inicio</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('clientes.index') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-user icon"></i>
                            <span class="link">Clientes</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('eventos.index') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-calendar icon"></i>
                            <span class="link">Eventos</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('peticiones.index.empleado') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-calendar icon"></i>
                            <span class="link">Peticiones</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('calendario') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-calendar-event icon"></i>
                            <span class="link">Calendario</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('servicios.index') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-briefcase icon"></i>
                            <span class="link">Servicios</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('materiales.index') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-package icon"></i>
                            <span class="link">Materiales</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('ingresos.index') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-dollar-circle icon"></i>
                            <span class="link">Ingresos</span>
                        </a>
                    </li>
                    <li class="list">
                        <a href="{{ route('perfiles_index') }}" class="nav-link" onclick="showLoader()">
                            <i class="bx bx-group icon"></i>
                            <span class="link">Lista de usuarios</span>
                        </a>
                    </li>
                </ul>


                <div class="bottom-content">
                    <ul class="lists">
                        <li class="list">
                            <a href="{{ route('perfil.edit') }}" class="nav-link" onclick="showLoader()">
                                <i class="bx bx-cog icon"></i>
                                <span class="link">Perfil</span>
                            </a>
                        </li>
                        <li class="list">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="showLoader()">
                                <i class="bx bx-log-out icon"></i>
                                <span class="link">Salir</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <section class="content">
        <div class="container mt-4">
            @yield('content')
        </div>
    </section>

    <section class="overlay"></section>


    <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    
    <script>
        @if(Session::has('success'))
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: '¡Correcto!',
                    text: '{{ Session::get('success') }}',
                    showConfirmButton: false,
                    timer: 5000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });
            });
        @endif
    </script>


    <div class="loader" id="loader">
        <img src="{{ asset('images/camara.png') }}" alt="Cámara Fotográfica Girando">
    </div>

    <script>
        function showLoader() {
            document.getElementById('loader').style.display = 'flex';
        }

        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                hideLoader();
            }
        });

        function hideLoader() {
            document.getElementById('loader').style.display = 'none';
        }
    </script>



</body>
</html>
