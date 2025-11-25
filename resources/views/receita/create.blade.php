<x-layout title="Adicionar receita">
    <form action="{{ route('receita.store') }}" method="post">
        @csrf

        <label for="data">Data</label>
        <input type="date" name="data" value="{{ old('data') }}">
        @error('data')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="categoria">Categoria</label>
        <select name="categoria">
            <option value="venda">Venda</option>
            <option value="servico">Serviço</option>
            <option value="aluguel">Aluguel</option>
            <option value="investimento">Investimento</option>
            <option value="outro">Outro</option>
        </select>
        @error('categoria')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <label for="valor">Valor</label>
        <input type="number" name="valor" step="0.01" value="{{ old('valor') }}">
        @error('valor')
            <div>{{ $message }}</div>
        @enderror
        <br>

        <button type="submit">Enviar</button>
    </form>
</x-layout>