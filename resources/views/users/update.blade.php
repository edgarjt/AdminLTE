@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Actualizar:
            <small>{{$data->name}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

<div class="col-md-6 col-xs-12">

    <form method="post" action="{{route('update')}}">
        @csrf
        <input type="text" name="id" value="{{$data->id}}" class="d-none">
        <div class="form-group">
            <label>Nombre</label>
            <input type="text" name="name" class="form-control" value="{{$data->name}}">

            @error('name')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror

        </div>

        <div class="form-group">
            <label>Apellidos</label>
            <input type="text" name="surname" class="form-control" value="{{$data->surname}}">

            @error('surname')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Correo electronico</label>
            <input type="email" name="email" class="form-control" value="{{$data->email}}">

            @error('email')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Estado</label>
            <select class="form-control" name="state">
                @if($data->state == 0)
                <option value="0" selected>En linea</option>
                <option value="1">Desconectado</option>

                @elseif($data->state == 1)
                    <option value="0">En linea</option>
                    <option value="1" selected>Desconectado</option>
                @endif
            </select>

            @error('state')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="form-group">
            <label>Role</label>
            <select class="form-control" name="role">
                @if($data->role == 0)
                <option value="1">Radio operador</option>
                <option value="0" selected>Administrador</option>

                @elseif($data->role == 1)
                    <option value="1" selected>Radio operador</option>
                    <option value="0">Administrador</option>
                @endif
            </select>

            @error('role')
            <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>


        <button type="submit" class="btn btn-default">Actualizar</button>
    </form>
</div>
@endsection
