<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DespesaController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        $despesas = Despesa::where('id_usuario', $userId)->get();
        return view('despesa.index', ['despesas' => $despesas]);
    }
    public function create()
    {
        return view('despesa.create');
    }
    public function store(Request $request)
    {
        $request->validate(
            [
                'data' => 'required|date',
                'categoria' => 'required|in:contas,alimentacao,transporte,compras,outro',
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

        Despesa::create([
            'data' => $request['data'],
            'categoria' => $request['categoria'],
            'valor' => $request['valor'],
            'id_usuario' => Auth::user()->id
        ]);

        return redirect()->route('despesa.index')
            ->with('message', 'Uma despesa de tipo ' . $request['categoria'] . ' foi registrada com sucesso!');
    }

    public function edit(Despesa $despesa)
    {
        return view('despesa.edit', ['despesa' => $despesa]);
    }

    public function update(Request $request, Despesa $despesa)
    {
        $tipoDespesa = $despesa->categoria;

        $request->validate(
            [
                'data' => 'required|date',
                'categoria' => 'required|in:contas,alimentacao,transporte,compras,outro',
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
                'valor.max' => 'O campo de valor deve ser menor do que 999999.99.',
            ]
        );

        $despesa->update($request->all());

        if ($tipoDespesa === $request['categoria']) {
            $message = 'Uma despesa de tipo ' . $tipoDespesa . ' foi atualizada com sucesso!';
        } else {
            $message = 'Uma despesa de tipo ' . $tipoDespesa . ' (agora ' . $request['categoria'] . ') foi atualizada com sucesso!';
        }

        return redirect()->route('despesa.index')->with('message', $message);
    }


    public function destroy(Despesa $despesa)
    {
        $tipoDespesa = $despesa->categoria;
        $despesa->delete();
        return redirect()->route('despesa.index')->with('message', 'Uma despesa de tipo ' . $tipoDespesa . ' foi excluída com sucesso!');
    }
}
