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
</style>
<h1>Planilla de empleados {{ date('m-Y') }}</h1>
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
                <td>{{ $empleado->salario_base }}</td>
                <td>{{ $afpEmp[$empleado->id] }}</td>
                <td>{{ $isssEmp[$empleado->id] }}</td>
                <td>{{ $renta[$empleado->id] }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
