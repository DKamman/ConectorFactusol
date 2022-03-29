<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Pedidos - 20 Bananas</h2>
            <p class="text-sm">{{ $header['Date'][0] }} - Status: {{ $status }} - Code: {{ $statusCode }}</p>
        </div>
    </x-slot>

    @if ($response == "Unauthorized")
    {{$response}}
    @endif

    @if ($response != "Unauthorized")
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">Idpedido</th>
                <th class="p-6 border border-2 border-gray-100">Desdedispositivo</th>
                <th class="p-6 border border-2 border-gray-100">Codcliente</th>
                <th class="p-6 border border-2 border-gray-100">Nombrecliente</th>
                <th class="p-6 border border-2 border-gray-100">Fecha</th>
                <th class="p-6 border border-2 border-gray-100">Hora</th>
                <th class="p-6 border border-2 border-gray-100">Envioemail</th>
                <th class="p-6 border border-2 border-gray-100">Totalimporte</th>
                <th class="p-6 border border-2 border-gray-100">Enviado10</th>
                <th class="p-6 border border-2 border-gray-100">Servido10</th>
                <th class="p-6 border border-2 border-gray-100">IntegradoERP10</th>
                <th class="p-6 border border-2 border-gray-100">Codcomercial</th>
                <th class="p-6 border border-2 border-gray-100">ClienteParticular</th>
                <th class="p-6 border border-2 border-gray-100">Comentarios</th>
                <th class="p-6 border border-2 border-gray-100">TafechaEntregags</th>
                <th class="p-6 border border-2 border-gray-100">NumpedidoCliente</th>
                <th class="p-6 border border-2 border-gray-100">EnviadoPorComercial</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                    <td class="p-6 border border-2 border-gray-100">{{ $record['idpedido'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['desdedispositivo'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['codcliente'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['nombrecliente'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['fecha'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['hora'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['envioemail'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['totalimporte'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['enviado10'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['servido10'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['integradoERP10'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['codcomercial'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['clienteParticular'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['comentarios'] }}</td>
                    {{-- <td class="p-6">{{ $record['tafechaEntregags'] }}</td> --}}
                    <td class="p-6 border border-2 border-gray-100">{{ $record['numpedidoCliente'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['enviadoPorComercial'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:85vh;">
        <table class="text-xs">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">Idpedido</th>
                <th class="p-6 border border-2 border-gray-100">Desdedispositivo</th>
                <th class="p-6 border border-2 border-gray-100">Codcliente</th>
                <th class="p-6 border border-2 border-gray-100">Nombrecliente</th>
                <th class="p-6 border border-2 border-gray-100">Fecha</th>
                <th class="p-6 border border-2 border-gray-100">Hora</th>
                <th class="p-6 border border-2 border-gray-100">Envioemail</th>
                <th class="p-6 border border-2 border-gray-100">Totalimporte</th>
                <th class="p-6 border border-2 border-gray-100">Enviado10</th>
                <th class="p-6 border border-2 border-gray-100">Servido10</th>
                <th class="p-6 border border-2 border-gray-100">IntegradoERP10</th>
                <th class="p-6 border border-2 border-gray-100">Codcomercial</th>
                <th class="p-6 border border-2 border-gray-100">ClienteParticular</th>
                <th class="p-6 border border-2 border-gray-100">Comentarios</th>
                <th class="p-6 border border-2 border-gray-100">TafechaEntregags</th>
                <th class="p-6 border border-2 border-gray-100">NumpedidoCliente</th>
                <th class="p-6 border border-2 border-gray-100">EnviadoPorComercial</th>
            </thead>
            <tbody>
                {{-- @foreach ($factusol as $records)
                    @foreach ($records as $item)                        
                        <tr class="border">
                            <td class="p-6">{{ $item['dato'] }}</td>
                            <td class="p-6">{{ $item['dato'] }}</td>
                            <td class="p-6">{{ $item['dato'] }}</td>
                            <td class="p-6">{{ $item['dato'] }}</td>
                        </tr>
                    @endforeach
                @endforeach --}}
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>