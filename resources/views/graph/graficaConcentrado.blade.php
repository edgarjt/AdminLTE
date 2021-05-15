@extends('layouts.app')
@section('content')
    <section class="content-header" style="margin-bottom: 15px">
        <h1>
            Estadísticas:
            <small>Gráficas y concentrado</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        </ol>
    </section>


    <div class="bg-white" style="padding: 15px">
        <div class="d-flex align-items-start container-fluid">
            <select class="custom-select" id="service">
                <option value="1" selected>Servicios</option>
                <option value="2">servicio por delegaciones</option>
            </select>

            <select class="custom-select" id="action">
                <option value="day" selected>Día</option>
                <option value="month">Mensual</option>
                <option value="twoMonth">Bimestral</option>
                <option value="year">Anual</option>
            </select>

            <input type="date" class="input-graph" id="dateOne">
            <input type="number" class="input-graph d-none" id="year"   placeholder="Digite el año">

            <button class="btn btn-danger btn-sm" id="graph">Gráficar</button>
        </div>

        <div class="graphDay"></div>
    </div>
@endsection

