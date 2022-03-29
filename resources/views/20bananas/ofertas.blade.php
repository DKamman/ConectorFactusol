<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Ofertas - 20 Bananas</h2>
            <p class="text-sm">{{ $header['Date'][0] }} - Status: {{ $status }} - Code: {{ $statusCode }}</p>
        </div>
    </x-slot>

    @if (session('success'))
        <div class="mt-3 flex justify-center">
            <div class="bg-green-400 rounded p-2" role="alert">
                <span class="text-white">{{ session('success') }}</span>
                {{-- Implemented on later iteration --}}
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="mt-3 flex justify-center">
            <div class="bg-red-400 rounded p-2" role="alert">
                <span class="text-white">{{ session('error') }}</span>
                {{-- Implemented on later iteration --}}
                {{-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
        </div>
    @endif

    @if ($response == "Unauthorized")
        {{$response}}
    @endif

    @if ($response != "Unauthorized")
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">Activo</th>
                <th class="p-6 border border-2 border-gray-100">Esoferta</th>
                <th class="p-6 border border-2 border-gray-100">Referencia</th>
                <th class="p-6 border border-2 border-gray-100">Codcliente</th>
                <th class="p-6 border border-2 border-gray-100">Codtarifa</th>
                <th class="p-6 border border-2 border-gray-100">Preciofijo</th>
                <th class="p-6 border border-2 border-gray-100">Porcentajedesc</th>
                <th class="p-6 border border-2 border-gray-100">Porcada</th>
                <th class="p-6 border border-2 border-gray-100">Tipopromocion</th>
                <th class="p-6 border border-2 border-gray-100">Unisgratis</th>
                <th class="p-6 border border-2 border-gray-100">Referenciagratis</th>
                <th class="p-6 border border-2 border-gray-100">Fechainicio</th>
                <th class="p-6 border border-2 border-gray-100">Fechafin</th>
            </thead>
            <tbody>
                @foreach ($response as $oferta)
                    <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["activo"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["esoferta"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["referencia"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["codcliente"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["codtarifa"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["preciofijo"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["porcentajedesc"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["porcada"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["tipopromocion"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["unisgratis"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["referenciagratis"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["fechainicio"] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta["fechafin"] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif
</x-app-layout>