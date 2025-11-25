<x-layout title="Editar despesa">
    <div class="container mt-4">

        <h2 class="mb-4">Editar despesa</h2>

        <form action="{{ route('despesa.update', $despesa->id) }}" method="post" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" class="form-control" value="{{ old('data', $despesa->data) }}">
                @error('data')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="contas" {{ old('categoria', $despesa->categoria) == 'contas' ? 'selected' : '' }}>
                        Contas</option>
                    <option value="alimentacao" {{ old('categoria', $despesa->categoria) == 'alimentacao' ? 'selected' : '' }}>Alimentação</option>
                    <option value="transporte" {{ old('categoria', $despesa->categoria) == 'transporte' ? 'selected' : '' }}>Transporte</option>
                    <option value="compras" {{ old('categoria', $despesa->categoria) == 'compras' ? 'selected' : '' }}>
                        Compras</option>
                    <option value="outro" {{ old('categoria', $despesa->categoria) == 'outro' ? 'selected' : '' }}>Outro
                    </option>
                </select>
                @error('categoria')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" name="valor" step="0.01" class="form-control"
                    value="{{ old('valor', $despesa->valor) }}">
                @error('valor')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salvar alterações</button>
        </form>

    </div>
</x-layout>