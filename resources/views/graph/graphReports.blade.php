<table>
    <thead>
    <tr>
        <th><b>Fecha</b></th>
        <th><b>Tipo de servicio</b></th>
        <th><b>Total</b></th>
    </tr>
    </thead>
    <tbody>
    @foreach($data as $item)
    <tr>
        @if($item->dia)
        <td>{{$item->dia}}</td>

        @elseif($item->mes)
        <td>{{$item->mes}}</td>

        @elseif($item->year)
            <td>{{$item->year}}</td>
        @endif

        <td>{{$item->servicio->emergencia}}</td>
        <td>{{$item->total}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
