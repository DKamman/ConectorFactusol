<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Clientes - 20 Bananas
        </h2>
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