@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Actualizar:
            <small>{{$data->pac_nombre}} {{$data->pac_apellidos}}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-6 col-sm-1}12">
                <form method="post" action="{{route('updateFal')}}">
                    @csrf
                    <input type="text" name="pac_id" value="{{$data->pac_id}}" class="d-none">

                    <div class="form-group">
                        <label>Nombre</label>
                        <input type="text" name="pac_nombre" class="form-control" value="{{$data->pac_nombre}}">

                        @error('pac_nombre')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Apellidos</label>
                        <input type="text" name="pac_apellidos" class="form-control" value="{{$data->pac_apellidos}}">

                        @error('pac_apellidos')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nacimiento</label>
                        <input type="date" name="pac_nacimiento" class="form-control" value="{{$data->pac_nacimiento}}">

                        @error('pac_nacimiento')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Estado del paciente</label>
                        <select class="form-control" name="pac_estado">
                            <option value="0">Emergencia</option>
                            <option value="1" selected>Muerto</option>
                        </select>

                        @error('pac_estado')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Sub delegacion</label>
                        <select class="form-control" name="fk_sub_id">
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
                        <select class="form-control" name="fk_enf_id">
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
                        <select class="form-control" name="fk_eme_id">
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

                    <button type="submit" class="btn btn-default">Actualizar</button>
                </form>
            </div>
        </div>


    </section>
@endsection
