@extends('plantilla.plantilla1')
@section('titulo')
  Comunidad
@endsection
@section('cabecera')
    Comunidad de vecinos
@endsection
@section('contenido')
    <div class="grid grid-cols-2 gap-5 mt-10">
        <div class="col-span-2 mx-auto">
            <a href="{{route('vecino.index')}}"class="bg-green-500">Gestionar vecino</a>
            <a href="{{route('Propiedad.index')}}"class="bg-green-500">Gestionar propiedad</a>
        </div>
    </div>
@endsection
