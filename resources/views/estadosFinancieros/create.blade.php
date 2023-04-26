@extends('layouts.app')
@section('content')
    <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Estados financieros</div>

                <div class="card-body">
                    @if (isset($errors) && $errors->any())
                    <div class="alert alert-danger" role="alert">
                        @foreach ($errors->all() as $error)
                        {{$error}}
                        @endforeach
                    </div>
                    @endif
                    <form action="{{route('estados.store')}}" class="row" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-sm-6">
                            <label for="inputEmail4" class="form-label">Fecha inicio</label>
                            <input type="date" name="fechaInicio" class="form-control" id="" required>     
                        </div>
                        <div class="col-sm-6">
                            <label for="inputEmail4" class="form-label">Fecha fin </label>
                            <input type="date" name="fechaFin" class="form-control" id="" required>     
                        </div>
                        <div class="col-12 mt-2">
                            <label for="tipoEstado" class="form-label">Tipo estado</label>
                            <select name="tipoEstado" class="custom-select" id="tipoEstado" required>
                                <option value="" selected disabled>Seleccione el estado financiero</option>
                                <option value="1">Estado de resultados</option>
                                <option value="2">Balance general</option>
                            </select>     
                        </div>
                        <div class="balance-general">
                            <div class="col-12 mt-3">
                                <input type="hidden" name="id_tipoCuenta" value="1">                       
                                <p class="font-weight-bold">Activos</p>                         
                            </div>
                            <div class="col-md-12">
                                <input type="hidden" name="id_tipoCuenta" value="1">                       
                                <p class="font-weight-bold">Activos corrientes</p>                         
                            </div>
                            @foreach ($cuentasActivoC as $cuenta)
                           
                                <div class="col-sm-6 mb-3">
                                    <label for="inputEmail4" class="form-label">{{$cuenta->nomenclatura}}-{{$cuenta->nombre}}</label>
                                    <input type="text" name="monto_{{$cuenta->id}}" class="form-control" id="" required>     
                                </div>
                         
        
                            @endforeach
                            <div class="col-12 mt-2">
                                <input type="hidden" name="id_tipoCuenta" value="1">                       
                                <p class="font-weight-bold">Activos no corrientes</p>                         
                            </div>
                            @foreach ($cuentasActivoNC as $cuenta)
                            <div class="col-6 mb-3">
                                <label for="inputEmail4" class="form-label">{{$cuenta->nomenclatura}}-{{$cuenta->nombre}}</label>
                                <input type="text" name="monto_{{$cuenta->id}}" class="form-control" id="" required>     
                            </div>
                            @endforeach
                            <div class="col-12 mt-3">
                                <input type="hidden" name="id_tipoCuenta" value="2">                       
                                <p class="font-weight-bold">Pasivo</p>                         
                            </div>
                            <div class="col-12">
                                <input type="hidden" name="id_tipoCuenta" value="1">                       
                                <p class="font-weight-bold">Pasivos corrientes</p>                         
                            </div>
                            @foreach ($cuentasPasivoN as $cuenta)
                            <div class="col-6 mb-3">
                                <label for="inputEmail4" class="form-label">{{$cuenta->nomenclatura}}-{{$cuenta->nombre}}</label>
                                <input type="text" name="monto_{{$cuenta->id}}" class="form-control" id="" required>     
                            </div>
                            @endforeach
                            <div class="col-12">
                                <input type="hidden" name="id_tipoCuenta" value="1">                       
                                <p class="font-weight-bold">Pasivos no corrientes</p>                         
                            </div>
                            @foreach ($cuentasPasivoNC as $cuenta)
                            <div class="col-6 mb-3">
                                <label for="inputEmail4" class="form-label">{{$cuenta->nomenclatura}}-{{$cuenta->nombre}}</label>
                                <input type="text" name="monto_{{$cuenta->id}}" class="form-control" id="" required>     
                            </div>
                            @endforeach
                            <div class="col-12 mt-3">
                                <input type="hidden" name="id_tipoCuenta" value="3">                       
                                <p class="font-weight-bold">Patrimonio</p>                         
                            </div>
                            @foreach ($cuentasPatrimonio as $cuenta)
                            <div class="col-6 mb-3">
                                <label for="inputEmail4" class="form-label">{{$cuenta->nomenclatura}} - {{$cuenta->nombre}}</label>
                                <input type="text" name="monto_{{$cuenta->id}}" class="form-control" id="" required>     
                            </div>
                            @endforeach
                            <div class="col-12 mt-3">
                                <label for="total" class="form-label font-weight-bold">Total<small>(Activo=Pasivo + Patrimonio)</small></label>
                                <input type="text" class="form-control" name="total">                       
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn btn-primary" type="submit">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection