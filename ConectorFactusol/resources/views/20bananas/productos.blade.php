<x-app-layout>
    <div style="display: flex; width: 100vw; justify-content: center; margin-top: .5rem;">
        <h2>Productos</h2>
    </div>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs">
            <thead>
                <th class="p-6">Referencia</th>
                <th class="p-6">Nombre</th>
                <th class="p-6">Activo</th>
                {{-- <th>Subfamilia</th> --}}
                <th class="p-6">Familia</th>
                <th class="p-6">Precio</th>
                <th class="p-6">Unidad</th>
                <th class="p-6">Unidadsxbulto</th>
                <th class="p-6">Unidadbulto</th>
                <th class="p-6">Unidadsxbulto2</th>
                <th class="p-6">Unidadbulto2</th>
                <th class="p-6">Vendounidad</th>
                <th class="p-6">Vendobulto</th>
                <th class="p-6">Vendobulto2</th>
                <th class="p-6">Descripcion</th>
                <th class="p-6">Tags</th>
                <th class="p-6">Foto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr class="border">
                        <td class="p-6">{{ $record['referencia'] }}</td>
                        <td class="p-6">{{ $record['nombre'] }}</td>
                        <td class="p-6">{{ $record['activo'] }}</td>
                        {{-- <td>{{ $record['subfamilia'] }}</td> --}}
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
</x-app-layout>