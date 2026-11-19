<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Editar produto</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 sm:p-8">
                <p class="mb-6 text-sm text-gray-500">Atualize as informações de <strong class="text-gray-700">{{ $produto->nome }}</strong>.</p>
                <form method="POST" action="{{ route('produtos.update', $produto) }}">
                    @csrf
                    @method('PUT')
                    @include('produtos._form', ['produto' => $produto, 'submitLabel' => 'Salvar alterações'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
