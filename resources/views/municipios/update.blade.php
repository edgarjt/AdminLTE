@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Actualizar:
            <small>{{$data->mun_nombre}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <div class="col-md-6 col-xs-12">

        <form method="post" action="{{route('updateMun')}}">
            @csrf
            <input type="text" name="mun_id" value="{{$data->mun_id}}" class="d-none">

            <div class="form-group">
                <label>Clave</label>
                <input type="text" name="mun_clave" class="form-control" value="{{$data->mun_clave}}">

                @error('mun_clave')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

            </div>

            <div class="form-group">
                <label>Municipio</label>
                <input type="text" name="mun_nombre" class="form-control" value="{{$data->mun_nombre}}">

                @error('mun_nombre')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Siglas</label>
                <input type="text" name="mun_siglas" class="form-control" value="{{$data->mun_siglas}}">

                @error('mun_siglas')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-default">Actualizar</button>
        </form>
    </div>
@endsection
