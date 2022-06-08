<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div>
                    <div class="flex p-5">
                        <div class="column">
                            <h3>20 Bananas</h3>
                            <div class="border-t border-gray-100"></div>
                            <div class="content flex flex-col">
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('20bananas.clientes.index') }}">Clientes</a>
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('20bananas.productos.index') }}">Productos</a>
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('20bananas.pedidos.index') }}">Pedidos</a>
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('20bananas.ofertas.index') }}">Ofertas</a>
                            </div>
                        </div>
                        <div class="column ml-10">
                            <h3>Factusol</h3>
                            <div class="border-t border-gray-100"></div>
                            <div class="content flex flex-col">
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('factusol.clientes.index') }}">Clientes</a>
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('factusol.productos.index') }}">Productos</a>
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('factusol.pedidos.index') }}">Pedidos</a>
                                <a class="block px-4 py-2 text-sm leading-5 text-gray-700 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 transition" href="{{ route('factusol.ofertas.index') }}">Ofertas</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
