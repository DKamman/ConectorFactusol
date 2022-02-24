<x-app-layout>
    <div style="display: flex; width: 100vw; justify-content: center; margin-top: .5rem;">
        <h2>Clientes</h2>
    </div>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs" style="min-width: 100%;">
            <thead>
                <th class="p-6 border">CodCliente</th>
                <th class="p-6 border">NombreCliente</th>
                <th class="p-6 border">CodComercial</th>
            </thead>
            <tbody>
                @foreach ($response as $client)
                    <tr class="border">
                        <td class="p-6">{{ $client->codcliente }}</td>
                        <td class="p-6">{{ $client->nombrecliente }}</td>
                        <td class="p-6">{{ $client->codcomercial }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>