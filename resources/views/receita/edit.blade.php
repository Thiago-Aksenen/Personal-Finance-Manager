<x-layout title="Editar receita">
    <div class="container mt-4">

        <h2 class="mb-4">Editar receita</h2>

        <form action="{{ route('receita.update', $receita->id) }}" method="post" class="card p-4 shadow-sm">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" class="form-control" value="{{ old('data', $receita->data) }}">
                @error('data')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="venda" {{ old('categoria', $receita->categoria) == 'venda' ? 'selected' : '' }}>Venda
                    </option>
                    <option value="servico" {{ old('categoria', $receita->categoria) == 'servico' ? 'selected' : '' }}>
                        Serviço</option>
                    <option value="aluguel" {{ old('categoria', $receita->categoria) == 'aluguel' ? 'selected' : '' }}>
                        Aluguel</option>
                    <option value="investimento" {{ old('categoria', $receita->categoria) == 'investimento' ? 'selected' : '' }}>Investimento</option>
                    <option value="outro" {{ old('categoria', $receita->categoria) == 'outro' ? 'selected' : '' }}>Outro
                    </option>
                </select>
                @error('categoria')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" name="valor" step="0.1" class="form-control"
                    value="{{ old('valor', $receita->valor) }}">
                @error('valor')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salvar alterações</button>
        </form>

    </div>
</x-layout>