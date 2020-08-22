@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="row">
                <div class="col-md-6">
                    <a class="btn btn-dark" href="{{route('vehicles.index')}}">
                        <i class="fa fa-car"></i> Ver Resumen de Vehículos
                    </a>
                </div>
                <div class="col-md-6 text-right">
                    <a class="btn btn-primary" href="{{route('vehicles.create')}}">
                        <i class="fa fa-plus"></i> Nuevo Vehículo
                    </a>
                </div>
            </div>

            <form action="{{route('home')}}">
                <div class="input-group my-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fa fa-search"></i></span>
                    </div>
                    <input class="form-control"
                           type="text"
                           name="search"
                           class="my-3"
                           placeholder="Buscar vehículo por marca, placa o nombre/identificación del propietario">
                </div>
            </form>

            @if(request()->get('search'))
                <p class="text-center ml-3">
                    Mostrando los resultados de "{{request()->get('search')}}".
                    <a href="{{route('home')}}"><small>[Ver todos]</small></a>
                </p>
            @endif

            <table class="table table-striped">
                <thead>
                    <th>#</th>
                    <th>Placa</th>
                    <th>Vehículo</th>
                    <th>Propietario</th>
                    <th>Identificación</th>
                </thead>
                <tbody>
                    @forelse($vehicles as $vehicle)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$vehicle->plate}}</td>
                            <td>{{$vehicle->name}}</td>
                            <td>{{$vehicle->owner->name}}</td>
                            <td>{{$vehicle->owner->identification}}</td>
                        </tr>
                    @empty
                        <p>No hay vehículos para mostrar</p>
                    @endforelse
                </tbody>
            </table>

            <div class="d-flex justify-content-center">
                {{$vehicles->appends(request()->except('page'))->links()}}
            </div>
        </div>
    </div>
</div>
@endsection
