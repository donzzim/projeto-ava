<div class="w-full flex items-center justify-between mb-6">

    <h1 class="text-xl font-semibold text-gray-800">
        Tribunal de Justiça do Espírito Santo - TJES
    </h1>

    <a href="{{ route('cart.list') }}" class="flex items-center gap-2 text-gray-700 hover:text-gray-900 transition">

        <x-heroicon-o-shopping-cart class="w-6 h-6" />

        <span class="font-medium">Carrinho</span>

        @if (session('cart_count', 0) > 0)
            <span class="px-2 py-0.5 text-xs bg-red-600 text-white rounded-full">
                {{ session('cart_count') }}
            </span>
        @endif

    </a>

</div>
