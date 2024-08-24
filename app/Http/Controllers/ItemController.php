<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    // Método para listar itens no estoque
    public function index()
    {
        $itens = Item::all();
        return view('itens.index', compact('itens'));
    }

    public function create()
    {
        return view('itens.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image'
        ]);

        $data = $request->all();
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('imagens', 'public');
        }

        Item::create($data);
        return redirect()->route('itens.index')->with('success', 'Item criado com sucesso!');
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return view('itens.show', compact('item'));
    }

    public function edit($id)
    {
        $item = Item::findOrFail($id);
        return view('itens.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'categoria' => 'required',
            'quantidade' => 'required|integer',
            'preco' => 'required|numeric',
            'imagem' => 'nullable|image',
        ]);

        $item = Item::findOrFail($id);
        $item->nome = $request->input('nome');
        $item->categoria = $request->input('categoria');
        $item->quantidade = $request->input('quantidade');
        $item->preco = $request->input('preco');

        if ($request->hasFile('imagem')) {
            $path = $request->file('imagem')->store('imagens', 'public');
            $item->imagem = $path;
        }

        $item->save();

        return redirect()->route('itens.index')->with('success', 'Item atualizado com sucesso!');
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return redirect()->route('itens.index')->with('success', 'Item excluído com sucesso!');
    }

    // Método para retirar um item do estoque
    public function withdraw(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $quantity = $request->input('quantity');

        if ($item->quantidade < $quantity) {
            return redirect()->back()->with('error', 'Quantidade insuficiente em estoque.');
        }

        $item->quantidade -= $quantity;
        $item->save();

        return redirect()->route('itens.index')->with('success', 'Item retirado com sucesso.');
    }
}
