@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Pacientes</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    @include('includes.message')

    <div class="bg-white" style="padding: 15px">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th class="bg-primary">Emergencia</th>
                @foreach($reports as $item)
                <th>{{$item->mun_nombre}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($reports as $item)
                <tr class="bg-aqua">
                    <td colspan="{{$item->count() + 1}}">{{$item->eme_tipo}}</td>
                </tr>
                <tr>
                    <td>{{$item->enf_nombre}}</td>
                    @foreach($reports as $enfermedad)
                    <td>{{$enfermedad->num_reg}}</td>
                    @endforeach
                </tr>
            @endforeach


            </tbody>
        </table>
    </div>
@endsection

