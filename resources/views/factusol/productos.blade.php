<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Productos - Factusol
        </h2>
    </x-slot>
    <div class="overflow-scroll my-4 mx-auto" style="width:95vw; height:85vh;">
        <table class="text-xs w-full">
            <thead class="bg-grey-200">
                <th class="p-6 border">Referencia</th>
                <th class="p-6 border">Nombre</th>
                <th class="p-6 border">Activo</th>
                <th class="p-6 border">Subfamilia</th>
                <th class="p-6 border">Familia</th>
                <th class="p-6 border">Precio</th>
                <th class="p-6 border">Unidad</th>
                <th class="p-6 border">unidadesxbulto</th>
                <th class="p-6 border">unidadbulto</th>
                <th class="p-6 border">unidadesxbulto2</th>
                <th class="p-6 border">vendounidad</th>
                <th class="p-6 border">vendobulto</th>
                <th class="p-6 border">vendobulto2</th>
                <th class="p-6 border">descripcion</th>
                <th class="p-6 border">tags</th>
                <th class="p-6 border">Foto</th>
            </thead>
            <tbody>
                @foreach ($response as $product)
                    <tr class="border">
                        <td class="p-6">{{ $product->referencia }}</td>
                        <td class="p-6">{{ $product->nombre }}</td>
                        <td class="p-6">Activo</td>
                        <td class="p-6">{{$product->subfamilia}}</td>
                        <td class="p-6">{{ $product->familia }}</td>
                        <td class="p-6">{{ $product->precio }}</td>
                        <td class="p-6">{{ $product->unidad }}</td>
                        <td class="p-6">unidadesxbulto</td>
                        <td class="p-6">unidadbulto</td>
                        <td class="p-6">unidadesxbulto2</td>
                        <td class="p-6">vendounidad</td>
                        <td class="p-6">vendobulto</td>
                        <td class="p-6">vendobulto2</td>
                        <td class="p-6">descripcion</td>
                        <td class="p-6">tags</td>
                        <td class="p-6"><img src="{{ $product->foto }}" alt=""></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>