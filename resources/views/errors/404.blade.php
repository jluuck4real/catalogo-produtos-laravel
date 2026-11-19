<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Página não encontrada | Catálogo</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="grid min-h-screen place-items-center bg-slate-950 px-6 text-white">
    <main class="max-w-xl text-center">
        <p class="text-sm font-bold uppercase tracking-[0.3em] text-indigo-300">Erro 404</p>
        <h1 class="mt-5 text-5xl font-black tracking-tight sm:text-7xl">Página não encontrada</h1>
        <p class="mt-5 text-lg leading-8 text-slate-300">O endereço acessado não existe ou foi movido. Volte ao catálogo para continuar navegando.</p>
        <a href="{{ route('home') }}" class="mt-8 inline-flex rounded-lg bg-indigo-500 px-5 py-3 font-semibold text-white transition hover:bg-indigo-400">Voltar ao catálogo</a>
    </main>
</body>
</html>
