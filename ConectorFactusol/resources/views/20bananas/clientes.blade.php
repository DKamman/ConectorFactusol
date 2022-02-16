<x-app-layout>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto" class="">
        <table class="inline">
            <thead>
                <th class="p-1">Codcliente</th>
                <th class="p-1">Codcomercial</th>
                <th class="p-1">Nombrecliente</th>
                <th class="p-1">Diasreparto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr>
                        <td>{{ $record['codcliente'] }}</td>
                        <td>{{ $record['codcomercial'] }}</td>
                        <td>{{ $record['nombrecliente'] }}</td>
                        <td>{{ $record['diasreparto'] }}</td>
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