@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nacimiento</th>
                <th>Municipio</th>
                <th>Sub delegación</th>
                <th>Enfermedad</th>
                <th>Emergencia</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fallecidos as $fallecido)
                <tr>
                    <td>{{$fallecido->paciente->pac_nombre}}</td>
                    <td>{{$fallecido->paciente->pac_apellidos}}</td>
                    <td>{{$fallecido->paciente->pac_nacimiento}}</td>
                    <td>{{$fallecido->paciente->subdelegacion->municipio->mun_nombre}}</td>
                    <td>{{$fallecido->paciente->subdelegacion->sub_nombre}}</td>
                    <td>{{$fallecido->paciente->enfermedad->enf_nombre}}</td>
                    <td>{{$fallecido->paciente->emergencia->eme_tipo}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
