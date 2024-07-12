<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ingresos Mensuales</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f0f0f0; 
        }
        .report-container {
            background: white;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); 
            margin-top: 20px;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd; 
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff; 
            color: white; 
            font-weight: bold;
        }
        td {
            background-color: #f8f9fa; 
        }
        .total-row {
            background-color: #007bff; 
            color: rgb(0, 0, 0); 
            font-weight: bold;
        }
        .footer {
            margin-top: 20px;
            text-align: center;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="report-container">
        <h2>Reporte de Ingresos Mensuales</h2>
        <p>Mes: {{ \Carbon\Carbon::create(null, $month, 1)->locale('es')->isoFormat('MMMM') }}</p>
        <p>Año: {{ $year }}</p>
        <table>
            <thead>
                <tr>
                    <th>Evento</th>
                    <th>Precio Evento</th>
                    <th>Total Anticipos</th>
                    <th>Total Descuentos</th>
                    <th>Total Ingresos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($eventos as $evento)
                <tr>
                    <td>{{ $evento->nombre_evento }}</td>
                    <td>${{ number_format($evento->precio_evento, 2) }}</td>
                    <td>${{ number_format($evento->anticipo, 2) }}</td>
                    <td>${{ number_format($evento->descuento, 2) }}</td>
                    <td>${{ number_format($evento->anticipo + $evento->descuento, 2) }}</td>
                </tr>
                @endforeach
                <tr class="total-row">
                    <td colspan="4">Total General</td>
                    <td>${{ number_format($totalIngresos, 2) }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="footer">
        <p>© {{ date('Y') }} Reporte de Ingresos Mensuales</p>
    </div>
</body>
</html>
