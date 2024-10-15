<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+8EE1JgZJfKg6aCXNycHfJPFF7qZT" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/clientes/estilos.css') }}">
    <script srf="{{ asset('js/clientes/javascript.js') }}"></script>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom">

            <div class="col-md-3 text-end">
                <button class="btn btn-primary" id="menu-toggle">Menú</button>
            </div>

            <div class="col-md-3">
                <a class="navbar-brand text-dark text-decoration-none" href="#">
                    Página de inicio 
                    @auth('clientes')
                        de {{ Auth::guard('clientes')->user()->nombre_usuacli }} 
                        {{ Auth::guard('clientes')->user()->apellidop_usuacli }} 
                        {{ Auth::guard('clientes')->user()->apellidom_usuacli }}
                    @endauth
                </a>
            </div>

            <div class="col-md-3 text-end">
                <a href="{{ route('logout-cli') }}">
                    <button type="button" class="btn btn-outline-primary me-2">Salir</button>
                </a>
            </div>
        </header>
    </div>

    <div id="sidebar">
        <h4>Menu</h4>
        <ul class="list-unstyled">
            <li><a class="dropdown-item" href="{{ route('inicio-cli') }}">Inicio</a></li>
            <li><a class="dropdown-item" href="{{ route('perfil-cli.edit') }}">Perfil</a></li>
            <li><a class="dropdown-item" href="{{ route('servicios-cli.index') }}">Servicios</a></li>
            <li><a class="dropdown-item" href="{{ route('calendario.cliente') }}">Calendario</a></li>
            <li><a class="dropdown-item" href="{{ route('peticiones.index') }}">Mis peticiones</a></li>
        </ul>
    </div>

    <div id="overlay"></div>

    <section class="content">
        <div class="container mt-4">
            @yield('content')
        </div>
    </section>

    
    <script>
        const menuToggle = document.getElementById('menu-toggle');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');

        menuToggle.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            overlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none'; 
        });


        overlay.addEventListener('click', function() {
            sidebar.classList.remove('active');
            overlay.style.display = 'none'; 
        });
    </script>
</body>
</html>
