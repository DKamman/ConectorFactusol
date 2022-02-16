<x-app-layout>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto; padding: 1rem;">
        <table class="table-fixed">
            <thead>
                <th>Referencia</th>
                <th>Nombre</th>
                <th>Activo</th>
                {{-- <th>Subfamilia</th> --}}
                <th>Familia</th>
                <th>Precio</th>
                <th>Unidad</th>
                <th>Unidadsxbulto</th>
                <th>Unidadbulto</th>
                <th>Unidadsxbulto2</th>
                <th>Unidadbulto2</th>
                <th>Vendounidad</th>
                <th>Vendobulto</th>
                <th>Vendobulto2</th>
                <th>Descripcion</th>
                <th>Tags</th>
                <th>Foto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr>
                        <td>{{ $record['referencia'] }}</td>
                        <td>{{ $record['nombre'] }}</td>
                        <td>{{ $record['activo'] }}</td>
                        {{-- <td>{{ $record['subfamilia'] }}</td> --}}
                        <td>{{ $record['familia'] }}</td>
                        <td>{{ $record['precio'] }}</td>
                        <td>{{ $record['unidad'] }}</td>
                        <td>{{ $record['unidadesxbulto'] }}</td>
                        <td>{{ $record['unidadbulto'] }}</td>
                        <td>{{ $record['unidadesxbulto2'] }}</td>
                        <td>{{ $record['unidadbulto2'] }}</td>
                        <td>{{ $record['vendounidad'] }}</td>
                        <td>{{ $record['vendobulto'] }}</td>
                        <td>{{ $record['vendobulto2'] }}</td>
                        <td>{{ $record['descripcion'] }}</td>
                        <td>{{ $record['tags'] }}</td>
                        <td>{{ $record['foto'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>