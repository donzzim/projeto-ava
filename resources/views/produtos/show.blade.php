@extends('site.layout')

@section('content')
    <div class="max-w-5xl mx-auto px-6 py-10">

        <a href="{{ route('produtos.index') }}"
            class="inline-flex items-center text-sm text-gray-600 hover:text-gray-800 mb-6">
            ← Voltar para produtos
        </a>

        <div class="bg-white shadow-lg rounded-xl p-8 border border-gray-100">

            {{-- Adicione 'items-stretch' para que as colunas ocupem a mesma altura --}}
            <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-stretch">

                {{-- Imagem do produto --}}
                {{-- Adicione 'h-full' para que o container da imagem ocupe a altura total da coluna --}}
                <div class="w-full h-full bg-gray-200 rounded-lg flex items-center justify-center overflow-hidden">
                    @if ($produto->imagem)
                        {{-- Remova 'h-72' e ajuste a altura/objeto da imagem se necessário --}}
                        <img src="{{ asset('storage/' . $produto->imagem) }}" class="w-full h-full object-cover">
                    @else
                        <span class="text-gray-400">Sem imagem disponível</span>
                    @endif
                </div>

                {{-- Informações --}}
                {{-- Adicione 'h-full' e 'justify-between' para alinhar o botão ao fundo --}}
                <div class="flex flex-col gap-4 h-full justify-between">

                    <div class="flex flex-col gap-4">
                        <h1 class="text-3xl font-bold text-gray-800">
                            {{ $produto->nome }}
                        </h1>

                        <p class="text-gray-600 text-sm leading-relaxed">
                            {{ $produto->descricao }}
                        </p>

                        <p class="text-gray-800 font-semibold text-md">
                            Postado por: {{ $produto->user->firstName ?? 'Usuário desconhecido' }}
                        </p>

                        <p class="text-gray-800 text-md">
                            Categoria: {{ $produto->categoria->nome ?? 'Categoria desconhecida' }}
                        </p>

                        <div>
                            <span class="text-3xl font-semibold text-indigo-600">
                                R$ {{ number_format($produto->preco, 2, ',', '.') }}
                            </span>
                        </div>
                    </div>

                    {{-- O botão será automaticamente empurrado para o final pelo justify-between --}}
                    <div class="flex">
                        <a href="#"
                            class="px-4 py-3 w-full text-center bg-indigo-600 text-white text-sm font-medium rounded-lg 
                        hover:bg-indigo-700 transition">
                            Comprar
                        </a>
                    </div>

                </div>

            </div>

        </div>
    </div>
@endsection
