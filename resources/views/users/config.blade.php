@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Actualizar:
            <small>Mis datos</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>
    <section class="content bg-white">
        @include('includes.message')
        <div class="row">
            <div class="col-md-12 col-xs-12">
                <form method="post" action="{{route('configSetting')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <input type="text" name="name" class="form-control" value="{{Auth::User()->name}}">

                                @error('name')
                                <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror

                            </div>

                            <div class="form-group">
                                <label>Apellidos</label>
                                <input type="text" name="surname" class="form-control"
                                       value="{{Auth::User()->surname}}">

                                @error('surname')
                                <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Correo electronico</label>
                                <input type="email" name="email" class="form-control" value="{{Auth::User()->email}}">

                                @error('email')
                                <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-default">Actualizar</button>
                        </div>
                        <div class="col-md-6">
                            <div class="m-auto tex-center">
                                @if(Auth::User()->avatar)
                                <img id="avatar-actual" src="{{route('profile', ['filename' =>Auth::User()->avatar])}}" class="avatar" alt="User Image">
                                @else
                                    <img id="avatar-actual" src="{{asset('img/profile.jpg')}}" class="avatar" alt="User Image">
                                @endif
                                <div id="preview"></div>
                            </div>

                            <div class="m-auto tex-center">
                                <span class="avatar d-none">
                                    <input type="file" name="avatar" id="avatar" class="file">
                                </span>

                                <label for="avatar">
                                    <span>Cambiar foto</span>
                                </label>
                            </div>


                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

@endsection
