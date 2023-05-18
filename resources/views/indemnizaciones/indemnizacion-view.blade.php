@extends('layouts.app')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Ver Indemnizaciones</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="container-xl">
                        <div class="card">
                            <form method="GET" action="{{ route('indemnizacion-list') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="text-center">
                                        <h4 class="pt-3">Empleado</h4>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Empleado</label>
                                            <input class="form-control" type="text" value="{{$indeminzacion[0]->nombreEmpleado}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Contratación</label>
                                            <input class="form-control" type="date" value="{{$indeminzacion[0]->fechaContratacion}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Salario Base:</label>
                                            <input class="form-control" type="number" value="{{$indeminzacion[0]->salario_base}}" readonly>
                                        </div>
                                    </div>

                                    <div class="text-center mx-auto border-top mt-3">
                                        <h4 class="pt-3">Indemnización</h4>
                                    </div>
                                    
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Categoría</label>
                                            <input class="form-control" type="text" value="{{$indeminzacion[0]->categoriaNombre}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Despido</label>
                                            <input class="form-control" type="date" value="{{$indeminzacion[0]->fecha_despido}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Monto</label>
                                            <input class="form-control" type="number" value="{{$indeminzacion[0]->monto}}" readonly>
                                        </div>
                                    </div>
                                    <div class="md-3 row pt-3">                                      
                                        <div class="col-sm-12">
                                            <label class="form-label">Descripción</label>
                                            <input class="form-control" value="{{$indeminzacion[0]->descripcion}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-success mx-3" type="submit">Imprimir</button>
                                    <button class="btn btn-primary" type="submit">Volver</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection