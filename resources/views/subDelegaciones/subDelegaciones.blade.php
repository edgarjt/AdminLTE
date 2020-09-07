@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Sub delegaciones</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>
                <a href="{{route('addSubView')}}" class="btn btn-success btn-sm" style="color: white">
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
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Calle</th>
                <th>Municipio</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subDelegaciones as $subDelegacion)
                <tr>
                    <td>{{$subDelegacion->sub_nombre}}</td>
                    <td>{{$subDelegacion->sub_descripcion}}</td>
                    <td>{{$subDelegacion->sub_calle}}</td>
                    <td>{{$subDelegacion->municipio->mun_nombre}}</td>
                    <td>
                        <a href="{{url('editSub/'.$subDelegacion->sub_id)}}" class="text-aqua text-crud">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('deleteSub/'.$subDelegacion->sub_id)}}" class="text-danger text-crud" onclick="return confirm('¿Estas seguro de eliminar esta sub delegación?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
