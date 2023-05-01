@extends('layouts.app')

@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="row justify-content-center">

                    <div class="container d-flex justify-content-end mb-3">
                        <button type="button" name="create" id="create" class="btn btn-success"><i class="bi bi-plus-square"></i></button>
                    </div>

                    <table class="table table-striped table-bordered" id="emp_table">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DUI</th>
                            <th>Salario</th>
                            <th>Acciones</th>
                        </thead>
                       
                    </table>

                </div>
            </div>
        </main>
    </div>

    <script>
    $(document).ready(function() {
        var tabla = new DataTable('#emp_table',{
            processing: true,
            serverSide: true,
            ajax: "{{ route('salarios') }}",
            columns: [
                {data: 'primerNombre', name: 'Nombre'},
                {data: 'primerApellido', name: 'Apellido'},
                {data: 'dui', name: 'DUI'},
                {data: 'salario_base', name: 'Salario'},
                {data: 'acciones', orderable: false, searchable: false},
            ]
        });
    });

    </script>
@endsection
