@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-md-6"><canvas id="barDay"></canvas></div>
    <div class="col-md-6"><canvas id="doughDay"></canvas></div>
    <div class="col-md-6"><canvas id="lineDay"></canvas></div>
    <div class="col-md-6"><canvas id="polarDay"></canvas></div>
    <h1></h1>
</div>


    <script>
        var test = [{{$test}}, 19, 3, 5, 2, 3];
    </script>
@endsection

