<x-app-layout>
    <div style="display: flex; width: 100vw; justify-content: center; margin-top: .5rem;">
        <h2>Clientes</h2>
    </div>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs">
            <thead>
                @foreach ($response[0] as $head)
                    <th class="p-6">{{ $head['columna'] }}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($response as $clients)
                    <tr class="borders">
                        @foreach ($clients as $client)
                            <td class="p-6">{{ $client['dato'] }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>