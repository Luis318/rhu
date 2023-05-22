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
                        <form method="POST" action="{{ route('empleados-store') }}">
                            @csrf
                            <div class="card-body">
                                <div class="md-3 row pt-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Primer Nombre</label>
                                        <input type="text" class="form-control" id="primerNombre" name="primerNombre">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Segundo Nombre</label>
                                        <input type="text" class="form-control" id="segundoNombre" name="segundoNombre">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Primer Apellido</label>
                                        <input type="text" class="form-control" id="primerApellido" name="primerApellido">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Segundo Apellido</label>
                                        <input type="text" class="form-control" id="segundoApellido" name="segundoApellido">
                                    </div>
                                </div>
    
                                <div class="md-3 row pt-3">
                                    <div class="col-md-3">
                                        <label class="form-label">DUI</label>
                                        <input type="text" class="form-control" id="dui" name="dui">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Fecha de nacimiento</label>
                                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Pasaporte</label>
                                        <input type="text" class="form-control" id="pasaporte" name="pasaporte">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Carnet de residencia</label>
                                        <input type="text" class="form-control" id="carnetResidencia" name="carnetResidencia">
                                    </div>
                                </div>
                                
                                <div class="md-3 row pt-3">
                                    <div class="col-sm-3">
                                        <label class="form-label">Estado Civil</label>
                                        <select class="form-control" id="estadoCivil" name="estadoCivil">
                                            <option selected>Seleccione Estado Civil</option>
                                            <option value="1">Soltero</option>
                                            <option value="2">Divorciado</option>
                                            <option value="3">Viudo</option>
                                            <option value="4">Casado</option>
                                        </select>
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">Sexo</label>
                                        <select class="form-control" id="sexo" name="sexo">
                                            <option selected>Seleccione el Sexo</option>
                                            <option value="1">Femenino</option>
                                            <option value="2">Masculino</option>
                                            <option value="3">Otro</option>
                                                </select>
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Telefono</label>
                                        <input type="text" class="form-control" id="telefono" name="telefono">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular">
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-md-6">
                                        <label class="form-label">Correo</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-md-3">
                                        <label class="form-label">Salario Base</label>
                                        <input type="number" class="form-control" id="salario_base" name="salario_base">
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Fecha de Contratación</label>
                                        <input type="date" class="form-control" id="fechaContratacion" name="fechaContratacion">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label">Area Puesto</label>
                                        <select class="form-control" id="areaPuesto_id" name="areaPuesto_id">
                                            <option selected="selected">Seleccione un area</option>
                                            @foreach( $areas as $area)
                                                <option value="{{$area->id}}">{{$area->area}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="col-md-3">
                                        <label class="form-label">Puesto</label>
                                        <input type="text" class="form-control" id="puesto" name="puesto">
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Guardar</button>
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