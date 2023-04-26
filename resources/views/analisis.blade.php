@extends('layouts.app')
@section('content')
@php
    // print_r($datos);
    //print_r($activos);
@endphp
<div class="container-xl">

<form action="{{'analisis'}}" method="POST" >
    @csrf
    <div class="row my-4">
        <div class="col-md-3">
            <label for="periodo1" class="form-label">Periodo 1</label>
            <select name="periodo1" id="periodo1" type="text" class="form-control">
                <option value="1">2022</option>
                <option value="2">2021</option>
                <option value="3">2020</option>
            </select>
        </div>
        <div class="col-md-3">
            <label for="periodo2" class="form-label">Periodo 2</label>
            <select name="periodo2" id="periodo2" type="text" class="form-control">
                <option value="1">2022</option>
                <option value="2">2021</option>
                <option value="3">2020</option>
            </select>
        </div>
        <div class="col-md-3 mt-4 d-flex align-items-center">
            <button class="btn btn-primary" type="submit" role="button">Mostrar</button>
        </div>
    </div>
    
<table class="table">
    <tbody>
        <thead>
            <td>Numero</td>
            <td>Cuenta</td>
            <td>Periodo 1</td>
            <td>Periodo 2</td>
            <td>Analisis Horizontal</td>
            <td>Analisis Horizontal %</td>
            <td>Analisis vertical</td>
        </thead>
        {{-- @dump($datos) --}}
        @foreach($datos as $key)
            <tr>
                <td>{{ $key['cuentas_id'] }}</td>
                <td>{{ $key['nombre'] }}</td>
                <td>{{ $key['monto_cuenta1'] }}</td>
                <td>{{ $key['monto_cuenta2'] }}</td>
                <td>{{ $key['ahr'] }}</td>
                <td>{{ $key['ahP']. " %" }}</td>
                <td>{{ $key['av']. " %" }}</td>
                
            </tr>
        @endforeach
    </tbody>
</table>
</form>
</div>
@endsection