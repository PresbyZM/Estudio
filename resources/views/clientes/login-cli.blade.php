<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://www.google.com/recaptcha/api.js"></script>
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
        <form id="login-form" method="POST" action="{{route('inicia-sesion-cli')}}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email_usuacli" required>
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="rememberCheck" name="remember">
                <label class="form-check-label" for="rememberCheck">Mantener sesion iniciada</label>
            </div>
            <div>
                <p>¿No tienes cuenta? <a href="{{route('registro-cli')}}">Registrate</a></p>
            </div>
            <button type="submit" class="btn btn-primary g-recaptcha" data-sitekey="6Ldn4w8qAAAAAEmlRMSxAwvBwuhwAR8VK5l68alF"  data-callback='onSubmit' data-action='submit'>Acceder</button>
        </form>
    </main>

    <script>
        function onSubmit(token) {
            document.getElementById("login-form").submit();
        }
    </script>

</body>
</html>