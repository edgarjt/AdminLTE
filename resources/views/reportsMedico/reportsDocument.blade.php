<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte medico</title>
    <link rel="stylesheet" href="{{asset('css/reports.css')}}">
</head>
<body>
<div class="container">
    <div class="container-fluid">
        <img src="{{asset('img/logo0.png')}}" alt="" class="logo">
    </div>

    <div class="container-fluid">
        <h3 class="historial">HISTORIAL MEDICO</h3>
        <P class="fecha">Fecha: <span>{{$fecha}}</span></P>
    </div>
    <br>

    <div class="container-fluid">
        <h4>Información del paciente</h4>
        <p><b>Nombre:</b> {{$nombre}}</p>
        <p><b>Apellidos:</b> {{$apellidos}}</p>
        <p><b>Veces atendido(a):</b> {{count($data)}}</p>
    </div>
    <br>

    <div class="container-fluid">
        <h4>Información del responsable</h4>
        <p><b>Nombre:</b> {{Auth::User()->name}}</p>
        <p><b>Apellidos:</b> {{Auth::User()->surname}}</p>
        <p><b>Email:</b> {{Auth::User()->email}}</p>
    </div>
    <br>

    <div class="container-fluid">
        <h4>Historial</h4>
        <br>
        @foreach($data as $item)
            <p><b>Fecha:</b> {{$item->created_at}}</p>
            <p><b>Subdelegación:</b> {{$item->subdelegacion->sub_nombre}}</p>
            <p><b>Enfermedad:</b> {{$item->enfermedad->enf_nombre}}</p>
            <p><b>Tipo de emergencia</b>: {{$item->emergencia->eme_tipo}}</p>
            <p><b>Atendido por:</b> {{$item->paramedico->name}} {{$item->paramedico->surname}}</p>
            <p><b>Email:</b> {{$item->paramedico->email}}</p>
            <br>
            <hr>
            <br>
        @endforeach
    </div>


</div>

</body>
</html>
