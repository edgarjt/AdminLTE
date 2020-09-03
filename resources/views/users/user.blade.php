@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Categoria</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
{{--                @if(Auth::User()->name == $user->name)--}}
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->state == 0)
                            <span><i class="fa fa-circle text-success"></i> En linea</span>
                        @else
                            <span><i class="fa fa-circle text-danger"></i> Desconectado</span>
                        @endif
                    </td>
                    <td>
                        @if($user->role == 0)
                            Super administrador
                        @else
                            Administrador
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
