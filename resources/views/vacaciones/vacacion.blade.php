@extends('layouts.app')

@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Vacaciones</h1>
                    <button type="button" name="create" id="create" class="btn btn-success" align="right"><i
                        class="bi bi-plus-square"></i></button>
                </div>
                <div class="row justify-content-center">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="vac_table">
                                    <thead>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">DUI</th>
                                        <th scope="col">Fecha de Contratación</th>
                                        <th scope="col">Salario</th>
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
            var tabla = new DataTable('#vac_table', {
                processing: true,
                serverSide: true,
                searching: true,
                serverSide: false,
                autoWidth: false,
                scrollX: true,
                responsive: true,
                ajax: "{{ route('vacaciones') }}",
                columns: [{
                        data: 'primerNombre',
                        name: 'Nombre',
                        footer: 'Nombre',
                        //searchable: true
                    },
                    {
                        data: 'primerApellido',
                        name: 'Apellido',
                        footer: 'Apellido',
                        //searchable: true
                    },
                    {
                        data: 'dui',
                        name: 'DUI',
                        footer: 'DUI',
                        //searchable: true
                    },
                    {
                        data: 'fechaContratacion',
                        name: 'Fecha de Contratación',
                        footer: 'Fecha de Contratación',
                    },
                    {
                        data: 'salario_base',
                        name: 'Salario',
                        footer: 'Salario',
                        //searchable: true
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
                // "dom": '1<"toolbar">frtip',
                // initComplete: function(){
                //     this.api().columns().every(function(){
                //         var column = this;
                //         var input = document.createElement("input");
                //         input.setAttribute("type", "text");
                //         console.log("break point1");
                //         $(input).appendTo($(column.footer()).empty()).on('keyup', function(){

                //             column.search($(this).val(), false, false, true).draw();
                //             console.log("Break point2")
                //         });
                //     });
                // }

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
