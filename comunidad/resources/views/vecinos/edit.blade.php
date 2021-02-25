@extends('plantilla.plantilla1')
@section('titulo')
nuevo vecino
@endsection
@section('cabecera')
Crear Vecino
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
<form name="fom" action="{{route('vecino.update', $vecino)}}" method="POST" enctype="multipart/form-data" class="mt-3">
    @csrf
    @method("PUT")
<div class="row">
    <div class="col-2">
        <input type="text" name="nombre" required value="{{$vecino->nombre}}" class="form-control">
    </div>
    <div class="col-5">
        <input type="text" name="apellidos" required value="{{$vecino->apellidos}}" class="form-control">
    </div>
    <div class="col-5">
        <input type="text" name="email" required value="{{$vecino->email}}" class="form-control">
    </div>
    <div class="col-5">
        <input type="file" name="foto" class="form-control-file" />
    </div>
</div>
<div class="row mt-3">
    <div class="col">
        <button type="submit" class="btn btn-success"><i class="fa fa-plus"></i> Editar Marca</button>
        <button type="reset" class="btn btn-warning"><i class="fa fa-brush"></i> Limpiar</button>
        <a href="{{route('vecino.index')}}" class="btn btn-primary"><i class="fa fa-house-user"></i> Inicio</a>
    </div>
</div>
</form>
@endsection
