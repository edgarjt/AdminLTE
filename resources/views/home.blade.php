@extends('layouts.app')
@section('content')
    <p class="date-home"><strong>Fecha:</strong> {{\Carbon\Carbon::now()->format('d-M-Y')}}</p>
    <p class="date-home"><strong>Nombre:</strong> {{Auth::User()->name}} {{Auth::User()->surname}}</p>
    <p class="date-home"><strong>Turno:</strong> Vespertino</p>
@endsection

