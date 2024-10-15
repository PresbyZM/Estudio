<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <main class="container align-center p-5">
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
        <form method="POST" action="{{route('validar-registro-cli')}}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email_usuacli" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <div class="mb-3">
                <label for="passwordConfirmationInput" class="form-label">Confirmar Password</label>
                <input type="password" class="form-control" id="passwordConfirmationInput" name="password_confirmation" required>
            </div>
            <div class="mb-3">
                <label for="userInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="userInput" name="nombre_usuacli" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="userInput" class="form-label">Apellido paterno</label>
                <input type="text" class="form-control" id="userInput" name="apellidop_usuacli" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="userInput" class="form-label">Apelldo materno</label>
                <input type="text" class="form-control" id="userInput" name="apellidom_usuacli" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="userInput" class="form-label">Telefono</label>
                <input type="number" class="form-control" id="userInput" name="telefono_usuacli" required autocomplete="disable">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
</body>
</html>