@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Clave</th>
                <th>Nombre</th>
                <th>Siglas</th>
            </tr>
            </thead>
            <tbody>
            @foreach($municipios as $municipio)
                {{--                @if(Auth::User()->name == $user->name)--}}
                <tr>
                    <td>{{$municipio->mun_clave}}</td>
                    <td>{{$municipio->mun_nombre}}</td>
                    <td>{{$municipio->mun_siglas}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
