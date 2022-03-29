<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ofertas - Factusol</h2>
            <p class="text-sm">{{ $header['Date'][0] }} - Status: {{ $status }} - Code: {{ $statusCode }}</p>
        </div>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">Referencia</th>
                <th class="p-6 border border-2 border-gray-100">Codcliente</th>
                <th class="p-6 border border-2 border-gray-100">Codtarifa</th>
            </thead>
            <tbody>
                @foreach ($response as $oferta)
                    <tr class="border border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->referencia }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->codcliente }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->codtarifa }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>