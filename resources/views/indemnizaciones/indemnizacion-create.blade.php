@extends('layouts.app')
@section('content')
    <div id="app">
        <main class="py-4">
            <div class="container-xl">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Crear Indemnizaciones</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="container-xl">
                        <div class="card">
                            <form method="POST" action="{{ route('indemnizacion-store') }}">
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

                                        function calculoMonto(){
                                            var monto = 0;
                                            var fechaContratacion  = new Date(document.getElementById('fechaContratacion').value);
                                            var fechaDespido = new Date(document.getElementById('fecha_despido').value)

                                            var aniosLaborados = Math.trunc(((fechaDespido-fechaContratacion)/(1000*60*60*24*12*365))*10);
                                            var fechaMeses = new Date(fechaDespido.getFullYear(),fechaContratacion.getMonth(),fechaContratacion.getDate());
                                            var diasLaborados = 0;
                                            if(fechaContratacion.getMonth()+1 > fechaDespido.getMonth()+1){
                                                var fechaFin = new Date("2023-12-31");
                                                var fechaInicio = new Date("2023-1-1");
                                                diasLaborados = Math.round(Math.abs((fechaMeses-fechaFin)/(1000*60*60*24))) + Math.round(Math.abs((fechaInicio-fechaDespido)/(1000*60*60*24))) - 1;
                                            }
                                            else{
                                                diasLaborados = Math.round(Math.abs((fechaDespido-fechaMeses)/(1000*60*60*24)));
                                            }

                                            if(document.getElementById('categoria').value == "1"){
                                                monto = Math.round((document.getElementById('salario_base').value*aniosLaborados)+((document.getElementById('salario_base').value/365)*diasLaborados),2);
                                            }
                                            else{
                                                if(aniosLaborados > 1){
                                                    monto = Math.round(((document.getElementById('salario_base').value/2)*aniosLaborados)+(((document.getElementById('salario_base').value/2)/365)*diasLaborados),2);
                                                }
                                                else{
                                                    monto = 0;
                                                }
                                                
                                            }
                                            
                                            document.getElementById('monto').value = monto;
                                        }
                                        </script>

                                    <div class="text-center mx-auto border-top mt-3">
                                        <h4 class="pt-3">Indemnización</h4>
                                    </div>
                                    
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-4">
                                            <label class="form-label">Categoría</label>
                                            <select class="form-control" id="categoria" name="categoria" onchange="return calculoMonto();">
                                                <option value="1">Despido sin Justificación</option>
                                                <option value="2">Renuncia voluntaria</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-4">
                                            <label class="form-label">Fecha de Despido</label>
                                            <input class="form-control" type="date" id="fecha_despido" name="fecha_despido" value="<?php echo date("Y-m-d");?>"
                                            onchange="return calculoMonto();">
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