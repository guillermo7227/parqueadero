@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1><i class="fa fa-car"></i> Resumen de Vehículos por Marca</h1>

            <table class="table table-striped my-4">
                <thead>
                    <th>#</th>
                    <th>Marca</th>
                    <th class="text-center">Cantidad de Vehículos</th>
                </thead>
                <tbody>
                    @forelse($brands as $brand)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ucfirst(strtolower($brand->name))}}</td>
                            <td class="text-center">{{$brand->vehicles->count()}}</td>
                        </tr>
                    @empty
                        <p>No hay marcas para mostrar</p>
                    @endif
                </tbody>
            </table>

        </div>
    </div>
</div>
@endsection
