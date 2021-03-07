@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Pacientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>
                <a href="{{route('addPacView')}}" class="btn btn-success btn-sm" style="color: white">
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
                <th>Apellidos</th>
                <th>Municipio</th>
                <th>Sub delegación</th>
                <th>Enfermedad</th>
                <th>Emergencia</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pacientes as $paciente)
                @if($paciente->pac_estado == 0)
                <tr>
                    <td>{{$paciente->pac_nombre}}</td>
                    <td>{{$paciente->pac_apellidos}}</td>
                    <td>{{$paciente->subdelegacion->municipio->mun_nombre}}</td>
                    <td>{{$paciente->subdelegacion->sub_nombre}}</td>
                    <td>{{$paciente->enfermedad->enf_nombre}}</td>
                    <td>{{$paciente->emergencia->eme_tipo}}</td>
                    <td>
                        <a href="{{url('editPac/'.$paciente->pac_id)}}" class="text-aqua text-crud">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                    <td>
                        <a href="{{url('deletePac/'.$paciente->pac_id)}}" class="text-danger text-crud" onclick="return confirm('¿Estas seguro de eliminar esste paciente?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
