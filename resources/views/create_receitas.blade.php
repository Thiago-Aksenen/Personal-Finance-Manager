@extends('layouts.pages_layout')

@section('title', 'Criar Receita')

@section('content')
<h3>Criar Receita</h3>

<form action="{{ route('receitas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="data_receita" class="form-label">Data</label>
        <input type="date" name="data_receita" id="data_receita" class="form-control" value="{{ old('data_receita') }}" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria') }}" maxlength="20" required>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor') }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Salvar</button>
    <a href="{{ route('receitas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
