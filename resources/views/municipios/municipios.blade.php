@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Municipios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>
                <a href="{{route('addMunView')}}" class="btn btn-success btn-sm" style="color: white">
                    Nuevo
                    <i class="fa fa-plus"></i>
                </a>
            </li>
        </ol>
    </section>

    @include('includes.message')

    <div class="bg-white" style="padding: 15px">
        <table class="table table-hover display" id="myTable">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Siglas</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($municipios as $municipio)
                {{--                @if(Auth::User()->name == $user->name)--}}
                <tr>
                    <td>{{$municipio->mun_clave}}</td>
                    <td>{{$municipio->mun_nombre}}</td>
                    <td>{{$municipio->mun_siglas}}</td>
                    <td><a href="{{url('editMun/'.$municipio->mun_id)}}" class="text-aqua text-crud"><i class="fa fa-edit"></i></a></td>
                    <td>
                        <a href="{{url('deleteMun/'.$municipio->mun_id)}}" class="text-danger text-crud" onclick="return confirm('¿Estas seguro de eliminar este municipio?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
