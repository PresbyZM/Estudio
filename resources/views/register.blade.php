<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #343a40;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background-color: #495057;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .form-label, .form-check-label, .form-text {
            color: #adb5bd;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <main class="form-container">
        <form method="POST" action="{{ route('validar-registro') }}">
            @csrf
            <div class="mb-3">
                <label for="emailInput" class="form-label">Email</label>
                <input type="email" class="form-control" id="emailInput" name="email_usuario" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="passwordInput" class="form-label">Password</label>
                <input type="password" class="form-control" id="passwordInput" name="password" required>
            </div>
            <div class="mb-3">
                <label for="nombreInput" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombreInput" name="nombre_usuario" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="apellidomInput" class="form-label">Apellido Materno</label>
                <input type="text" class="form-control" id="apellidomInput" name="apellidom_usuario" required autocomplete="disable">
            </div>
            <div class="mb-3">
                <label for="apellidopInput" class="form-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="apellidopInput" name="apellidop_usuario" required autocomplete="disable">
            </div>
            <button type="submit" class="btn btn-primary">Registrarse</button>
        </form>
    </main>
</body>
</html>

