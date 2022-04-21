<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">20 Bananas - Pedidos</h2>
            <div class="flex items-center">
                @if ($header)
                    <p class="text-sm mr-3">{{ $header->created_at->diffForHumans() }}</p>
                    <div class="divider bg-black w-px h-3"></div>
                    <p class="text-sm ml-3 mr-3">Status: 
                        @if($header->status == "OK")
                            <strong class="text-green-400">✓</strong>
                        @elseif($header->status == "Bad Request")
                            <strong class="text-red-600">{{ $header->status }}</strong>
                        @else
                            <strong class="text-red-600">⨯</strong>
                        @endif
                    </p>
                    <div class="divider bg-black w-px h-3"></div>
                    <p class="text-sm ml-3">
                        Code: 
                            @if($statusCode >= 400)
                                <strong class="text-red-600">{{ $statusCode }}</strong>                            
                            @elseif($statusCode >= 300)
                                <strong class="text-yellow-400">{{ $statusCode }}</strong>
                            @elseif($statusCode >= 200)
                                <strong class="text-green-400">{{ $statusCode }}</strong>
                            @else
                                <strong class="text-blue-600">{{ $statusCode }}</strong>
                            @endif
                    </p>
                @endif
                <form class="flex items-center ml-5" action="{{ route('20bananas.pedidos.getdebug') }}" method="GET">
                    <label class="text-sm" for="date">Date of Pedidos:</label>
                    <input class="text-xs appearance-none border rounded ml-3 py-1.5 px-3 text-gray-700 leading-tight" type="date" name="date">
                    <button type="submit" class="ml-4 px-2 py-1 rounded bg-yellow-400 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300">FETCH</button>
                </form>
            </div>
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
                <th class="p-6 border border-2 border-gray-100">fechaEntrega</th>
                <th class="p-6 border border-2 border-gray-100">NumpedidoCliente</th>
                <th class="p-6 border border-2 border-gray-100">rutaReparto</th>
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
                    <td class="p-6 border border-2 border-gray-100">{{ $record['fechaEntrega'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['numpedidoCliente'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['rutaReparto'] }}</td>
                    <td class="p-6 border border-2 border-gray-100">{{ $record['enviadoPorComercial'] }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>