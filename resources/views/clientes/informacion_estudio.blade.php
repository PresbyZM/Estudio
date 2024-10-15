<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foto y Video Calvario</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .header {
            display: flex;
            justify-content: flex-end; 
            margin-bottom: 10px;
        }
        .header button {
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 8px 12px;
            margin-left: 5px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 14px;
        }
        .header button:hover {
            background-color: #0056b3;
        }
        h1, h2 {
            color: #333;
        }
        .logo img {
            max-width: 100%;
            height: auto;
        }
        .services {
            margin-top: 20px;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .service-item {
            background: #e9e9e9;
            margin: 10px;
            padding: 10px;
            border-radius: 4px;
            width: calc(30% - 20px);
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .service-item img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        .location {
            margin-top: 20px;
        }
        iframe {
            width: 100%;
            height: 300px;
            border: 0;
            margin-top: 20px;
        }
    </style>
</head>
<body>

<div class="header">
    <button onclick="location.href='{{route('inicio-cli')}}'">Iniciar Sesión</button> 
    <button onclick="location.href='{{route('registro-cli')}}'">Registrarse</button> 
</div>

<div class="container">
    <h1>FOTO Y VIDEO EL CALVARIO</h1>
    
    <div class="slogan">
        <h2>Eslogan</h2>
        <p>Transformamos momentos fugaces en eternidad</p> 
    </div>
    
    <div class="logo">
        <h2>Logo</h2>
        <img src="{{ asset('images/logosinfondo.png') }}" alt="Logo" class="hero-logo">
    </div>
    
    <h2>Servicios y Productos</h2>

    <div class="services">    
        <div class="service-item">
            <img src="{{ asset('images/servicio1.jpg') }}" alt="Evento 1">
            <p>Cubrimos todo tipo de eventos como XV años, bodas y bautizos</p>
        </div>
        <div class="service-item">
            <img src="{{ asset('images/servicio2.jpg') }}" alt="Filmación">
            <p>Tenemos servicios de filmación así como de sesión de fotografía</p>
        </div>
        <div class="service-item">
            <img src="{{ asset('images/servicio3.jpg') }}" alt="Cuadros">
            <p>Una variedad de cuadros para enmarcar tus fotografías</p>
        </div>
        <div class="service-item">
            <img src="{{ asset('images/servicio4.jpg') }}" alt="Impresiones">
            <p>Imprimimos tus fotografías desde tu celular</p>
        </div>
        <div class="service-item">
            <img src="{{ asset('images/servicio5.jpg') }}" alt="Edición">
            <p>Edición de video y fotos</p>
        </div>
    </div>
    
    <div class="location">
        <h2>Ubicación Física del Negocio</h2>
        <p>Dirección: Constitucion numero 16, El Calvario</p>
        <p>Teléfono: (052) 772-104-7611</p>
    </div>

    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3737.764905502601!2d-99.21953542541429!3d20.474846906574225!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85d3e1e359882cef%3A0x369305470ae9a4ce!2sFoto%20y%20Video%20Calvario!5e0!3m2!1ses-419!2smx!4v1728356771553!5m2!1ses-419!2smx" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

</body>
</html>
