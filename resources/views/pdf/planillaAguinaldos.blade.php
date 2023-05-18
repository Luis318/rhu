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
</style>

<body>
    <div class="header">
        <h1 class="company-name">Booster</h1>
        <p>Aguinaldos {{ date('Y') }}</p>
    </div>
    <table>
        <thead>
            <tr>
                <th>DUI</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Aguinaldo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->dui }}</td>
                    <td>{{ $empleado->primerNombre }}</td>
                    <td>{{ $empleado->primerApellido }}</td>
                    <td>{{ number_format($aguinaldos[$empleado->id], 2, '.', ',') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <footer>
        <p>&copy; 2023 BOOSTER. Todos los derechos reservados.</p>
    </footer>
</body>
