@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="d-sm-flex">
            <div class="col-sm-12 text text-center">
                <h2 class=""><strong>Control de Asistencia</strong></h2>
            </div>
        </div>
        <div class="col-sm-12 text-center">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/133/522/small/calendar-organizer-icon-in-comic-style-appointment-event-cartoon-illustration-on-white-isolated-background-month-deadline-business-concept-splash-effect-vector.jpg"
                alt="imagen form">
        </div>
        <div class="row justify-conten-center">
            <div class="container-xl">
                <div class="card">
                    <div>
                        <h4 class="text text-center mt-3">Datos del empleado</h4>
                    </div>
                    <form method="POST" action="{{route('agregarasistencia')}}">
                        @csrf
                        <div class="card-body">
                            <div class="md-3 row">
                                <div class="col-sm-4">
                                    <label class="form-label">Empleado</label>
                                    <select class="form-control" id="id_empleado" name="id_empleado"
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
                                    <input class="form-control" type="date" id="fecha" name="fecha">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="entrada">Hora de entrada</label>
                                    <input class="form-control" type="time" id="entrada" name="entrada"
                                        onchange="calcularRetraso()">
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="salida">Hora de salida</label>
                                    <input class="form-control" type="time" id="salida" name="salida">
                                </div>
                            </div>

                            <div class="md-3 row pt-3 pb-3">
                                <div class="col-sm-4">
                                    <label class="form-label" for="retraso">Retrasos (minutos)</label>
                                    <input class="form-control" type="number" step="any" id="retraso" name="retraso"
                                        readonly>
                                </div>
                                <div class="col-sm-4">
                                    <label class="form-label" for="descuento">Descuento</label>
                                    <input class="form-control" type="number" step="any" id="descuento"
                                        name="descuento" readonly>
                                </div>
                                <div class="form-check col-sm-4 d-flex align-items-center">
                                    <input class="form-check-input" type="checkbox" value="si" id="justificado"
                                        name="justificado">
                                    <label class="form-check-label" for="justificado">
                                        Justificado
                                    </label>
                                </div>
                            </div>

                            <div class="row pt-3 pb-3">
                                <div class="col-sm-12">
                                    <label class="folm-label" for="observaciones">Observaciones</label>
                                    <textarea class="form-control" name="observaciones" id="observaciones" cols="30" rows="3"></textarea>
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

        function calcularRetraso() {
            var entrada = document.getElementById('entrada').value;
            var horaEntrada = new Date('1970-01-01T' + entrada + ':00');
            var horaLimite = new Date('1970-01-01T07:30:00');
            var retraso = Math.max(0, (horaEntrada - horaLimite) / 1000 / 60); // Diferencia en minutos

            document.getElementById('retraso').value = retraso.toFixed(2);

            var empleados = {!! json_encode($empleados) !!};
            var idEmpleado = document.getElementById('id_empleado').value;
            var empleado = empleados.find(function(empleado) {
                return empleado.id == idEmpleado;
            });

            if (empleado) {
                var salarioBase = empleado.salario_base;
                var valorHora = salarioBase / 160; // 160 horas mensuales

                if (retraso > 0 && retraso < 60) {
                    document.getElementById('descuento').value = valorHora.toFixed(2);
                } else if (retraso >= 60) {
                    var horasDescuento = Math.floor(retraso / 60); // Número entero de horas
                    var descuentoTotal = horasDescuento * valorHora;
                    document.getElementById('descuento').value = descuentoTotal.toFixed(2);
                } else {
                    document.getElementById('descuento').value = '0.00';
                }
            } else {
                document.getElementById('descuento').value = '0.00';
            }
        }
    </script>
@endsection
