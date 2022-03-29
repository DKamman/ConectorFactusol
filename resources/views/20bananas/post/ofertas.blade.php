<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Post Ofertas to 20 Bananas
        </h2>
    </x-slot>
    <div class="flex justify-center">
        <a class="mt-6 p-6 rounded bg-yellow-400 text-white font-semibold" href="{{ route('20bananas.post.ofertas') }}">POST</a>
    </div>
</x-app-layout>