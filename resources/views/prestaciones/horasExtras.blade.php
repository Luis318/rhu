@extends('layouts.app')
@section('content')
    <div class="container-xl">
        <div class="row justify-content-center">

            <h3>Control de horas extras</h3>

            <div class="container-xl">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 py-md-5">
                        <div class="card">
                            <form method="POST" action="{{ route('guardar_horas_extras') }}">
                                @csrf
                                <div class="card-body">

                                    <div class="text-center">
                                        <h4 class="pt-3">Datos del empleado</h4>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="dui">DUI</label>
                                            <input class="form-control" type="text" id="dui" name="dui" value="{{ $empleado->dui }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="puesto">Puesto</label>
                                            <input class="form-control" type="text" id="puesto" name="puesto">
                                        </div>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="pnombre">Primer Nombre</label>
                                            <input class="form-control" type="text" id="pnombre" name="pnombre" value="{{ $empleado->primerNombre }}">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="snombre">Segundo Nombre</label>
                                            <input class="form-control" type="text" id="snombre" name="snombre" value="{{ $empleado->segundoNombre }}">
                                        </div>
                                    </div>

                                    <div class="text-center mx-auto border-top mt-3">
                                        <h4 class="pt-3">Horas extras mensuales</h4>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="cdiurnas">Cantidad horas diurnas</label>
                                            <input class="form-control" type="text" id="cdiurnas" name="cdiurnas">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="montodiurnas">Monto por hora</label>
                                            <input class="form-control" type="text" id="montodiurnas" name="montodiurnas">
                                        </div>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="cnocturnas">Cantidad horas nocturnas</label>
                                            <input class="form-control" type="text" id="cnocturnas" name="cnocturnas">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="montonocturnas">Monto por hora</label>
                                            <input class="form-control" type="text" id="montonocturnas" name="montonocturnas">
                                        </div>
                                    </div>

                                    
                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="cdiurnasf">Cantidad horas diurnas (festivas)</label>
                                            <input class="form-control" type="text" id="cdiurnasf" name="cdiurnasf">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="montodiurnasf">Monto por hora</label>
                                            <input class="form-control" type="text" id="montodiurnasf" name="montodiurnasf">
                                        </div>
                                    </div>

                                    <div class="md-3 row pt-3">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="cnocturnasf">Cantidad horas nocturnas (festivas)</label>
                                            <input class="form-control" type="text" id="cnocturnasf" name="cnocturnasf">
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="form-label" for="montonocturnasf">Monto por hora</label>
                                            <input class="form-control" type="text" id="montonocturnasf" name="montonocturnasf">
                                        </div>
                                    </div>

                                    <div class="md-3 row pt-3 pb-3  ">
                                        <div class="col-sm-6">
                                            <label class="form-label" for="fecha">Fecha</label>
                                            <input class="form-control" type="date" id="fecha" name="fecha" value="">
                                        </div>
                                    </div>
                                </div>
                                <input id="empleado_id" name="empleado_id" type="hidden" value="{{ $empleado->id }}">
                                <div class="card-footer d-flex justify-content-end">
                                    <button class="btn btn-primary" type="submit">Agregar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
