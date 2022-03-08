<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos - 20 Bananas
        </h2>
    </x-slot>

    @if ($response == "Unauthorized")
    {{$response}}
    @endif

    @if ($response != "Unauthorized")
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:80vh;">
        <table class="text-xs w-full">
            <thead class="bg-grey-200">
                <th class="p-6 border">Referencia</th>
                <th class="p-6 border">Nombre</th>
                <th class="p-6 border">Activo</th>
                <th class="p-6 border">Subfamilia</th>
                <th class="p-6 border">Familia</th>
                <th class="p-6 border">Precio</th>
                <th class="p-6 border">Unidad</th>
                <th class="p-6 border">Unidadsxbulto</th>
                <th class="p-6 border">Unidadbulto</th>
                <th class="p-6 border">Unidadsxbulto2</th>
                <th class="p-6 border">Unidadbulto2</th>
                <th class="p-6 border">Vendounidad</th>
                <th class="p-6 border">Vendobulto</th>
                <th class="p-6 border">Vendobulto2</th>
                <th class="p-6 border">Descripcion</th>
                <th class="p-6 border">Tags</th>
                <th class="p-6 border">Foto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr class="border">
                        <td class="p-6">{{ $record['referencia'] }}</td>
                        <td class="p-6">{{ $record['nombre'] }}</td>
                        <td class="p-6">{{ $record['activo'] }}</td>
                        <td class="p-6">{{ $record['subfamilia'] }}</td>
                        <td class="p-6">{{ $record['familia'] }}</td>
                        <td class="p-6">{{ $record['precio'] }}</td>
                        <td class="p-6">{{ $record['unidad'] }}</td>
                        <td class="p-6">{{ $record['unidadesxbulto'] }}</td>
                        <td class="p-6">{{ $record['unidadbulto'] }}</td>
                        <td class="p-6">{{ $record['unidadesxbulto2'] }}</td>
                        <td class="p-6">{{ $record['unidadbulto2'] }}</td>
                        <td class="p-6">{{ $record['vendounidad'] }}</td>
                        <td class="p-6">{{ $record['vendobulto'] }}</td>
                        <td class="p-6">{{ $record['vendobulto2'] }}</td>
                        <td class="p-6">{{ $record['descripcion'] }}</td>
                        <td class="p-6">{{ $record['tags'] }}</td>
                        <td class="p-6"><img src="{{ $record['foto'] }}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>