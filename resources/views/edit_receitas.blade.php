@extends('layouts.pages_layout')

@section('title', 'Editar Receita')

@section('content')
<h3>Editar Receita</h3>

<form action="{{ route('receitas.update', $receita->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $receita->id }}">
    <div class="mb-3">
        <label for="data_receita" class="form-label">Data</label>
        <input type="date" name="data_receita" id="data_receita" class="form-control" value="{{ old('data_receita', $receita->data_receita) }}" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria', $receita->categoria) }}" maxlength="20" required>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor', $receita->valor) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('receitas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
