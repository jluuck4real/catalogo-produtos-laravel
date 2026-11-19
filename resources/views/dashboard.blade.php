<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-wrap items-center justify-between gap-4">
            <div>
                <p class="text-sm font-semibold uppercase tracking-widest text-indigo-600">Administração</p>
                <h2 class="mt-1 text-2xl font-bold text-gray-800">Gestão de produtos</h2>
            </div>
            <a href="{{ route('produtos.create') }}" class="inline-flex items-center rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                <span class="mr-2 text-lg leading-none">+</span> Cadastrar produto
            </a>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded-lg border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800" role="status">
                    {{ session('success') }}
                </div>
            @endif

            <div class="mb-6 grid gap-4 sm:grid-cols-3">
                <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200">
                    <p class="text-sm font-medium text-gray-500">Produtos cadastrados</p>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $produtos->count() }}</p>
                </div>
                <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200">
                    <p class="text-sm font-medium text-gray-500">Categorias</p>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ $produtos->pluck('categoria')->unique()->count() }}</p>
                </div>
                <div class="rounded-xl bg-white p-5 shadow-sm ring-1 ring-gray-200">
                    <p class="text-sm font-medium text-gray-500">Unidades em estoque</p>
                    <p class="mt-2 text-3xl font-extrabold text-gray-900">{{ number_format($produtos->sum('quantidade'), 0, ',', '.') }}</p>
                </div>
            </div>

            <div class="overflow-hidden rounded-xl bg-white shadow-sm ring-1 ring-gray-200">
                <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Todos os produtos</h3>
                        <p class="mt-1 text-sm text-gray-500">Consulte e atualize os registros do catálogo.</p>
                    </div>
                    <a href="{{ route('home') }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-800">Ver página pública →</a>
                </div>

                @if ($produtos->isEmpty())
                    <div class="px-6 py-14 text-center">
                        <p class="font-semibold text-gray-900">Nenhum produto cadastrado.</p>
                        <p class="mt-1 text-sm text-gray-500">Use o botão acima para adicionar o primeiro item.</p>
                    </div>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead class="bg-gray-50 text-left text-xs uppercase tracking-wider text-gray-500">
                                <tr>
                                    <th class="px-6 py-3 font-semibold">Produto</th>
                                    <th class="px-6 py-3 font-semibold">Categoria</th>
                                    <th class="px-6 py-3 text-right font-semibold">Preço</th>
                                    <th class="px-6 py-3 text-right font-semibold">Estoque</th>
                                    <th class="px-6 py-3 text-right font-semibold">Ações</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-100 bg-white">
                                @foreach ($produtos as $produto)
                                    <tr class="hover:bg-gray-50">
                                        <td class="max-w-md px-6 py-4">
                                            <p class="font-semibold text-gray-900">{{ $produto->nome }}</p>
                                            <p class="mt-1 truncate text-xs text-gray-500">{{ $produto->descricao }}</p>
                                        </td>
                                        <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $produto->categoria }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-right font-semibold text-gray-900">R$ {{ number_format((float) $produto->preco, 2, ',', '.') }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-right text-gray-600">{{ $produto->quantidade }}</td>
                                        <td class="whitespace-nowrap px-6 py-4 text-right">
                                            <div class="flex justify-end gap-2">
                                                <a href="{{ route('produtos.edit', $produto) }}" class="rounded-md border border-gray-300 px-3 py-1.5 font-semibold text-gray-700 hover:bg-gray-100">Editar</a>
                                                <form method="POST" action="{{ route('produtos.destroy', $produto) }}" onsubmit="return confirm('Excluir este produto do catálogo?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="rounded-md border border-red-200 px-3 py-1.5 font-semibold text-red-700 hover:bg-red-50">Excluir</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="border-t border-gray-100 px-6 py-3 text-xs text-gray-500">Exibindo todos os {{ $produtos->count() }} produtos cadastrados.</div>
            </div>
        </div>
    </div>
</x-app-layout>
