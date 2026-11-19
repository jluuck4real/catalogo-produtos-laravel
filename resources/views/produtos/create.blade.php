<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">Cadastrar produto</h2>
    </x-slot>

    <div class="py-10">
        <div class="mx-auto max-w-3xl px-4 sm:px-6 lg:px-8">
            <div class="rounded-xl bg-white p-6 shadow-sm ring-1 ring-gray-200 sm:p-8">
                <p class="mb-6 text-sm text-gray-500">Preencha os dados para incluir um item no catálogo público.</p>
                <form method="POST" action="{{ route('produtos.store') }}">
                    @csrf
                    @include('produtos._form', ['produto' => null, 'submitLabel' => 'Cadastrar produto'])
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
