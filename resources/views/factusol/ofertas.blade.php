<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes - Factusol
        </h2>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:80vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">CodCliente</th>
                <th class="p-6 border border-2 border-gray-100">NombreCliente</th>
                <th class="p-6 border border-2 border-gray-100">CodComercial</th>
            </thead>
            <tbody>
                @foreach ($response as $client)
                    <tr class="border border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $client->codcliente }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->nombrecliente }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $client->codcomercial }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>