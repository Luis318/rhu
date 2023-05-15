<!DOCTYPE html>
<html>
<head>
    <title>Plantilla PDF</title>
    <!-- Agrega los estilos CSS necesarios para el diseño de tu PDF -->
    <style>
        /* Estilos personalizados para el PDF */
        /* ... */
    </style>
</head>
<body>
    @foreach($empleados as $empleado)
        <div class="empleado">
            <h2>{{ $empleado->primerNombre }}</h2>
            <p>DUI: {{ $empleado->dui }}</p>
            <p>Salario: {{ $empleado->salario_base }}</p>
        </div>
    @endforeach
</body>
</html>