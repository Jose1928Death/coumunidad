@extends('plantilla.plantilla1')
@section('titulo')
Propiedades
@endsection
@section('cabecera')
Gestión de Propiedades
@endsection
@section('contenido')
<div class="grid grid-cols-2 gap-4 py-2">
    <div class="py-2">
        <a href="{{route('Propiedad.create')}}">
        <i class="fa fa-plus"></i> Nueva Propiedad</a>
    </div>
</div>
<div class="text-center grid grid-cols-4">
    <div>Info</div>
    <div>Nombre</div>
    <div>Piso</div>
    <div>Acciones</div>
</div>
<div class="text-center grid grid-cols-4">
    @foreach($propiedads as $item)
    <div class="mb-4">
        <a href="">
        <i class="fa fa-info"></i> Detalle</a>
    </div>
    <div>
        {{$item->nombre}}
    </div>
    <div>
        {{$item->piso}}
    </div>
    <div>
        <form name="a" action="{{route('Propiedad.destroy', $item)}}" method='POST' class="form-inline">
            @csrf
            @method("DELETE")
            <a href="{{route('Propiedad.edit', $item)}}"><i class="fa fa-edit"></i> Editar</a>
            <button type="submit" onclick="return confirm('¿Borrar Propiedad?')">
                <i class="fa fa-trash"></i> Borrar</button>
        </form>
    </div>
    @endforeach
</div>
<div class="mt-10">
    {{$propiedads->links()}}
</div>
@endsection
