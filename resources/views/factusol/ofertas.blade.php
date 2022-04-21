<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h3 class="font-semibold text-lg text-gray-800 leading-tight">Factusol - Ofertas</h3>
            <div class="flex items-center">
                @if ($header)
                    <p class="text-sm mr-3">{{ $header->created_at->diffForHumans() }}</p>
                    <div class="divider bg-black w-px h-3"></div>
                    <p class="text-sm ml-3 mr-3">Status: 
                        @if($header->status == "OK")
                            <strong class="text-green-400">✓</strong>
                        @elseif($header->status == "Bad Request")
                            <strong class="text-red-600">{{ $header->status }}</strong>
                        @else
                            <strong class="text-red-600">⨯</strong>
                        @endif
                    </p>
                    <div class="divider bg-black w-px h-3"></div>
                    <p class="text-sm ml-3">
                        Code: 
                            @if($statusCode >= 400)
                                <strong class="text-red-600">{{ $statusCode }}</strong>                            
                            @elseif($statusCode >= 300)
                                <strong class="text-yellow-400">{{ $statusCode }}</strong>
                            @elseif($statusCode >= 200)
                                <strong class="text-green-400">{{ $statusCode }}</strong>
                            @else
                                <strong class="text-blue-600">{{ $statusCode }}</strong>
                            @endif
                    </p>
                @endif
                <a class="ml-4 px-2 py-1 rounded bg-yellow-400 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="{{ route('factusol.ofertas.get') }}">FETCH</a>
            </div>
        </div>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">TIPDES</th>
                <th class="p-6 border border-2 border-gray-100">ARFDES</th>
                <th class="p-6 border border-2 border-gray-100">DESDES</th>
                <th class="p-6 border border-2 border-gray-100">FIJDES</th>
                <th class="p-6 border border-2 border-gray-100">PORDES</th>
                <th class="p-6 border border-2 border-gray-100">TDEDES</th>
                <th class="p-6 border border-2 border-gray-100">IMPDES</th>
                <th class="p-6 border border-2 border-gray-100">TFIDES</th>
            </thead>
            <tbody>
                @foreach ($response as $oferta)
                    <tr class="border border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->TIPDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->ARFDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->DESDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->FIJDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->PORDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->TDEDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->IMPDES }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $oferta->TFIDES }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>