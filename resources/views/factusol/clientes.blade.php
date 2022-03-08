<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes - Factusol
        </h2>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:85vh;">
        <table class="text-xs w-full">
            <thead class="bg-grey-200 ">
                <th class="p-6 border">CodCliente</th>
                <th class="p-6 border">NombreCliente</th>
                <th class="p-6 border">CodComercial</th>
            </thead>
            <tbody>
                @foreach ($response as $client)
                    <tr class="border">
                        <td class="p-6 border">{{ $client->codcliente }}</td>
                        <td class="p-6 border">{{ $client->nombrecliente }}</td>
                        <td class="p-6 border">{{ $client->codcomercial }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>