<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Inicio</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    </head>
    <body>
        <div class="container">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4 border-bottom">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">
                    Esta es la pagina principal @auth de {{Auth::user()->name}}  @endauth
                </a>
                <div class="col-md-3 text-end">
                    <a href="{{route('logout')}}"><button type="button" class="btn btn-outline-primary me-2">Salir<button></a>
                </div>
            </header>
        </div>
        <article class="container">
            <h2>Tu seccion privada</h2>
        </article>
    </body>
</html>

