<x-app-layout>
    <div style="display: flex; width: 100vw; justify-content: center; margin-top: .5rem;">
        <h2>Clientes</h2>
    </div>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs">
            <thead>
                <th class="p-6">Codcliente</th>
                <th class="p-6">Codcomercial</th>
                <th class="p-6">Nombrecliente</th>
                <th class="p-6">Diasreparto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr class="borders">
                        <td class="p-6">{{ $record['codcliente'] }}</td>
                        <td class="p-6">{{ $record['codcomercial'] }}</td>
                        <td class="p-6">{{ $record['nombrecliente'] }}</td>
                        <td class="p-6">{{ $record['diasreparto'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- <div style="width:100px; height:100px; background:red; overflow: scroll;">
        <table>
            <thead>
                <th>test</th>
                <th>test2</th>
                <th>test3</th>
            </thead>
            <tbody>
                <tr>
                    <td>hola</td>
                    <td>amigo</td>
                    <td>que</td>
                </tr>
                <tr>
                    <td>Gracias</td>
                    <td>Amigo</td>
                    <td>mementiste</td>
                </tr>
                <tr>
                    <td>De</td>
                    <td>Nada</td>
                    <td>como podiste</td>
                </tr>
            </tbody>
        </table>
    </div> --}}
</x-app-layout>