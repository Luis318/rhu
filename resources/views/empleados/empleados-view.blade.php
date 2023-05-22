@extends('layouts.app')
@section('content')
<div id="app">
    <main class="py-4">
        <div class="container-xl">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Nuevo Empleado</h1>
            </div>
            <div class="row justify-content-center">
                <div class="container-xl">
                    <div class="card">
                        <form method="GET" action="{{ route('empleados-list') }}">
                            @csrf
                            <div class="card-body">
                                <div class="md-3 row pt-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Primer Nombre</label>
                                        <input type="text" class="form-control" id="primerNombre" name="primerNombre" value="{{$empleado->primerNombre}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" value="{{$empleado->segundoNombre}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Primer Apellido</label>
                                        <input type="text" class="form-control" id="primerApellido" name="primerApellido" value="{{$empleado->primerApellido}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido" value="{{$empleado->segundoApellido}}" readonly>
                                    </div>
                                </div>
    
                                <div class="md-3 row pt-3">
                                    <div class="col-md-3">
                                        <label class="form-label">DUI</label>
                                        <input type="text" class="form-control" id="dui" name="dui" value="{{$empleado->dui}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" value="{{$empleado->fechaNacimiento}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Pasaporte</label>
                                        <input type="text" class="form-control" id="pasaporte" name="pasaporte" value="{{$empleado->pasaporte}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Carnet de residencia</label>
                                        <input type="text" class="form-control" id="carnetResidencia" name="carnetResidencia" value="{{$empleado->carnetResidencia}}" readonly>
                                    </div>
                                </div>
                                
                                <div class="md-3 row pt-3">
                                    <div class="col-sm-3">
                                        <label class="form-label">Estado Civil</label>
                                        <input type="text" class="form-control" id="estadoCivil" name="estadoCivil" value="{{$empleado->estadoCivil}}" readonly>                                     
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">Sexo</label>
                                        <input type="text" class="form-control" id="sexo" name="sexo" value="{{$empleado->sexo}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{$empleado->telefono}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular" value="{{$empleado->celular}}" readonly>
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="email" name="email" value="{{$empleado->email}}" readonly>
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Salario Base</label>
                                        <input type="number" class="form-control" id="salario_base" name="salario_base" value="{{$empleado->salario_base}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Fecha de Contratación</label>
                                        <input type="date" class="form-control" id="fechaContratacion" name="fechaContratacion" value="{{$empleado->fechaContratacion}}" readonly>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">Area Puesto</label>
                                        <input type="text" class="form-control" id="areaPuesto_id" name="areaPuesto_id" value="{{isset($empleado->areaPuesto_id)? $empleado->areaPuesto_id: ""}}" readonly>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Puesto</label>
                                        <input type="text" class="form-control" id="puesto" name="puesto" value="{{$empleado->puesto}}" readonly>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Volver</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection