@extends('layouts.app')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="pull-left">
            <h2>Agregrar Nueva Cuenta</h2><br>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('store') }}" method="POST">
    @csrf

     <div class="row" style="margin-left: 10px; margin-right: 10px;">
        <div class="col-sm-3">
            <div class="form-group">
                <strong>Nombre:</strong>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <strong>Nomenclatura:</strong>
                <input type="text" name="nomenclatura" class="form-control" placeholder="Nomenclatura">
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <strong>ID Cuenta:</strong>
                <br>
                <select name="tipocuentas_id" class="form-control" aria-label="sans-serif">
                    @foreach ($tiposCuentas as $tc)
                    <option value="{{$tc['id'] }}">{{$tc['nombre']}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <a class="btn btn-primary" href="{{ route('cuenta') }}"> Atras</a>
            <button type="submit" class="btn btn-primary">Agregrar</button>
        </div>
    </div>

</form>
@endsection
