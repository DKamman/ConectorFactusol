<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Productos - 20 Bananas</h2>
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