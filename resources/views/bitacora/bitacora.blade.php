@extends('layouts.app')
@section('content')

    @include('includes.message')
    <h1>Bitacora</h1>

    <div class="card bg-white">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Hora llamada</th>
            <th scope="col">Hora salida</th>
            <th scope="col">Hora llegada</th>
            <th scope="col">Num. Ambulancia</th>
            <th scope="col">Tipo servicio</th>
            <th scope="col">Paciente(null)</th>
            <th scope="col">Detalles</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>9:49 pm</td>
            <td>9:50 pm</td>
            <td>10:05 pm</td>
            <td>044</td>
            <td>Asistencia medica</td>
            <td><a href="#">ver</a></td>
            <td><a href="#">ver</a></td>
        </tr>
        </tbody>
    </table>
    </div>

@endsection
