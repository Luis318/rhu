@extends('layouts.app')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Nueva Solicitud de Vacaciones</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="container-xl">
                        <div class="card">
                            <form method="POST" action="{{ route('vacaciones-store') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="text-center">
                                        <h4 class="pt-3">Empleado</h4>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Empleado</label>
                                            <select class="form-control" id="id_empleado" name="id_empleado" onchange="return showEmpleado({{$empleados}});">
                                                <option selected="selected">Seleccione un empleado</option>
                                                @foreach( $empleados as $empleado)
                                                    <option value="{{$empleado->id}}">{{$empleado->primerNombre}} {{$empleado->primerApellido}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Contratación</label>
                                            <input class="form-control" type="date" id="fechaContratacion" name="fechaContratacion" readonly>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Salario Base:</label>
                                            <input class="form-control" type="number" id="salario_base" name="salario_base" readonly>
                                        </div>
                                    </div>

                                    <script>
                                        function showEmpleado(empleados){
                                            var empleadosArray = new Array();
                                            empleadosArray = empleados;
                                            var idEmpleado = document.getElementById('id_empleado').value;
                                            var emple = empleadosArray.find(x=> x.id == idEmpleado);
                                            document.getElementById('fechaContratacion').value = emple.fechaContratacion;
                                            document.getElementById('salario_base').value = emple.salario_base;
                                            calculoMonto();
                                            return false;
                                        }

                                        function readOnlyF(){
                                            if(document.getElementById('tipo').value === "1"){
                                                document.getElementById('diasTrabajados').readOnly = true;
                                            }
                                            else{
                                                document.getElementById('diasTrabajados').readOnly = false;
                                            }

                                            calculoMonto();
                                        }

                                        function calculoMonto(){
                                            var monto = 0;
                                            var porVacaciones = 0;
                                            var montoCompleto = 0;
                                            if(document.getElementById('tipo').value === "1"){
                                                porVacaciones = (document.getElementById('salario_base').value / 2)* 0.3;
                                                monto = ((document.getElementById('salario_base').value / 2) + porVacaciones).toFixed(2);
                                            }else{

                                                porVacaciones = (document.getElementById('salario_base').value / 2)* 0.3;
                                                montoCompleto = (document.getElementById('salario_base').value / 2) + porVacaciones;
                                                monto = ((document.getElementById('diasTrabajados').value*montoCompleto)/365).toFixed(2);
                                            }

                                            document.getElementById('monto').value = monto;
                                            return false;
                                        }
                                        </script>

                                    <div class="text-center mx-auto border-top mt-3">
                                        <h4 class="pt-3">Vacaciones</h4>
                                    </div>
                                    
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Inicio</label>
                                            <input class="form-control" type="date" id="fechaInicio" name="fechaInicio" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Finalización</label>
                                            <input class="form-control" type="date" id="fechaFin" name="fechaFin"  value="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </div>
                                    <div class="md-3 row pt-3">  
                                        <div class="col-sm-4">
                                            <label class="form-label">Tipo</label>
                                            <select class="form-control" id="tipo" name="tipo" onchange="return readOnlyF();">
                                                <option value="1">Total</option>
                                                <option value="2">Proporcionales</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Dias Trabajados</label>
                                            <input class="form-control" type="number" id="diasTrabajados" name="diasTrabajados" onchange="return calculoMonto();">
                                        </div> 
                                        <div class="col-sm-4">
                                            <label class="form-label">Monto</label>
                                            <input class="form-control" type="number" id="monto" name="monto" readonly>
                                        </div>                                    
                                        
                                    </div>
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-12">
                                            <label class="form-label">Descripción</label>
                                            <textarea class="form-control" type="text" id="descripcion" name="descripcion"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection