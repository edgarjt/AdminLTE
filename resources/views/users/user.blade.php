@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Usuarios</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>
                <a href="{{route('addUserView')}}" class="btn btn-success btn-sm" style="color: white">
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
                <th>Apellidos</th>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Estado</th>
                <th>Categoria</th>
                <th>Actualizar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
{{--                @if(Auth::User()->name == $user->name)--}}
                <tr>
                    <td>{{$user->surname}}</td>
                    <td>{{$user->name}}</td>
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
                            Administrador
                        @else
                            Radio operador
                        @endif
                    </td>

                    <td>
                        <a href="{{url('edit/'.$user->id)}}" class="text-aqua text-crud">
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>

                    <td>
                        <a href="{{url('delete/'.$user->id)}}" class="text-danger text-crud" onclick="return confirm('¿Estas seguro de eliminar este usuario?')">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>

                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
