@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Agregar:
            <small>Sub delegación</small>
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
                <form method="post" action="{{route('addSub')}}">
                    @csrf

                    <div class="form-group">
                        <label>Sub delegación</label>
                        <input type="text" name="sub_nombre" class="form-control">

                        @error('sub_nombre')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Calle</label>
                        <input type="text" name="sub_calle" class="form-control">

                        @error('sub_calle')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Municipio</label>
                        <select name="fk_mun_id" class="form-control">
                            @foreach(\App\Municipio::all() as $item)
                                <option value="{{$item->mun_id}}">{{$item->mun_nombre}}</option>
                            @endforeach
                        </select>

                        @error('fk_mun_id')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Descripción</label>
                        <textarea name="sub_descripcion" class="form-control"></textarea>

                        @error('sub_descripcion')
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
