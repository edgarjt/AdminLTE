@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Agregar:
            <small>Enfermedad</small>
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
                <form method="post" action="{{route('addEnf')}}">
                    @csrf

                    <div class="form-group">
                        <label>Enfermedad</label>
                        <input type="text" name="enf_nombre" class="form-control">

                        @error('enf_nombre')
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
