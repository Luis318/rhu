@extends('layouts.app')
@section('content')

<div class="container-xl">
    <div class="row justify-content-center">
    
        <h3>Prestaciones y descuentos de {{$empleado->primerNombre}} {{$empleado->primerApellido}}</h3>

        <div class="container-xl">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 py-md-5">
                    <div class="card">
                        <form action="">
                            <div class="card-header d-flex justify-content-end">
                                <button class="btn btn-success" type="button">Imprimir boleta</button>
                            </div>
                            <div class="card-body">

                                <div class="text-center">
                                    <h4 class="pt-3">Datos del empleado</h4>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="dui">DUI</label>
                                        <input class="form-control" type="text" id="dui" name="dui">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="puesto">Puesto</label>
                                        <input class="form-control" type="text" id="puesto" name="puesto">
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="pnombre">Primer Nombre</label>
                                        <input class="form-control" type="text" id="pnombre" name="pnombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="snombre">Segundo Nombre</label>
                                        <input class="form-control" type="text" id="snombre" name="snombre">
                                    </div>
                                </div>

                                <div class="md-3 row pt-3 pb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="papellido">Primer Apellido</label>
                                        <input class="form-control" type="text" id="papellido" name="papellido">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="sapellido">Segundo Apellido</label>
                                        <input class="form-control" type="text" id="sapellido" name="sapellido">
                                    </div>
                                </div>

                                <div class="text-center mx-auto border-top mt-3">
                                    <h4 class="pt-3">Descuentos de ley</h4>
                                </div>
                                <div class="md-3 row pt-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="isssP">ISSS patrono</label>
                                        <input class="form-control" type="text" id="isssP" name="isssP">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="isssE">ISSS Empleado</label>
                                        <input class="form-control" type="text" id="isssE" name="isssE">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="afpP">AFP patrono</label>
                                        <input class="form-control" type="text" id="afpP" name="afpP">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="afpE">AFP Empleado</label>
                                        <input class="form-control" type="text" id="afpE" name="afpE">
                                    </div>
                                </div>

                                <div class="md-3 row pb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="renta">Renta</label>
                                        <input class="form-control" type="text" id="renta" name="renta">
                                    </div>
                                </div>

                                <div class="text-center mx-auto border-top mt-3">
                                    <h4 class="pt-3">Horas extras</h4>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="diurnas_festivas">Horas extras diurnas (En dias festivos)</label>
                                        <input class="form-control" type="text" id="diurnas_festivas" name="diurnas_festivas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_diurnas_festivas">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_diurnas_festivas" name="monto_diurnas_festivas">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="nocturnas_festivas">Horas extras Nocturnas (En dias festivos)</label>
                                        <input class="form-control" type="text" id="nocturnas_festivas" name="nocturnas_festivas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_nocturnas_festivas">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_nocturnas_festivas" name="monto_nocturnas_festivas">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="diurnas_descanso">Horas extras diurnas (En dias de descanso)</label>
                                        <input class="form-control" type="text" id="diurnas_descanso" name="diurnas_descanso">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_diurnas_descanso">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_diurnas_descanso" name="monto_diurnas_descanso">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="nocturnas_descanso">Horas extras Nocturnas (En dias de descanso)</label>
                                        <input class="form-control" type="text" id="nocturnas_descanso" name="nocturnas_descanso">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_nocturnas_descanso">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_nocturnas_descanso" name="monto_nocturnas_descanso">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection