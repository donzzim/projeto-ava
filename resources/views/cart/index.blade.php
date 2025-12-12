@extends('site.layout')

@section('title', 'Carrinho de Compras')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Carrinho de Compras</h2>

    @if (isset($produtos) && count($produtos) > 0)
        <div class="lg:flex lg:space-x-8">
            <div class="lg:w-3/4">
                <div class="bg-white shadow-lg rounded-lg divide-y divide-gray-200">
                    @foreach ($produtos as $produto)
                        <div class="flex items-center p-4 sm:p-6">
                            <div class="w-20 h-20 flex-shrink-0 mr-4">
                                <img class="w-full h-full object-cover rounded-md" src="{{ $produto->imagem }}">
                            </div>

                            <div class="flex-grow">
                                <h2 class="text-lg font-semibold text-gray-900">
                                    {{ $produto->itemable->nome }}
                                </h2>
                                <p class="text-sm text-gray-500">{{ $produto->itemable->descricao }}</p>
                                <div class="flex items-center mt-2">
                                    <span class="text-xl font-bold text-indigo-600">R$
                                        {{ number_format($produto->itemable->preco, 2, ',', '.') }}</span>
                                    {{-- <span class="text-sm text-gray-400 ml-2 line-through">R$ 250,00</span> --}}
                                </div>
                            </div>

                            <div class="flex items-center space-x-2 mr-4">
                                <label for="qtd-1" class="sr-only">Quantidade</label>
                                <input type="number" id="qtd-1" value="1" min="1"
                                    class="w-16 text-center border border-gray-300 rounded-md py-1 text-gray-700 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <form action="{{ route('cart.remove', $produto->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                    class="text-gray-400 hover:text-red-600 transition duration-150 ease-in-out">
                                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                        </path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    @endforeach
                </div>

                <div class="mt-6 flex justify-between items-center">
                    <a href="/produtos" class="text-indigo-600 hover:text-indigo-500 font-medium flex items-center">
                        <svg class="w-4 h-4 mr-1 transform rotate-180" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M14 5l7 7m0 0l-7 7m7-7H3">
                            </path>
                        </svg>
                        Continuar Comprando
                    </a>
                    <form action="{{ route('cart.fresh') }}" method="POST">
                        @csrf
                        <button type="submit" class="ml-6 text-red-600 hover:text-red-500 font-medium flex items-center">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16">
                                </path>
                            </svg>
                            Esvaziar Carrinho
                    </form>
                </div>

            </div>

            <div class="lg:w-1/4 mt-8 lg:mt-0">
                <div class="bg-white p-6 shadow-lg rounded-lg sticky top-6">
                    <h2 class="text-xl font-bold text-gray-800 mb-4 border-b pb-2">Resumo do Pedido</h2>

                    <div class="space-y-3">
                        <div class="flex justify-between text-gray-600">
                            <span>Subtotal ({{ $produtos->count() }} itens)</span>
                            <span>R$
                                {{ number_format($produtos->sum(fn($item) => $item->itemable->preco * $item->quantity), 2, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    <div class="flex justify-between text-2xl font-bold text-gray-900 mt-4 border-t pt-4">
                        <span>Total</span>
                        <span>R$
                            {{ number_format($produtos->sum(fn($item) => $item->itemable->preco * $item->quantity), 2, ',', '.') }}</span>
                    </div>

                    <form action="{{ route('cart.finish') }}" method="POST">
                        @csrf
                        <button type="submit"
                            class="mt-6 w-full bg-indigo-600 text-white py-3 rounded-md font-semibold hover:bg-indigo-700 transition duration-150 ease-in-out shadow-md">
                            Finalizar Compra
                        </button>
                    </form>

                    <p class="text-xs text-gray-500 text-center mt-3">Segurança SSL Garantida</p>
                </div>
            </div>
        </div>
    @else
        <p class="text-gray-600">Seu carrinho está vazio.</p>
    @endif
@endsection
