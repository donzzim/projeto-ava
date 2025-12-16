<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <x-heroicon-o-chart-bar class="w-7 h-7 text-indigo-600" />
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10 bg-gray-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">

            <!-- Cards principais -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                <!-- Card 1 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Usuários</p>
                            <p class="text-3xl font-bold text-gray-800">128</p>
                        </div>
                        <div class="bg-indigo-100 p-3 rounded-full">
                            <x-heroicon-o-users class="w-6 h-6 text-indigo-600" />
                        </div>
                    </div>
                </div>

                <!-- Card 2 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Pedidos</p>
                            <p class="text-3xl font-bold text-gray-800">56</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <x-heroicon-o-shopping-cart class="w-6 h-6 text-green-600" />
                        </div>
                    </div>
                </div>

                <!-- Card 3 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Receita</p>
                            <p class="text-3xl font-bold text-gray-800">R$ 9.430</p>
                        </div>
                        <div class="bg-yellow-100 p-3 rounded-full">
                            <x-heroicon-o-currency-dollar class="w-6 h-6 text-yellow-600" />
                        </div>
                    </div>
                </div>

                <!-- Card 4 -->
                <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm text-gray-500">Status</p>
                            <p class="text-lg font-semibold text-green-600">Online</p>
                        </div>
                        <div class="bg-green-100 p-3 rounded-full">
                            <x-heroicon-o-check-circle class="w-6 h-6 text-green-600" />
                        </div>
                    </div>
                </div>

            </div>

            <!-- Conteúdo inferior -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Atividades recentes -->
                <div class="bg-white rounded-xl shadow p-6 lg:col-span-2">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <x-heroicon-o-clock class="w-5 h-5 text-indigo-600" />
                        Atividades recentes
                    </h3>

                    <ul class="space-y-3 text-sm">
                        <li class="flex justify-between border-b pb-2">
                            <span>Usuário <strong>Lucas</strong> fez login</span>
                            <span class="text-gray-400">há 2 min</span>
                        </li>
                        <li class="flex justify-between border-b pb-2">
                            <span>Novo pedido criado</span>
                            <span class="text-gray-400">há 10 min</span>
                        </li>
                        <li class="flex justify-between">
                            <span>Senha alterada</span>
                            <span class="text-gray-400">há 1 hora</span>
                        </li>
                    </ul>
                </div>

                <!-- Perfil -->
                <div class="bg-white rounded-xl shadow p-6">
                    <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                        <x-heroicon-o-user-circle class="w-6 h-6 text-indigo-600" />
                        Seu perfil
                    </h3>

                    <div class="space-y-3 text-sm">
                        <p><strong>Nome:</strong> {{ Auth::user()->name }}</p>
                        <p><strong>Email:</strong> {{ Auth::user()->email }}</p>

                        <a href="{{ route('profile.edit') }}"
                            class="inline-flex items-center gap-2 mt-4 px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition">
                            <x-heroicon-o-pencil-square class="w-5 h-5" />
                            Editar perfil
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
