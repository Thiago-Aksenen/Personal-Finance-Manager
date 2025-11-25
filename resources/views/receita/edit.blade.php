<x-layout title="Editar receita">
    <form action="{{ route('receita.update', $receita->id) }}" method="post">
        @csrf
        @method('PUT')

        <label for="data">Data</label>
        <input type="date" name="data" value="{{ old('data', $receita->data) }}">
        @error('data')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <option value="venda" {{ old('categoria', $receita->categoria) == 'venda' ? 'selected' : '' }}>Venda</option>
            <option value="servico" {{ old('categoria', $receita->categoria) == 'servico' ? 'selected' : '' }}>Serviço
            </option>
            <option value="aluguel" {{ old('categoria', $receita->categoria) == 'aluguel' ? 'selected' : '' }}>Aluguel
            </option>
            <option value="investimento" {{ old('categoria', $receita->categoria) == 'investimento' ? 'selected' : '' }}>
                Investimento</option>
            <option value="outro" {{ old('categoria', $receita->categoria) == 'outro' ? 'selected' : '' }}>Outro</option>
        </select>
        @error('categoria')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="valor">Valor</label>
        <input type="number" name="valor" value="{{ old('valor', $receita->valor) }}">
        @error('valor')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Salvar Alterações</button>
    </form>
</x-layout>