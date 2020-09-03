@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Calle</th>
                <th>Municipio</th>
            </tr>
            </thead>
            <tbody>
            @foreach($subDelegaciones as $subDelegacion)
                <tr>
                    <td>{{$subDelegacion->sub_nombre}}</td>
                    <td>{{$subDelegacion->sub_descripcion}}</td>
                    <td>{{$subDelegacion->sub_calle}}</td>
                    <td>{{$subDelegacion->fk_mun_id}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
