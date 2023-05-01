@extends('layouts.app')

@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="row justify-content-center">

                    <div class="container d-flex justify-content-end mb-3">
                        <button type="button" name="create" id="create" class="btn btn-success"><i class="bi bi-plus-square"></i></button>
                    </div>

                    <table class="table table-striped table-bordered emp_datatable">
                        <thead>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DUI</th>
                            <th>Salario</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </main>
    </div>

    <script>
    $(document).ready(function(){

        $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

        var table = $('.emp_datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('salarios') }}",
            columns: [
                {data: 'primerNombre', name: 'Nombre'},
                {data: 'primerApellido', name: 'Apellido'},
                {data: 'dui', name: 'DUI'},
                {data: 'salario_base', name: 'Salario'},
                {data: 'action', orderable: false, searchable: false},
            ]
        });
    });

    </script>
@endsection
