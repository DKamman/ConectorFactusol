<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-lg text-gray-800 leading-tight">20 Bananas - Ofertas</h3>
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
                <a class="ml-4 px-2 py-1 rounded bg-yellow-400 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="{{ route('20bananas.ofertas.get') }}">FETCH</a>
                <a class="ml-2 px-2 py-1 rounded bg-red-600 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="#myModal">POST</a>

                {{-- Modal --}}
                <div id="myModal" class="my-modal">
                    <div class="my-modal-contents">
                        <div class="title flex items-center justify-between pb-2 mb-2.5">
                            <div class="title-content flex items-baseline">
                                <h3 class="text-lg font-bold">POST</h3>
                                <span class="text-sm ml-1">to 20 Bananas</span>
                            </div>
                            <a href="#">
                                <svg xmlns="http://www.w3.org/2000/svg" class="jrtoastpop_xclose" width="24" height="24" viewBox="0 0 24 24">
                                    <path fill="#666" d="M23.954 21.03l-9.184-9.095 9.092-9.174-2.832-2.807-9.09 9.179-9.176-9.088-2.81 2.81 9.186 9.105-9.095 9.184 2.81 2.81 9.112-9.192 9.18 9.1z"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="content">
                            <p class="text-sm mb-1.5">Are you sure you want to POST the <strong>Clientes</strong> data hereby overwriting the current data?</p>
                        </div>
                        <div class="buttons flex justify-end">
                            <a class="px-2 py-1 rounded bg-red-600 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="{{ route('20bananas.ofertas.post') }}">POST</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mt-3 flex justify-center">
            <div class="bg-green-400 rounded p-2" role="alert">
                <span class="text-white">{{ session('success') }}</span>
                {{-- Implemented on later iteration --}}
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mt-3 flex justify-center">
            <div class="bg-red-400 rounded p-2" role="alert">
                <span class="text-white">{{ session('error') }}</span>
                {{-- Implemented on later iteration --}}
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
        </div>
    @endif

    @if ($response == "Unauthorized")
        {{$response}}
    @endif

    @if ($response != "Unauthorized")
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                {{-- <th class="p-6 border border-2 border-gray-100">Activo</th> --}}
                <th class="p-6 border border-2 border-gray-100">Esoferta</th>
                <th class="p-6 border border-2 border-gray-100">Referencia</th>
                <th class="p-6 border border-2 border-gray-100">Codcliente</th>
                <th class="p-6 border border-2 border-gray-100">Codtarifa</th>
                <th class="p-6 border border-2 border-gray-100">Preciofijo</th>
                <th class="p-6 border border-2 border-gray-100">Porcentajedesc</th>
                <th class="p-6 border border-2 border-gray-100">Porcada</th>
                <th class="p-6 border border-2 border-gray-100">Tipopromocion</th>
                <th class="p-6 border border-2 border-gray-100">Unisgratis</th>
                <th class="p-6 border border-2 border-gray-100">Referenciagratis</th>
                <th class="p-6 border border-2 border-gray-100">Fechainicio</th>
                <th class="p-6 border border-2 border-gray-100">Fechafin</th>
            </thead>
            <tbody>
                @foreach ($response as $oferta)
                    <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        {{-- <td class="p-6 border border-2 border-gray-100">{{ $oferta->activo }}</td> --}}
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->esoferta }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->referencia }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->codcliente }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->codtarifa }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->preciofijo }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->porcentajedesc }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->porcada }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->tipopromocion }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->unisgratis }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->referenciagratis }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->fechainicio }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->fechafin }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>