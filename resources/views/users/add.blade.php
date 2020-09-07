@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Agregar:
            <small>Usuario</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a>
            </li>
        </ol>
    </section>

    <section class="content bg-white">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('addUser')}}">
                    @csrf

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="name" class="form-control">

                        @error('name')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="surname" class="form-control">

                        @error('surname')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Correo electronico</label>
                        <input type="email" name="email" class="form-control">

                        @error('email')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Contraseña</label>
                        <input type="password" name="password" class="form-control">

                        @error('password')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Categoria</label>
                        <select class="form-control" name="role">
                            <option value="1" selected>Radio operador</option>
                            <option value="0">Administrador</option>
                        </select>

                        @error('role')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-default btnda">Guardar</button>

                </form>
            </div>
        </div>
    </section>

@endsection
