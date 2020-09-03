@extends('layouts.app')
@section('content')
    @if(Auth::User()->role == 0)
        <h1>Administrador</h1>
    @else
        <h1>Radio operador</h1>
    @endif
@endsection

