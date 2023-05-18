<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <style>
        h1 {
            text-align: center;
        }

        table {
            margin: 20px;
            border-collapse: collapse;
            width: 100%;
        }

        th {
            font-weight: bold;
            background-color: lightgray;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        /* Estilos personalizados para el encabezado */
        .header {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
        }

        .company-name {
            font-size: 24px;
            font-weight: bold;
        }

        .content {
            margin: 40px;
        }

        footer {
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
        }

        .corner-image {
            position: absolute;
            top: 0;
            right: 0;
            width: 100px;

            height: auto;

        }
    </style>
    <div class="header">
        <h1 class="company-name">Booster</h1>
        <p>Planilla de empleados {{ date('m-Y') }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>DUI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Salario</th>
                <th>AFP</th>
                <th>ISSS</th>
                <th>Renta</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->dui }}</td>
                    <td>{{ $empleado->primerNombre }}</td>
                    <td>{{ $empleado->primerApellido }}</td>
                    <td>{{ number_format($empleado->salario_base, 2, '.', ',') }}</td>
                    <td>{{ number_format($afpEmp[$empleado->id], 2, '.', ',') }}</td>
                    <td>{{ number_format($isssEmp[$empleado->id], 2, '.', ',') }}</td>
                    <td>{{ number_format($renta[$empleado->id], 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p>&copy; 2023 BOOSTER. Todos los derechos reservados.</p>
    </footer>
</body>

</html>
