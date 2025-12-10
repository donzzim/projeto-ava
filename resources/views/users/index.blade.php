@extends('site.layout')

@section('title', 'Lista de Usuários')

@section('content')
    @if (isset($users))
        <h2 class="text-2xl font-bold mb-6">Lista de Usuários</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            @foreach ($users as $user)
                <div
                    class="bg-white shadow-md rounded-xl p-6 border border-gray-100 
               hover:shadow-xl hover:-translate-y-1 transition-all duration-300">

                    <div class="flex items-center gap-4 mb-4">
                        {{-- <div class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center shadow-md">
                            <x-heroicon-s-user class="w-8 h-8 text-gray-700" />
                        </div> --}}
                        <div>
                            <img src="{{ $img[$loop->index] }}" alt="Avatar do Pikachu"
                                class="w-14 h-14 rounded-full bg-gray-100 flex items-center justify-center shadow-md">
                        </div>

                        <div>
                            <h3 class="text-lg font-semibold text-gray-800">
                                {{ $user->name }}
                                {{-- {{ Str::limit($user->firstName, 3) }} {{ $user->lastName }} --}}
                                {{-- Str é a facade de manipulação de strings do Laravel --}}
                            </h3>
                            <p class="text-sm text-gray-500">Usuário registrado</p>
                        </div>
                    </div>

                    <div class="space-y-2 text-gray-700 text-sm">
                        <p>
                            <span class="font-semibold">Email:</span> {{ $user->email }}
                        </p>
                    </div>

                    <div class="mt-4 flex items-center justify-between">
                        <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 font-medium hover:underline">
                            Ver perfil
                        </a>

                        <div class="flex items-center gap-3">

                            {{-- <button type="button"
                                class="flex items-center gap-2 px-4 py-1.5 bg-blue-600 text-white text-sm rounded-lg 
                                hover:bg-blue-700 transition">

                                <x-heroicon-o-pencil class="w-4 h-4" />
                                Editar
                            </button>

                            <button type="button"
                                class="flex items-center gap-2 px-4 py-1.5 bg-red-600 text-white text-sm rounded-lg 
                                hover:bg-red-700 transition">

                                <x-heroicon-o-trash class="w-4 h-4" />
                                Excluir
                            </button> --}}

                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $users->links() }}
            {{-- Gera a row de navegacao --}}
        </div>
    @else
        <p class="text-gray-600">Nenhum usuário encontrado.</p>
    @endif

@endsection
