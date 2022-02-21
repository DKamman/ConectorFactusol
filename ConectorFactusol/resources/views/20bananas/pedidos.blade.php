<x-app-layout>
    <div style="display: flex; width: 100vw; justify-content: center; margin-top: .5rem;">
        <h2>Pedidos</h2>
    </div>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs">
            <thead>
                <th class="p-6">Idpedido</th>
                <th class="p-6">Desdedispositivo</th>
                <th class="p-6">Codcliente</th>
                <th class="p-6">Nombrecliente</th>
                <th class="p-6">Fecha</th>
                <th class="p-6">Hora</th>
                <th class="p-6">Envioemail</th>
                <th class="p-6">Totalimporte</th>
                <th class="p-6">Enviado10</th>
                <th class="p-6">Servido10</th>
                <th class="p-6">IntegradoERP10</th>
                <th class="p-6">Codcomercial</th>
                <th class="p-6">ClienteParticular</th>
                <th class="p-6">Comentarios</th>
                <th class="p-6">TafechaEntregags</th>
                <th class="p-6">NumpedidoCliente</th>
                <th class="p-6">EnviadoPorComercial</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                <tr class="border">
                    <td class="p-6">{{ $record['idpedido'] }}</td>
                    <td class="p-6">{{ $record['desdedispositivo'] }}</td>
                    <td class="p-6">{{ $record['codcliente'] }}</td>
                    <td class="p-6">{{ $record['nombrecliente'] }}</td>
                    <td class="p-6">{{ $record['fecha'] }}</td>
                    <td class="p-6">{{ $record['hora'] }}</td>
                    <td class="p-6">{{ $record['envioemail'] }}</td>
                    <td class="p-6">{{ $record['totalimporte'] }}</td>
                    <td class="p-6">{{ $record['enviado10'] }}</td>
                    <td class="p-6">{{ $record['servido10'] }}</td>
                    <td class="p-6">{{ $record['integradoERP10'] }}</td>
                    <td class="p-6">{{ $record['codcomercial'] }}</td>
                    <td class="p-6">{{ $record['clienteParticular'] }}</td>
                    <td class="p-6">{{ $record['comentarios'] }}</td>
                    {{-- <td class="p-6">{{ $record['tafechaEntregags'] }}</td> --}}
                    <td class="p-6">{{ $record['numpedidoCliente'] }}</td>
                    <td class="p-6">{{ $record['enviadoPorComercial'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>