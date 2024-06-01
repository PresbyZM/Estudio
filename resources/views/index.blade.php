<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1b1d1f;
            color: white;
        }
        .header-title {
            color: #ffffff;
        }
        .header-link {
            color: white;
            text-decoration: none;
        }
        .header-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <header class="d-flex flex-wrap align-items-center justify-content-between py-3 mb-4 border-bottom border-secondary">
            <a class="d-flex align-items-center col-md-6 mb-2 mb-md-0 header-link text-nowrap">
                Esta es la página principal @auth de {{ Auth::user()->nombre_usuario }} {{ Auth::user()->apellidom_usuario }} {{ Auth::user()->apellidop_usuario }} @endauth
            </a>
            <div class="col-md-3 text-end">
                <a href="{{ route('logout') }}">
                    <button type="button" class="btn btn-outline-primary me-2">Salir</button>
                </a>
            </div>
        </header>
    </div>
    <article class="container">
        <h2 class="header-title">Este es el inicio</h2>
    </article>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
