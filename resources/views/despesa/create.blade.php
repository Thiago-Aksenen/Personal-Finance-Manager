<x-layout title="Adicionar despesa">
    <div class="container mt-4">

        <h2 class="mb-4">Adicionar despesa</h2>

        <form action="{{ route('despesa.store') }}" method="post" class="card p-4 shadow-sm">
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
                    <option value="contas">Contas</option>
                    <option value="alimentacao">Alimentação</option>
                    <option value="transporte">Transporte</option>
                    <option value="compras">Compras</option>
                    <option value="outro">Outro</option>
                </select>
                @error('categoria')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="valor" class="form-label">Valor</label>
                <input type="number" name="valor" step="0.1" class="form-control" value="{{ old('valor') }}"
                    placeholder="R$ ">
                @error('valor')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Salvar</button>
        </form>

    </div>
</x-layout>