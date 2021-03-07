@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Reportes:
            <small>filtrado</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('home')}}">
                    <i class="fa fa-dashboard"></i>
                    Inicio
                </a>
            </li>
        </ol>
    </section>

    <div class="row">
        <div class="col-md-3">
            <select class="form-control" id="sub_delegacion">
                @foreach($sub_delegacion as $item)
                    <option value="{{$item->sub_id}}">
                        {{$item->sub_nombre}}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-3">
            <select class="form-control" id="emergencia">
                <option value="">Selecciona emergencia</option>
                @foreach($emergencia as $item)
                    <option value="{{$item->eme_id}}">
                        {{$item->eme_tipo}}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-3">
            <select class="form-control" id="enfermedad">
                <option value="">Selecciona enfermedad</option>
                @foreach($enfermedad as $item)
                    <option value="{{$item->enf_id}}">
                        {{$item->enf_nombre}}
                    </option>
                @endforeach
            </select>
        </div>

            <button class="btn btn-primary" id="filter">
                Filtrar
            </button>

    </div>

    @include('includes.message')

    <div>
        <h3>Total: <strong id="total">0</strong></h3>
    </div>

    <div style="text-align: center" class="d-none load">
        <img src="{{asset('img/load.gif')}}" alt="Load" width="30">
    </div>

    <div id="table" class="bg-white" style="margin-top: 20px">
    </div>


@endsection

