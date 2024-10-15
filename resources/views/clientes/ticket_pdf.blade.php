<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Evento</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .ticket {
            background-color: white;
            padding: 20px;
            width: 350px;
            border: 2px dashed #333;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1, h2 {
            text-align: center;
            margin: 0;
            padding: 10px 0;
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        h2 {
            font-size: 20px;
            color: #555;
        }
        p {
            margin: 8px 0;
            font-size: 14px;
            color: #333;
        }
        .highlight {
            font-weight: bold;
            color: #000;
        }
        .total {
            margin-top: 20px;
            font-size: 16px;
            text-align: center;
        }
        .total span {
            font-size: 18px;
            font-weight: bold;
            color: #007BFF;
        }
        .divider {
            border-top: 2px dashed #333;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="ticket">
        <h1>Ticket del Evento</h1>
        <h2>{{ $peticion->nombre_evento_peticion }}</h2>


        <p><strong>Fecha del Evento:</strong> <span class="highlight">{{ $peticion->dia_evento_peticion }}</span></p>
        <p><strong>Descripción:</strong> <span class="highlight">{{ $peticion->descripcion_evento_peticion }}</span></p>
        <p><strong>Cotización del Evento:</strong> <span class="highlight">${{ number_format($peticion->precio_evento_peticion, 2) }}</span></p>
        
        <div class="divider"></div>

        <p><strong>Anticipo:</strong> <span class="highlight">${{ number_format($peticion->anticipo_peticion, 2) }}</span></p>
        <p><strong>Resto:</strong> <span class="highlight">${{ number_format($peticion->resto_peticion, 2) }}</span></p>
        <p><strong>Estatus:</strong> <span class="highlight">{{ $peticion->estatus_peticion }}</span></p>
        
        <div class="divider"></div>
        
        <p><strong>Detalles del Servicio:</strong> <span class="highlight">{{ $peticion->servicio->nombre_servicio }}</span></p>

        <div class="total">
            <p>Total Pagado: <span>${{ number_format($peticion->anticipo_peticion, 2) }}</span></p>
        </div>
    </div>
</body>
</html>
