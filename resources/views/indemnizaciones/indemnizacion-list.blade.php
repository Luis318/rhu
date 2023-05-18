@extends('layouts.app')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Indemnizaciones</h1>
                    <a type="button" name="create" id="create" href="{{ route('indemnizacion-create') }}" 
                    class="btn btn-success" align="right"><i class="bi bi-plus-square"></i></a>
                </div>
                <div class="row justify-content-center">
                    <div class="container-xl">
                        <div class="card">
                            <div class="card-body">
                                <table class="table table-striped table-bordered" id="inde_table">
                                    <thead>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Categoría</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Acciones</th>
                                    </thead>
                                    {{-- @foreach ($indeminzaciones as $indem)
                                        <tr>
                                            <td>{{$indem->nombreEmpleado}}</td>
                                            <td>{{$indem->categoria}}</td>
                                            <td>{{$indem->descripcion}}</td>
                                            <td>{{$indem->monto}}</td>
                                            <td><a type="button" name="create" id="create" href="{{ route('indemnizacion-view',$indem->id) }}" 
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
                ajax: "{{ route('indemnizacion-list') }}",
                columns: [{
                        data: 'nombreEmpleado',
                        name: 'Empleado',
                    },
                    {
                        data: 'categoria',
                        name: 'Categoria',
                    },
                    {
                        data: 'descripcion',
                        name: 'Descripcion',
                    },
                    {
                        data: 'monto',
                        name: 'Monto',
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
