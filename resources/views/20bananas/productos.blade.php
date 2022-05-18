<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-lg text-gray-800 leading-tight">20 Bananas - Productos</h3>
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

                <div class="flex">
                    <div class="ml-6">
                        <form action="{{ route('20bananas.productos.get') }}" method="GET">
                            <div class="flex flex-col items-center">
                                <select class="mb-2 text-xs rounded" name="apikey">
                                    @foreach ($credentials as $credential)
                                        <option value="{{ $credential->apikey }}">{{ $credential->name }}</option>
                                    @endforeach
                                </select>
                                <button type="submit" class="w-full text-center px-2 py-1 rounded bg-yellow-400 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300">GET</button>
                            </div>
                        </form>
                    </div>

                    <div class="ml-3">
                        <form id="post_form" action="{{ route('20bananas.productos.post') }}" method="GET">
                            <div class="flex flex-col items-center">
                                <select class="mb-2 text-xs rounded" name="credential">
                                    @foreach ($credentials as $credential)
                                        <option value="{{ $credential->name }}">{{ $credential->name }}</option>
                                    @endforeach
                                </select>
                                <a class="w-full text-center px-2 py-1 rounded bg-red-600 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="#myModal">POST</a>
                            </div>
                        </form>
                    </div>
                </div>

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
                            <p class="text-sm mb-1.5">Are you sure you want to POST the <strong>Productos</strong> data hereby overwriting the current data?</p>
                        </div>
                        <div class="buttons flex justify-end">
                            <button type="submit" form="post_form" class="px-2 py-1 rounded bg-red-600 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="{{ route('20bananas.productos.post') }}">POST</a>
                        </div>
                    </div>
                </div>
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
                <th class="p-6 border border-2 border-gray-100">Referencia</th>
                <th class="p-6 border border-2 border-gray-100">Nombre</th>
                <th class="p-6 border border-2 border-gray-100">Activo</th>
                <th class="p-6 border border-2 border-gray-100">Subfamilia</th>
                <th class="p-6 border border-2 border-gray-100">Familia</th>
                <th class="p-6 border border-2 border-gray-100">Precio</th>
                <th class="p-6 border border-2 border-gray-100">Unidad</th>
                <th class="p-6 border border-2 border-gray-100">Unidadsxbulto</th>
                <th class="p-6 border border-2 border-gray-100">Unidadbulto</th>
                <th class="p-6 border border-2 border-gray-100">Unidadsxbulto2</th>
                <th class="p-6 border border-2 border-gray-100">Unidadbulto2</th>
                <th class="p-6 border border-2 border-gray-100">Vendounidad</th>
                <th class="p-6 border border-2 border-gray-100">Vendobulto</th>
                <th class="p-6 border border-2 border-gray-100">Vendobulto2</th>
                <th class="p-6 border border-2 border-gray-100">Descripcion</th>
                <th class="p-6 border border-2 border-gray-100">Tags</th>
                <th class="p-6 border border-2 border-gray-100">Foto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $record['referencia'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['nombre'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['activo'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['subfamilia'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['familia'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['precio'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['unidad'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['unidadesxbulto'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['unidadbulto'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['unidadesxbulto2'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['unidadbulto2'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['vendounidad'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['vendobulto'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['vendobulto2'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['descripcion'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['tags'] }}</td>
                        <td class="p-6 border border-2 border-gray-100"><img src="{{ $record['foto'] }}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>