<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Catálogo de Produtos</title>
    <meta name="description" content="Conheça nosso catálogo de produtos e encontre o que você precisa.">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-800 antialiased">
    <header class="border-b border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl items-center justify-between px-6 py-5">
            <a href="{{ route('home') }}" class="flex items-center gap-3 font-bold tracking-tight text-slate-900">
                <span class="grid h-10 w-10 place-items-center rounded-xl bg-indigo-600 text-lg text-white">C</span>
                <span>Catálogo<span class="text-indigo-600">.</span></span>
            </a>
            <nav class="flex items-center gap-3 text-sm font-semibold">
                @auth
                    @if(auth()->user()->hasVerifiedEmail() && in_array(mb_strtolower(auth()->user()->email), array_map('mb_strtolower', config('catalog.admin_emails', [])), true))
                        <a href="{{ route('dashboard') }}" class="rounded-lg bg-slate-900 px-4 py-2.5 text-white hover:bg-slate-700">Painel de controle</a>
                    @else
                        <a href="{{ route('verification.notice') }}" class="rounded-lg bg-amber-100 px-4 py-2.5 text-amber-900">Verificar e-mail</a>
                    @endif
                @else
                    <a href="{{ route('login') }}" class="px-3 py-2 text-slate-600 hover:text-indigo-600">Entrar</a>
                    <a href="{{ route('register') }}" class="rounded-lg bg-indigo-600 px-4 py-2.5 text-white hover:bg-indigo-700">Criar conta</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <section class="bg-slate-900 text-white">
            <div class="mx-auto max-w-7xl px-6 py-16 sm:py-20">
                <p class="mb-4 text-sm font-bold uppercase tracking-[0.2em] text-indigo-300">Produtos selecionados</p>
                <div class="max-w-3xl">
                    <h1 class="text-4xl font-black tracking-tight sm:text-6xl">Tudo para o seu dia a dia, em um só lugar.</h1>
                    <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-300">Explore nosso catálogo atualizado e encontre tecnologia, acessórios e soluções para trabalhar melhor.</p>
                </div>
                <div class="mt-8 flex items-center gap-3 text-sm text-slate-300">
                    <span class="h-2.5 w-2.5 rounded-full bg-emerald-400"></span>
                    {{ $produtos->count() }} {{ $produtos->count() === 1 ? 'produto disponível' : 'produtos disponíveis' }}
                </div>
            </div>
        </section>

        <section class="mx-auto max-w-7xl px-6 py-14 sm:py-16">
            <div class="mb-8 flex flex-wrap items-end justify-between gap-4">
                <div>
                    <p class="text-sm font-bold uppercase tracking-widest text-indigo-600">Nosso catálogo</p>
                    <h2 class="mt-2 text-3xl font-extrabold tracking-tight text-slate-900">Produtos disponíveis</h2>
                </div>
            </div>

            @if ($produtos->isEmpty())
                <div class="rounded-2xl border border-dashed border-slate-300 bg-white p-12 text-center">
                    <h3 class="text-lg font-bold text-slate-900">O catálogo está sendo preparado</h3>
                    <p class="mt-2 text-slate-500">Volte em breve para conhecer os produtos disponíveis.</p>
                </div>
            @else
                <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($produtos as $produto)
                        <article class="group flex flex-col rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:border-indigo-200 hover:shadow-lg">
                            <div class="mb-5 flex items-start justify-between gap-3">
                                <span class="rounded-full bg-indigo-50 px-3 py-1 text-xs font-bold text-indigo-700">{{ $produto->categoria }}</span>
                                <span class="text-xs font-medium text-slate-400">{{ $produto->quantidade }} em estoque</span>
                            </div>
                            <h3 class="text-lg font-bold leading-snug text-slate-900">{{ $produto->nome }}</h3>
                            <p class="mt-3 flex-1 text-sm leading-6 text-slate-500">{{ $produto->descricao }}</p>
                            <div class="mt-6 border-t border-slate-100 pt-5">
                                <p class="text-xs font-semibold uppercase tracking-wider text-slate-400">Preço</p>
                                <p class="mt-1 text-2xl font-extrabold text-slate-900">R$ {{ number_format((float) $produto->preco, 2, ',', '.') }}</p>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </section>
    </main>

    <footer class="border-t border-slate-200 bg-white">
        <div class="mx-auto flex max-w-7xl flex-col justify-between gap-2 px-6 py-6 text-sm text-slate-500 sm:flex-row">
            <span>© {{ now()->year }} Catálogo de Produtos</span>
            <span>Uma experiência simples para encontrar o que você precisa.</span>
        </div>
    </footer>
</body>
</html>
