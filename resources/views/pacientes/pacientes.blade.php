@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Nacimiento</th>
                <th>Sub delegación</th>
                <th>Enfermedad</th>
                <th>Emergencia</th>
            </tr>
            </thead>
            <tbody>
            @foreach($pacientes as $paciente)
                <tr>
                    <td>{{$paciente->pac_nombre}}</td>
                    <td>{{$paciente->pac_apellidos}}</td>
                    <td>{{$paciente->pac_nacimiento}}</td>
                    <td>{{$paciente->fk_sub_id}}</td>
                    <td>{{$paciente->fk_enf_id}}</td>
                    <td>{{$paciente->fk_eme_id}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
