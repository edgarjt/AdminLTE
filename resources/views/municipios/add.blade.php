@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Agregar:
            <small>Municipio</small>
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
                <form method="post" action="{{route('addMun')}}">
                    @csrf

                    <div class="form-group">
                        <label>Clave</label>
                        <input type="text" name="mun_clave" class="form-control">

                        @error('mun_clave')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Municipio</label>
                        <input type="text" name="mun_nombre" class="form-control">

                        @error('mun_nombre')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Siglas</label>
                        <input type="mun_siglas" name="mun_siglas" class="form-control">

                        @error('mun_siglas')
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
