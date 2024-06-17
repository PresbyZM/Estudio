<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Ingresos Mensuales</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h2>Reporte de Ingresos Mensuales</h2>
    <p>Mes: {{ $month }}</p>
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
            <tr>
                <td colspan="4"><strong>Total General</strong></td>
                <td>${{ number_format($totalIngresos, 2) }}</td>
            </tr>
        </tbody>
    </table>
</body>
</html>
