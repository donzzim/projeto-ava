@extends('site.layout')

@section('title', 'Criar novo produto')

@section('content')
    <form method="post" action="/produtos">
        @csrf
        <h2 class="text-2xl font-bold mb-6">Criar Novo Produto</h2>

        <div class="mb-4">
            <label for="nome" class="block text-sm/6 font-medium text-gray-900">Nome do Produto</label>
            <div class="mt-2">
                <div
                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input id="nome" type="text" name="nome"
                        class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                </div>
            </div>
        </div>

        <div class="mb-4">
            <label for="descricao" class="block text-sm/6 font-medium text-gray-900">Descrição</label>
            <div class="mt-2">
                <textarea id="descricao" name="descricao" rows="3"
                    class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
            </div>
        </div>

        <div class="mb-4">
            <label for="preco" class="block text-sm/6 font-medium text-gray-900">Preço</label>
            <div class="mt-2">
                <div
                    class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                    <input id="preco" type="text" name="preco"
                        class="block min-w-0 grow bg-white py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" />
                </div>
            </div>
        </div>

        <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="user" class="block text-sm font-medium text-gray-700 mb-1">Usuário responsável</label>
                <select name="user_id" id="user"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm appearance-none bg-white border cursor-pointer hover:border-gray-400 transition duration-150 ease-in-out">
                    <option value="">Selecione</option>
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <label for="categoria" class="block text-sm font-medium text-gray-700 mb-1">Categorias</label>
                <select name="categoria_id" id="categoria"
                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm appearance-none bg-white border cursor-pointer hover:border-gray-400 transition duration-150 ease-in-out">
                    <option value="">Selecione</option>
                    @foreach ($categoriasMenu as $categoria)
                        <option value="{{ $categoria->id }}">{{ $categoria->nome }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href={{ route('produtos.index') }} class="text-sm/6 font-semibold text-gray-900">Voltar</a>
            <button type="submit" href="{{ route('produtos.store') }}"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">

                Salvar</button>
        </div>

        @if ($errors->any())
            <div class="mt-6 p-4 bg-red-100 border border-red-400 text-red-700 rounded-md">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>

@endsection
