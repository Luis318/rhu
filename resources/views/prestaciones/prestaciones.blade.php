@extends('layouts.app')
@section('content')

<div class="container-xl">
    <div class="row justify-content-center">
        <h1>Empleados</h1>
        <employee-table></employee-table>
    </div>
</div>

<script src="{{ mix('js/employee-table.js') }}"></script>

@endsection