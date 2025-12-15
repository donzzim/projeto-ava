<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="relative min-h-screen flex items-center justify-center bg-gray-50 py-12 px-4 sm:px-6 lg:px-8">

        @if ($errors->any())
            <div class="absolute top-0 inset-x-0 pt-4 px-4 sm:px-6 z-10">
                <div class="max-w-sm mx-auto bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded shadow-lg">
                    <strong class="font-bold">Erro!</strong>
                    <ul class="list-disc list-inside mt-1 text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        <div class="max-w-md w-full space-y-8">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
                Acesse sua conta
            </h2>

            <form method="POST" action="{{ route('login') }}"
                class="mt-8 space-y-6 bg-white p-8 rounded-xl shadow-2xl">
                @csrf

                <div>
                    <input id="email" name="email" type="email" required autofocus
                        class="w-full px-3 py-3 border border-gray-300 rounded-t-md focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Endereço de Email">
                </div>

                <div>
                    <input id="password" name="password" type="password" required
                        class="w-full px-3 py-3 border border-gray-300 rounded-b-md focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Senha">
                </div>

                <div class="flex items-center justify-between">
                    <label class="flex items-center text-sm">
                        <input type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 rounded">
                        <span class="ml-2">Lembrar de mim</span>
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-500">
                            Esqueceu sua senha?
                        </a>
                    @endif
                </div>

                <button type="submit" class="w-full py-3 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md">
                    Entrar
                </button>
            </form>

            @if (Route::has('register'))
                <p class="text-center text-sm text-gray-600">
                    Não tem uma conta?
                    <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-500 font-medium">
                        Crie sua conta agora!
                    </a>
                </p>
            @endif
        </div>
    </div>
</body>

</html>
