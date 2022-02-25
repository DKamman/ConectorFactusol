<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes - Factusol
        </h2>
    </x-slot>
    <div style="width:95vw; height:85vh; background:rgba(25,25,25,0.2); overflow: scroll; margin: 1rem auto;">
        <table class="text-xs" style="min-width: 100%;">
            <thead>
                @foreach ($response[0] as $head)
                    <th class="p-6 border">{{ $head['columna'] }}</th>
                @endforeach
            </thead>
            <tbody>
                @foreach ($response as $clients)
                    <tr class="border">
                        @foreach ($clients as $client)
                            <td class="p-6">{{ $client['dato'] }}</td>
                        @endforeach
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>