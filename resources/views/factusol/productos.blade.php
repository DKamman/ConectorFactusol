<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos - Factusol
        </h2>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:80vh;">
        <table class="text-xs w-full">
            <thead class="bg-gray-200">
                <th class="p-6 border border-2 border-gray-100">Referencia</th>
                <th class="p-6 border border-2 border-gray-100">Nombre</th>
                <th class="p-6 border border-2 border-gray-100">Activo</th>
                <th class="p-6 border border-2 border-gray-100">Subfamilia</th>
                <th class="p-6 border border-2 border-gray-100">Familia</th>
                <th class="p-6 border border-2 border-gray-100">Precio</th>
                <th class="p-6 border border-2 border-gray-100">Unidad</th>
                <th class="p-6 border border-2 border-gray-100">Unidadesxbulto</th>
                <th class="p-6 border border-2 border-gray-100">Unidadbulto</th>
                <th class="p-6 border border-2 border-gray-100">Unidadesxbulto2</th>
                <th class="p-6 border border-2 border-gray-100">Unidadbulto2</th>
                <th class="p-6 border border-2 border-gray-100">Vendounidad</th>
                <th class="p-6 border border-2 border-gray-100">Vendobulto</th>
                <th class="p-6 border border-2 border-gray-100">Vendobulto2</th>
                <th class="p-6 border border-2 border-gray-100">Descripcion</th>
                <th class="p-6 border border-2 border-gray-100">Tags</th>
                <th class="p-6 border border-2 border-gray-100">Foto</th>
            </thead>
            <tbody>
                @foreach ($response as $product)
                    <tr class="border border-2 border-gray-100 hover:bg-orange-100 hover:ease-in-out duration-200">
                        <td class="p-6 border border-2 border-gray-100">{{ $product->referencia }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->nombre }}</td>
                        <td class="p-6 border border-2 border-gray-100">Activo</td>
                        <td class="p-6 border border-2 border-gray-100">{{$product->subfamilia}}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->familia }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->precio }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->unidad }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->unidadesxbulto }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->unidadbulto }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->unidadesxbulto2 }}</td>
                        <td class="p-6 border border-2 border-gray-100">{{ $product->unidadbulto2 }}</td>
                        <td class="p-6 border border-2 border-gray-100">vendounidad</td>
                        <td class="p-6 border border-2 border-gray-100">vendobulto</td>
                        <td class="p-6 border border-2 border-gray-100">vendobulto2</td>
                        <td class="p-6 border border-2 border-gray-100">descripcion</td>
                        <td class="p-6 border border-2 border-gray-100">tags</td>
                        <td class="p-6 border border-2 border-gray-100"><img src="{{ $product->foto }}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>