@extends('layouts.app')
@section('content')

<head>

</head>

<body>
    <div class="col">
        <div class="container1">
            <div class="p-2 bg primary">
                <p class="text-center">
                <h2><strong>Control de Ausencias: </strong></h2>
                </p>
            </div>
        </div>

        <div class="imagen">
            <img src="https://static.vecteezy.com/system/resources/thumbnails/016/133/522/small/calendar-organizer-icon-in-comic-style-appointment-event-cartoon-illustration-on-white-isolated-background-month-deadline-business-concept-splash-effect-vector.jpg"
                class="img-fluid; mx-auto d-block" alt="...">
        </div>


        <div class="formulario">
            <div class="col">
                <div class="mb-3">
                <div class="row g-3">
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Nombres" aria-label="Nombre" height="100px">
                        </div>
                        <div class="col-4">
                            <input type="text" class="form-control" placeholder="Apellidos" aria-label="Apellido">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="mb">
                            <label for="exampleFormControlInput1" class="form-label">Puesto de Trabajo: </label>
                            <input class="form-control" type="text" placeholder="" aria-label="default input example">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb">
                            <label for="exampleFormControlInput1" class="form-label">Fecha Desde: </label>
                            <input type="date" class="form-control" weight="100px">
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="mb">
                            <label for="exampleFormControlInput1" class="form-label">Fecha de Hasta: </label>
                            <input type="date" class="form-control" weight="100px">
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="mb">
                        <label for="exampleFormControlTextarea1" class="form-label">Comentario Acerca de la Ausencia
                            Laboral: </label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                    </div>
                </div>
                <div class="col-5">
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Adjunte Comprobante: </label>
                        <div class="mb-3">
                            <label for="formFile" class="form-label"></label>
                            <input class="form-control" type="file" id="formFile">
                        </div>
                    </div>
                </div>
                <hr>
                <div class="col-12" height=100px;>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
        </div>

    </div>

</body>

@endsection