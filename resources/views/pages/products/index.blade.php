<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Produtos') }}
        </h2>

        <a class="header__link"
            href="{{ route('products.create') }}">
            novo
        </a>
    </x-slot>

    <div class="py-12">
        @forelse ($products as $product)
            okokok
        @empty
            @include('components.empty_card');
        @endforelse
    </div>
</x-app-layout>
