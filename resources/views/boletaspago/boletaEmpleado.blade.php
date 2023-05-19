@extends('layouts.app')
@section('content')

<div class="container-xl">
    <div class="row justify-content-center">
    
        <h3>Prestaciones y descuentos de {{$empleado->primerNombre}} {{$empleado->primerApellido}}</h3>

        <div class="container-xl">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 py-md-5">
                    <div class="card">
                        <form method="POST" action="{{ route('boleta_unica') }}">
                            @csrf
                            <div class="card-header d-flex justify-content-end">
                                <button href="" class="btn btn-success" type="submit">Imprimir boleta</button>
                                <input type="hidden" value="{{$empleado->id}}" name="idEmpleado" id="inEmpleado">
                            </div>
                            <div class="card-body">

                                <div class="text-center">
                                    <h4 class="pt-3">Datos del empleado</h4>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="dui">DUI</label>
                                        <input value="{{ $empleado->dui }}" class="form-control" type="text" id="dui" name="dui">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="puesto">Puesto</label>
                                        <input class="form-control" type="text" id="puesto" name="puesto">
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="pnombre">Primer Nombre</label>
                                        <input value="{{ $empleado->primerNombre }}" class="form-control" type="text" id="pnombre" name="pnombre">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="snombre">Segundo Nombre</label>
                                        <input value="{{ $empleado->segundoNombre }}" class="form-control" type="text" id="snombre" name="snombre">
                                    </div>
                                </div>

                                <div class="md-3 row pt-3 pb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="papellido">Primer Apellido</label>
                                        <input value="{{ $empleado->primerApellido }}" class="form-control" type="text" id="papellido" name="papellido">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="sapellido">Segundo Apellido</label>
                                        <input value="{{ $empleado->segundoApellido }}" class="form-control" type="text" id="sapellido" name="sapellido">
                                    </div>
                                </div>

                                <div class="text-center mx-auto border-top mt-3">
                                    <h4 class="pt-3">Descuentos de ley</h4>
                                </div>
                                <div class="md-3 row pt-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="isssP">ISSS patrono</label>
                                        <input value="{{ $issPatrono[$empleado->id] }}" class="form-control" type="text" id="isssP" name="isssP">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="isssE">ISSS Empleado</label>
                                        <input value="{{ $isssEmp[$empleado->id] }}" class="form-control" type="text" id="isssE" name="isssE">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="afpP">AFP patrono</label>
                                        <input value="{{ $afpPatrono[$empleado->id] }}" class="form-control" type="text" id="afpP" name="afpP">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="afpE">AFP Empleado</label>
                                        <input value="{{ $afpEmp[$empleado->id] }}" class="form-control" type="text" id="afpE" name="afpE">
                                    </div>
                                </div>

                                <div class="md-3 row pb-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="renta">Renta</label>
                                        <input value="{{ $renta[$empleado->id] }}" class="form-control" type="text" id="renta" name="renta">
                                    </div>
                                </div>

                                <div class="text-center mx-auto border-top mt-3">
                                    <h4 class="pt-3">Horas extras</h4>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="diurnas_festivas">Horas extras diurnas (En dias festivos)</label>
                                        <input class="form-control" value="{{ isset($horasExtrasExistentes->cantidadDiurnasFeriado) ? $horasExtrasExistentes->cantidadDiurnasFeriado : ''  }}" type="text" id="diurnas_festivas" name="diurnas_festivas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_diurnas_festivas">Monto a pagar</label>
                                        <input class="form-control" value="{{ isset($diurnasF[$empleado->id]) ? $diurnasF[$empleado->id] : ''  }}" type="text" id="monto_diurnas_festivas" name="monto_diurnas_festivas">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="nocturnas_festivas">Horas extras Nocturnas (En dias festivos)</label>
                                        <input class="form-control" value="{{ isset($horasExtrasExistentes->cantidadNocturnasFeriado) ? $horasExtrasExistentes->cantidadNocturnasFeriado : ''  }}" type="text" id="nocturnas_festivas" name="nocturnas_festivas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_nocturnas_festivas">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_nocturnas_festivas" name="monto_nocturnas_festivas" value="{{ isset($nocturnasF[$empleado->id]) ? $nocturnasF[$empleado->id] : ''  }}">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="diurnas">Horas extras diurnas</label>
                                        <input class="form-control" value="{{ isset($horasExtrasExistentes->cantidadDiurnas) ? $horasExtrasExistentes->cantidadDiurnas : ''  }}" type="text" id="diurnas" name="diurnas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_diurnas">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_diurnas" name="monto_diurnas" value="{{ isset($diurnas[$empleado->id]) ? $diurnas[$empleado->id] : ''  }}">
                                    </div>
                                </div>

                                <div class="md-3 row py-3">
                                    <div class="col-sm-6">
                                        <label class="form-label" for="nocturnas">Horas extras Nocturnas</label>
                                        <input class="form-control" value="{{isset($horasExtrasExistentes->cantidadNocturnas) ? $horasExtrasExistentes->cantidadNocturnas : ''  }}" type="text" id="nocturnas" name="nocturnas">
                                    </div>
                                    <div class="col-sm-6">
                                        <label class="form-label" for="monto_nocturnas">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_nocturnas" name="monto_nocturnas" value="{{ isset($nocturnas[$empleado->id]) ? $nocturnas[$empleado->id] : ''  }}">
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