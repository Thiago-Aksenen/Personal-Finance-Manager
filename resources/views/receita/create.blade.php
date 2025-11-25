<x-layout title="Adicionar receita">
    <div class="container mt-4">

        <h2 class="mb-4">Adicionar receita</h2>

        <form action="{{ route('receita.store') }}" method="post" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="data" class="form-label">Data</label>
                <input type="date" name="data" class="form-control" value="{{ old('data') }}">
                @error('data')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" class="form-select">
                    <option value="venda">Venda</option>
                    <option value="servico">Serviço</option>
                    <option value="aluguel">Aluguel</option>
                    <option value="investimento">Investimento</option>
                    <option value="outro">Outro</option>
                </select>
                @error('categoria')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" name="valor" step="0.1" class="form-control" value="{{ old('valor') }}" placeholder="R$">
                @error('valor')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

    </div>
</x-layout>
