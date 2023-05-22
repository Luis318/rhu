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
                                    <th scope="col">Primer Nombre</th>
                                    <th scope="col">Segundo Nombre</th>
                                    <th scope="col">Primer Apellido</th>
                                    <th scope="col">Segundo Apellido</th>
                                    <th scope="col">DUI</th>
                                    <th scope="col">Opciones</th>
                                </thead>
                                @foreach ($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->primerNombre}}</td>
                                        <td>{{$empleado->segundoNombre}}</td>
                                        <td>{{$empleado->primerApellido}}</td>
                                        <td>{{$empleado->segundoApellido}}</td>
                                        <td>{{$empleado->dui}}</td>
                                        <td><a type="button" name="create" id="create" href="{{ route('empleados-view',$empleado->id) }}" 
                                            class="btn btn-success" align="right"><i class="bi bi-eye-fill"></i></a></td>
                                    </tr>                                        
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
