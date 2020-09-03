@extends('layouts.app')
@section('content')
    @if(Auth::User()->role == 0)
        <h1>Super administrador</h1>
    @else
        <h1>Administrador</h1>
    @endif
@endsection

