<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    /**
     * Lista todas as despesas.
     */
    public function index()
    {
        $despesas = Despesa::orderBy('data_despesa', 'desc')->get();
        return view('index_despesas', compact('despesas'));
    }

    /**
     * Exibe o formulário para criar uma nova despesa.
     */
    public function create()
    {
        return view('create_despesas');
    }

    /**
     * Armazena uma nova despesa no banco.
     */
    public function store(Request $request) {
    $despesa = new Despesa();
    $despesa->data_despesa = $request->input('data_despesa');
    $despesa->categoria = $request->input('categoria');
    $despesa->valor = $request->input('valor');
    $despesa->user_id = auth()->id();
    $despesa->save();

    return redirect()->route('despesas.index');
}

    /**
     * Exibe o formulário de edição da despesa.
     */
    public function edit($id)
    {
        $despesa = Despesa::findOrFail($id);
        return view('edit_despesas', compact('despesa'));
    }

    /**
     * Atualiza a despesa no banco.
     */
    public function update(Request $request, $id)
    {
        $despesa = Despesa::findOrFail($id);

        $validated = $request->validate([
            'data_despesa' => 'required|date',
            'categoria' => 'required|string|max:20',
            'valor' => 'required|numeric',
        ]);

        $despesa->update($validated);

        return redirect()->route('despesas.index')->with('success', 'Despesa atualizada com sucesso!');
    }

    /**
     * Remove a despesa do banco.
     */
    public function destroy($id)
    {
        $despesa = Despesa::findOrFail($id);
        $despesa->delete();

        return redirect()->route('despesas.index')->with('success', 'Despesa removida.');
    }
}
