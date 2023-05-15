@extends('layouts.app')

@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="row justify-content-center">

                    <div class="container d-flex justify-content-end mb-3">
                        <a href="{{ route('generate-boletas') }}" name="boletas" id="boletas" class="btn btn-primary mx-3"><i
                            class="">Imprimir boletas</i></a>
                        <a href="{{ route('generate-pdf') }}" name="create" id="create" class="btn btn-primary"><i
                                class="">Imprimir planilla</i></a>
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
                                        <th scope="col">Renta</th>
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
                searching: true,
                serverSide: false,
                autoWidth: false,
                scrollX: true,
                responsive: true,
                ajax: "{{ route('salarios') }}",
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
                        data: 'salario_base',
                        name: 'Salario',
                        footer: 'Salario',
                        //searchable: true
                    },
                    {
                        data: 'descuento_isss',
                        name: 'ISSS',
                        footer: 'ISSS',
                        //searchable: true
                    },
                    {
                        data: 'descuento_afp',
                        name: 'AFP',
                        footer: 'AFP',
                        //searchable: true
                    },
                    {
                        data: 'descuento_renta',
                        name: 'Renta',
                        footer: 'Renta',
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
