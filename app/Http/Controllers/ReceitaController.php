<?php

namespace App\Http\Controllers;

use App\Models\Receita;
use Illuminate\Http\Request;

class ReceitaController extends Controller
{
    public function index()
    {
        $receitas = Receita::orderBy('data_receita', 'desc')->get();
        return view('receitas.index_receitas', compact('receitas'));
    }

    public function create()
    {
        return view('receitas.create_receitas');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'data_receita' => 'required|date',
            'categoria' => 'required|string|max:20',
            'valor' => 'required|numeric',
        ]);

        Receita::create($validated);

        return redirect()->route('receitas.index')->with('success', 'Receita criada com sucesso!');
    }

    public function edit($id)
    {
        $receita = Receita::findOrFail($id);
        return view('receitas.edit_receitas', compact('receita'));
    }

    public function update(Request $request, $id)
    {
        $receita = Receita::findOrFail($id);

        $validated = $request->validate([
            'data_receita' => 'required|date',
            'categoria' => 'required|string|max:20',
            'valor' => 'required|numeric',
        ]);

        $receita->update($validated);

        return redirect()->route('receitas.index')->with('success', 'Receita atualizada com sucesso!');
    }

    public function destroy($id)
    {
        $receita = Receita::findOrFail($id);
        $receita->delete();

        return redirect()->route('receitas.index')->with('success', 'Receita removida.');
    }
}
