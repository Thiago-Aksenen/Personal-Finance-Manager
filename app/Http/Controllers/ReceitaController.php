<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Receita;
use Illuminate\Support\Facades\Auth;

class ReceitaController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $query = Receita::where('id_usuario', $userId);

        if ($request->filled('categoria')) {
            $query->where('categoria', $request->categoria);
        }

        if ($request->filled('data_inicio')) {
            $query->where('data', '>=', $request->data_inicio);
        }

        if ($request->filled('data_fim')) {
            $query->where('data', '<=', $request->data_fim);
        }

        $receitas = $query->orderBy('data', 'desc')->get();

        return view('receita.index', ['receitas' => $receitas]);
    }

    public function create()
    {
        return view('receita.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'data' => 'required|date',
                'categoria' => 'required|in:venda,servico,aluguel,investimento,outro',
                'valor' => 'required|numeric|min:0.1|max:999999.99'
            ],
            [
                'data.required' => 'O campo de data é obrigatório.',
                'data.date' => 'O campo de data deve ser uma data válida.',
                'categoria.required' => 'O campo de categoria é obrigatório.',
                'categoria.in' => 'A categoria selecionada é inválida.',
                'valor.required' => 'O campo de valor é obrigatório.',
                'valor.numeric' => 'O campo de valor deve ser numérico.',
                'valor.min' => 'O campo de valor deve ser maior do que zero.',
                'valor.max' => 'O campo de valor deve ser menor do 999999.99.',
            ]
        );
        Receita::create([
            'data' => $request['data'],
            'categoria' => $request['categoria'],
            'valor' => $request['valor'],
            'id_usuario' => Auth::user()->id
        ]);
        return redirect()->route('receita.index')->with('message', 'Uma receita de tipo ' . $request['categoria'] . ' foi adicionada com sucesso!');
    }

    public function edit(Receita $receita)
    {
        return view('receita.edit', ['receita' => $receita]);
    }

    public function update(Request $request, Receita $receita)
    {
        $tipoReceita = $receita->categoria;
        $request->validate(
            [
                'data' => 'required|date',
                'categoria' => 'required|in:venda,servico,aluguel,investimento,outro',
                'valor' => 'required|numeric|min:0.1|max:999999.99'
            ],
            [
                'data.required' => 'O campo de data é obrigatório.',
                'data.date' => 'O campo de data deve ser uma data válida.',
                'categoria.required' => 'O campo de categoria é obrigatório.',
                'categoria.in' => 'A categoria selecionada é inválida.',
                'valor.required' => 'O campo de valor é obrigatório.',
                'valor.numeric' => 'O campo de valor deve ser numérico.',
                'valor.min' => 'O campo de valor deve ser maior que zero.',
                'valor.max' => 'O campo de valor deve ser menor do 999999.99.',
            ]
        );
        $receita->update($request->all());

        if ($tipoReceita == $request['categoria']) {
            $message = 'Uma receita de tipo ' . $tipoReceita . ' foi atualizada com sucesso!';
        } else {
            $message = 'Uma receita de tipo ' . $tipoReceita . ' (agora ' . $request['categoria'] . ') foi atualizada com sucesso!';
        }

        return redirect()->route('receita.index')->with('message', $message);
    }

    public function destroy(Receita $receita)
    {
        $tipoReceita = $receita->categoria;
        $receita->delete();
        return redirect()->route('receita.index')->with('message', 'Uma receita de tipo ' . $tipoReceita . ' foi excluída com sucesso!');
    }
}
