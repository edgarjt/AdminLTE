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

        <form method="post" action="{{route('updateSub')}}">
            @csrf
            <input type="text" name="sub_id" value="{{$data->sub_id}}" class="d-none">

            <div class="form-group">
                <label>Delegación</label>
                <input type="text" name="sub_nombre" class="form-control" value="{{$data->sub_nombre}}">

                @error('sub_nombre')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror

            </div>

            <div class="form-group">
                <label>Descripción</label>
                <input type="text" name="sub_descripcion" class="form-control" value="{{$data->sub_descripcion}}">

                @error('sub_descripcion')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Calle</label>
                <input type="text" name="sub_calle" class="form-control" value="{{$data->sub_calle}}">

                @error('sub_calle')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <div class="form-group">
                <label>Municipio</label>
                <input type="text" name="fk_mun_id" class="form-control" value="{{$data->fk_mun_id}}">

                @error('fk_mun_id')
                <span class="invalid-feedback text-danger" role="alert">
                <strong>{{ $message }}</strong>
            </span>
                @enderror
            </div>

            <button type="submit" class="btn btn-default">Actualizar</button>
        </form>
    </div>
@endsection
