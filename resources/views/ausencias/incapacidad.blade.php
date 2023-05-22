@extends('layouts.app')
@section('content')

<div class="container-xl">
    <div class="d-sm-flex">
        <div class="col-sm-12 text text-center">
            <h2 class=""><strong>Control de Incapacidades Laborales</strong></h2>
        </div>
    </div>
    <div class="col-sm-12 text-center">
        <img src="https://img.freepik.com/vector-gratis/grupo-personal-medico-que-lleva-iconos-relacionados-salud_53876-43071.jpg?w=360"
            alt="imagen form">
    </div>
    <div class="row justify-conten-center">
        <div class="container-xl">
            <div class="card">
                <div>
                    <h4 class="text text-center mt-3">Datos del empleado</h4>
                </div>
                <form action="{{route('agregarincapacidad')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="md-3 row">
                            <div class="col-sm-4">
                                <label class="form-label">Empleado</label>
                                <select required class="form-control" id="id_empleado" name="id_empleado"
                                    onchange="showEmpleado()">
                                    <option selected="selected">Seleccione un empleado</option>
                                    @foreach ($empleados as $empleado)
                                        <option value="{{ $empleado->id }}">{{ $empleado->primerNombre }}
                                            {{ $empleado->primerApellido }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="dui">DUI</label>
                                <input class="form-control" type="text" id="dui" name="dui" readonly>
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="puesto">Puesto</label>
                                <input class="form-control" type="text" id="puesto" name="puesto" readonly>
                            </div>
                        </div>

                        <div class="md-3 row pt-3">
                            <div class="col-sm-4">
                                <label class="form-label" for="fecha">Fecha</label>
                                <input required class="form-control" type="date" id="fecha" name="fecha">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="inicio">Fecha de inicio</label>
                                <input required class="form-control" type="date" id="inicio" name="inicio">
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label" for="fin">fecha de fin</label>
                                <input required class="form-control" type="date" id="fin" name="fin">
                            </div>
                        </div>

                        <div class="md-3 row pt-3">
                            <div class="col-sm-6">
                                <label class="form-label">Tipo de Incapacidad</label>
                                <select required class="form-control" id="tipo_incapacidad" name="tipo_incapacidad">
                                    <option selected>Seleccione un tipo</option>
                                    <option value="Enfermedad Común">Enfermedad Común</option>
                                    <option value="Licencia de Maternidad">Licencia de Maternidad</option>
                                    <option value="Licencia de Paternidad">Licencia de Paternidad</option>
                                    <option value="Accidente Laboral">Accidente Laboral</option>
                                    <option value="Enfermedad Laboral">Enfermedad Laboral</option>
                                    <option value="Invalidez Parcial">Invalidez Parcial</option>
                                    <option value="Gran Invalidez">Gran Invalidez</option>
                                </select>
                            </div>
                            <div class="col-sm-6">
                                <label class="form-label" for="comprobante">Adjuntar comprobante</label>
                                <input required class="form-control-file" type="file" id="comprobante" name="comprobante">
                            </div>
                        </div>

                        <div class="row pt-3 pb-3">
                            <div class="col-sm-12">
                                <label class="folm-label" for="motivo">Motivo de la incapacidad</label>
                                <textarea required class="form-control" name="motivo" id="motivo" cols="30" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <input type="hidden" name="idEmpleado" id="idEmpleado" value="{{ $empleado->id }}">
                        <div class="d-flex justify-content-end">
                            <button class="btn btn-success" type="success" id="agregar">Agregar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
     function showEmpleado() {
            var empleados = {!! json_encode($empleados) !!};
            var idEmpleado = document.getElementById('id_empleado').value;
            var empleado = empleados.find(function(empleado) {
                return empleado.id == idEmpleado;
            });

            if (empleado) {
                document.getElementById('dui').value = empleado.dui;
                document.getElementById('puesto').value = empleado.puesto;
            } else {
                document.getElementById('dui').value = '';
                document.getElementById('puesto').value = '';
            }
        }
</script>
@endsection