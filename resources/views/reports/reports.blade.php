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
{{--        <table class="table table-hover">
            <thead>
            <tr>
                <th>Emergencia</th>
                @foreach($reportes as $item)
                    <th>{{$item->mun_nombre}}</th>
                @endforeach
            </tr>
            </thead>
            <tbody>
            @foreach($reportes as $item)
                <tr>
                    <td style="background: #00b7ff">
                        <strong>{{$item->eme_tipo}}</strong>
                    </td>
                </tr>
                @foreach($reportes as $item)
                    <tr>
                        <td>
                            {{$item->enf_nombre}}
                        </td>
                    </tr>
                    <td>1</td>
                    <td>1</td>
                    <td>1</td>
                @endforeach
            @endforeach

            </tbody>
        </table>--}}

        <table class="table table-hover">
            <thead>
            <tr>
                <th>Enfermedad</th>
                @foreach($reportes as $item)
                    <th>{{$item->mun_nombre}}</th>
                @endforeach
            </tr>
            </thead>

            <tbody>
            {{--Tipos--}}

            @foreach($reportes as $item)
                <tr>
                    <td>
                        <strong>{{$item->eme_tipo}}</strong>
                    </td>
                </tr>

                <td>{{$item->enf_nombre}}</td>
                @foreach($reportes as $item)
                    <td>{{$item->num_reg}}</td>
                @endforeach
            @endforeach




            {{--Fin tipos--}}
            </tbody>
        </table>

    </div>
@endsection

