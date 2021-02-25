@extends('plantilla.plantilla1')
@section('titulo')
Vecinos
@endsection
@section('cabecera')
Gestión de Vecinos
@endsection
@section('contenido')
<div class="grid grid-cols-2 gap-5 py-2">
    <div class="py-2">
        <a href="{{route('vecino.create')}}">
        <i class="fa fa-plus"></i> Nuevo Vecino</a>
    </div>
</div>
<div class="text-center grid grid-cols-5">
    <div>Info</div>
    <div>Nombre</div>
    <div>Mail</div>
    <div>Foto</div>
    <div>Acciones</div>
</div>
<div class="text-center grid grid-cols-5">
    @foreach($vecinos as $item)
    <div class="mb-5">
        <a href="{{route('vecino.show', $item)}}">
        <i class="fa fa-info"></i> Detalle</a>
    </div>
    <div>
        {{$item->apellidos.", ".$item->nombre}}
    </div>
    <div>
        {{$item->email}}
    </div>
    <div class="mx-auto">
        <img src="{{asset($item->foto)}}">
    </div>
    <div>
        <form name="a" action="{{route('vecino.destroy', $item)}}" method='POST' class="form-inline">
            @csrf
            @method("DELETE")
            <a href="{{route('vecino.edit', $item)}}"><i class="fa fa-edit"></i> Editar</a>
            <button type="submit" onclick="return confirm('¿Borrar Alumno?')">
                <i class="fa fa-trash"></i> Borrar</button>
        </form>
    </div>

    @endforeach


</div>
<div class="mt-10">
    {{$vecinos->links()}}
</div>


@endsection
