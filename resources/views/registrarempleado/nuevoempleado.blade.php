@extends('layouts.app')
@section('content')

<head>
    <div class="container1" right="500px">
        <div class="p-2 bg primary">
            <p class="text-center">
            <h2><strong>Ingresar Nuevo Empleado: </strong></h2>
            </p>
        </div>
    </div>
</head>

<body>
    <div class="col center block" right="500px">
        <div class="col-8" right="200px">
            <form class="row ">
                <div class="col-md-4">
                    <label for="validationDefault01" class="form-label">Nombres</label>
                    <input type="text" class="form-control" id="validationDefault01" value="" required>
                </div>
                <div class="col-md-4">
                    <label for="validationDefault02" class="form-label">Apellidos</label>
                    <input type="text" class="form-control" id="validationDefault02" value="" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">Departamento</label>
                    <input type="text" class="form-control" id="validationDefault03" required>
                </div>
                <div class="col-md-6">
                    <label for="validationDefault03" class="form-label">Municipio</label>
                    <input type="text" class="form-control" id="validationDefault03" required>
                </div>
                <div class="col-md-3">
                </div>
                <div class="col-md-3">
                    <label for="validationDefault05" class="form-label">Código Postal</label>
                    <input type="text" class="form-control" id="validationDefault05" required>
                </div>
                <div class="col">
                    <div class="mb">
                        <label for="exampleFormControlInput1" class="form-label">Dirección: </label>
                        <input class="form-control" type="text" placeholder="" aria-label="default input example">
                    </div>
                </div>
                <div class="col-12" right="200px">
                    <div class="row-4" right="200px">
                        <div class="col-8">
                            <div class="mb" right="200px">
                                <label for="exampleFormControlInput1" class="form-label">Sexo: </label>
                                <select class="form-select form-select-sm" aria-label=".form-select-sm example"
                                    left="10px">
                                    <option selected>Seleccione</option>
                                    <option value="1">Femenino</option>
                                    <option value="2">Masculino</option>
                                    <option value="2">Otro</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb" right="200px">
                            <label for="exampleFormControlInput1" class="form-label">Tipo de Pago: </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Seleccione</option>
                                <option value="1">Mensual</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb">
                            <label for="exampleFormControlInput1" class="form-label">Nivel Academico: </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Seleccione</option>
                                <option value="1">Maestría</option>
                                <option value="2">Universitario</option>
                                <option value="2">Bachiller</option>
                                <option value="2">Tercer Ciclo</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb">
                            <label for="exampleFormControlInput1" class="form-label">Estado Civil: </label>
                            <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                                <option selected>Seleccione</option>
                                <option value="1">Casado/a</option>
                                <option value="2">Soltero/a</option>
                                <option value="2">Viudo/a</option>
                                <option value="2">Comprometido/a</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Ingreso: </label>
                            <input type="date" class="form-control" weight="100px">
                        </div>
                    </div>
                </div>

                <div class="col-6">
                    <div class="mb">
                        <label for="exampleFormControlInput1" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="exampleFormControlInput1"
                            placeholder="name@example.com">
                    </div>
                </div>
                <hr>
                <hr>
                <p>
                    Teléfono: <input type="tel" name="telefono" placeholder="(Código de área) Número">
                </p>
                <div class="col-8">
                    <div class="mb">
                        <label for="exampleFormControlTextarea1" class="form-label">Descripción de Discapacidad:
                        </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="col">
                    <div class="mb">
                        <label for="exampleFormControlInput1" class="form-label">Posee Alguna Discapacidad: </label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Seleccione</option>
                            <option value="1">Si </option>
                            <option value="2">No</option>
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb">
                        <label for="exampleFormControlInput1" class="form-label">Banco: </label>
                        <select class="form-select form-select-sm" aria-label=".form-select-sm example">
                            <option selected>Seleccione</option>
                            <option value="1">Banco Agrícola</option>
                            <option value="2">Banco de America Central</option>
                        </select>
                    </div>
                    <p>
                    Cuenta Bancaria: <input type="tel" name="telefono" placeholder="">
                </p>
                </div>
            </form>
            <div class="col">
                <div class="mb">
                <button type="button" class="btn btn-outline-primary">Guardar Registro</button>
                </div>
            </div>
        </div>
    </div>

</body>

@endsection