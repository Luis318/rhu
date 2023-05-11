@extends('layouts.app')
@section('content')

<div class="container-xl">
    <div class="row justify-content-center">
    
        <h3>Control de horas extras</h3>

        <div class="container-xl">
            <div class="row d-flex justify-content-center">
                <div class="col-md-12 py-md-5">
                    <div class="card">
                        <div class="card-body">
                            <form action="">

                                <div class="text-center mx-auto border-top mt-3">
                                    <h4 class="pt-3">Horas extras</h4>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-sm-3">
                                        <label class="form-label" for="horasdiurnas">Horas extras diurnas</label>
                                        <input class="form-control" type="text" id="horasdiurnas" name="horasdiurnas">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label" for="monto_hed">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_hed" name="monto_hed">
                                    </div>
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="monto_hed_descanso" name="monto_hed_descanso">
                                            <label class="form-check-label" for="monto_hed_descanso">En dia de descanso</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="monto_hed_festivo" name="monto_hed_festivo">
                                            <label class="form-check-label" for="monto_hed_festivo">En dia festivo</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="md-3 row pt-3">
                                    <div class="col-sm-3">
                                        <label class="form-label" for="horasdiurnas">Horas extras nocturnas</label>
                                        <input class="form-control" type="text" id="horasnocturnas" name="horasnocturnas">
                                    </div>
                                    <div class="col-sm-3">
                                        <label class="form-label" for="monto_hen">Monto a pagar</label>
                                        <input class="form-control" type="text" id="monto_hen" name="monto_hen">
                                    </div>
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="monto_hen_descanso" name="monto_hen_descanso">
                                            <label class="form-check-label" for="monto_hen_descanso">En dia de descanso</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3 d-flex align-items-center">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="monto_hen_festivo" name="monto_hen_festivo">
                                            <label class="form-check-label" for="monto_hen_festivo">En dia festivo</label>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

@endsection