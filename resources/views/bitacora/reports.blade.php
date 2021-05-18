<table>
    <thead>
    <tr>
        <th scope="col"><b>Hora llamada</b></th>
        <th scope="col"><b>Hora salida</b></th>
        <th scope="col"><b>Hora llegada</b></th>
        <th scope="col"><b>Num. Ambulancia</b></th>
        <th scope="col"><b>Tipo servicio</b></th>
        <th scope="col"><b>Sub delegación</b></th>
        <th scope="col"><b>Nombre</b></th>
        <th scope="col"><b>Apellidos</b></th>
        <th scope="col"><b>Edad</b></th>
        <th scope="col"><b>Sexo</b></th>
        <th scope="col"><b>Fallecido</b></th>
        <th scope="col"><b>Nombre del operador</b></th>
        <th scope="col"><b>Nombre del paramedico</b></th>
        <th scope="col"><b>Dirección del servicio</b></th>
        <th scope="col"><b>Kilómetro de salida de la base</b></th>
        <th scope="col"><b>Kilómetro de llegada a la base</b></th>
        <th scope="col"><b>Folio FRAP</b></th>
        <th scope="col"><b>Folio C4</b></th>
        <th scope="col"><b>Teléfono de reporte</b></th>
        <th scope="col"><b>Situación de traslado</b></th>
        <th scope="col"><b>Veces atendido</b></th>
        <th scope="col"><b>Hora de traslado</b></th>
        <th scope="col"><b>Hospital de traslado</b></th>
        <th scope="col"><b>Llegada al hospital</b></th>
        <th scope="col"><b>Llegada a la base</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $bitacora)
        <tr>
            <td>{{$bitacora->hora_llamada}}</td>
            <td>{{$bitacora->hora_salida}}</td>
            <td>{{$bitacora->hora_llegada}}</td>
            <td>{{$bitacora->num_ambulancia}}</td>
            <td>{{$bitacora->servicio->emergencia}}</td>
            <td>{{$bitacora->subdelegacion->nombre}}</td>
            <td>{{$bitacora->nombre_paciente}}</td>
            <td>{{$bitacora->apellidos_paciente}}</td>
            <td>{{$bitacora->edad_paciente}}</td>
            <td>{{$bitacora->sexo_paciente}}</td>
            <td>
                @if($bitacora->fallecido == 'on')
                    Si
                @else
                    No
                @endif
            </td>
            <td>{{$bitacora->nombre_operador}}</td>
            <td>{{$bitacora->nombre_paramedico}}</td>
            <td>{{$bitacora->dir_servicio}}</td>
            <td>{{$bitacora->km_salida_base}}</td>
            <td>{{$bitacora->km_llegada_base}}</td>
            <td>{{$bitacora->folio_frap}}</td>
            <td>{{$bitacora->folio_c4}}</td>
            <td>{{$bitacora->tel_reporte}}</td>
            <td>{{$bitacora->situacion_traslado}}</td>
            <td>{{$bitacora->veces_atendido}}</td>
            <td>{{$bitacora->hora_traslado}}</td>
            <td>{{$bitacora->hospital_traslado}}</td>
            <td>{{$bitacora->llegada_hospital}}</td>
            <td>{{$bitacora->llegada_base}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
