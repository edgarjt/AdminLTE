@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Documentos:
            <small>Reportes medicos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <div class="bg-white" style="padding: 15px">
        <table class="table table-hover display" id="myTable">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Municipio</th>
                <th>Sub delegación</th>
                <th>Enfermedad</th>
                <th>Emergencia</th>
                <th>Reporte</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pacientes as $paciente)
                @if($paciente->pac_estado == 0)
                    <tr>
                        <td>{{$paciente->pac_clave}}</td>
                        <td>{{$paciente->pac_nombre}}</td>
                        <td>{{$paciente->pac_apellidos}}</td>
                        <td>{{$paciente->subdelegacion->municipio->mun_nombre}}</td>
                        <td>{{$paciente->subdelegacion->sub_nombre}}</td>
                        <td>{{$paciente->enfermedad->enf_nombre}}</td>
                        <td>{{$paciente->emergencia->eme_tipo}}</td>
                        <td class="text-center">
                            <a href="{{url('reportsPaciente/'.$paciente->pac_clave.'/'.$paciente->pac_nombre.'/'.$paciente->pac_apellidos)}}"><i class="fa fa-file-pdf-o"></i></a>
                        </td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
