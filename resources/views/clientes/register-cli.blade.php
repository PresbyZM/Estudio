<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/clientes/registro_cli.css">
</head>
<body>
    <div class="registro-container row m-0">
        <div class="col-md-6 image-section d-flex align-items-center justify-content-center">
            <img src="{{ asset('images/clientes/camera.jpg') }}" alt="Equipo de cámaras" class="image-content">
        </div>
        <div class="col-md-6 form-section d-flex align-items-center justify-content-center">
            <div class="form-container p-3 rounded shadow-sm bg-white w-75">
                <div class="text-center mb-3">
                    <img src="{{ asset('images/clientes/small_logo.png') }}" alt="Logo Calvario Photo Studio" class="logo img-fluid">
                </div>
                <h3 class="text-center mb-3 text1">REGISTRO</h3>
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
                    <div class="mb-2">
                        <label for="emailInput" class="text2 form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon1">
                                <i class="bi bi-envelope"></i>
                            </span>
                            <input type="email" class="form-control" id="emailInput" name="email_usuacli" placeholder="user@gmail.com" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="passwordInput" class="text2 form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon2">
                                <i class="bi bi-key"></i>
                            </span>
                            <input type="password" class="form-control" id="passwordInput" name="password" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="passwordConfirmationInput" class="text2 form-label">Confirmar Password</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon3">
                                <i class="bi bi-key"></i>
                            </span>
                            <input type="password" class="form-control" id="passwordConfirmationInput" name="password_confirmation" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="nombreInput" class="text2 form-label">Nombre</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon4">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control" id="nombreInput" name="nombre_usuacli" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="apellidoPInput" class="text2 form-label">Apellido Paterno</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon5">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control" id="apellidoPInput" name="apellidop_usuacli" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="apellidoMInput" class="text2 form-label">Apellido Materno</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon6">
                                <i class="bi bi-person"></i>
                            </span>
                            <input type="text" class="form-control" id="apellidoMInput" name="apellidom_usuacli" placeholder="" required>
                        </div>
                    </div>

                    <div class="mb-2">
                        <label for="telefonoInput" class="text2 form-label">Teléfono</label>
                        <div class="input-group">
                            <span class="input-group-text custom-addon" id="basic-addon7">
                                <i class="bi bi-telephone"></i>
                            </span>
                            <input type="tel" class="form-control" id="telefonoInput" name="telefono_usuacli" placeholder="" required>
                        </div>
                    </div>

                    <div class="center mt-3">
                        <button type="submit" class="boton">Registrarse</button>
                    </div>
                </form>


            </div>
        </div>
    </div>
</body>
</html>