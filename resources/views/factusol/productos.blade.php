<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-lg text-gray-800 leading-tight">Factusol - Productos</h2>
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
                <a class="ml-4 px-2 py-1 rounded bg-yellow-400 text-white font-semibold hover:drop-shadow hover:ease-in-out hover:duration-300" href="{{ route('factusol.productos.get') }}">FETCH</a>
            </div>
        </div>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:75vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">Update Producto</th>
                <th class="p-6 border border-2 border-gray-100">CODART</th>
                <th class="p-6 border border-2 border-gray-100">EANART</th>
                <th class="p-6 border border-2 border-gray-100">EQUART</th>
                <th class="p-6 border border-2 border-gray-100">FAMART</th>
                <th class="p-6 border border-2 border-gray-100">DESART</th>
                <th class="p-6 border border-2 border-gray-100">PHAART</th>
                <th class="p-6 border border-2 border-gray-100">PCOART</th>
                <th class="p-6 border border-2 border-gray-100">FALART</th>
                <th class="p-6 border border-2 border-gray-100">IMGART</th>
                <th class="p-6 border border-2 border-gray-100">FUMART</th>
                <th class="p-6 border border-2 border-gray-100">CONART</th>
                <th class="p-6 border border-2 border-gray-100">ORDART</th>
                <th class="p-6 border border-2 border-gray-100">FAVART</th>
            </thead>
            <tbody>
                @foreach ($response as $product)
                    <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100"><a class="hover:underline" href="#">Update Product</a></td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->CODART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->EANART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->EQUART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->FAMART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->DESART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->PHAART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->PCOART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->FALART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->IMGART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->FUMART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->CONART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->ORDART }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->FAVART }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>