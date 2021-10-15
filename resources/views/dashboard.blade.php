<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div> --}}
        <div class="canva">
            <div class="paginate-card">
                <div class="paginate-card__header">
                    <a class="paginate-card__header--link"
                        href="{{ route('products.index') }}">
                        Produtos
                    </a>
                </div>
                <div class="paginate-card__body">
                    @forelse ($products as $product)
                        <div class="paginate-card__body--item">

                        </div>
                    @empty
                        <div class="paginate-card__body--empty">
                            nenhum item cadastrado!
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="paginate-card">
                <div class="paginate-card__header">
                    <a class="paginate-card__header--link"
                        href="{{ route('combos.index') }}">
                        Combos
                    </a>
                </div>
                <div class="paginate-card__body">
                    @forelse ($combos as $combo)
                        <div class="paginate-card__body--item">

                        </div>
                    @empty
                        <div class="paginate-card__body--empty">
                            nenhum item cadastrado!
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
