<x-app-layout>
    <div style="display: flex; width: 100vw; justify-content: center; margin-top: .5rem;">
        <h2>Clientes</h2>
    </div>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs" style="min-width: 100%;">
            <thead>
                <th class="p-6 border">Codcliente</th>
                <th class="p-6 border">Codcomercial</th>
                <th class="p-6 border">Nombrecliente</th>
                <th class="p-6 border">Diasreparto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr class="border">
                        <td class="p-6">{{ $record['codcliente'] }}</td>
                        <td class="p-6">{{ $record['codcomercial'] }}</td>
                        <td class="p-6">{{ $record['nombrecliente'] }}</td>
                        @if (!$record['diasreparto'])
                            <td class="p-6"><p>No especificado</p></td>
                        @else
                            <td class="p-6">{{ $record['diasreparto'] }}</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>