@extends('site.layout')

@section('title', 'Produtos')

@section('content')

    @if (isset($produtos))
        <h2 class="text-2xl font-bold mb-6">Lista de Produtos</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($produtos as $produto)
                <div
                    class="bg-white rounded-xl shadow-md border border-gray-100 overflow-hidden 
            hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    {{-- Imagem do produto (opcional, coloque a coluna 'imagem' se existir) --}}
                    <div class="w-full h-40 bg-gray-200 flex items-center justify-center">
                        {{ $produto->imagem ?? 'Sem imagem' }}
                        {{-- Se tiver imagem:
        <img src="{{ asset('storage/' . $produto->imagem) }}" 
             class="w-full h-full object-cover">
        --}}
                    </div>

                    <div class="p-5">
                        <h3 class="text-lg font-bold text-gray-800 mb-1">
                            {{ $produto->nome }}
                        </h3>

                        <p class="text-sm text-gray-500 mb-3">
                            {{ Str::limit($produto->descricao, 60) }}
                        </p>

                        <div class="flex items-center justify-between">
                            <span class="text-xl font-semibold text-indigo-600">
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </span>

                            <div class="flex items-center gap-3">
                                <a href="{{ route('produtos.show', $produto->id) }}"
                                    class="px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-lg 
                          hover:bg-indigo-700 transition">
                                    Ver mais
                                </a>

                                <a href="{{ route('produtos.details', $produto->slug) }}"
                                    class="text-blue-600 font-medium hover:underline">
                                    Detalhes
                                </a>
                            </div>

                        </div>
                    </div>

                </div>
            @endforeach

        </div>

        <div class="mt-6">
            {{ $produtos->links() }}
            {{-- Gera a row de navegacao --}}
        </div>
    @else
        <p class="text-gray-600">Nenhum produto encontrado.</p>
    @endif

@endsection
