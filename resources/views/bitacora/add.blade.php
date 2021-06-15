@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Agregar:
            <small>Bitacora</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a>
            </li>
        </ol>
    </section>

    {{--<section class="content bg-white">
        <div class="row">
            <div class="col-md-6">
                <form method="post" action="{{route('addRecords')}}">
                    @csrf

                    <div class="form-group">
                        <label>Hora de la llamada</label>
                        <input type="time" name="hora_llamada" class="form-control">

                        @error('hora_llamada')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Hora en la que salio la ambulancia</label>
                        <input type="time" name="hora_salida" class="form-control">

                        @error('hora_salida')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Hora que llego la ambulancia</label>
                        <input type="time" name="hora_llegada" class="form-control">

                        @error('hora_llegada')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Número de la ambulancia</label>
                        <input type="text" name="num_ambulancia" class="form-control">

                        @error('num_ambulancia')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Tipo de servicio</label>
                        <select class="form-control" name="tip_servicio">
                            @foreach(\App\ClaveServicio::all() as $item)
                            <option value="{{$item->id}}" selected>{{$item->code}}</option>
                            @endforeach
                        </select>

                        @error('tip_servicio')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Sub delegación</label>
                        <select class="form-control" name="delegacion">
                            @foreach(\App\Delegacion::all() as $item)
                                <option value="{{$item->id}}" selected>{{$item->nombre}}</option>
                            @endforeach
                        </select>

                        @error('delegacion')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    --}}{{--Paciente--}}{{--

                    <div class="form-group">
                        <label>¿El paciente fallecio?</label>
                        <input type="checkbox" name="fallecido" class="check_input">
                    </div>

                    <div class="form-group">
                        <label>¿Registrar datos del paciente?</label>
                        <input type="checkbox" id="check_paciente" class="check_input">
                    </div>

                    <div class="d-none" id="cont-form-paciente">

                        <div class="alert d-none alert-register" role="alert" id="alert-register">
                        </div>

                    <div class="form-group">
                        <label>Nombre del paciente</label>
                        <input type="text" name="nombre_paciente" class="form-control name_pac" id="search_name">

                        @error('nombre_paciente')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Apellidos del paciente</label>
                        <input type="text" name="apellidos_paciente" class="form-control surname_pac" id="search_surname">

                        @error('apellidos_paciente')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Edad del paciente</label>
                        <input type="text" name="edad_paciente" class="form-control">

                        @error('edad_paciente')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Sexo del paciente</label>
                        <select class="form-control" name="sexo_paciente">
                            <option value="Femenino" selected>Femenino</option>
                            <option value="Masculino">Masculino</option>
                        </select>

                        @error('sexo_paciente')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>
                    </div>


                    --}}{{--Si se requiere traslado activar esta sección--}}{{--
                    <div class="form-group">
                        <label>¿Se requiere traslado?</label>
                        <input type="checkbox" id="check_traslado" class="check_input">
                    </div>

                    <div class="d-none" id="cont-form-traslado">

                    <div class="form-group">
                        <label>Hora de trasalado</label>
                        <input type="time" name="hora_traslado" class="form-control">

                        @error('hora_traslado')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Hospital de traslado</label>
                        <input type="text" name="hospital_traslado" class="form-control">

                        @error('hospital_traslado')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Hora de llegada al hospital</label>
                        <input type="time" name="llegada_hospital" class="form-control">

                        @error('llegada_hospital')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Hora de llegada a la base</label>
                        <input type="time" name="llegada_base" class="form-control">

                        @error('llegada_base')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    </div>

                    --}}{{--Detalles--}}{{--

                    <div class="form-group">
                        <label>Nombre y apellidos del operador</label>
                        <input type="text" name="nombre_operador" class="form-control">

                        @error('nombre_operador')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Nombre y apellidos del paramedico</label>
                        <input type="text" name="nombre_paramedico" class="form-control">

                        @error('nombre_paramedico')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Dirección del servicio</label>
                        <input type="text" name="dir_servicio" class="form-control">

                        @error('dir_servicio')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kilómetro de salida de la base</label>
                        <input type="text" name="km_salida_base" class="form-control">

                        @error('km_salida_base')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Kilómetro de llegada a la base</label>
                        <input type="text" name="km_llegada_base" class="form-control">

                        @error('km_llegada_base')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Folio FRAP</label>
                        <input type="text" name="folio_frap" class="form-control">

                        @error('folio_frap')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Folio C4</label>
                        <input type="text" name="folio_c4" class="form-control">

                        @error('folio_c4')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Teléfono de reporte</label>
                        <input type="text" name="tel_reporte" class="form-control">

                        @error('tel_reporte')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Situación de traslado</label>
                        <input type="text" name="situacion_traslado" class="form-control">

                        @error('situacion_traslado')
                        <span class="invalid-feedback text-danger" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-default btnda">Guardar</button>

                </form>
            </div>
        </div>
    </section>--}}

    <section class="content bg-white mb-4">
        <h4>Paciente
            <img class="" id="not-register_pac" src="{{asset('img/cancelar.png')}}" alt="not-logo" width="30">
            <img class="d-none" id="register_pac" src="{{asset('img/comprobado.png')}}" alt="not-logo" width="30">
        </h4>
        <h5 id="warnig-pac"></h5>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre(s)</label>
                    <input type="text" class="form-control" id="pac_nombre">
                </div>
                <div class="form-group col-md-6">
                    <label>Apellidos</label>
                    <input type="text" class="form-control" id="pac_apellidos">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Edad</label>
                    <input type="text" class="form-control" id="pac_edad">
                </div>

                <div class="form-group col-md-6">
                    <label for="inputState">Sexo</label>
                    <select id="inputState" class="form-control pac_sexo">
                        <option selected>Mujer</option>
                        <option>Hombre</option>
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <input class="form-check-input" type="checkbox" id="fallecidoCheck">
                    <label class="form-check-label" for="fallecidoCheck">
                        Fallecido
                    </label>
                </div>
                <div class="form-group col-md-12">
                    <input class="form-check-input" type="checkbox" id="trasladoCheck">
                    <label class="form-check-label" for="trasladoCheck">
                        Se requiere traslado
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" id="addPaciente">Guardar y continuar</button>
    </section>

    <section class="content bg-white mb-4 d-none" id="cont-form-traslado">
        <h4>Traslado
            <img class="" id="not-register_tras" src="{{asset('img/cancelar.png')}}" alt="not-logo" width="30">
            <img class="d-none" id="register_tras" src="{{asset('img/comprobado.png')}}" alt="not-logo" width="30">
        </h4>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Hora de la llamada</label>
                    <input type="time" class="form-control" id="bit_hora_llamada">
                </div>
                <div class="form-group col-md-3">
                    <label>Hora de salida</label>
                    <input type="time" class="form-control" id="bit_hora_salida">
                </div>
                <div class="form-group col-md-3">
                    <label>Hora de llegada</label>
                    <input type="time" class="form-control" id="bit_hora_llegada">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Hospital de traslado</label>
                    <select id="inputState" class="form-control hos_fk_id">
                        @foreach(\App\Hospital::all() as $item)
                            <option value="{{$item->hos_id}}">{{$item->hos_nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-3">
                    <label>Numero de ambulancia</label>
                    <input type="number" class="form-control" id="bit_num_ambulancia">
                </div>

                <div class="form-group col-md-3">
                    <label for="inputState">Hora de traslado</label>
                    <input type="time" class="form-control" id="bit_hora_traslado">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Hora de llegada al hospital</label>
                    <input type="time" class="form-control" id="bit_llegada_hospital">
                </div>
                <div class="form-group col-md-3">
                    <label for="inputState">Hora de llegada a la base</label>
                    <input type="time" class="form-control" id="bit_llegada_base">
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="addTraslado" disabled>Guardar y continuar</button>
    </section>

    <section class="content bg-white mb-4">
        <h4>Operador y detalles
            <img class="" id="not-register_ope" src="{{asset('img/cancelar.png')}}" alt="not-logo" width="30">
            <img class="d-none" id="register_ope" src="{{asset('img/comprobado.png')}}" alt="not-logo" width="30">
        </h4>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Nombre del operador</label>
                    <input type="text" class="form-control" id="bit_nombre_operador">
                </div>
                <div class="form-group col-md-6">
                    <label>Nombre del paramedico</label>
                    <input type="text" class="form-control" id="bit_nombre_paramedico">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Dirección de servicio</label>
                    <input type="text" class="form-control" id="bit_dir_servicio">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Kilometro de salida de la base</label>
                    <input type="text" class="form-control" id="bit_km_salida_base">
                </div>
                <div class="form-group col-md-6">
                    <label>Kilometro de llegada a la base</label>
                    <input type="text" class="form-control" id="bit_km_llegada_base">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Folio frap</label>
                    <input type="text" class="form-control" id="bit_folio_frap">
                </div>
                <div class="form-group col-md-4">
                    <label>Folio C4</label>
                    <input type="text" class="form-control" id="bit_folio_c4">
                </div>
                <div class="form-group col-md-4">
                    <label>Teléfono de reporte</label>
                    <input type="text" class="form-control" id="bit_tel_reporte">
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label>Tipo de servicio</label>
                    <select id="inputState" class="form-control tip_servicio_fk_id">
                        @foreach(\App\ClaveServicio::all() as $item)
                        <option value="{{$item->cla_id}}">{{$item->cla_code}} - {{$item->cla_emergencia}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Delegación</label>
                    <select id="inputState" class="form-control delegacion_fk_id">
                        @foreach(\App\Delegacion::all() as $item)
                        <option value="{{$item->del_id}}">{{$item->del_nombre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-12">
                    <label>Situación de traslado</label>
                    <textarea class="form-control" id="bit_situacion_traslado"></textarea>
                </div>
            </div>

            <button type="submit" class="btn btn-primary" id="addOperador" disabled>Guardar</button>
    </section>

@endsection
