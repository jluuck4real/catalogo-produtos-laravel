<div class="space-y-6">
    <div>
        <x-input-label for="nome" value="Nome do produto" />
        <x-text-input id="nome" name="nome" type="text" class="mt-1 block w-full" :value="old('nome', $produto?->nome)" required maxlength="150" autofocus />
        <x-input-error :messages="$errors->get('nome')" class="mt-2" />
    </div>

    <div>
        <x-input-label for="descricao" value="Descrição" />
        <textarea id="descricao" name="descricao" rows="4" required maxlength="5000" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ old('descricao', $produto?->descricao) }}</textarea>
        <x-input-error :messages="$errors->get('descricao')" class="mt-2" />
    </div>

    <div class="grid gap-6 sm:grid-cols-3">
        <div>
            <x-input-label for="categoria" value="Categoria" />
            <x-text-input id="categoria" name="categoria" type="text" class="mt-1 block w-full" :value="old('categoria', $produto?->categoria)" required maxlength="100" />
            <x-input-error :messages="$errors->get('categoria')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="preco" value="Preço (R$)" />
            <x-text-input id="preco" name="preco" type="number" class="mt-1 block w-full" :value="old('preco', $produto?->preco)" required min="0" max="99999999.99" step="0.01" />
            <x-input-error :messages="$errors->get('preco')" class="mt-2" />
        </div>
        <div>
            <x-input-label for="quantidade" value="Quantidade em estoque" />
            <x-text-input id="quantidade" name="quantidade" type="number" class="mt-1 block w-full" :value="old('quantidade', $produto?->quantidade)" required min="0" step="1" />
            <x-input-error :messages="$errors->get('quantidade')" class="mt-2" />
        </div>
    </div>

    <div class="flex items-center justify-end gap-3 border-t border-gray-100 pt-5">
        <a href="{{ route('dashboard') }}" class="rounded-md px-4 py-2 text-sm font-semibold text-gray-600 hover:bg-gray-100">Cancelar</a>
        <x-primary-button>{{ $submitLabel }}</x-primary-button>
    </div>
</div>
