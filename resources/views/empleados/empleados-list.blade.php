@extends('layouts.app')
@section('content')
<div id="app">
    <main class="py-4">
        <div class="container-xl">
            <h1 class="h3 mb-0 text-gray-800">Empleados</h1>
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <div class="container d-flex justify-content-end mb-3">
                    <a href="{{ route('generate-boletas') }}" name="boletas" id="boletas" class="btn btn-primary mx-3"><i
                            class="">Imprimir boletas</i></a>
                    <a href="{{ route('generate-pdf') }}" name="create" id="create" class="btn btn-primary"><i
                            class="">Imprimir planilla</i></a>
                    <a type="button" name="create" id="create" href="{{ route('empleados-create') }}"
                        class="btn btn-success mx-3"><i class="bi bi-plus-square"></i></a>
                </div>

            </div>
            <div class="row justify-content-center">
                <div class="container-xl">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-striped table-bordered" id="inde_table">
                                <thead>
                                    <th scope="col">Nombres</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">DUI</th>
                                    <th scope="col">Fecha de ingreso</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Puesto</th>
                                    <th scope="col">Opciones</th>
                                </thead>
                                {{-- @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->primerNombre}}</td>
                                        <td>{{$empleado->segundoNombre}}</td>
                                        <td>{{$empleado->primerApellido}}</td>
                                        <td>{{$empleado->segundoApellido}}</td>
                                        <td>{{$empleado->dui}}</td>
                                        <td><a type="button" name="create" id="create" href="{{ route('empleados-view',$empleado->id) }}" 
                                            class="btn btn-success" align="right"><i class="bi bi-eye-fill"></i></a></td>
                                    </tr>                                        
                                @endforeach --}}
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<script>
    $(document).ready(function() {
        var tabla = new DataTable('#inde_table', {
            processing: true,
            serverSide: true,
            searching: true,
            serverSide: false,
            autoWidth: false,
            scrollX: true,
            responsive: true,
            ajax: "{{ route('empleados-list') }}",
            columns: [{
                    data: 'primerNombre',
                    name: 'Nombres',
                },
                {
                    data: 'primerApellido',
                    name: 'Apellidos',
                },
                {
                    data: 'dui',
                    name: 'DUI',

                },
                {
                    data: 'fechaContratacion',
                    name: 'Fecha de ingreso',
                },
                {
                    data: 'email',
                    name: 'Email',
                },
                {
                    data: 'celular',
                    name: 'Celular',
                },
                {
                    data: 'puesto',
                    name: 'Puesto',
                },
                {
                    data: 'acciones',
                    orderable: false,
                    searchable: false
                },
            ],
            "language": {
                "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
            },
            "order": [
                [0, "asc"]
            ],
            "lengthMenu": [
                [10, 25, 50, -1],
                [10, 25, 50, "Todos"]
            ],
        });
        $('#buscarT').on('input', function() {
            // Obtener el valor del campo de búsqueda
            var valor = $(this).val();

            // Realizar la búsqueda en la tabla y actualizarla
            tabla.search(valor).draw();
        });
    });
</script>
@endsection
