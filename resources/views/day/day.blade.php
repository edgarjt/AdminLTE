@extends('layouts.app')
@section('content')
    <section class="content-header">
        <h1>
            Estadísticas:
            <small>Dias</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Gráfica</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove">
                                <i class="fa fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <div class="form-group form-group-sm">
                                <div class="form-inline">
                                    <select class="form-control" id="select-day">
                                        @foreach($subdelegaciones as $subdelegacion)
                                            <option value="{{$subdelegacion->sub_id}}">
                                                {{$subdelegacion->sub_nombre}}
                                            </option>
                                        @endforeach
                                    </select>

                                    <input type="date" class="form-control" id="fecha_1">
                                    -
                                    <input type="date" class="form-control" id="fecha_2">

                                    <select class="form-control" id="type-graph">
                                        <option value="bar">Barra</option>
                                        <option value="doughnut">Pastel</option>
                                        <option value="polarArea">Area polar</option>
                                    </select>

                                    <button class="btn btn-default btn-sm" id="graphDay">Generar</button>
                                </div>

                            </div>

                            <div style="text-align: center" class="d-none load">
                                <img src="{{asset('img/load.gif')}}" alt="Load" width="30">
                            </div>
                            <div id="registros-emergencias"></div>

                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
        </div>
    </section>
@endsection

