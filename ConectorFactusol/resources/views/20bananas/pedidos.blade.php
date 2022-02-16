<x-app-layout>
    <table>
        <thead>
            <th>Idpedido</th>
            <th>Desdedispositivo</th>
            <th>Codcliente</th>
            <th>Nombrecliente</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Envioemail</th>
            <th>Totalimporte</th>
            <th>Enviado10</th>
            <th>Servido10</th>
            <th>IntegradoERP10</th>
            <th>Codcomercial</th>
            <th>ClienteParticular</th>
            <th>Comentarios</th>
            <th>TafechaEntregags</th>
            <th>NumpedidoCliente</th>
            <th>EnviadoPorComercial</th>
        </thead>
        <tbody>
            @foreach ($response as $record)
            <tr>
                <td>{{ $record['Idpedido'] }}</td>
                <td>{{ $record['Desdedispositivo'] }}</td>
                <td>{{ $record['Codcliente'] }}</td>
                <td>{{ $record['Nombrecliente'] }}</td>
                <td>{{ $record['Fecha'] }}</td>
                <td>{{ $record['Hora'] }}</td>
                <td>{{ $record['Envioemail'] }}</td>
                <td>{{ $record['Totalimporte'] }}</td>
                <td>{{ $record['Enviado10'] }}</td>
                <td>{{ $record['Servido10'] }}</td>
                <td>{{ $record['IntegradoERP10'] }}</td>
                <td>{{ $record['Codcomercial'] }}</td>
                <td>{{ $record['ClienteParticular'] }}</td>
                <td>{{ $record['Comentarios'] }}</td>
                <td>{{ $record['TafechaEntregags'] }}</td>
                <td>{{ $record['NumpedidoCliente'] }}</td>
                <td>{{ $record['EnviadoPorComercial'] }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>