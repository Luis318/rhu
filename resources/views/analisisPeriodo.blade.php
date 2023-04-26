@extends('layouts.app')
@section('content')

<div class="container-xl">
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <form action="{{route('periodos')}}" method="POST" >
                @csrf
                <div class="row">
                    <div class="col-md-6 my-5">
                        <label for="periodo1" class="form-label">Periodo 1</label>
                        <select name="periodo1" id="periodo1" type="text" class="form-control">
                            <option value="1">2022</option>
                            <option value="2">2021</option>
                            <option value="3">2020</option>
                        </select>
                    </div>
                    <div class="col-md-6 my-5">
                        <label for="periodo2" class="form-label">Periodo 2</label>
                        <select name="periodo2" id="periodo2" type="text" class="form-control">
                            <option value="1">2022</option>
                            <option value="2">2021</option>
                            <option value="3">2020</option>
                        </select>
                    </div>
                </div>
                <div class="">
                    <button class="btn btn-primary" type="submit" role="button">Mostrar</button>
                    <input type="hidden" name="peri1" id="peri1" value="{{$periodo1=1}}">
                    <input type="hidden" name="peri2" id="peri2" value="{{$periodo1=2}}">
                </div>
            </form>
        </div>
    </div>
    
</div>

@endsection