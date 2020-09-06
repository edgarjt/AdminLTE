@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Fallecidos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <div class="bg-white" style="padding: 15px">
        <table class="table table-hover display" id="myTable">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nacimiento</th>
                <th>Municipio</th>
                <th>Sub delegación</th>
                <th>Enfermedad</th>
                <th>Emergencia</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fallecidos as $fallecido)
                @if($fallecido->pac_estado == 1)
                    <tr>
                        <td>{{$fallecido->pac_nombre}}</td>
                        <td>{{$fallecido->pac_apellidos}}</td>
                        <td>{{$fallecido->pac_nacimiento}}</td>
                        <td>{{$fallecido->subdelegacion->municipio->mun_nombre}}</td>
                        <td>{{$fallecido->subdelegacion->sub_nombre}}</td>
                        <td>{{$fallecido->enfermedad->enf_nombre}}</td>
                        <td>{{$fallecido->emergencia->eme_tipo}}</td>
                        <td><a href="#" class="text-aqua text-crud"><i class="fa fa-edit"></i></a></td>
                        <td><a href="#" class="text-danger text-crud"><i class="fa fa-trash"></i></a></td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
