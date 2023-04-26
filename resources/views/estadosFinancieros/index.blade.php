@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Estados financieros</h2>
        <div class="d-flex justify-content-end">
            <a href="{{ route('estados.create') }}" class="btn btn-primary">Agregar</a>
        </div>
        <table class="mt-4 table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Periodo</th>
                <th scope="col">Tipo informe</th>
                <th scope="col">Total</th>
                <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
               @foreach ($informes as $informe)
                <tr>
                    <th scope="row">{{ $informe->id }}</th>
                    <td>{{ $informe->created_at->format('d-m-Y') }}</td>
                    <td>{{ $informe->fecha_inicio }} - {{ $informe->fecha_fin }}</td>
                    <td>
                        @php
                            if($informe->tipo_informe == 1){
                                echo "Estado de resultados";
                            }else{
                                echo "Balance general";
                            }
                        @endphp
                    </td>
                    <td>{{ $informe->total_reporte }}</td>
                    <td>
                        <a href="{{ route('estados.show', $informe->id) }}" class="btn btn-primary">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection