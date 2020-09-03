@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Nombre</th>
            </tr>
            </thead>
            <tbody>
            @foreach($enfermedades as $enfermedad)
                <tr>
                    <td>{{$enfermedad->enf_nombre}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
