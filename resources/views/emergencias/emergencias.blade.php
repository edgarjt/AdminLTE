@extends('layouts.app')
@section('content')
    <div class="bg-white">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>Tipo</th>
            </tr>
            </thead>
            <tbody>
            @foreach($emergencias as $emergencia)
                <tr>
                    <td>{{$emergencia->eme_tipo}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
