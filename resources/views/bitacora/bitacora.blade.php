@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Administrar:
            <small>Bitacora</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>
                <a href="{{route('formRecords')}}" class="btn btn-success btn-sm" style="color: white">
                    Nuevo
                    <i class="fa fa-plus"></i>
                </a>
            </li>
        </ol>
    </section>

    @include('includes.message')
    @include('includes.messageError')

    <div class="bg-white" style="padding: 15px">
        <table class="table table-hover display" id="recordsTable">
            <thead>
            <tr>
                <th scope="col">Hora llamada</th>
                <th scope="col">Hora salida</th>
                <th scope="col">Hora llegada</th>
                <th scope="col">Num. Ambulancia</th>
                <th scope="col">Tipo servicio</th>
                <th scope="col">Paciente</th>
                <th scope="col">Detalles</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach(\App\Bitacora::with('servicio')->get() as $bitacora)
            <tr>
                <td>{{$bitacora->hora_llamada}}</td>
                <td>{{$bitacora->hora_salida}}</td>
                <td>{{$bitacora->hora_llegada}}</td>
                <td>{{$bitacora->num_ambulancia}}</td>
                <td>{{$bitacora->servicio->emergencia}}</td>
                @if(is_null($bitacora->nombre_paciente) || is_null($bitacora->apellidos_paciente))
                <td><a href="#" data-toggle="modal" data-target="#detailPacient{{$bitacora->id}}">Sin datos</a></td>
                @else
                    <td><a href="#" data-toggle="modal" data-target="#detailPacient{{$bitacora->id}}">{{$bitacora->nombre_paciente}} {{$bitacora->apellidos_paciente}}</a></td>
                @endif
                <td><a href="#" data-toggle="modal" data-target="#detail{{$bitacora->id}}">ver más</a></td>
                <td><a href="#" class="delete_bitacora" data-id="{{$bitacora->id}}">Borrar</a></td>
            </tr>
            <!-- Modal detail paciente-->
            <div class="modal fade" id="detailPacient{{$bitacora->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="{{asset('img/logo0.png')}}" alt="Logo" width="15%">
                            <h5 class="modal-title">Datos del paciente</h5>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nombre: <strong>{{$bitacora->nombre_paciente}}</strong><strong></strong></li>
                                <li class="list-group-item">Apellidos: <strong>{{$bitacora->apellidos_paciente}}</strong></li>
                                <li class="list-group-item">Edad: <strong>{{$bitacora->edad_paciente}}</strong></li>
                                <li class="list-group-item">Sexo: <strong>{{$bitacora->sexo_paciente}}</strong></li>
                                <li class="list-group-item">Fallecido: <strong>
                                        @if($bitacora->fallecido == 'on')
                                            Si
                                        @else
                                            No
                                        @endif
                                    </strong></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modal detail -->
            <div class="modal fade" id="detail{{$bitacora->id}}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <img src="{{asset('img/logo0.png')}}" alt="Logo" width="15%">
                            <h5 class="modal-title">Detalles</h5>
                        </div>
                        <div class="modal-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Nombre del operador: <strong>{{$bitacora->nombre_operador}}</strong></li>
                                <li class="list-group-item">Nombre del paramedico: <strong>{{$bitacora->nombre_paciente}}</strong></li>
                                <li class="list-group-item">Dirección del servicio: <strong>{{$bitacora->dir_servicio}}</strong></li>
                                <li class="list-group-item">Kilómetro de salida de la base: <strong>{{$bitacora->km_salida_base}}</strong></li>
                                <li class="list-group-item">Kilómetro de llegada a la base: <strong>{{$bitacora->km_llegada_base}}</strong></li>
                                <li class="list-group-item">Folio FRAP: <strong>{{$bitacora->folio_frap}}</strong></li>
                                <li class="list-group-item">Folio C4: <strong>{{$bitacora->folio_c4}}</strong></li>
                                <li class="list-group-item">Teléfono de reporte: <strong>{{$bitacora->tel_reporte}}</strong></li>
                                <li class="list-group-item">Situación de traslado: <strong>{{$bitacora->situacion_traslado}}</strong></li>
                                <li class="list-group-item">Veces atendido: <strong>{{$bitacora->veces_atendido}}</strong></li>
                                <li class="list-group-item">Hora de traslado: <strong>{{$bitacora->hora_traslado}}</strong></li>
                                <li class="list-group-item">Hospital de traslado: <strong>{{$bitacora->hospital_traslado}}</strong></li>
                                <li class="list-group-item">Llegada al hospital: <strong>{{$bitacora->llegada_hospital}}</strong></li>
                                <li class="list-group-item">Llegada a la base: <strong>{{$bitacora->llegada_base}}</strong></li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
