@extends('layouts.pages_layout')

@section('title', 'Criar Despesa')

@section('content')
<h3>Criar Despesa</h3>

<form action="{{ route('despesas.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="data_despesa" class="form-label">Data</label>
        <input type="date" name="data_despesa" id="data_despesa" class="form-control" value="{{ old('data_despesa') }}" required>
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
    <a href="{{ route('despesas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection
