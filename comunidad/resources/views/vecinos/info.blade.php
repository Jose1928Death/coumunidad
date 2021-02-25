@extends('plantilla.plantilla1')
@section('titulo')
Detalle Vecino
@endsection
@section('cabecera')
Detalle Vecino ({{$vecino->id}})
@endsection
@section('contenido')
<div class="flex justify-center">
    <div>
        <div>
            <div>
                <img src="{{asset($vecino->foto)}}" a="{{$vecino->nombre}}">
            </div>
            <div>
                <h3 class="text-center">{{$vecino->apellidos.", ".$vecino->nombre}}</h3>
                <div class="text-center">
                    <p>{{$vecino->email}}</p>
                </div>
                <table>
                    <tbody>
                    <tr>
                        <td>Registro Creado</td>
                        <td>{{$vecino->created_at}}</td>
                    </tr>
                    <tr>
                        <td>Registro Actualizado</td>
                        <td>{{$vecino->updated_at}}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{$vecino->email}}</td>
                    </tr>
                </tbody></table>
                <div class="text-center">
                    <a href="">Ver Asignaturas</a>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="text-center">
        <a href="{{route('vecino.index')}}"><i class="fa fa-home"></i> Inicio</a>
    </div>
@endsection
