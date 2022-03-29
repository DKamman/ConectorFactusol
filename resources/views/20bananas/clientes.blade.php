<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clientes - 20 Bananas</h2>
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
                <th class="p-6 border border-2 border-gray-100">Codcliente</th>
                <th class="p-6 border border-2 border-gray-100">Codcomercial</th>
                <th class="p-6 border border-2 border-gray-100">Nombrecliente</th>
                <th class="p-6 border border-2 border-gray-100">Diasreparto</th>
            </thead>
            <tbody>
                @foreach ($response as $record)
                    <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $record['codcliente'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['codcomercial'] }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $record['nombrecliente'] }}</td>
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
    @endif
</x-app-layout>