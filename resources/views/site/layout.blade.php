<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindplus/elements@1" type="module"></script>
    @stack('styles')
</head>

<body class="bg-gray-100 flex min-h-screen">

    <x-sidebar />

    <main class="flex-1 p-6 ml-64">
        <x-header />

        @yield('content')
    </main>

    @stack('script')
</body>

</html>
