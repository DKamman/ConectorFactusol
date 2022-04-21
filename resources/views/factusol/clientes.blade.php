<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-lg text-gray-800 leading-tight">Factusol - Clientes</h3>
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
                <a class="ml-4 px-2 py-1 rounded bg-yellow-400 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="{{ route('factusol.clientes.get') }}">FETCH</a>
            </div>
        </div>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">CODCLI</th>
                <th class="p-6 border border-2 border-gray-100">CCOCLI</th>
                <th class="p-6 border border-2 border-gray-100">NIFCLI</th>
                <th class="p-6 border border-2 border-gray-100">NOFCLI</th>
                <th class="p-6 border border-2 border-gray-100">NOCCLI</th>
                <th class="p-6 border border-2 border-gray-100">DOMCLI</th>
                <th class="p-6 border border-2 border-gray-100">POBCLI</th>
                <th class="p-6 border border-2 border-gray-100">CPOCLI</th>
                <th class="p-6 border border-2 border-gray-100">PROCLI</th>
                <th class="p-6 border border-2 border-gray-100">TELCLI</th>
                <th class="p-6 border border-2 border-gray-100">FAXCLI</th>
                <th class="p-6 border border-2 border-gray-100">PCOCLI</th>
                <th class="p-6 border border-2 border-gray-100">AEGCLI</th>
                <th class="p-6 border border-2 border-gray-100">BANCLI</th>
                <th class="p-6 border border-2 border-gray-100">ENTCLI</th>
                <th class="p-6 border border-2 border-gray-100">OFICLI</th>
                <th class="p-6 border border-2 border-gray-100">DCOCLI</th>
                <th class="p-6 border border-2 border-gray-100">CUECLI</th>
                <th class="p-6 border border-2 border-gray-100">FPACLI</th>
                <th class="p-6 border border-2 border-gray-100">FINCLI</th>
                <th class="p-6 border border-2 border-gray-100">PPACLI</th>
                <th class="p-6 border border-2 border-gray-100">TARCLI</th>
                <th class="p-6 border border-2 border-gray-100">DP1CLI</th>
                <th class="p-6 border border-2 border-gray-100">DP2CLI</th>
                <th class="p-6 border border-2 border-gray-100">DP3CLI</th>
                <th class="p-6 border border-2 border-gray-100">TCLCLI</th>
            </thead>
            <tbody>
                @foreach ($response as $client)
                    <tr class="border border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $client->CODCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->CCOCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->NIFCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->NOFCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->NOCCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->DOMCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->POBCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->CPOCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->PROCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->TELCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->FAXCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->PCOCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->AEGCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->BANCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->ENTCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->OFICLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->DCOCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->CUECLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->FPACLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->FINCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->PPACLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->TARCLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->DP1CLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->DP2CLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->DP3CLI }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->TCLCLI }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>