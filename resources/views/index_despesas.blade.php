@extends('layouts.pages_layout')
@extends('layouts.navegacao_layout')

@section('title', 'Lista de Despesas')

@section('sidebar')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h3>Despesas</h3>
    <a href="{{ route('despesas.create') }}" class="btn btn-success">+ Nova Despesa</a>
</div>

@if($despesas->isEmpty())
    <p>Nenhuma despesa cadastrada.</p>
@else
<table class="table table-bordered table-striped align-middle">
    <thead class="table-danger">
        <tr>
            <th>ID</th>
            <th>Data</th>
            <th>Categoria</th>
            <th>Valor</th>
            <th>Ações</th>
        </tr>
    </thead>
    <tbody>
        @foreach($despesas as $despesa)
            <tr>
                <td>{{ $despesa->id }}</td>
                <td>{{ \Carbon\Carbon::parse($despesa->data_despesa)->format('d/m/Y') }}</td>
                <td>{{ $despesa->categoria }}</td>
                <td>R$ {{ number_format($despesa->valor, 2, ',', '.') }}</td>
                <td class="d-flex gap-1">
                    <a href="{{ route('despesas.edit', $despesa->id) }}" class="btn btn-sm btn-primary">Editar</a>

                    <form action="{{ route('despesas.destroy', $despesa->id) }}" method="POST" onsubmit="return confirm('Deseja realmente excluir esta despesa?');">
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
