<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            text-align: center;
            margin: 0;
            padding: 0;
        }

        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .logo {
            position: absolute;
            top: 20px;
            left: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        {{-- <img src="{{ asset('inicio/assets/img/login.jpeg') }}" alt="logo" class="logo"> --}}
        <h1>Boleta de pago</h1>
        <h3>Datos personales</h3>
        <ul>
            <li>Nombre empleado: {{ isset($empleado->primerNombre) ? $empleado->primerNombre : '' }}
                {{ $empleado->segundoNombre }} {{ $empleado->primerApellido }} {{ $empleado->segundoApellido }}</li>
            <li>DUI: {{ $empleado->dui }}</li>
            <li>Salario base: {{ number_format($empleado->salario_base, 2, '.', ',') }}</li>
        </ul>

        <h3>Descuentos</h3>
        <ul>
            <li>ISSS: {{ number_format($isssEmp[$empleado->id], 2, '.', '.') }}</li>
            <li>AFP: {{ number_format($afpEmp[$empleado->id], 2, '.', ',') }}</li>
            <li>Renta: {{ number_format($renta[$empleado->id], 2, '.', ',') }}</li>
        </ul>

        <p>
            Total a pagar: {{ number_format($pago[$empleado->id], 2, '.', ',') }}
        </p>
    </div>
</body>

</html>
