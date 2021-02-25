@extends('plantilla.plantilla1')
@section('titulo')
nueva propiedad
@endsection
@section('cabecera')
Crear Propiedad
@endsection
@section('contenido')
@if ($errors->any())
    <div class="alert alert-danger my-3 p-2">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form name="fom" action="{{route('Propiedad.store')}}" method="POST" enctype="multipart/form-data" class="mt-3">
@csrf
<div class="row">
    <div class="col-2">
        <input type="text" name="nombre" required placeholder="Nombre" class="form-control">
    </div>
    <div class="col-5">
        <input type="text" name="piso" placeholder="Piso" class="form-control">
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Crear Propiedad</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-brush"></i> Limpiar</button>
        <a href="{{route('Propiedad.index')}}" class="btn btn-primary"><i class="fa fa-house-user"></i> Inicio</a>
    </div>
</div>
</form>
@endsection
