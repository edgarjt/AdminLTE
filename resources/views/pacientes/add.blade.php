@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Agregar:
            <small>Paciente</small>
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
                <form method="post" action="{{route('addPac')}}">
                    @csrf

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="pac_nombre" class="form-control">

                        @error('pac_nombre')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="pac_apellidos" class="form-control">

                        @error('pac_apellidos')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nacimiento</label>
                        <input type="date" name="pac_nacimiento" class="form-control">

                        @error('pac_nacimiento')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Sub delegación</label>
                        <select name="fk_sub_id" class="form-control">
                            @foreach(\App\SubDelegacion::all() as $item)
                                <option value="{{$item->sub_id}}">{{$item->sub_nombre}}</option>
                            @endforeach
                        </select>

                        @error('fk_sub_id')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Enfermedad</label>
                        <select name="fk_enf_id" class="form-control">
                            @foreach(\App\Enfermedad::all() as $item)
                                <option value="{{$item->enf_id}}">{{$item->enf_nombre}}</option>
                            @endforeach
                        </select>

                        @error('fk_enf_id')
                        <span class="invalid-feedback text-danger" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Emergencia</label>
                        <select name="fk_eme_id" class="form-control">
                            @foreach(\App\Emergencia::all() as $item)
                                <option value="{{$item->eme_id}}">{{$item->eme_tipo}}</option>
                            @endforeach
                        </select>

                        @error('fk_eme_id')
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
