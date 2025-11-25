<?php

namespace App\Http\Controllers;

use App\Models\Despesa;
use App\Models\Receita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // É uma boa prática importar o Auth

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $userId = Auth::id();

        $dataInicio = $request->input('data_inicio');
        $dataFim = $request->input('data_fim');

        $queryFilter = function ($query) use ($dataInicio, $dataFim) {
            if ($dataInicio) {
                $query->where('data', '>=', $dataInicio);
            }
            if ($dataFim) {
                $query->where('data', '<=', $dataFim);
            }
        };

        $totalReceita = Receita::query()
            ->where('id_usuario', $userId)
            ->where($queryFilter)
            ->sum('valor');

        $totalDespesa = Despesa::query()
            ->where('id_usuario', $userId)
            ->where($queryFilter)
            ->sum('valor');

        $saldoAtual = $totalReceita - $totalDespesa;

        return view('user.dashboard', [
            'SaldoAtual'    => $saldoAtual,
            'TotalReceita'  => $totalReceita,
            'TotalDespesa'  => $totalDespesa,
        ]);
    }
}
