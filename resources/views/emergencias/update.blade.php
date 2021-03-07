@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Actualizar:
            <small>{{$data->eme_nombre}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <div class="col-md-6 col-xs-12">

        <form method="post" action="{{route('updateEme')}}">
            @csrf
            <input type="text" name="eme_id" value="{{$data->eme_id}}" class="d-none">

            <div class="form-group">
                <label>Tipo emergencia</label>
                <input type="text" name="eme_tipo" class="form-control" value="{{$data->eme_tipo}}">

                @error('eme_tipo')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

            </div>

            <button type="submit" class="btn btn-default">Actualizar</button>
        </form>
    </div>
@endsection
