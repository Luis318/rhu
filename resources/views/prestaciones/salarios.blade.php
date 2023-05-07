@extends('layouts.app')

@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="row justify-content-center">

                    <div class="container d-flex justify-content-end mb-3">
                        <button type="button" name="create" id="create" class="btn btn-success"><i
                                class="bi bi-plus-square"></i></button>
                    </div>
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="emp_table">
                                    <thead>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">DUI</th>
                                        <th scope="col">Salario</th>
                                        <th scope="col">ISSS</th>
                                        <th scope="col">AFP</th>
                                        <th scope="col">Acciones</th>
                                    </thead>

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
            var tabla = new DataTable('#emp_table', {
                processing: true,
                serverSide: true,
                ajax: "{{ route('salarios') }}",
                columns: [{
                        data: 'primerNombre',
                        name: 'Nombre'
                    },
                    {
                        data: 'primerApellido',
                        name: 'Apellido'
                    },
                    {
                        data: 'dui',
                        name: 'DUI'
                    },
                    {
                        data: 'salario_base',
                        name: 'Salario'
                    },
                    {
                        data:'descuento_isss',
                        name: 'ISSS'
                    },
                    {
                        data: 'descuento_afp',
                        name: 'AFP'
                    },
                    {
                        data: 'acciones',
                        orderable: false,
                        searchable: false
                    },
                ]
            });
            console.log(tabla);
        });
    </script>
@endsection
