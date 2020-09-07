@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Emergerncias</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    @include('includes.message')

    <div class="bg-white" style="padding: 15px">
        <table class="table table-hover display" id="myTable">
            <thead>
            <tr>
                <th>Tipo</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emergencias as $emergencia)
                <tr>
                    <td>{{$emergencia->eme_tipo}}</td>
                    <td>
                        <a href="{{url('editEme/'.$emergencia->eme_id)}}" class="text-aqua text-crud">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('deleteEme/'.$emergencia->eme_id)}}" class="text-danger text-crud" onclick="return confirm('¿Estas seguro de eliminar esta emergencia?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
