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
                                <table class="table table-striped table-bordered" id="vac_table">
                                    <thead>
                                        <th scope="col">Empleado</th>
                                        <th scope="col">Categoría</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Monto</th>
                                        <th scope="col">Acciones</th>
                                    </thead>
                                    @foreach ($indeminzaciones as $indem)
                                        <tr>
                                            <td>{{$indem->nombreEmpleado}}</td>
                                            <td>{{$indem->categoria}}</td>
                                            <td>{{$indem->descripcion}}</td>
                                            <td>{{$indem->monto}}</td>
                                            <td><a type="button" name="create" id="create" href="{{ route('indemnizacion-view',$indem->id) }}" 
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
