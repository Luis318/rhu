@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Indemnizaciones</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
            <iclass="fas fa-download fa-sm text-white-50"></i> Nueva Indeminzación</a>
    </div>

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <table lass="table table-striped table-bordered">
            <tr>
                <th scope="col">Categoria</th>
                <th scope="col">Descripción</th>
                <th scope="col">Empleado</th>
                <th scope="col" >Monto</th>
            </tr>
        </table>
    </div>
</div>
@endsection