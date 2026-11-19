<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProdutoController extends Controller
{
    public function publicIndex(): View
    {
        return view('welcome', ['produtos' => Produto::query()->orderBy('nome')->get()]);
    }

    public function index(): View
    {
        return view('dashboard', ['produtos' => Produto::query()->orderBy('nome')->get()]);
    }

    public function create(): View
    {
        return view('produtos.create');
    }

    public function store(Request $request): RedirectResponse
    {
        Produto::create($request->validate($this->rules(), $this->messages()));
        return redirect()->route('dashboard')->with('success', 'Produto cadastrado com sucesso.');
    }

    public function edit(Produto $produto): View
    {
        return view('produtos.edit', compact('produto'));
    }

    public function update(Request $request, Produto $produto): RedirectResponse
    {
        $produto->update($request->validate($this->rules(), $this->messages()));
        return redirect()->route('dashboard')->with('success', 'Produto atualizado com sucesso.');
    }

    public function destroy(Produto $produto): RedirectResponse
    {
        $produto->delete();
        return redirect()->route('dashboard')->with('success', 'Produto excluído com sucesso.');
    }

    private function rules(): array
    {
        return [
            'nome' => ['required', 'string', 'max:150'],
            'descricao' => ['required', 'string', 'max:5000'],
            'categoria' => ['required', 'string', 'max:100'],
            'preco' => ['required', 'numeric', 'min:0', 'max:99999999.99'],
            'quantidade' => ['required', 'integer', 'min:0', 'max:2147483647'],
        ];
    }

    private function messages(): array
    {
        return [
            'nome.required' => 'Informe o nome do produto.',
            'nome.max' => 'O nome não pode ultrapassar 150 caracteres.',
            'descricao.required' => 'Informe a descrição do produto.',
            'descricao.max' => 'A descrição não pode ultrapassar 5.000 caracteres.',
            'categoria.required' => 'Informe a categoria do produto.',
            'categoria.max' => 'A categoria não pode ultrapassar 100 caracteres.',
            'preco.required' => 'Informe o preço do produto.',
            'preco.numeric' => 'O preço deve ser numérico.',
            'preco.min' => 'O preço não pode ser negativo.',
            'quantidade.required' => 'Informe a quantidade em estoque.',
            'quantidade.integer' => 'A quantidade deve ser um número inteiro.',
            'quantidade.min' => 'A quantidade não pode ser negativa.',
        ];
    }
}
