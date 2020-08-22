@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <h1><i class="fa fa-car"></i> Agregar Nuevo Vehículo</h1>

            <form action="{{route('vehicles.store')}}" method="post" class="my-4">
                @csrf

                <div class="form-group">
                    <label>Por favor seleccione el propietario del vehículo</label>
                    <select name="owner_id"
                            class="form-control selectpicker"
                            data-live-search="true"
                            data-live-search-normalize="true"
                            data-style=""
                            data-style-base="form-control"
                            data-none-selected-text=""
                            required>
                        @forelse($owners as $owner)
                            <option value="{{$owner->id}}">{{$owner->name}}</option>
                        @empty
                            <option value="">No hay propietarios para mostrar</option>
                        @endforelse
                    </select>
                </div>

                <hr>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Marca</label>
                            <select name="brand_id"
                                class="form-control selectpicker"
                                data-live-search="true"
                                data-live-search-normalize="true"
                                data-style=""
                                data-style-base="form-control"
                                data-none-selected-text=""
                                required>
                                @forelse($brands as $brand)
                                    <option value="{{$brand->id}}">{{$brand->name}}</option>
                                @empty
                                    <option value="">No hay propietarios para mostrar</option>
                                @endforelse
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="">Placa</label>
                            <input class="form-control text-uppercase" type="text" name="plate" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Año (modelo)</label>
                            <input type="number"
                                   name="year"
                                   min="1900"
                                   class="form-control"
                                   value="{{now()->year}}"
                                   required>
                        </div>
                    </div>
                </div>

                <button class="w-100 my-2 btn btn-primary">
                    <i class="fa fa-save"></i> Guardar
                </button>

            </form>

        </div>
    </div>
</div>
@endsection
