<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pedidos - 20 Bananas
        </h2>
    </x-slot>

    @if ($response == "Unauthorized")
    {{$response}}
    @endif

    @if ($response != "Unauthorized")
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs">
            <thead>
                <th class="p-6 border">Idpedido</th>
                <th class="p-6 border">Desdedispositivo</th>
                <th class="p-6 border">Codcliente</th>
                <th class="p-6 border">Nombrecliente</th>
                <th class="p-6 border">Fecha</th>
                <th class="p-6 border">Hora</th>
                <th class="p-6 border">Envioemail</th>
                <th class="p-6 border">Totalimporte</th>
                <th class="p-6 border">Enviado10</th>
                <th class="p-6 border">Servido10</th>
                <th class="p-6 border">IntegradoERP10</th>
                <th class="p-6 border">Codcomercial</th>
                <th class="p-6 border">ClienteParticular</th>
                <th class="p-6 border">Comentarios</th>
                <th class="p-6 border">TafechaEntregags</th>
                <th class="p-6 border">NumpedidoCliente</th>
                <th class="p-6 border">EnviadoPorComercial</th>
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
    @endif
</x-app-layout>