@extends('layouts.app')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Ver Solicitud de Vacaciones</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="container-xl">
                        <div class="card">
                            <form method="GET" action="{{ route('vacaciones-list') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="text-center">
                                        <h4 class="pt-3">Empleado</h4>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Empleado</label>
                                            <input class="form-control" type="text" value="{{$vacaciones[0]->nombreEmpleado}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Contratación</label>
                                            <input class="form-control" type="date" id="fechaContratacion" name="fechaContratacion" value="{{$vacaciones[0]->fechaContratacion}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Salario Base:</label>
                                            <input class="form-control" type="number" id="salario_base" name="salario_base" value="{{$vacaciones[0]->salario_base}}" readonly>
                                        </div>
                                    </div>

                                    <div class="text-center mx-auto border-top mt-3">
                                        <h4 class="pt-3">Vacaciones</h4>
                                    </div>
                                    
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Inicio</label>
                                            <input class="form-control" type="date" id="fechaInicio" name="fechaInicio"  value="{{$vacaciones[0]->fechaInicio}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Finalización</label>
                                            <input class="form-control" type="date" id="fechaFin" name="fechaFin"  value="{{$vacaciones[0]->fechaFin}}" readonly>
                                        </div>
                                    </div>
                                    <div class="md-3 row pt-3">  
                                        <div class="col-sm-4">
                                            <label class="form-label">Tipo</label>
                                            <input class="form-control" type="text" value="{{$vacaciones[0]->tipoNombre}}" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Dias Trabajados</label>
                                            <input class="form-control" type="number" id="diasTrabajados" name="diasTrabajados" value="{{$vacaciones[0]->diasTrabajados}}" readonly>
                                        </div> 
                                        <div class="col-sm-4">
                                            <label class="form-label">Monto</label>
                                            <input class="form-control" type="number" id="monto" name="monto" value="{{$vacaciones[0]->monto}}" readonly>
                                        </div>                                    
                                        
                                    </div>
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-12">
                                            <label class="form-label">Descripción</label>
                                            <input class="form-control" type="text" id="descripcion" name="descripcion" value="{{$vacaciones[0]->descripcion}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
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