<div class="w-64 fixed inset-y-0 left-0 bg-gray-900 text-white shadow-lg flex flex-col">

    <div class="p-6 text-2xl font-bold tracking-wide border-b border-gray-700">
        PROJETO AVA <br>
        <p class="text-sm">2026</p>
    </div>

    <nav class="flex-1 p-4 space-y-2">
        <a href="{{ route('home') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">
            <x-heroicon-s-home class="w-6 h-6" />
            <span>Home</span>
        </a>

        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">
            <x-heroicon-o-chart-bar class="w-6 h-6" />
            <span>Dashboard</span>
        </a>

        <a href="{{ route('users.index') }}"
            class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">
            <x-heroicon-s-user class="w-6 h-6" />
            <span>Usuários</span>
        </a>

        <a href="{{ route('config') }}" class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">
            <x-heroicon-o-cog-6-tooth class="w-6 h-6" />
            <span>Configurações</span>
        </a>

        <a href="{{ route('produtos.index') }}"
            class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">
            <x-heroicon-o-tag class="w-6 h-6" />
            <span>Produtos</span>
        </a>

        <a href="{{ route('admin.dashboard') }}"
            class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">
            <x-heroicon-o-shield-check class="w-6 h-6" />
            <span>Administração</span>
        </a>

        <div class="space-y-1">
            <details class="group">

                <summary
                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 cursor-pointer transition list-none">
                    <x-heroicon-o-rectangle-group class="w-6 h-6" />
                    <span>Categorias</span>

                    <x-heroicon-o-chevron-right
                        class="w-5 h-5 ml-auto transform transition-transform group-open:rotate-90" />
                </summary>

                <div class="ml-10 mt-1 space-y-1">
                    @foreach ($categoriasMenu as $categoria)
                        <a href="{{ route('categorias.show', $categoria->id) }}"
                            class="block p-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-lg transition">
                            {{ $categoria->nome }}
                        </a>
                    @endforeach
                </div>
            </details>
        </div>
    </nav>

    <div class="p-4 border-t border-gray-700 text-sm text-gray-400">
        @auth
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit"
                    class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">Sair</button>
            </form>
        @endauth
        @guest
            <a href="{{ route('login') }}"
                class="flex items-center gap-3 p-3 rounded-lg hover:bg-gray-800 transition">Entrar</a>
        @endguest
    </div>

</div>
