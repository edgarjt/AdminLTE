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
                @if($fallecido->pac_estado == 1)
                    <tr>
                        <td>{{$fallecido->pac_nombre}}</td>
                        <td>{{$fallecido->pac_apellidos}}</td>
                        <td>{{$fallecido->pac_nacimiento}}</td>
                        <td>{{$fallecido->subdelegacion->municipio->mun_nombre}}</td>
                        <td>{{$fallecido->subdelegacion->sub_nombre}}</td>
                        <td>{{$fallecido->enfermedad->enf_nombre}}</td>
                        <td>{{$fallecido->emergencia->eme_tipo}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
