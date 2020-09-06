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
            @foreach($pacientes as $paciente)
                @if($paciente->pac_estado == 0)
                <tr>
                    <td>{{$paciente->pac_nombre}}</td>
                    <td>{{$paciente->pac_apellidos}}</td>
                    <td>{{$paciente->pac_nacimiento}}</td>
                    <td>{{$paciente->subdelegacion->municipio->mun_nombre}}</td>
                    <td>{{$paciente->subdelegacion->sub_nombre}}</td>
                    <td>{{$paciente->enfermedad->enf_nombre}}</td>
                    <td>{{$paciente->emergencia->eme_tipo}}</td>
                </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
