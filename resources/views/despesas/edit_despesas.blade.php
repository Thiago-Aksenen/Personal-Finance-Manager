@extends('layouts.page_layout')

@section('title', 'Editar Despesa')

@section('content')
<h3>Editar Despesa</h3>

<form action="{{ route('despesas.update', $despesa->id) }}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="id" value="{{ $despesa->id }}">
    <div class="mb-3">
        <label for="data_despesa" class="form-label">Data</label>
        <input type="date" name="data_despesa" id="data_despesa" class="form-control" value="{{ old('data_despesa', $despesa->data_despesa) }}" required>
    </div>
    <div class="mb-3">
        <label for="categoria" class="form-label">Categoria</label>
        <input type="text" name="categoria" id="categoria" class="form-control" value="{{ old('categoria', $despesa->categoria) }}" maxlength="20" required>
    </div>
    <div class="mb-3">
        <label for="valor" class="form-label">Valor</label>
        <input type="number" step="0.01" name="valor" id="valor" class="form-control" value="{{ old('valor', $despesa->valor) }}" required>
    </div>
    <button type="submit" class="btn btn-primary">Atualizar</button>
    <a href="{{ route('despesas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
@endsection

