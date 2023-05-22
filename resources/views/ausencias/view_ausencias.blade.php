@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="d-sm-flex">
            <div class="col-sm-12 text text-center">
                <h2 class=""><strong>Control de Asistencia</strong></h2>
            </div>
        </div>

        <div class="row justify-conten-center">
            <div class="container-xl">
                {{-- <div class="card">
                    <div>
                        <h4 class="text text-center mt-3">Datos del empleado</h4>
                    </div>
                    <form method="POST" action="{{ route('agregarasistencia') }}">
                        @csrf
                        <div class="card-body">
                            <div class="md-3 row">
                                <div class="col-sm-4">
                                    <label class="form-label">Empleado</label>
                                    <input class="form-control" type="text" name="nombre" id="nombre"
                                        value="{{ request('nombre') }}">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="dui">DUI</label>
                                    <input class="form-control" type="text" id="dui" name="dui"
                                        value="{{ request('dui') }}">
                                </div>
                                <div class="col-sm-4 d-flex align-items-end">
                                    <button class="btn btn-primary" type="submit">Buscar</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div> --}}

                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered" id="emp_table">
                            <thead>
                                <th>Nombre</th>
                                <th>DUI</th>
                                <th>Fecha</th>
                                <th>Hora de entrada</th>
                                <th>Hora de salida</th>
                                <th>Minutos tarde</th>
                                <th>Descuento</th>
                                <th>Justificacion</th>
                                <th>Observaciones</th>
                                <th>Acciones</th>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
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
                ajax: "{{ route('ver_asistencia') }}",
                columns: [{
                        data: 'primerNombre',
                        name: 'Nombre',
                    }, 
                    {
                        data: 'dui',
                        name: 'DUI',
                    },
                    {
                        data: 'fecha',
                        name: 'Fecha',
                    },
                    {
                        data: 'hora_entrada',
                        name: 'Hora de entrada',
                    },
                    {
                        data: 'hora_salida',
                        name: 'Hora de salida',
                    },
                    {
                        data: 'horas_tarde',
                        name: 'Minutos tarde',
                    },
                    {
                        data: 'descuentos',
                        name: 'Descuento',
                    },
                    {
                        data: 'inconsistencia',
                        name: 'Inconsistencia',
                    },
                    {
                        data: 'observaciones',
                        name: 'Observaciones',
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
