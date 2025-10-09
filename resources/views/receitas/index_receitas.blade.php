@extends('layouts.pages_layout')

@section('title', 'Lista de Receitas')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Receitas</h3>
    <a href="{{ route('receitas.create') }}" class="btn btn-success">+ Nova Receita</a>
</div>

@if($receitas->isEmpty())
    <p>Nenhuma receita cadastrada.</p>
@else
<table class="table table-bordered table-striped align-middle">
    <thead class="table-primary">
        <tr>
            <th>Código</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($receitas as $receita)
            <tr>
                <td>{{ $receita->id }}</td>
                <td>{{ \Carbon\Carbon::parse($receita->data_receita)->format('d/m/Y') }}</td>
                <td>{{ $receita->categoria }}</td>
                <td>R$ {{ number_format($receita->valor, 2, ',', '.') }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('receitas.edit', $receita->id) }}" class="btn btn-sm btn-primary">Editar</a>

                    <form action="{{ route('receitas.destroy', $receita->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta receita?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endif
@endsection
