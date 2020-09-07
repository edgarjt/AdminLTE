@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Actualizar:
            <small>{{$data->enf_nombre}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <div class="col-md-6 col-xs-12">

        <form method="post" action="{{route('updateEnf')}}">
            @csrf
            <input type="text" name="enf_id" value="{{$data->enf_id}}" class="d-none">

            <div class="form-group">
                <label>Enfermedad</label>
                <input type="text" name="enf_nombre" class="form-control" value="{{$data->enf_nombre}}">

                @error('enf_nombre')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

            </div>

            <button type="submit" class="btn btn-default">Actualizar</button>
        </form>
    </div>
@endsection
