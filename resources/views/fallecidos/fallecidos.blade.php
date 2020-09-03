@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Paciente</th>
            </tr>
            </thead>
            <tbody>
            @foreach($fallecidos as $fallecido)
                <tr>
                    <td>{{$fallecido->fk_pac_id}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
