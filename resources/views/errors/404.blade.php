<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>

</head>

<body>
    <div class="min-h-screen flex flex-col items-center justify-center bg-gray-50 px-6 text-center">

        <h1 class="text-9xl font-extrabold text-gray-300 tracking-widest 
            animate-pulse drop-shadow-lg">
            404
        </h1>

        <div class="absolute w-72 h-72 bg-blue-500/20 rounded-full blur-3xl animate-bounce"></div>

        <p class="mt-6 text-xl text-gray-700 opacity-0 animate-[fadeIn_1.2s_ease-in-out_forwards]">
            Página não encontrada
        </p>

        <p class="mt-2 max-w-md text-gray-500 opacity-0 animate-[fadeIn_1.7s_ease-in-out_forwards]">
            A página que você procura não existe ou foi movida.
        </p>

        <a href="/"
            class="mt-8 inline-block px-8 py-3 rounded-lg bg-blue-600 text-white font-medium 
            hover:bg-blue-700 transition-all shadow-md hover:shadow-2xl
            transform hover:scale-105 active:scale-95 opacity-0 
            animate-[fadeIn_2.2s_ease-in-out_forwards]">
            Voltar para a página inicial
        </a>
    </div>
</body>

</html>
