<!DOCTYPE html> 
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image/png">
    <title>Foto y Video Calvario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/clientes/estilos.css') }}">
    <script src="{{ asset('js/clientes/javascript.js') }}"></script>
    <link rel="stylesheet" href="/css/clientes/menu.css">
    
   
</head>

<body>
    <div id="menu-toggle"><i class="fas fa-bars"></i></div>
    <div id="sidebar">
        <div class="logo-container">
            <img src="{{ asset('images/clientes/white_logo.png') }}" alt="Logo" class="hero-logo">
        </div>
        <ul class="list-unstyled">
            <li><a href="{{ route('inicio-cli') }}" class="menu-item" data-item="inicio"><i class="fas fa-home"></i>Inicio</a></li>
            <li><a href="{{ route('perfil-cli.edit') }}" class="menu-item" data-item="perfil"><i class="fas fa-user"></i>Perfil</a></li>
            <li><a href="{{ route('servicios-cli.index') }}" class="menu-item" data-item="servicios"><i class="fas fa-briefcase"></i>Productos y Servicios</a></li>
            <li><a href="{{ route('calendario.cliente') }}" class="menu-item" data-item="calendario"><i class="fas fa-calendar-alt"></i>Calendario</a></li>
            <li><a href="{{ route('peticiones.index') }}" class="menu-item" data-item="eventos"><i class="fas fa-list"></i>Mis eventos</a></li>
        </ul>
        <div class="text-center mt-4">
            <a href="{{ route('logout-cli') }}" class="text-white"><i class="fa-solid fa-arrow-right-from-bracket"></i> Cerrar Sesión</a>
        </div>
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
            sidebar.classList.toggle('show');
            overlay.classList.toggle('active');
        });

        overlay.addEventListener('click', function() {
            sidebar.classList.remove('show');
            overlay.classList.remove('active');
        });
    </script>
</body>
</html>
